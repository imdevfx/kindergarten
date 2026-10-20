<?php

namespace Database\Seeders;

use App\Models\TestCategory;
use App\Models\TestQuestion;
use App\Models\TestVariant;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Har bir savolga 4 ta variant qo'shiladi — biri to'g'ri (answer: true), qolganlari noto'g'ri.
     */
    public function run(): void
    {
        // Har bir savol uchun: [savol matni, [to'g'ri variant, noto'g'ri1, noto'g'ri2, noto'g'ri3]]
        $data = [
            'I. Kasbga munosabat' => [
                [
                    'question' => "Men o'z kasbimni jon-dildan yaxshi ko'raman",
                    'variants' => [
                        ['name' => "Ha, kasbimni juda sevaman va ishtiyoq bilan ishlayman", 'answer' => true],
                        ['name' => "Yo'q, bu faqat tirikchilik uchun", 'answer' => false],
                        ['name' => "Ba'zida yaxshi ko'raman, ba'zida yo'q", 'answer' => false],
                        ['name' => "Bu menga farq qilmaydi", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Har kuni bolalar bilan ishlash menga zavq beradi",
                    'variants' => [
                        ['name' => "Ha, bolalar bilan o'tkazgan har bir daqiqa zavqli", 'answer' => true],
                        ['name' => "Yo'q, bu juda charchatadi", 'answer' => false],
                        ['name' => "Faqat ba'zi kunlari zavq beradi", 'answer' => false],
                        ['name' => "Bolalar bilan ishlash meni bezovta qiladi", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Tarbiyachi bo'lish men uchun faqat ish emas, balki hayot tarzimdir",
                    'variants' => [
                        ['name' => "Ha, tarbiyachilik mening hayot yo'limdir", 'answer' => true],
                        ['name' => "Yo'q, bu oddiy bir kasb", 'answer' => false],
                        ['name' => "Hali to'liq o'ylab ko'rmaganman", 'answer' => false],
                        ['name' => "Imkonim bo'lsa, boshqa kasbga o'tib ketardim", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Qiyin vaziyatlarda ham ishimni tashlab ketish haqida o'ylamayman",
                    'variants' => [
                        ['name' => "Ha, qiyinchiliklar meni to'xtatmaydi", 'answer' => true],
                        ['name' => "Yo'q, ba'zida ishni tashlab ketishni o'ylayman", 'answer' => false],
                        ['name' => "Bu holatga tushmaganman", 'answer' => false],
                        ['name' => "Faqat ish haqi yaxshi bo'lsa qolaman", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Bolalarning yutug'i men uchun shaxsiy baxt hissini uyg'otadi",
                    'variants' => [
                        ['name' => "Ha, bolalar muvaffaqiyati meni juda xursand qiladi", 'answer' => true],
                        ['name' => "Yo'q, bu mening ishim emas", 'answer' => false],
                        ['name' => "Faqat katta yutuqlar xursand qiladi", 'answer' => false],
                        ['name' => "Bolalar yutug'i mening baxtimga ta'sir qilmaydi", 'answer' => false],
                    ],
                ],
            ],

            'II. Mas\'uliyat va sadoqat' => [
                [
                    'question' => "Men o'z vazifalarimni o'z vaqtida va vijdonan bajaraman",
                    'variants' => [
                        ['name' => "Ha, har doim o'z vaqtida va mas'uliyat bilan bajaraman", 'answer' => true],
                        ['name' => "Ko'pincha kechiktiraman", 'answer' => false],
                        ['name' => "Faqat rahbar kuzatganda bajaraman", 'answer' => false],
                        ['name' => "Qiyin topshiriqlarga e'tibor bermayman", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Bolalar xavfsizligi uchun doimo mas'uliyat his qilaman",
                    'variants' => [
                        ['name' => "Ha, bolalar xavfsizligi mening birinchi ustuvorligim", 'answer' => true],
                        ['name' => "Bu boshqa xodimlarning ishi", 'answer' => false],
                        ['name' => "Faqat ish vaqtida mas'ulman", 'answer' => false],
                        ['name' => "Bolalar o'zlari ehtiyot bo'lishi kerak", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Har bir bolaga individual yondashishga harakat qilaman",
                    'variants' => [
                        ['name' => "Ha, har bir bolaning ehtiyojini hisobga olaman", 'answer' => true],
                        ['name' => "Yo'q, hammaga bir xil munosabatda bo'laman", 'answer' => false],
                        ['name' => "Faqat muammoli bolalarga alohida yondashaman", 'answer' => false],
                        ['name' => "Vaqt bo'lmaganda bunga e'tibor bermayman", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Ishdagi muammolarni boshqalarga yuklamay, yechim izlayman",
                    'variants' => [
                        ['name' => "Ha, muammolarni o'zim hal qilishga harakat qilaman", 'answer' => true],
                        ['name' => "Muammolarni rahbarga topshiraman", 'answer' => false],
                        ['name' => "Muammolardan qochishga harakat qilaman", 'answer' => false],
                        ['name' => "Muammolarni hamkasblarimga yuklayman", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Muassasa qoidalari va etika talablariga qat'iy rioya qilaman",
                    'variants' => [
                        ['name' => "Ha, qoidalarga qat'iy rioya qilaman", 'answer' => true],
                        ['name' => "Qulay bo'lganda rioya qilaman", 'answer' => false],
                        ['name' => "Ba'zi qoidalar keraksiz deb hisoblayman", 'answer' => false],
                        ['name' => "Qoidalar juda ko'p, hammasini bilmayman", 'answer' => false],
                    ],
                ],
            ],

            'III. Mehr va bag\'rikenglik' => [
                [
                    'question' => "Bolalar bilan muloyim, sabrli va mehribonman",
                    'variants' => [
                        ['name' => "Ha, har doim muloyim va mehribon bo'lishga harakat qilaman", 'answer' => true],
                        ['name' => "Charchaganida sabr qila olmayman", 'answer' => false],
                        ['name' => "Faqat intizomli bolalarga mehr ko'rsataman", 'answer' => false],
                        ['name' => "Qat'iyat mehr bilan birga bo'lmaydi", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Hech qachon bolani haqorat yoki jazo bilan tarbiyalamayman",
                    'variants' => [
                        ['name' => "Ha, haqorat va jazodan mutlaqo voz kechganman", 'answer' => true],
                        ['name' => "Ba'zida qattiq gapirish kerak bo'ladi", 'answer' => false],
                        ['name' => "Qoidabuzarlik bo'lsa jazolash mumkin", 'answer' => false],
                        ['name' => "Bu usul ba'zida samarali", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Har bir bolaning quvonchi men uchun muhim",
                    'variants' => [
                        ['name' => "Ha, har bir bolaning xursandligi meni ham xursand qiladi", 'answer' => true],
                        ['name' => "Faqat o'qishda yaxshi bo'lganlarniki muhim", 'answer' => false],
                        ['name' => "Bolalar quvonchiga ko'p e'tibor bermayman", 'answer' => false],
                        ['name' => "Bu tarbiyachilik ishi emas", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Bolalar xatolik qilganda, ularni tushunishga harakat qilaman",
                    'variants' => [
                        ['name' => "Ha, xato sababini topib, sabr bilan tushuntiraman", 'answer' => true],
                        ['name' => "Xato qilgan bolani tanbeh qilaman", 'answer' => false],
                        ['name' => "Xatolariga e'tibor bermayman", 'answer' => false],
                        ['name' => "Darhol ota-onasiga aytaman", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Bolalar bilan muloqotda iliq muhit yaratishga intilaman",
                    'variants' => [
                        ['name' => "Ha, guruhda doimo do'stona va iliq muhit bo'lishini ta'minlayman", 'answer' => true],
                        ['name' => "Intizom muhim, iliqlik ikkinchi o'rinda", 'answer' => false],
                        ['name' => "Muhit o'z-o'zidan shakllanadi", 'answer' => false],
                        ['name' => "Bunga vaqtim yo'q", 'answer' => false],
                    ],
                ],
            ],

            'IV. Ijodkorlik va tashabbuskorlik' => [
                [
                    'question' => "Mashg'ulotlarni qiziqarli qilish uchun yangi g'oyalar ishlab chiqaman",
                    'variants' => [
                        ['name' => "Ha, doimo yangi va qiziqarli g'oyalar izlayman", 'answer' => true],
                        ['name' => "Darslik bo'yicha o'tish kifoya", 'answer' => false],
                        ['name' => "Yangi g'oyalar ko'p vaqt oladi", 'answer' => false],
                        ['name' => "Bu mening vazifam emas", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Ishda zamonaviy usul va texnologiyalardan foydalanam",
                    'variants' => [
                        ['name' => "Ha, yangi texnologiyalar va usullarni doimiy o'rganib qo'llayman", 'answer' => true],
                        ['name' => "Eski usullar yaxshi ishlaydi", 'answer' => false],
                        ['name' => "Texnologiyani tushunmayman", 'answer' => false],
                        ['name' => "Bu bog'chada kerak emas", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Tarbiya jarayonida milliy qadriyatlarni ijodkorlik bilan qo'llayman",
                    'variants' => [
                        ['name' => "Ha, milliy qadriyatlarni zamonaviy usullar bilan birlashtirib o'rgataман", 'answer' => true],
                        ['name' => "Milliy qadriyatlar dasturga kirmagan", 'answer' => false],
                        ['name' => "Bu bolalarga kerak emas", 'answer' => false],
                        ['name' => "Faqat bayramlarda muhokama qilaman", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Bolalarni yangi narsalarga qiziqtirish menga yoqadi",
                    'variants' => [
                        ['name' => "Ha, yangi narsalar o'rgatish juda qiziqarli jarayon", 'answer' => true],
                        ['name' => "Bolalar o'zlari qiziqsin", 'answer' => false],
                        ['name' => "Bu ko'p kuch talab qiladi", 'answer' => false],
                        ['name' => "Dasturdan tashqarisiga vaqt yo'q", 'answer' => false],
                    ],
                ],
                [
                    'question' => "Yangilik kiritishdan qo'rqmayman",
                    'variants' => [
                        ['name' => "Ha, yangilik kiritish va sinab ko'rishdan cho'chmayman", 'answer' => true],
                        ['name' => "Yangilik kiritish xavfli bo'lishi mumkin", 'answer' => false],
                        ['name' => "Ruxsat bo'lmasa qilmayman", 'answer' => false],
                        ['name' => "Yangilikni boshqalar sinab ko'rsin", 'answer' => false],
                    ],
                ],
            ],
        ];

        foreach ($data as $categoryName => $questions) {
            $category = TestCategory::create(['name' => $categoryName]);

            foreach ($questions as $questionData) {
                $question = $category->questions()->create([
                    'name' => $questionData['question'],
                ]);

                foreach ($questionData['variants'] as $variantData) {
                    $question->variants()->create([
                        'name'   => $variantData['name'],
                        'answer' => $variantData['answer'],
                    ]);
                }
            }
        }
    }
}
