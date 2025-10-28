<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use App\Models\TestCategory;
use Exception;
use Illuminate\Http\Request;
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
                'tests.*.desc' => ['nullable', 'string'],

                // Questions
                'tests.*.questions' => ['nullable', 'array'],
                'tests.*.questions.*.name' => ['required_with:tests.*.questions', 'string'],

                // Variants
                'tests.*.questions.*.variants' => ['nullable', 'array'],
                'tests.*.questions.*.variants.*.name' => ['required_with:tests.*.questions.*.variants', 'string'],
                'tests.*.questions.*.variants.*.answer' => ['required_with:tests.*.questions.*.variants', 'boolean'],
            ], [
                // Root test messages
                'tests.required' => 'Testlar majburiy.',
                'tests.array' => 'Testlar formati noto‘g‘ri (array bo‘lishi kerak).',

                // Test name
                'tests.*.name.required' => 'Har bir test nomi kiritilishi shart.',
                'tests.*.name.string' => 'Test nomi matn ko‘rinishida bo‘lishi kerak.',

                // Test desc
                'tests.*.desc.string' => 'Test tavsifi matn ko‘rinishida bo‘lishi kerak.',

                // Questions
                'tests.*.questions.array' => 'Savollar ro‘yxati noto‘g‘ri formatda.',
                'tests.*.questions.*.name.required_with' => 'Savol nomi kiritilishi shart.',

                // Variants
                'tests.*.questions.*.variants.array' => 'Variantlar ro‘yxati noto‘g‘ri formatda.',
                'tests.*.questions.*.variants.*.name.required_with' => 'Har bir variant nomi kiritilishi shart.',
                'tests.*.questions.*.variants.*.name.string' => 'Variant nomi matn ko‘rinishida bo‘lishi kerak.',
                'tests.*.questions.*.variants.*.answer.required_with' => 'Har bir variant uchun javob qiymati tanlanishi shart.',
                'tests.*.questions.*.variants.*.answer.boolean' => 'Variant javobi true yoki false qiymatda bo‘lishi kerak.',
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
}
