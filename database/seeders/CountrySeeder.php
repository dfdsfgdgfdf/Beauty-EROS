<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            array('id' => '1','name' => 'أندورا','code' => 'ad'),
            array('id' => '2','name' => 'الإمارات العربية المتحدة','code' => 'ae'),
            array('id' => '3','name' => 'أفغانستان','code' => 'af'),
            array('id' => '4','name' => 'أنتيغوا وبربودا','code' => 'ag'),
            array('id' => '5','name' => 'أنغيلا','code' => 'ai'),
            array('id' => '6','name' => 'ألبانيا','code' => 'al'),
            array('id' => '7','name' => 'أرمينيا','code' => 'am'),
            array('id' => '8','name' => 'جزر الأنتيل الهولندية','code' => 'an'),
            array('id' => '9','name' => 'أنغولا','code' => 'ao'),
            array('id' => '10','name' => 'الأرجنتين','code' => 'ar'),
            array('id' => '11','name' => 'النمسا','code' => 'at'),
            array('id' => '12','name' => 'أستراليا','code' => 'au'),
            array('id' => '13','name' => 'أروبا','code' => 'aw'),
            array('id' => '14','name' => 'أذربيجان','code' => 'az'),
            array('id' => '15','name' => 'البوسنة والهرسك','code' => 'ba'),
            array('id' => '16','name' => 'بربادوس','code' => 'bb'),
            array('id' => '17','name' => 'بنغلاديش','code' => 'bd'),
            array('id' => '18','name' => 'بلجيكا','code' => 'be'),
            array('id' => '19','name' => 'بوركينا فاسو','code' => 'bf'),
            array('id' => '20','name' => 'بلغاريا','code' => 'bg'),
            array('id' => '21','name' => 'البحرين','code' => 'bh'),
            array('id' => '22','name' => 'بوروندي','code' => 'bi'),
            array('id' => '23','name' => 'بنين','code' => 'bj'),
            array('id' => '24','name' => 'برمودا','code' => 'bm'),
            array('id' => '25','name' => 'بروناي دار السلام','code' => 'bn'),
            array('id' => '26','name' => 'بوليفيا','code' => 'bo'),
            array('id' => '27','name' => 'البرازيل','code' => 'br'),
            array('id' => '28','name' => 'الباهاما','code' => 'bs'),
            array('id' => '29','name' => 'بوتان','code' => 'bt'),
            array('id' => '30','name' => 'بوتسوانا','code' => 'bw'),
            array('id' => '31','name' => 'روسيا البيضاء','code' => 'by'),
            array('id' => '32','name' => 'بليز','code' => 'bz'),
            array('id' => '33','name' => 'كندا','code' => 'ca'),
            array('id' => '34','name' => 'جزر كوكوس (كيلينغ)','code' => 'cc'),
            array('id' => '35','name' => 'جمهورية الكونغو الديموقراطية','code' => 'cd'),
            array('id' => '36','name' => 'جمهورية افريقيا الوسطى','code' => 'cf'),
            array('id' => '37','name' => 'الكونغو','code' => 'cg'),
            array('id' => '38','name' => 'سويسرا','code' => 'ch'),
            array('id' => '39','name' => 'ساحل العاج (ساحل العاج)','code' => 'ci'),
            array('id' => '40','name' => 'جزر كوك','code' => 'ck'),
            array('id' => '41','name' => 'تشيلي','code' => 'cl'),
            array('id' => '42','name' => 'الكاميرون','code' => 'cm'),
            array('id' => '43','name' => 'الصين','code' => 'cn'),
            array('id' => '44','name' => 'كولومبيا','code' => 'co'),
            array('id' => '45','name' => 'كوستا ريكا','code' => 'cr'),
            array('id' => '46','name' => 'كوبا','code' => 'cu'),
            array('id' => '47','name' => 'الرأس الأخضر','code' => 'cv'),
            array('id' => '48','name' => 'جزيرة الكريسماس','code' => 'cx'),
            array('id' => '49','name' => 'قبرص','code' => 'cy'),
            array('id' => '50','name' => 'جمهورية التشيك','code' => 'cz'),
            array('id' => '51','name' => 'ألمانيا','code' => 'de'),
            array('id' => '52','name' => 'جيبوتي','code' => 'dj'),
            array('id' => '53','name' => 'الدنمارك','code' => 'dk'),
            array('id' => '54','name' => 'دومينيكا','code' => 'dm'),
            array('id' => '55','name' => 'جمهورية الدومنيكان','code' => 'do'),
            array('id' => '56','name' => 'الجزائر','code' => 'dz'),
            array('id' => '57','name' => 'الإكوادور','code' => 'ec'),
            array('id' => '58','name' => 'استونيا','code' => 'ee'),
            array('id' => '59','name' => 'مصر','code' => 'eg'),
            array('id' => '60','name' => 'الصحراء الغربية','code' => 'eh'),
            array('id' => '61','name' => 'إريتريا','code' => 'er'),
            array('id' => '62','name' => 'إسبانيا','code' => 'es'),
            array('id' => '63','name' => 'أثيوبيا','code' => 'et'),
            array('id' => '64','name' => 'فنلندا','code' => 'fi'),
            array('id' => '65','name' => 'فيجي','code' => 'fj'),
            array('id' => '66','name' => 'جزر فوكلاند (مالفيناس)','code' => 'fk'),
            array('id' => '67','name' => 'ولايات ميكرونيزيا الموحدة','code' => 'fm'),
            array('id' => '68','name' => 'جزر صناعية','code' => 'fo'),
            array('id' => '69','name' => 'فرنسا','code' => 'fr'),
            array('id' => '70','name' => 'الغابون','code' => 'ga'),
            array('id' => '71','name' => 'بريطانيا العظمى (المملكة المتحدة)','code' => 'gb'),
            array('id' => '72','name' => 'غرينادا','code' => 'gd'),
            array('id' => '73','name' => 'جورجيا','code' => 'ge'),
            array('id' => '74','name' => 'غيانا الفرنسية','code' => 'gf'),
            array('id' => '75','name' => 'لا شيء','code' => 'gg'),
            array('id' => '76','name' => 'غانا','code' => 'gh'),
            array('id' => '77','name' => 'جبل طارق','code' => 'gi'),
            array('id' => '78','name' => 'الأرض الخضراء','code' => 'gl'),
            array('id' => '79','name' => 'غامبيا','code' => 'gm'),
            array('id' => '80','name' => 'غينيا','code' => 'gn'),
            array('id' => '81','name' => 'جوادلوب','code' => 'gp'),
            array('id' => '82','name' => 'غينيا الإستوائية','code' => 'gq'),
            array('id' => '83','name' => 'اليونان','code' => 'gr'),
            array('id' => '84','name' => 'جورجيا وجزر ساندويتش','code' => 'gs'),
            array('id' => '85','name' => 'غواتيمالا','code' => 'gt'),
            array('id' => '86','name' => 'غينيا بيساو','code' => 'gw'),
            array('id' => '87','name' => 'غيانا','code' => 'gy'),
            array('id' => '88','name' => 'هونغ كونغ','code' => 'hk'),
            array('id' => '89','name' => 'هندوراس','code' => 'hn'),
            array('id' => '90','name' => 'كرواتيا (هرفاتسكا)','code' => 'hr'),
            array('id' => '91','name' => 'هايتي','code' => 'ht'),
            array('id' => '92','name' => 'اليونان','code' => 'hu'),
            array('id' => '93','name' => 'أندونيسيا','code' => 'id'),
            array('id' => '94','name' => 'أيرلندا','code' => 'ie'),
            array('id' => '96','name' => 'الهند','code' => 'in'),
            array('id' => '97','name' => 'العراق','code' => 'iq'),
            array('id' => '98','name' => 'إيران','code' => 'ir'),
            array('id' => '99','name' => 'أيسلندا','code' => 'is'),
            array('id' => '100','name' => 'إيطاليا','code' => 'it'),
            array('id' => '101','name' => 'جامايكا','code' => 'jm'),
            array('id' => '102','name' => 'الأردن','code' => 'jo'),
            array('id' => '103','name' => 'اليابان','code' => 'jp'),
            array('id' => '104','name' => 'كينيا','code' => 'ke'),
            array('id' => '105','name' => 'قرغيزستان','code' => 'kg'),
            array('id' => '106','name' => 'كمبوديا','code' => 'kh'),
            array('id' => '107','name' => 'كيريباس','code' => 'ki'),
            array('id' => '108','name' => 'جزر القمر','code' => 'km'),
            array('id' => '109','name' => 'سانت كيتس ونيفيس','code' => 'kn'),
            array('id' => '110','name' => 'كوريا الشمالية','code' => 'kp'),
            array('id' => '111','name' => 'كوريا، جنوب)','code' => 'kr'),
            array('id' => '112','name' => 'الكويت','code' => 'kw'),
            array('id' => '113','name' => 'جزر كايمان','code' => 'ky'),
            array('id' => '114','name' => 'كازاخستان','code' => 'kz'),
            array('id' => '115','name' => 'لاوس','code' => 'la'),
            array('id' => '116','name' => 'لبنان','code' => 'lb'),
            array('id' => '117','name' => 'القديسة لوسيا','code' => 'lc'),
            array('id' => '118','name' => 'ليختنشتاين','code' => 'li'),
            array('id' => '119','name' => 'سيريلانكا','code' => 'lk'),
            array('id' => '120','name' => 'ليبيريا','code' => 'lr'),
            array('id' => '121','name' => 'ليسوتو','code' => 'ls'),
            array('id' => '122','name' => 'ليتوانيا','code' => 'lt'),
            array('id' => '123','name' => 'لوكسمبورغ','code' => 'lu'),
            array('id' => '124','name' => 'لاتفيا','code' => 'lv'),
            array('id' => '125','name' => 'ليبيا','code' => 'ly'),
            array('id' => '126','name' => 'المغرب','code' => 'ma'),
            array('id' => '127','name' => 'موناكو','code' => 'mc'),
            array('id' => '128','name' => 'مولدوفا','code' => 'md'),
            array('id' => '129','name' => 'مدغشقر','code' => 'mg'),
            array('id' => '130','name' => 'جزر مارشال','code' => 'mh'),
            array('id' => '131','name' => 'مقدونيا','code' => 'mk'),
            array('id' => '132','name' => 'مالي','code' => 'ml'),
            array('id' => '133','name' => 'ميانمار','code' => 'mm'),
            array('id' => '134','name' => 'منغوليا','code' => 'mn'),
            array('id' => '135','name' => 'ماكاو','code' => 'mo'),
            array('id' => '136','name' => 'جزر مريانا الشمالية','code' => 'mp'),
            array('id' => '137','name' => 'مارتينيك','code' => 'mq'),
            array('id' => '138','name' => 'موريتانيا','code' => 'mr'),
            array('id' => '139','name' => 'مونتسيرات','code' => 'ms'),
            array('id' => '140','name' => 'مالطا','code' => 'mt'),
            array('id' => '141','name' => 'موريشيوس','code' => 'mu'),
            array('id' => '142','name' => 'جزر المالديف','code' => 'mv'),
            array('id' => '143','name' => 'مالاوي','code' => 'mw'),
            array('id' => '144','name' => 'المكسيك','code' => 'mx'),
            array('id' => '145','name' => 'ماليزيا','code' => 'my'),
            array('id' => '146','name' => 'موزمبيق','code' => 'mz'),
            array('id' => '147','name' => 'ناميبيا','code' => 'na'),
            array('id' => '148','name' => 'كاليدونيا الجديدة','code' => 'nc'),
            array('id' => '149','name' => 'النيجر','code' => 'ne'),
            array('id' => '150','name' => 'جزيرة نورفولك','code' => 'nf'),
            array('id' => '151','name' => 'نيجيريا','code' => 'ng'),
            array('id' => '152','name' => 'نيكاراغوا','code' => 'ni'),
            array('id' => '153','name' => 'هولندا','code' => 'nl'),
            array('id' => '154','name' => 'النرويج','code' => 'no'),
            array('id' => '155','name' => 'نيبال','code' => 'np'),
            array('id' => '156','name' => 'ناورو','code' => 'nr'),
            array('id' => '157','name' => 'نيوي','code' => 'nu'),
            array('id' => '158','name' => 'نيوزيلندا (اوتياروا)','code' => 'nz'),
            array('id' => '159','name' => 'سلطنة عمان','code' => 'om'),
            array('id' => '160','name' => 'بناما','code' => 'pa'),
            array('id' => '161','name' => 'بيرو','code' => 'pe'),
            array('id' => '162','name' => 'بولينيزيا الفرنسية','code' => 'pf'),
            array('id' => '163','name' => 'بابوا غينيا الجديدة','code' => 'pg'),
            array('id' => '164','name' => 'الفلبين','code' => 'ph'),
            array('id' => '165','name' => 'باكستان','code' => 'pk'),
            array('id' => '166','name' => 'بولندا','code' => 'pl'),
            array('id' => '167','name' => 'سانت بيير وميكلون','code' => 'pm'),
            array('id' => '168','name' => 'بيتكيرن','code' => 'pn'),
            array('id' => '169','name' => 'الأراضي الفلسطينية','code' => 'ps'),
            array('id' => '170','name' => 'البرتغال','code' => 'pt'),
            array('id' => '171','name' => 'بالاو','code' => 'pw'),
            array('id' => '172','name' => 'باراغواي','code' => 'py'),
            array('id' => '173','name' => 'دولة قطر','code' => 'qa'),
            array('id' => '174','name' => 'جمع شمل','code' => 're'),
            array('id' => '175','name' => 'رومانيا','code' => 'ro'),
            array('id' => '176','name' => 'الاتحاد الروسي','code' => 'ru'),
            array('id' => '177','name' => 'رواندا','code' => 'rw'),
            array('id' => '178','name' => 'المملكة العربية السعودية','code' => 'sa'),
            array('id' => '179','name' => 'جزر سليمان','code' => 'sb'),
            array('id' => '180','name' => 'سيشيل','code' => 'sc'),
            array('id' => '181','name' => 'سودان','code' => 'sd'),
            array('id' => '182','name' => 'السويد','code' => 'se'),
            array('id' => '183','name' => 'سنغافورة','code' => 'sg'),
            array('id' => '184','name' => 'سانت هيلانة','code' => 'sh'),
            array('id' => '185','name' => 'سلوفينيا','code' => 'si'),
            array('id' => '186','name' => 'سفالبارد وجان مايان','code' => 'sj'),
            array('id' => '187','name' => 'سلوفاكيا','code' => 'sk'),
            array('id' => '188','name' => 'سيرا ليون','code' => 'sl'),
            array('id' => '189','name' => 'سان مارينو','code' => 'sm'),
            array('id' => '190','name' => 'السنغال','code' => 'sn'),
            array('id' => '191','name' => 'الصومال','code' => 'so'),
            array('id' => '192','name' => 'سورينام','code' => 'sr'),
            array('id' => '193','name' => 'ساو تومي وبرنسيبي','code' => 'st'),
            array('id' => '194','name' => 'السلفادور','code' => 'sv'),
            array('id' => '195','name' => 'سوريا','code' => 'sy'),
            array('id' => '196','name' => 'سوازيلاند','code' => 'sz'),
            array('id' => '197','name' => 'جزر تركس وكايكوس','code' => 'tc'),
            array('id' => '198','name' => 'تشاد','code' => 'td'),
            array('id' => '199','name' => 'المناطق الجنوبية لفرنسا','code' => 'tf'),
            array('id' => '200','name' => 'ليذهب','code' => 'tg'),
            array('id' => '201','name' => 'تايلاند','code' => 'th'),
            array('id' => '202','name' => 'طاجيكستان','code' => 'tj'),
            array('id' => '203','name' => 'توكيلاو','code' => 'tk'),
            array('id' => '204','name' => 'تركمانستان','code' => 'tm'),
            array('id' => '205','name' => 'تونس','code' => 'tn'),
            array('id' => '206','name' => 'تونغا','code' => 'to'),
            array('id' => '207','name' => 'ديك رومي','code' => 'tr'),
            array('id' => '208','name' => 'ترينداد وتوباغو','code' => 'tt'),
            array('id' => '209','name' => 'توفالو','code' => 'tv'),
            array('id' => '210','name' => 'تايوان','code' => 'tw'),
            array('id' => '211','name' => 'تنزانيا','code' => 'tz'),
            array('id' => '212','name' => 'أوكرانيا','code' => 'ua'),
            array('id' => '213','name' => 'أوغندا','code' => 'ug'),
            array('id' => '214','name' => 'أوروغواي','code' => 'uy'),
            array('id' => '215','name' => 'أوزبكستان','code' => 'uz'),
            array('id' => '216','name' => 'سانت فنسنت وجزر غرينادين','code' => 'vc'),
            array('id' => '217','name' => 'فنزويلا','code' => 've'),
            array('id' => '218','name' => 'جزر العذراء البريطانية)','code' => 'vg'),
            array('id' => '219','name' => 'جزر فيرجن (الولايات المتحدة)','code' => 'vi'),
            array('id' => '220','name' => 'فيتنام','code' => 'vn'),
            array('id' => '221','name' => 'فانواتو','code' => 'vu'),
            array('id' => '222','name' => 'واليس وفوتونا','code' => 'wf'),
            array('id' => '223','name' => 'ساموا','code' => 'ws'),
            array('id' => '224','name' => 'اليمن','code' => 'ye'),
            array('id' => '225','name' => 'مايوت','code' => 'yt'),
            array('id' => '226','name' => 'جنوب أفريقيا','code' => 'za'),
            array('id' => '227','name' => 'زامبيا','code' => 'zm'),
            array('id' => '228','name' => 'زائير (سابقة)','code' => 'zr'),
            array('id' => '229','name' => 'زيمبابوي','code' => 'zw'),
            array('id' => '230','name' => 'الولايات المتحدة','code' => 'us'),
            array('id' => '231','name' => 'غير معروف','code' => 'null')
        ];

        DB::table('countries')->insert($countries);


    }
}