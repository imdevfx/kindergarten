<?php

namespace Database\Seeders;

use App\Models\TestCategory;
use App\Models\TestQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'I. Kasbga munosabat' => [
                "Men o‘z kasbimni jon-dildan yaxshi ko‘raman",
                "Har kuni bolalar bilan ishlash menga zavq beradi",
                "Tarbiyachi bo‘lish men uchun faqat ish emas, balki hayot tarzimdir",
                "Qiyin vaziyatlarda ham ishimni tashlab ketish haqida o‘ylamayman",
                "Bolalarning yutug‘i men uchun shaxsiy baxt hissini uyg‘otadi",
            ],
            'II. Mas’uliyat va sadoqat' => [
                "Men o‘z vazifalarimni o‘z vaqtida va vijdonan bajaraman",
                "Bolalar xavfsizligi uchun doimo mas’uliyat his qilaman",
                "Har bir bolaga individual yondashishga harakat qilaman",
                "Ishdagi muammolarni boshqalarga yuklamay, yechim izlayman",
                "Muassasa qoidalari va etika talablariga qat’iy rioya qilaman",
            ],
            'III. Mehr va bag‘rikenglik' => [
                "Bolalar bilan muloyim, sabrli va mehribonman",
                "Hech qachon bolani haqorat yoki jazo bilan tarbiyalamayman",
                "Har bir bolaning quvonchi men uchun muhim",
                "Bolalar xatolik qilganda, ularni tushunishga harakat qilaman",
                "Bolalar bilan muloqotda iliq muhit yaratishga intilaman",
            ],
            'IV. Ijodkorlik va tashabbuskorlik' => [
                "Mashg‘ulotlarni qiziqarli qilish uchun yangi g‘oyalar ishlab chiqaman",
                "Ishda zamonaviy usul va texnologiyalardan foydalanam",
                "Tarbiya jarayonida milliy qadriyatlarni ijodkorlik bilan qo‘llayman",
                "Bolalarni yangi narsalarga qiziqtirish menga yoqmaydi",
                "Yangilik kiritishdan qo‘rqmayman",
            ],
        ];


        foreach ($data as $categoryName => $questions) {
            $category = TestCategory::create(['name' => $categoryName]);
            foreach ($questions as $text) {
                TestQuestion::create([
                    'test_category_id' => $category->id,
                    'name' => $text,
                ]);
            }
        }
    }
}
