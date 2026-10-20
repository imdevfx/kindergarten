<?php

namespace App\Http\Controllers\Tests;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckAnswerRequest;
use App\Models\Answer;
use App\Models\Response;
use App\Models\TestCategory;
use App\Models\TestVariant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TestController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'tests'                                        => ['required', 'array'],
                'tests.*.name'                                 => ['required', 'string'],

                // Questions
                'tests.*.questions'                            => ['nullable', 'array'],
                'tests.*.questions.*.name'                     => ['required_with:tests.*.questions', 'string'],

                // Variants
                'tests.*.questions.*.variants'                 => ['nullable', 'array'],
                'tests.*.questions.*.variants.*.name'          => ['required_with:tests.*.questions.*.variants', 'string'],
                'tests.*.questions.*.variants.*.answer'        => ['required_with:tests.*.questions.*.variants', 'boolean'],
            ], [
                // Root test messages
                'tests.required'                               => 'Testlar majburiy.',
                'tests.array'                                  => 'Testlar formati noto\'g\'ri (array bo\'lishi kerak).',

                // Test name
                'tests.*.name.required'                        => 'Har bir test nomi kiritilishi shart.',
                'tests.*.name.string'                          => 'Test nomi matn ko\'rinishida bo\'lishi kerak.',

                // Questions
                'tests.*.questions.array'                      => 'Savollar ro\'yxati noto\'g\'ri formatda.',
                'tests.*.questions.*.name.required_with'       => 'Savol nomi kiritilishi shart.',

                // Variants
                'tests.*.questions.*.variants.array'                   => 'Variantlar ro\'yxati noto\'g\'ri formatda.',
                'tests.*.questions.*.variants.*.name.required_with'    => 'Har bir variant nomi kiritilishi shart.',
                'tests.*.questions.*.variants.*.name.string'           => 'Variant nomi matn ko\'rinishida bo\'lishi kerak.',
                'tests.*.questions.*.variants.*.answer.required_with'  => 'Har bir variant uchun javob qiymati tanlanishi shart.',
                'tests.*.questions.*.variants.*.answer.boolean'        => 'Variant javobi true yoki false qiymatda bo\'lishi kerak.',
            ]);

            DB::beginTransaction(); // 🔒 xavfsizlik uchun transaction

            foreach ($data['tests'] as $testData) {
                // ✅ 1. Test yaratish
                $test = TestCategory::create([
                    'name' => $testData['name'],
                    'desc' => $testData['desc'] ?? null,
                ]);

                // ✅ 2. Savollarni yaratish
                if (!empty($testData['questions'])) {
                    foreach ($testData['questions'] as $questionData) {
                        $question = $test->questions()->create([
                            'name' => $questionData['name'],
                        ]);

                        // ✅ 3. Variantlarni yaratish
                        if (!empty($questionData['variants'])) {
                            foreach ($questionData['variants'] as $variantData) {
                                $question->variants()->create([
                                    'name'   => $variantData['name'],
                                    'answer' => $variantData['answer'] ?? false,
                                ]);
                            }
                        }
                    }
                }
            }

            DB::commit();
            return $this->successResponse('Testlar muvaffaqiyatli qo\'shildi!');

        } catch (ValidationException $validationException) {
            return $this->errorResponse('Validatsiya xatoligi', $validationException->errors());
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->errorResponse($exception->getMessage());
        }
    }



    // ✅ 1. Kategoriyalar ro'yxatini savollar bilan birga qaytaradi.
    //       is_completed — foydalanuvchi bu kategoriyani allaqachon ishlaganmi
    //       response_id  — agar ishlagan bo'lsa, uning natija ID si
    //       Admin bo'lsa, barcha savollar va to'g'ri javoblar (answer: true/false) ko'rsatiladi
    public function questions()
    {
        $user    = auth()->user();
        $isAdmin = $user ? $user->hasRole(RoleEnum::ADMINISTRATOR->value) : false;
        $userId  = auth()->id();

        // Foydalanuvchi topshirgan kategoriyalarni bir so'rovda olamiz (admin uchun completed cheklovi kerak emas)
        $completed = $isAdmin
            ? collect()
            : Response::where('user_id', $userId)
                ->whereNotNull('test_category_id')
                ->pluck('id', 'test_category_id'); // [category_id => response_id]

        $tests = TestCategory::with([
            'questions' => function ($query) {
                $query->select('id', 'test_category_id', 'name');
            },
            'questions.variants' => function ($query) use ($isAdmin) {
                if ($isAdmin) {
                    $query->select('id', 'test_question_id', 'name', 'answer');
                } else {
                    $query->select('id', 'test_question_id', 'name'); // Foydalanuvchiga answer chiqarilmaydi!
                }
            },
        ])->select('id', 'name')->get();

        $data = $tests->map(function ($category) use ($completed, $isAdmin) {
            $responseId   = $completed->get($category->id);
            $isCompleted  = $responseId !== null;

            return [
                'id'           => $category->id,
                'name'         => $category->name,
                'is_completed' => $isCompleted,
                'response_id'  => $responseId,           // null yoki natija ID si
                'questions'    => (!$isAdmin && $isCompleted)
                    ? []
                    : $category->questions->map(function ($q) use ($isAdmin) {
                        return [
                            'id'               => $q->id,
                            'test_category_id' => $q->test_category_id,
                            'name'             => $q->name,
                            'variants'         => $q->variants->map(function ($v) use ($isAdmin) {
                                $variant = [
                                    'id'               => $v->id,
                                    'test_question_id' => $v->test_question_id,
                                    'name'             => $v->name,
                                ];

                                if ($isAdmin) {
                                    $variant['answer'] = (bool) $v->answer; // ✅ Admin uchun to'g'ri javob ekanligi
                                }

                                return $variant;
                            }),
                        ];
                    }),
            ];
        });

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }

    // ✅ 2. Foydalanuvchi barcha natijalarini ko'radi (kategoriya bo'yicha)
    public function myResults()
    {
        $userId = auth()->id();

        $responses = Response::with('category')
            ->where('user_id', $userId)
            ->whereNotNull('test_category_id')
            ->get();

        $data = $responses->map(function ($response) {
            // to'g'ri javoblar sonini hisoblaymiz
            $totalCount   = $response->answers()->count();
            $correctCount = $response->total_score;
            $percent      = $totalCount > 0 ? round(($correctCount / $totalCount) * 100) : 0;

            return [
                'response_id'   => $response->id,
                'category_id'   => $response->test_category_id,
                'category_name' => optional($response->category)->name,
                'correct'       => $correctCount,
                'total'         => $totalCount,
                'percent'       => $percent,
                'level'         => $this->scoreCategory($correctCount, $totalCount),
                'submitted_at'  => $response->created_at->format('d.m.Y H:i'),
            ];
        });

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }

    // ✅ 2. Javoblarni saqlash (variantlik test: 1 ta to'g'ri variant tanlanadi)
    public function saveAnswer(CheckAnswerRequest $request)
    {
        $userId     = auth()->id();
        $categoryId = $request->validated()['test_category_id'];

        // 🔹 1. Tekshiramiz — foydalanuvchi bu kategoriyani allaqachon topshirganmi?
        $exists = Response::where('user_id', $userId)
            ->where('test_category_id', $categoryId)
            ->exists();

        if ($exists) {
            return response()->json([
                'status'  => false,
                'message' => 'Siz bu kategoriya testini allaqachon topshirgansiz.',
            ], 403);
        }

        $answers    = $request->validated()['answers'];
        $totalCount = count($answers);

        // 🔹 2. Variantlarning to'g'ri/noto'g'riligini DB dan tekshiramiz
        $variantIds      = collect($answers)->pluck('variant_id')->unique()->toArray();
        $correctVariants = TestVariant::whereIn('id', $variantIds)
            ->where('answer', true)
            ->pluck('id')
            ->toArray();

        $correctCount = collect($answers)->filter(
            fn($a) => in_array($a['variant_id'], $correctVariants)
        )->count();

        // 🔹 3. Response yaratamiz (test_category_id ham saqlanadi)
        $response = Response::create([
            'user_id'          => $userId,
            'test_category_id' => $categoryId,
            'total_score'      => $correctCount,
        ]);

        // 🔹 4. Har bir javobni saqlaymiz
        foreach ($answers as $ans) {
            Answer::create([
                'response_id'      => $response->id,
                'test_question_id' => $ans['question_id'],
                'test_variant_id'  => $ans['variant_id'],
            ]);
        }

        // 🔹 5. Foizga asosida daraja
        $percent = $totalCount > 0 ? round(($correctCount / $totalCount) * 100) : 0;
        $level   = $this->scoreCategory($correctCount, $totalCount);

        // 🔹 6. Javob qaytaramiz
        return response()->json([
            'status'  => true,
            'message' => 'Test muvaffaqiyatli yakunlandi',
            'data'    => [
                'response_id'  => $response->id,
                'category_id'  => $categoryId,
                'correct'      => $correctCount,
                'total'        => $totalCount,
                'percent'      => $percent,
                'level'        => $level,
            ]
        ]);
    }

    // ✅ 3. Natijani olish
    public function result($response_id)
    {
        $response = Response::with([
            'answers.question.category',
            'answers.variant',
            'category',   // responses.test_category_id → TestCategory
            'user',
        ])->findOrFail($response_id);

        $totalCount   = $response->answers->count();
        $correctCount = $response->answers->filter(
            fn($a) => optional($a->variant)->answer == true
        )->count();

        $percent = $totalCount > 0 ? round(($correctCount / $totalCount) * 100) : 0;
        $level   = $this->scoreCategory($correctCount, $totalCount);

        return response()->json([
            'status' => true,
            'data'   => [
                'user'          => [
                    'id'        => optional($response->user)->id,
                    'firstname' => optional($response->user)->firstname,
                    'lastname'  => optional($response->user)->lastname,
                    'login'     => optional($response->user)->login,
                ],
                'test_category' => [
                    'id'   => optional($response->category)->id,
                    'name' => optional($response->category)->name,
                ],
                'correct'       => $correctCount,
                'total'         => $totalCount,
                'percent'       => $percent,
                'level'         => $level,
                'answers'       => $response->answers->map(function ($answer) {
                    return [
                        'question'         => optional($answer->question)->name,
                        'selected_variant' => optional($answer->variant)->name,
                        'is_correct'       => (bool) optional($answer->variant)->answer,
                    ];
                }),
            ]
        ]);
    }

    /**
     * To'g'ri javoblar soniga qarab daraja aniqlash
     * @param int $correct - to'g'ri javoblar soni
     * @param int $total   - jami savollar soni
     */
    protected function scoreCategory(int $correct, int $total): string
    {
        if ($total == 0) return 'Nomaʼlum';
        $p = ($correct / $total) * 100;

        return match (true) {
            $p <= 40              => 'Sizga kasbiy motivatsiya va o\'z ishingizga bo\'lgan qiziqishni oshirish zarur.',
            $p > 40 && $p <= 60  => 'Sizda kasbiy faoliyatga nisbatan barqaror munosabat bor, lekin ilhom va ishga muhabbatni kuchaytirish lozim.',
            $p > 60 && $p <= 80  => 'Siz yaxshi tarbiyachisiz, fidoyilik hissi bor, ammo ayrim sohalarda rivojlanish kerak.',
            $p > 80              => 'Siz haqiqiy fidoyi tarbiyachisiz! Bolalarni sevish va kasbingizga sadoqatingiz yuqori.',
            default              => 'Nomaʼlum',
        };
    }
}
