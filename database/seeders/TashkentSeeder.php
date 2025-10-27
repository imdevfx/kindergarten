<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Neighborhood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TashkentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Yashnabod
        $data = [
            [
                'tr' => '1',
                'onmtt_nomi' => 'SABIT KIDS',
                'rahbar_fish' => 'Yesemov Malik Oralovich',
                'manzil' => 'Go\'zal MFY',
                'quvvat' => '43',
                'bola_soni' => '29',
                'qamrov_foizi' => '67%',
                'telefon' => '99893-379-26-08'
            ],
            [
                'tr' => '2',
                'onmtt_nomi' => 'MINI MIR I',
                'rahbar_fish' => 'Jamolova Feruza Xusanovna',
                'manzil' => 'Katta Yangiobod MFY',
                'quvvat' => '50',
                'bola_soni' => '44',
                'qamrov_foizi' => '88%',
                'telefon' => '90-934-31-68'
            ],
            [
                'tr' => '4',
                'onmtt_nomi' => 'QALDIRG\'OCH',
                'rahbar_fish' => 'Kuziyeva Umidaxon Akramjonovna',
                'manzil' => 'Boyqo\'rg\'on MFY',
                'quvvat' => '25',
                'bola_soni' => '21',
                'qamrov_foizi' => '84%',
                'telefon' => '99891-617-12-85'
            ],
            [
                'tr' => '5',
                'onmtt_nomi' => 'ZYORNISHKA',
                'rahbar_fish' => 'Saparaliyeva Janara Seydaliyevna',
                'manzil' => 'Amir Temur MFY',
                'quvvat' => '50',
                'bola_soni' => '18',
                'qamrov_foizi' => '36%',
                'telefon' => '99893-386-99-68'
            ],
            [
                'tr' => '6',
                'onmtt_nomi' => 'KICHKINTOY',
                'rahbar_fish' => 'Turg\'unova Gavxar Mirzayevna',
                'manzil' => 'Bexizor MFY',
                'quvvat' => '25',
                'bola_soni' => '14',
                'qamrov_foizi' => '56%',
                'telefon' => '99-979-60-57'
            ],
            [
                'tr' => '7',
                'onmtt_nomi' => 'JOY KIDS PRESCHOOL',
                'rahbar_fish' => 'Xamdamov Oybek Ulug\'bekovich',
                'manzil' => 'O\'rta Masjid MFY',
                'quvvat' => '50',
                'bola_soni' => '44',
                'qamrov_foizi' => '88%',
                'telefon' => '99-666-61-62'
            ],
            [
                'tr' => '8',
                'onmtt_nomi' => 'HAPPY KIDS',
                'rahbar_fish' => 'Sobirova Zarnigor Abdulxay qizi',
                'manzil' => 'Birlashgan MFY',
                'quvvat' => '30',
                'bola_soni' => '24',
                'qamrov_foizi' => '80%',
                'telefon' => '99890-027-09-86'
            ],
            [
                'tr' => '9',
                'onmtt_nomi' => 'TEREMOK',
                'rahbar_fish' => 'Saidova Gulmira Muxammadiyevna',
                'manzil' => 'Qalqon MFY',
                'quvvat' => '22',
                'bola_soni' => '22',
                'qamrov_foizi' => '100%',
                'telefon' => '99893-386-99-68'
            ],
            [
                'tr' => '10',
                'onmtt_nomi' => 'BAXTIYOR BOLALAR',
                'rahbar_fish' => 'Nematova Gulnoz Shavkatovna',
                'manzil' => 'Do\'stobod MFY',
                'quvvat' => '50',
                'bola_soni' => '34',
                'qamrov_foizi' => '68%',
                'telefon' => '91-773-05-00'
            ],
            [
                'tr' => '11',
                'onmtt_nomi' => 'NIVALYASHKA',
                'rahbar_fish' => 'Adullayeva Xafiza Ibodullayeva',
                'manzil' => 'Boysun MFY',
                'quvvat' => '50',
                'bola_soni' => '44',
                'qamrov_foizi' => '88%',
                'telefon' => '99890-919-74-96'
            ],
            [
                'tr' => '12',
                'onmtt_nomi' => 'SWEET KIDS',
                'rahbar_fish' => 'Turayev Sherzod Abdujalilovich',
                'manzil' => 'Yanginur MFY',
                'quvvat' => '48',
                'bola_soni' => '48',
                'qamrov_foizi' => '100%',
                'telefon' => '95-014-00-17'
            ],
            [
                'tr' => '13',
                'onmtt_nomi' => 'SHUM BOLA',
                'rahbar_fish' => 'Xolmuxammedova Madina Ilxom qizi',
                'manzil' => 'Katta Yangiobod mahallasi',
                'quvvat' => '46',
                'bola_soni' => '32',
                'qamrov_foizi' => '69%',
                'telefon' => '90-961-34-43'
            ],
            [
                'tr' => '14',
                'onmtt_nomi' => 'SAFIYA',
                'rahbar_fish' => 'Mirsaidova Saida Xamit qizi',
                'manzil' => 'Jo\'rabek mahallasi',
                'quvvat' => '12',
                'bola_soni' => '11',
                'qamrov_foizi' => '96%',
                'telefon' => '91-355-06-15'
            ],
            [
                'tr' => '15',
                'onmtt_nomi' => 'BABY MIR',
                'rahbar_fish' => 'Saidraximova Maftuna Rustam qizi',
                'manzil' => 'Chinor MFY',
                'quvvat' => '43',
                'bola_soni' => '21',
                'qamrov_foizi' => '49%',
                'telefon' => '90-986-44-00'
            ],
            [
                'tr' => '16',
                'onmtt_nomi' => 'FLAMINGO',
                'rahbar_fish' => 'Ikramova Komila Otakulovna',
                'manzil' => 'Chinor MFY',
                'quvvat' => '50',
                'bola_soni' => '31',
                'qamrov_foizi' => '62%',
                'telefon' => '97-421-28-00'
            ],
            [
                'tr' => '17',
                'onmtt_nomi' => 'JUNIOR',
                'rahbar_fish' => 'Yusupova Iroda Mamurjon qizi',
                'manzil' => 'Nodira MFY',
                'quvvat' => '50',
                'bola_soni' => '21',
                'qamrov_foizi' => '42%',
                'telefon' => '99-807-56-56'
            ],
            [
                'tr' => '18',
                'onmtt_nomi' => 'RAYXON KIDS',
                'rahbar_fish' => 'Muxidinova Nafisa Salimjonovna',
                'manzil' => 'Qalqon MFY',
                'quvvat' => '19',
                'bola_soni' => '19',
                'qamrov_foizi' => '100%',
                'telefon' => '99-299-80-71'
            ],
            [
                'tr' => '19',
                'onmtt_nomi' => 'NIXOL',
                'rahbar_fish' => 'G\'ayratxujayeva Shaxzodaxon Qodirxo\'ja qizi',
                'manzil' => 'Ilg\'or MFY',
                'quvvat' => '50',
                'bola_soni' => '48',
                'qamrov_foizi' => '96%',
                'telefon' => '90-914-20-21'
            ],
            [
                'tr' => '20',
                'onmtt_nomi' => 'MALENKIY UMNICHKA',
                'rahbar_fish' => 'Ergasheva Shoira Xoshimjon qizi',
                'manzil' => 'Birlashgan MFY',
                'quvvat' => '24',
                'bola_soni' => '17',
                'qamrov_foizi' => '70%',
                'telefon' => '93-589-73-83'
            ],
            [
                'tr' => '21',
                'onmtt_nomi' => 'KIDS AKADEMY',
                'rahbar_fish' => 'Adhamov Temirbek Ahror o\'g\'li',
                'manzil' => 'Bog\'bon MFY',
                'quvvat' => '12',
                'bola_soni' => '12',
                'qamrov_foizi' => '100%',
                'telefon' => '91-690-13-39'
            ],
            [
                'tr' => '22',
                'onmtt_nomi' => 'CLEVVER BABY',
                'rahbar_fish' => 'Kamilova Nazakat Zuxritdinovna',
                'manzil' => 'Asalobod MFY',
                'quvvat' => '50',
                'bola_soni' => '19',
                'qamrov_foizi' => '39%',
                'telefon' => '94-689-57-77'
            ],
            [
                'tr' => '23',
                'onmtt_nomi' => 'MAGIC CARDEN',
                'rahbar_fish' => 'Samatova Dilfuza Abduraufovnaga',
                'manzil' => 'Axmad Yassaiy MFY',
                'quvvat' => '20',
                'bola_soni' => '16',
                'qamrov_foizi' => '80%',
                'telefon' => '90-444-35-14'
            ],
            [
                'tr' => '24',
                'onmtt_nomi' => 'SOLNISHKO',
                'rahbar_fish' => 'Xaitova Feruza Taxirjanovna',
                'manzil' => 'Arg\'in MFY',
                'quvvat' => '50',
                'bola_soni' => '24',
                'qamrov_foizi' => '49%',
                'telefon' => '93-504-00-88'
            ],
            [
                'tr' => '25',
                'onmtt_nomi' => 'KIDS AKADEMY I',
                'rahbar_fish' => 'Yuldasheva Sevara Avazovna',
                'manzil' => 'Bog\'bon MFY',
                'quvvat' => '14',
                'bola_soni' => '14',
                'qamrov_foizi' => '100%',
                'telefon' => '91-690-13-39'
            ],
            [
                'tr' => '26',
                'onmtt_nomi' => 'KAMALAK',
                'rahbar_fish' => 'Adilova Muborak Asralovna',
                'manzil' => 'Tuzel MFY',
                'quvvat' => '50',
                'bola_soni' => '23',
                'qamrov_foizi' => '46%',
                'telefon' => '94-032-45-03'
            ]
        ];


        //Yangihayot
        $data2 = [
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Montessori ta\'lim (ДХШ)',
                'manzil' => 'Чароғон маҳалласи',
                'rahbar_fish' => 'Юлдашева Ҳилола Муродхоновна',
                'telefon' => '90-808-56-19',
                'bola_soni' => '100',
                'xodimlar_soni' => '12'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Kinder Garden (ДХШ)',
                'manzil' => 'Ибрат маҳалласи',
                'rahbar_fish' => 'Абдуваҳидова Дилором Назаркуловна',
                'telefon' => '97-760-53-23',
                'bola_soni' => '150',
                'xodimlar_soni' => '12'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Nanoshka Karusel (ДХШ)',
                'manzil' => 'Олчазор МФЙ',
                'rahbar_fish' => 'Раупов Фрунзе Раҳимович',
                'telefon' => '90-928-67-35',
                'bola_soni' => '150',
                'xodimlar_soni' => '12'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Sunny Kids (Оилавий)',
                'manzil' => 'Йўлдош МФЙ',
                'rahbar_fish' => 'Мўминова Маҳбуба Маҳмуд қизи',
                'telefon' => '90-940-39-40',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Оминахон (Оилавий)',
                'manzil' => 'Йўлдош МФЙ',
                'rahbar_fish' => 'Муҳитдинова Муҳаббат Насировна',
                'telefon' => '90-952-99-12',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Happy Kids (Оилавий)',
                'manzil' => 'Гулзор МФЙ',
                'rahbar_fish' => 'Исмиолжонова Иродахон Исмоилжановна',
                'telefon' => '99-403-02-77',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'ЯТТ Рўзметова Дилноза Улуғбек қизи',
                'manzil' => 'Хушнуд МФЙ',
                'rahbar_fish' => 'Рўзметова Дилноза Улуғбек қизи',
                'telefon' => '99-415-76-56',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'ЯТТ Худаёрова Фарангиз Фарходовна',
                'manzil' => 'Олчазор МФЙ',
                'rahbar_fish' => 'Худаёрова Фарпангиз Фарходовна',
                'telefon' => '99-340-05-74',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'ЯТТ Адхамжанова Гулзода Бахромжон қизи',
                'manzil' => 'Чоштепа МФЙ',
                'rahbar_fish' => 'Адхамжанова Гулзода Бахромжон',
                'telefon' => '97-723-94-14',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'ЯТТ Ибрагимова Махлиё Музаффаровна',
                'manzil' => 'Янги Гулзор МФЙ',
                'rahbar_fish' => 'Ибрагимова Махлиё Музаффаровна',
                'telefon' => '94-141-08-91',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Nur (Оилавий)',
                'manzil' => 'Чортоқ МФЙ',
                'rahbar_fish' => 'Абдурахмонова Иродахон Холйигитовна',
                'telefon' => '90-964-40-80',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Sevinch (Оилавий)',
                'manzil' => 'Орият МФЙ',
                'rahbar_fish' => 'Мухаммадиев Содиқжон Зохидович',
                'telefon' => '99-403-02-77',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Prinsessa Sabina (Хусусий)',
                'manzil' => 'Узар МФЙ',
                'rahbar_fish' => 'Курбанова Венера Разилевна',
                'telefon' => '94-650-06-06',
                'bola_soni' => '25',
                'xodimlar_soni' => '2'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Up study (почемучка)',
                'manzil' => 'Янги турмуш МФЙ',
                'rahbar_fish' => 'Искандарова Райхон Зуфаровна',
                'telefon' => '90-351-91-65',
                'bola_soni' => '120',
                'xodimlar_soni' => '9'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Unikalny Doshkolyonok (Хусусий)',
                'manzil' => 'Йўлдош МФЙ',
                'rahbar_fish' => 'Динара Гилязова',
                'telefon' => '94-608-43-20',
                'bola_soni' => '120',
                'xodimlar_soni' => '9'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Umka Garden (Хусусий)',
                'manzil' => 'Хумо МФЙ',
                'rahbar_fish' => 'Худаярова Умида Хайдаровна',
                'telefon' => '93-508-81-63',
                'bola_soni' => '100',
                'xodimlar_soni' => '9'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Сlever children (Хусусий)',
                'manzil' => 'Тошкент МФЙ',
                'rahbar_fish' => 'Турдибакиева Дилноза Баҳодировна',
                'telefon' => '90-954-58-46',
                'bola_soni' => '24',
                'xodimlar_soni' => '9'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Одарённый ребёнок (почемучка)',
                'manzil' => 'Ал-Фарғоний МФЙ',
                'rahbar_fish' => 'Апасова Наталъя Николаевна',
                'telefon' => '93-575-81-00',
                'bola_soni' => '150',
                'xodimlar_soni' => '9'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Evrica education (хусусий)',
                'manzil' => 'Дўстлик МФЙ',
                'rahbar_fish' => 'Ткаченко Елена Евгеновна',
                'telefon' => '90-808-51-58',
                'bola_soni' => '50',
                'xodimlar_soni' => '9'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Sunny kids 2-гуруҳ',
                'manzil' => 'Йўлдош МФЙ',
                'rahbar_fish' => 'Дониёрова Махлиё Махмуд қизи',
                'telefon' => '90-940-39-40',
                'bola_soni' => '150',
                'xodimlar_soni' => '9'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Indigo (Хусусий)',
                'manzil' => 'Виқор МФЙ',
                'rahbar_fish' => 'Норматова Машхура Ташпўлатовна',
                'telefon' => '90-930-13-73',
                'bola_soni' => '120',
                'xodimlar_soni' => '9'
            ],
            [
                'tuman_nomi' => 'Янгиҳаёт',
                'taelim_muassasasi_nomi' => 'Golden kids castle',
                'manzil' => 'Хумо МФЙ',
                'rahbar_fish' => 'Расулова Фотима Фарходовна',
                'telefon' => '90-928-17-67',
                'bola_soni' => '100',
                'xodimlar_soni' => '7'
            ]
        ];

        echo "Tashkent seeder...";

        foreach ($data as $datum){
            $neighborhood = Neighborhood::updateOrCreate([
                'district_id' => 204,
                'name' => $datum['manzil']
            ]);

            Company::updateOrCreate([
                'neighborhood_id' => $neighborhood->id,
                'name' => $datum['onmtt_nomi']
            ]);
        }


//        foreach ($data2 as $datum2){
//            $neighborhood2 = Neighborhood::updateOrCreate([
//                'district_id' => 204,
//                'name' => $datum2['manzil']
//            ]);
//
//            Company::updateOrCreate([
//                'neighborhood_id' => $neighborhood2->id,
//                'name' => $datum2['taelim_muassasasi_nomi']
//            ]);
//        }
    }
}
