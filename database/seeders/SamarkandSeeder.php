<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Neighborhood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SamarkandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Ali zoda',
                'onmtt_yatt' => 'Toxirova Maftuna Shuxratovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Ali zoda',
                'onmtt_yatt' => 'XURRAMOVA ZEBINISO SAFARBOYeVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Ali zoda',
                'onmtt_yatt' => 'ZIYAYeVA GULBAXOR ABDUSAMATOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'DJALILOVA DILDORA AXMATOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'ELMANOVA AZIZA ABDIVAXOBOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'ESHMAMATOV RAHIM MAXMUDOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'Eshmuradova Sarvinoz Kaxramonovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'Gafurova Xamidaoy Samatovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'IBRAGIMOVA OYDIN ABDUMANNONOVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'JURAYeV KOMIL TOLMAS O‘GʻLI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'MAMATOVA AZIZA JALOLITDINOVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'MAMATOVA LATOFAT SOBIROVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'MARUFOVA MUKARAM AMRIYeVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'Mirzayeva Aziza Davronqulovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'OMONOVA NARGIZA OLMOS QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'RAXMATOVA OZODA XAZRATKULOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'SULAYMANOVA FIRUZA KUCHKAROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'SULEYMANOV SHUXRAT ISLAMOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'SULEYMANOVA NODIRA SHUXRAT QIZI YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'Tog‘aymurodova Mahliyo Anvar qizi YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'TURAYeVA NAFISA NURALI QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'TUXSONOV FERUZJON QAXRAMONOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'UTAYeVA IRODA BAXODIROVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bahodir Yalangto‘sh',
                'onmtt_yatt' => 'Xudoykulova Dilafruz Abduganiyevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Baxtli xayot',
                'onmtt_yatt' => 'YATT "Rayimkulova Chamangul Axmatovna"'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Beklar',
                'onmtt_yatt' => 'Fayzullayeva Gulbaxor Nigmatullayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Beklar',
                'onmtt_yatt' => 'NURMAMADOVA XUSNIYABONU ALISHYeR QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Birdamlik',
                'onmtt_yatt' => 'Goipova Komila Urinovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Birdamlik',
                'onmtt_yatt' => 'Vafayeva Zarbonu Musinovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bog‘i Baland',
                'onmtt_yatt' => 'IRGASHYeVA SAVRINISO ABDUALIMXON QIZI YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bog‘i Baland',
                'onmtt_yatt' => 'XOLOVA MASTURA TOSHKULOVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bogbonlar',
                'onmtt_yatt' => 'KULIYeV ANVARJON BAXODIROVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bogi shifo',
                'onmtt_yatt' => 'RAXMATOVA LAZIZA ERKINOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bogi shifo',
                'onmtt_yatt' => 'Saidov Temurbek Sobirjonovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bogi Temur',
                'onmtt_yatt' => 'MAMASHARIPOVA RA\'NO ARSLANOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Bogi Temur',
                'onmtt_yatt' => 'MAXAMMADIYeV NURIDDIN MAXAMMADIYeVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Chilkuduk',
                'onmtt_yatt' => 'RADJABOVA XALOVAT AXMATOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Chilkuduk',
                'onmtt_yatt' => 'Tog\'ayeva Dilafruz Qo\'chqorovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Chilstun',
                'onmtt_yatt' => 'NURMUXAMEDOVA DILDORA ISMOILOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Chorbog',
                'onmtt_yatt' => 'ABDULLAYeVA MEHRIBON ABDULLO QIZI YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Chorbog',
                'onmtt_yatt' => 'RAJABOVA HILOLA ODIL QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Chorbog',
                'onmtt_yatt' => 'Sultonova Dilnoza Xolxujayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'D . Kundalang',
                'onmtt_yatt' => 'Xaydarova Shaxnoza Baxodirovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'D . Samarqandiy',
                'onmtt_yatt' => 'SIROJOV DJAVOXIR AKBARJONOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dargom',
                'onmtt_yatt' => 'Abduvaliyeva Zarina Baxtiyorovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dargom',
                'onmtt_yatt' => 'Aslanova Nodira Abduraxmanovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dargom',
                'onmtt_yatt' => 'CHOLAKOVA LENIYe OSMANOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dargom',
                'onmtt_yatt' => 'Ergasheva Mohichehra Baltabayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dargom',
                'onmtt_yatt' => 'JABBOROV FARRUX BORAT O\'G\'LI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dargom',
                'onmtt_yatt' => 'Urunova Moxira Raxmatovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dukchiyon',
                'onmtt_yatt' => 'ERGASHYeVA OZODA ERALI QIZI YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dukchiyon',
                'onmtt_yatt' => 'TURAKULOVA NAZIRA XXX'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dustlik',
                'onmtt_yatt' => 'Alisherova Dilbar Alisherovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dustlik',
                'onmtt_yatt' => 'Axtamova Gulnoza Davronovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dustlik',
                'onmtt_yatt' => 'Haqqulova Zarifa Rayimqul qizi YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Dustlik',
                'onmtt_yatt' => 'Xalilova Zamira Sadinovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Farogat',
                'onmtt_yatt' => 'Karimova Munira Isayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Farovonlik',
                'onmtt_yatt' => 'Narzullayeva Nargiza Rustamovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Furqat',
                'onmtt_yatt' => 'SHIRINOVA MASUDA OCHILOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'G\'Jamshid',
                'onmtt_yatt' => 'BOLIKULOVA DINORA VAXOBJON QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'G\'Jamshid',
                'onmtt_yatt' => 'Djabbarova Roxila Raximberdiyevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'G\'Jamshid',
                'onmtt_yatt' => 'Hamrayeva Nargiza Bahodirovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'G\'Jamshid',
                'onmtt_yatt' => 'Qurbonova Umida Kenjayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'G\'afur G\'ulom',
                'onmtt_yatt' => 'DAVRONOVA SARVINOZ DJAMSHYeROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'G\'afur G\'ulom',
                'onmtt_yatt' => 'Kutliyeva Sojida Ikramovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'G\'afur G\'ulom',
                'onmtt_yatt' => 'Tuychiyeva Shoira Turgunovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Gulobod',
                'onmtt_yatt' => 'Uzaqova Dilfuza Usmonovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Ibrohim Xuja',
                'onmtt_yatt' => 'KUDRATOV MAXSUD ABDUXALIMOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Istiqbol',
                'onmtt_yatt' => 'SHADIYeVA DILDORA SHAMSIDINOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Istiqbol',
                'onmtt_yatt' => 'XAMRAYeV VAHOBJON BOLIKULOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Joyi chukur',
                'onmtt_yatt' => 'BAXROMOVA FARZONA SHUKUROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Kaftarxona',
                'onmtt_yatt' => 'SIROJEVA GULSHODA NURILLAYeVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Kaftarxona',
                'onmtt_yatt' => 'UBAYDULLAYeVA GULJAHON HASANOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Kamoliddin Behzod',
                'onmtt_yatt' => 'XAYDAROVA FARIZA SAMEYeVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Kattakurgon',
                'onmtt_yatt' => 'Kudratov Shuxrat Taxirovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Kattakurgon',
                'onmtt_yatt' => 'Timurova Nigora Komilovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Kavola',
                'onmtt_yatt' => 'DXSH Samarabonu - Diyorbek'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Kulollar',
                'onmtt_yatt' => 'Abduraximova Zarina Nasimovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Kulollar',
                'onmtt_yatt' => 'Batirova Zuxro Salidjanovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Kuyi xuja soat',
                'onmtt_yatt' => 'Qambarova Nargiza Normuxammedovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Lolazor',
                'onmtt_yatt' => 'Niyatova Shahnoza Abduganiyevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Lolazor',
                'onmtt_yatt' => 'RUZIYeVA AMIRA ASROROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'M . Kungirokdor',
                'onmtt_yatt' => 'RUSTAMOVA FIRUZA BAXODIROVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'M . S . Baraka',
                'onmtt_yatt' => 'Abdullayeva Manzila Gaybullayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'M . S . Baraka',
                'onmtt_yatt' => 'Abduraupova Muqaddasxon Qayimovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'M . S . Baraka',
                'onmtt_yatt' => 'Muinova Firuza Muxsinjanovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'M . S . Baraka',
                'onmtt_yatt' => 'Murodova Shaxnoza Davronovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Ma\'rifat',
                'onmtt_yatt' => 'RAXMONOVA MARTABA SAITOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Madaniyat',
                'onmtt_yatt' => 'Toshpo\'latova Zaynab Sattarovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Marokand',
                'onmtt_yatt' => 'Pulatov Mumin Yuldashevich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Matonat',
                'onmtt_yatt' => 'ABDURAXMONOVA SAODAT ESHONKULOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Matonat',
                'onmtt_yatt' => 'MAXMUDOVA SANOBAR NARZULLAYeVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Maysazor',
                'onmtt_yatt' => 'JURAYeVA IRODA ZOPIROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Mexnat',
                'onmtt_yatt' => 'Rahmanova Farogat Raimovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Mexnat',
                'onmtt_yatt' => 'Ruzimurodov Xaydar Xolmuradovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Mexrobod',
                'onmtt_yatt' => 'KOZIMOV SHAVKAT PULATOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Motrid',
                'onmtt_yatt' => 'Ashurova Maysara Tolibovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Motrid',
                'onmtt_yatt' => 'Asliddinova Rafoat Burxoniddinovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Muliyon',
                'onmtt_yatt' => 'Sadullayeva Zulayho Fayzullayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Mustaqillik',
                'onmtt_yatt' => 'ABBASOV ILXOM AXTAMOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Mustaqillik',
                'onmtt_yatt' => 'Amirxanova Kamila Alisherovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Mustaqillik',
                'onmtt_yatt' => 'Tuychiyeva Lutfiya Erkinovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Navbogchiyon',
                'onmtt_yatt' => 'Vafoyeva Fotima Bahtiyorovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Nayman',
                'onmtt_yatt' => 'MAQSUMOVA ELEONORA YAFAROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Nurli kelajak',
                'onmtt_yatt' => 'SABRITDINOVA JASMINA AZAMAT QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Nurli yo\'l',
                'onmtt_yatt' => 'JALILOVA JASMINA JASURJONOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Nurli yo\'l',
                'onmtt_yatt' => 'SAYDALIYeVA MAHLIYO KOXRAMONOVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'O\'rta Xuja soat',
                'onmtt_yatt' => 'Abduxalikova Dilfuza Musinovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'O\'rta Xuja soat',
                'onmtt_yatt' => 'NORBOYeVA GULIHAYYO NABIJONOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'O\'rta Xuja soat',
                'onmtt_yatt' => 'XASANOVA NILUFAR MUXTOROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'O\'zbekiston',
                'onmtt_yatt' => 'Aznarova Guzal Mamadaliyevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'O\'zbekiston',
                'onmtt_yatt' => 'Gaybullayeva Dilnoza Mamarajabovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'O\'zbekiston',
                'onmtt_yatt' => 'Niyatova Sharofat Xaydarovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'JALOLOVA SOXIBA TULQINOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'NORBOYeVA GULCHYeXRA TOSHTEMIROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'PARDAYeVA GULNOZA SAFAROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'QILICHOVA DURDONA SALIM QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'QILICHYeV FARRUX AXMADOVICH YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'QUCHQAROV ANVAR MUXTOR O\'G\'LI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'QUROLOVA ZAHROXON ABDUMALIK QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'RADJABOV MUXIDDIN MAMASAIDOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'RAIMOVA FERUZA SHUXRATOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'RAXMATULLAYeV MIYASSAR NAG\'MATILLAYeVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'RUSTAMOVA MAFTUNA RUSTAMOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'SAYFULLAYeVA MUXLISA SHOXOBIDDIN QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'SHODMANOV BO\'RIBAY SHUKUROVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'SONNIBOYeVA GO\'ZAL O\'KTAMOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'TOXIROV ABBOS ANVAR O\'G\'LI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'TURABOVA FARIDA ZOIROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'XAYITMURODOVA SHAXZODA SHUXRAT QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'Xo\'jaqulov Sherzod Rustam o\'g\'li YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Obod Maskan',
                'onmtt_yatt' => 'XOLIKOV AZIZJON AXROLOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Oksaroy',
                'onmtt_yatt' => 'Mavlyanov Ruslan Rustamovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Orzu',
                'onmtt_yatt' => 'Ishkuvatov Bobomurod Taxirovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Orzu',
                'onmtt_yatt' => 'SINDAROV ELIBEK SIRAJIDDINOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Panjob',
                'onmtt_yatt' => 'Mahmudova Habiba Halim qizi YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Panjob',
                'onmtt_yatt' => 'MUXTOROVA OZODA AZIZ QIZI YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qir',
                'onmtt_yatt' => 'Mirsobirov Miraziz Qobiljonovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => '"Tulqinjonova Dilnoza Alijonovna" YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'ABDURAYIMOVA CHYeXROZA AZIMJONOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'Aralova Dilnoza Qahramon qizi YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'ERNAZAROVA GULMIRA MALIK QIZI YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'KENJAYeVA QANTIGUL NEMATULLAYeVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'Muhammadova Sevara Nematullayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'MUXAMMADOV JASUR MANSUR O\'G\'LI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'PRIMOVA NASIBA ABDUVALI QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'RAJABOV ALISHYeR YUSUPOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'SHUKURILLAYeV UMIDJON BAHODIR O\'G\'LI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'Tuyg\'unova Munira Erkinovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Qorasuv',
                'onmtt_yatt' => 'Umarova Dilafruz Boboqulovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'S . Ayniy',
                'onmtt_yatt' => 'ISMAILOV MUXAMMADALI ABDULLOYeVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'S . Ayniy',
                'onmtt_yatt' => 'MANSUROVA MALOXAT XXX'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sarbon',
                'onmtt_yatt' => 'ALIMOVA FARANGIZ UKTAMOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sarbon',
                'onmtt_yatt' => 'BAROTOVA NASIBA UMIRZOQOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sarbon',
                'onmtt_yatt' => 'XURSANOV JASURBEK AKRAM O\'G\'LI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sayqal',
                'onmtt_yatt' => 'KUSHAKOVA AZIZA SALAYDINOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sayqal',
                'onmtt_yatt' => 'ZOXIDOVA ZIYODA XAKIMOVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sayxun',
                'onmtt_yatt' => 'AHMEDOVA MUSAVVAR ASROROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sayxun',
                'onmtt_yatt' => 'AXATOVA GULSARA MURODILLAYeVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sayxun',
                'onmtt_yatt' => 'Muzaffarov Akram Temirovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sevali',
                'onmtt_yatt' => 'Buriyev Asliddin Saydullayevich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sevali',
                'onmtt_yatt' => 'Meliyeva Shoira Sa\'dullayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sharq Tongi',
                'onmtt_yatt' => 'NARZULLAYeVA XAYRINISO NASRULLAYeVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shaxriobod',
                'onmtt_yatt' => 'MUXIDDINOVA XATICHA XXX'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shirin',
                'onmtt_yatt' => 'Qarshiyeva Shoxida Berkinbayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'ESHONQULOVA BAHORA G\'AYRAT QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'ESHQULOVA HAMIDA MUMINOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'ISLOMOVA NILUFAR FOZILJONOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'KO\'MAKOVA SOHIBA HASAN QIZI YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'MURTOZAYeVA DILNAVOZ QAHRAMON QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'NARZULLAYeVA SARVINOZ BAXODIROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'OCHILOVA DILFUZA ISMAILOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'Raufova Nigina Umidjonovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'RAXMATOVA MAVLUDA IBRAGIMJON QIZI YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'SAFAROV SODIQ G\'O\'ZORBOYeVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'SAIDOVA XURSHIDA ABDUALIMOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'Sirojova Nazokat Abdurasul qizi YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'XUDAYBERDIYeVA DILSHODA ZOKIR QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'YATT "XIMMOTIVA SOJIDA ESHMURADOVNA"'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodiyona MFY',
                'onmtt_yatt' => 'Yorqulova Dinora Hurshid qizi YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodlik',
                'onmtt_yatt' => 'Kurbanov Ravshan Valiyevich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shodlik',
                'onmtt_yatt' => 'MANSUROVA NASIBA ILXOMJONOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Shukrona',
                'onmtt_yatt' => 'Hushvakova Gavhar Davronovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Siyobcha',
                'onmtt_yatt' => 'Kutliyeva Nilufar Shuxratovna YaaTT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Sugdiyona',
                'onmtt_yatt' => 'DXSH ART MARJONA TEX Nodavlat talim muassasasi'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Suzangaron',
                'onmtt_yatt' => 'Turayev Akobir Axmadovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Tadbirkorlar',
                'onmtt_yatt' => 'Samiyeva Sabina Abdurafikovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Terakzor',
                'onmtt_yatt' => 'QUDRAT-ZODA KAMOLA ALISHYeR QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Toshkent',
                'onmtt_yatt' => 'BAXRONOVA DILFUZA ABLAKULOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Toshkent',
                'onmtt_yatt' => 'Xalimova Zarina Abdumannanovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Tutzor',
                'onmtt_yatt' => 'Nabiyev Zamir Amindjanovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Tutzor',
                'onmtt_yatt' => 'Nabiyeva Sevar Shamurotovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Urguti',
                'onmtt_yatt' => 'NURMUXAMEDOVA NILUFAR SAMAREDINOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Urikzor',
                'onmtt_yatt' => 'SOBIROVA XURSHIDA TOIROVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'X.Ibrohim',
                'onmtt_yatt' => 'MIRZAYeVA GULCHYeHRA NEGMATOVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'X.Olimjon',
                'onmtt_yatt' => 'DXSH Utrennyaya Zvezda'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'X.Yusuf',
                'onmtt_yatt' => 'ABDURAXMANOVA GULNORA RAIMOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'X.Yusuf',
                'onmtt_yatt' => 'Ziyodullayeva Xurshedabonu Odilovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xayotobod',
                'onmtt_yatt' => 'ALIYeVA FOTIMA JALILOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xazora',
                'onmtt_yatt' => 'Bobomurodova Shoxista Eshmamatovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xazora',
                'onmtt_yatt' => 'Djurayeva Feruza Abdullayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xazora',
                'onmtt_yatt' => 'SULEYMANOVA GULCHYeHRA IBRAGIMOVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xuja gunjoyish',
                'onmtt_yatt' => 'SAMATOVA MARXABO MUSTAFAKULOVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xuja gunjoyish',
                'onmtt_yatt' => 'Umarov Ravshan Radjabovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xuja gunjoyish',
                'onmtt_yatt' => 'Ziyayeva Dilafruz Sadriddinovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xuja kishlok',
                'onmtt_yatt' => 'KADIROV ADIL MEYLIYeVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xuja kishlok',
                'onmtt_yatt' => 'SAMAROV XUSHBAXT FAZLITDINOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xuja kishlok',
                'onmtt_yatt' => 'SAMAROV XUSHBAXT FAZLITDINOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xuja kishlok',
                'onmtt_yatt' => 'SAMAROV XUSHBAXT FAZLITDINOVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xuja kishlok',
                'onmtt_yatt' => 'Sarimsaqov Nodir Jabbarovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xumo',
                'onmtt_yatt' => 'DJALILOVA GULRUX PIRMAXMADOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Xunarmandlar',
                'onmtt_yatt' => 'Maxabbayeva Farida Ziyabayevna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yangi Xayot',
                'onmtt_yatt' => '"Vafayeva Zamira Adilovna" YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yangi Xayot',
                'onmtt_yatt' => 'ALIMOVA UMEDA ZOKIROVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yangi Xayot',
                'onmtt_yatt' => 'Anvarova Shaxlo Ashrafovna YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yoshlik',
                'onmtt_yatt' => 'MAMATOVA NILUFAR ISHMURATOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yoshlik',
                'onmtt_yatt' => 'MURADULLAYeV AZIZBEK IVADULLAYeVICH'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yoshlik',
                'onmtt_yatt' => 'NAZAROVA OYDIN BAROTOVNA YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yoshlik',
                'onmtt_yatt' => 'Rahimberdiyev Rustam Aminovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yoshlik',
                'onmtt_yatt' => 'Togayev Xojiakbar Mamarafikovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yoshlik',
                'onmtt_yatt' => 'Tursunov Shohijahon Xo\'janazarovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yoshlik',
                'onmtt_yatt' => 'TURSUNOV SHOHRUX XUJANAZAROVICH YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yukori xuja soat',
                'onmtt_yatt' => 'Djabbarov Hayot Zokirovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Yuksalish',
                'onmtt_yatt' => 'TAXIROVA ZARNIGOR TIMUR QIZI'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Zarafshon',
                'onmtt_yatt' => 'Luqmanov Ozod Alisherovich YATT'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Zarafshon',
                'onmtt_yatt' => 'SALIYeVA DILSHODA SUBXONOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Ziyolilar',
                'onmtt_yatt' => 'BAGIROVA MUXABBAT BAXRIDDINOVNA'
            ],
            [
                'tuman' => 'Samarqand shahar',
                'mfy' => 'Ziyolilar',
                'onmtt_yatt' => 'GULAMOVA NIGINA ILHOM QIZI'
            ]
        ];

        // Massivni tekshirish
        echo "Samarkand seeder all: " . count($data) . " row data\n";

        foreach ($data as $datum){
            $neighborhood = Neighborhood::updateOrCreate([
               'district_id' => 122,
               'name' => $datum['mfy']
            ]);

            Company::updateOrCreate([
                'neighborhood_id' => $neighborhood->id,
                'name' => $datum['onmtt_yatt']
            ]);
        }
    }
}
