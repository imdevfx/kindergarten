<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckAnswerRequest;
use App\Models\Answer;
use App\Models\Response;
use App\Models\TestCategory;
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
                'tests' => ['required', 'array'],
                'tests.*.name' => ['required', 'string'],

                // Questions
                'tests.*.questions' => ['nullable', 'array'],
                'tests.*.questions.*.name' => ['required_with:tests.*.questions', 'string'],

//                // Variants
//                'tests.*.questions.*.variants' => ['nullable', 'array'],
//                'tests.*.questions.*.variants.*.name' => ['required_with:tests.*.questions.*.variants', 'string'],
//                'tests.*.questions.*.variants.*.answer' => ['required_with:tests.*.questions.*.variants', 'boolean'],
            ], [
                // Root test messages
                'tests.required' => 'Testlar majburiy.',
                'tests.array' => 'Testlar formati noto‘g‘ri (array bo‘lishi kerak).',

                // Test name
                'tests.*.name.required' => 'Har bir test nomi kiritilishi shart.',
                'tests.*.name.string' => 'Test nomi matn ko‘rinishida bo‘lishi kerak.',

                // Questions
                'tests.*.questions.array' => 'Savollar ro‘yxati noto‘g‘ri formatda.',
                'tests.*.questions.*.name.required_with' => 'Savol nomi kiritilishi shart.',

//                // Variants
//                'tests.*.questions.*.variants.array' => 'Variantlar ro‘yxati noto‘g‘ri formatda.',
//                'tests.*.questions.*.variants.*.name.required_with' => 'Har bir variant nomi kiritilishi shart.',
//                'tests.*.questions.*.variants.*.name.string' => 'Variant nomi matn ko‘rinishida bo‘lishi kerak.',
//                'tests.*.questions.*.variants.*.answer.required_with' => 'Har bir variant uchun javob qiymati tanlanishi shart.',
//                'tests.*.questions.*.variants.*.answer.boolean' => 'Variant javobi true yoki false qiymatda bo‘lishi kerak.',
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
                                    'name' => $variantData['name'],
                                    'answer' => $variantData['answer'] ?? false,
                                ]);
                            }
                        }
                    }
                }
            }

            DB::commit();
            return $this->successResponse('Testlar muvaffaqiyatli qo‘shildi!');

        } catch (ValidationException $validationException) {
            return $this->errorResponse('Validatsiya xatoligi',$validationException->errors());
        } catch (Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }



    // ✅ 1. Bo‘limlar bilan savollarni olish
    public function questions()
    {
        $categories = TestCategory::query()
            ->with('questions')
            ->where('is_active',true)
            ->get();

        $options = [
            ['value' => 1, 'label' => 'Hech qachon'],
            ['value' => 2, 'label' => 'Kamdan-kam'],
            ['value' => 3, 'label' => 'Ba’zan'],
            ['value' => 4, 'label' => 'Ko‘pincha'],
            ['value' => 5, 'label' => 'Har doim'],
        ];

        return response()->json([
            'status' => true,
            'data' => compact('categories', 'options')
        ]);
    }

    // ✅ 2. Javoblarni saqlash
    public function saveAnswer(CheckAnswerRequest $request)
    {
        $answers = $request->validated()['answers'];
        $total = collect($answers)->sum('value');

        $response = Response::create([
//            'user_id' => auth()->id(),
            'user_id' => 1,
            'total_score' => $total,
        ]);

        foreach ($answers as $ans) {
            Answer::create([
                'response_id' => $response->id,
                'test_question_id' => $ans['question_id'],
                'value' => $ans['value'],
            ]);
        }

        $category = $this->scoreCategory($total, count($answers) * 4);

        return response()->json([
            'status' => true,
            'message' => 'Test muvaffaqiyatli yakunlandi',
            'data' => [
                'response_id' => $response->id,
                'total_score' => $total,
                'message' => $category,
            ]
        ]);
    }

    // ✅ 3. Natijani olish
    public function result($response_id)
    {
        $response = Response::with('answers.question.category')->findOrFail($response_id);
        $category = $this->scoreCategory($response->total_score, $response->answers->count() * 4);

        return response()->json([
            'status' => true,
            'data' => [
                'response' => $response,
                'category' => $category,
            ]
        ]);
    }

    protected function scoreCategory($score, $max)
    {
        if ($max == 0) return 'Nomaʼlum';
        $p = ($score / $max) * 100;

        return match(true) {
            $p <= 40 => 'Sizga kasbiy motivatsiya va o‘z ishingizga bo‘lgan qiziqishni oshirish zarur.',
            $p >= 41 || $p <= 60 => 'Sizda kasbiy faoliyatga nisbatan barqaror munosabat bor, lekin ilhom va ishga muhabbatni kuchaytirish lozim.',
            $p >= 61 || $p <= 80 => 'Siz yaxshi tarbiyachisiz, fidoyilik hissi bor, ammo ayrim sohalarda rivojlanish kerak.',
            $p >= 81 || $p <= 100 => 'Siz haqiqiy fidoyi tarbiyachisiz! Bolalarni sevish va kasbingizga sadoqatingiz yuqori.',
            default => 'Nomalum'
        };
    }

}
