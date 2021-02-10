<?php
/**
 * @filesource Kotchasan/Province.php
 *
 * @copyright 2016 Goragod.com
 * @license http://www.kotchasan.com/license/
 *
 * @see http://www.kotchasan.com/
 */

namespace Kotchasan;

/**
 * รายชื่อจังหวัด ไทย ลาว.
 *
 * @author Goragod Wiriya <admin@goragod.com>
 *
 * @since 1.0
 */
class Province
{
    /**
     * โหลดจังหวัดตามประเทศที่เลือก
     * ไม่มี ใช้ประเทศไทย.
     *
     * @param string $country
     *
     * @return array
     */
    private static function init($country)
    {
        if (method_exists('Kotchasan\Province', $country)) {
            return \Kotchasan\Province::$country();
        } else {
            return array();
        }
    }

    /**
     * list รายชื่อจังหวัดทั้งหมด  ตามภาษา (ถ้าไม่มีใช้ภาษาอังกฤษ)
     * สามารถนำไปใช้โดย Form ได้ทันที.
     *
     * @param string $country ค่าเริ่มต้น TH (ไทย), LA (ลาว)
     *
     * @return array
     */
    public static function all($country = 'TH')
    {
        $datas = self::init($country);
        $result = array();
        if (!empty($datas)) {
            $language = Language::name();
            $language = in_array($language, array_keys(reset($datas))) ? $language : 'en';
            $result = array();
            foreach ($datas as $iso => $values) {
                $result[$iso] = $values[$language];
            }
            if ($language == 'en') {
                asort($result);
            }
        }

        return $result;
    }

    /**
     * คืนค่ารายการประเทศที่มีการติดดตั้ง.
     *
     * @return array
     */
    public static function countries()
    {
        return array('TH', 'LA');
    }

    /**
     * อ่านชื่อจังหวัดจาก ISO ตามภาษา (ถ้าไม่มีใช้ภาษาอังกฤษ)
     * คืนค่าว่างถ้าไม่พบ.
     *
     * @assert (102) [==] 'กรุงเทพมหานคร'
     *
     * @param int    $iso
     * @param string $lang
     *
     * @return string
     */
    public static function get($iso, $lang = '', $country = 'TH')
    {
        $datas = self::init($country);
        if (empty($lang)) {
            $lang = Language::name();
        }
        $lang = in_array($lang, array_keys(reset($datas))) ? $lang : 'en';

        return isset($datas[$iso]) ? $datas[$iso][$lang] : '';
    }

    /**
     * รายชื่อจังหวัด ไทย เรียงลำดับตามชื่อไทย.
     *
     * @return array
     */
    private static function TH()
    {
        return array(
            81 => array('th' => 'กระบี่', 'en' => 'Krabi'),
            10 => array('th' => 'กรุงเทพมหานคร', 'en' => 'Bangkok'),
            71 => array('th' => 'กาญจนบุรี', 'en' => 'Kanchanaburi'),
            46 => array('th' => 'กาฬสินธุ์', 'en' => 'Kalasin'),
            62 => array('th' => 'กำแพงเพชร', 'en' => 'KamphaengPhet'),
            40 => array('th' => 'ขอนแก่น', 'en' => 'KhonKaen'),
            22 => array('th' => 'จันทบุรี', 'en' => 'Chanthaburi'),
            24 => array('th' => 'ฉะเชิงเทรา', 'en' => 'Chachoengsao'),
            20 => array('th' => 'ชลบุรี', 'en' => 'ChonBuri'),
            18 => array('th' => 'ชัยนาท', 'en' => 'ChaiNat'),
            36 => array('th' => 'ชัยภูมิ', 'en' => 'Chaiyaphum'),
            86 => array('th' => 'ชุมพร', 'en' => 'Chumphon'),
            57 => array('th' => 'เชียงราย', 'en' => 'ChiangRai'),
            50 => array('th' => 'เชียงใหม่', 'en' => 'ChiangMai'),
            92 => array('th' => 'ตรัง', 'en' => 'Trang'),
            23 => array('th' => 'ตราด', 'en' => 'Trat'),
            63 => array('th' => 'ตาก', 'en' => 'Tak'),
            26 => array('th' => 'นครนายก', 'en' => 'NakhonNayok'),
            73 => array('th' => 'นครปฐม', 'en' => 'NakhonPathom'),
            48 => array('th' => 'นครพนม', 'en' => 'NakhonPhanom'),
            30 => array('th' => 'นครราชสีมา', 'en' => 'NakhonRatchasima'),
            80 => array('th' => 'นครศรีธรรมราช', 'en' => 'NakhonSiThammarat'),
            60 => array('th' => 'นครสวรรค์', 'en' => 'NakhonSawan'),
            12 => array('th' => 'นนทบุรี', 'en' => 'Nonthaburi'),
            96 => array('th' => 'นราธิวาส', 'en' => 'Narathiwat'),
            55 => array('th' => 'น่าน', 'en' => 'Nan'),
            97 => array('th' => 'บึงกาฬ', 'en' => 'buogkan'),
            31 => array('th' => 'บุรีรัมย์', 'en' => 'BuriRam'),
            13 => array('th' => 'ปทุมธานี', 'en' => 'PathumThani'),
            77 => array('th' => 'ประจวบคีรีขันธ์', 'en' => 'PrachuapKhiriKhan'),
            25 => array('th' => 'ปราจีนบุรี', 'en' => 'PrachinBuri'),
            94 => array('th' => 'ปัตตานี', 'en' => 'Pattani'),
            14 => array('th' => 'พระนครศรีอยุธยา', 'en' => 'PhraNakhonSiAyutthaya'),
            56 => array('th' => 'พะเยา', 'en' => 'Phayao'),
            82 => array('th' => 'พังงา', 'en' => 'Phangnga'),
            93 => array('th' => 'พัทลุง', 'en' => 'Phatthalung'),
            66 => array('th' => 'พิจิตร', 'en' => 'Phichit'),
            65 => array('th' => 'พิษณุโลก', 'en' => 'Phitsanulok'),
            76 => array('th' => 'เพชรบุรี', 'en' => 'Phetchaburi'),
            67 => array('th' => 'เพชรบูรณ์', 'en' => 'Phetchabun'),
            54 => array('th' => 'แพร่', 'en' => 'Phrae'),
            83 => array('th' => 'ภูเก็ต', 'en' => 'Phuket'),
            44 => array('th' => 'มหาสารคาม', 'en' => 'MahaSarakham'),
            49 => array('th' => 'มุกดาหาร', 'en' => 'Mukdahan'),
            58 => array('th' => 'แม่ฮ่องสอน', 'en' => 'MaeHongSon'),
            35 => array('th' => 'ยโสธร', 'en' => 'Yasothon'),
            95 => array('th' => 'ยะลา', 'en' => 'Yala'),
            45 => array('th' => 'ร้อยเอ็ด', 'en' => 'RoiEt'),
            85 => array('th' => 'ระนอง', 'en' => 'Ranong'),
            21 => array('th' => 'ระยอง', 'en' => 'Rayong'),
            70 => array('th' => 'ราชบุรี', 'en' => 'Ratchaburi'),
            16 => array('th' => 'ลพบุรี', 'en' => 'Loburi'),
            52 => array('th' => 'ลำปาง', 'en' => 'Lampang'),
            51 => array('th' => 'ลำพูน', 'en' => 'Lamphun'),
            42 => array('th' => 'เลย', 'en' => 'Loei'),
            33 => array('th' => 'ศรีสะเกษ', 'en' => 'SiSaKet'),
            47 => array('th' => 'สกลนคร', 'en' => 'SakonNakhon'),
            90 => array('th' => 'สงขลา', 'en' => 'Songkhla'),
            91 => array('th' => 'สตูล', 'en' => 'Satun'),
            11 => array('th' => 'สมุทรปราการ', 'en' => 'SamutPrakan'),
            75 => array('th' => 'สมุทรสงคราม', 'en' => 'SamutSongkhram'),
            74 => array('th' => 'สมุทรสาคร', 'en' => 'SamutSakhon'),
            27 => array('th' => 'สระแก้ว', 'en' => 'SaKaeo'),
            19 => array('th' => 'สระบุรี', 'en' => 'Saraburi'),
            17 => array('th' => 'สิงห์บุรี', 'en' => 'SingBuri'),
            64 => array('th' => 'สุโขทัย', 'en' => 'Sukhothai'),
            72 => array('th' => 'สุพรรณบุรี', 'en' => 'SuphanBuri'),
            84 => array('th' => 'สุราษฎร์ธานี', 'en' => 'SuratThani'),
            32 => array('th' => 'สุรินทร์', 'en' => 'Surin'),
            43 => array('th' => 'หนองคาย', 'en' => 'NongKhai'),
            39 => array('th' => 'หนองบัวลำภู', 'en' => 'NongBuaLamPhu'),
            15 => array('th' => 'อ่างทอง', 'en' => 'AngThong'),
            37 => array('th' => 'อำนาจเจริญ', 'en' => 'AmnatCharoen'),
            41 => array('th' => 'อุดรธานี', 'en' => 'UdonThani'),
            53 => array('th' => 'อุตรดิตถ์', 'en' => 'Uttaradit'),
            61 => array('th' => 'อุทัยธานี', 'en' => 'UthaiThani'),
            34 => array('th' => 'อุบลราชธานี', 'en' => 'UbonRatchathani'),
        );
    }

    /**
     * รายชื่อจังหวัด ลาว เรียงลำดับตามชื่อไทย.
     *
     * @return array
     */
    private static function LA()
    {
        return array(
            10 => array('la' => 'ນຄ.ວຽງຈັນ', 'en' => 'Vientiane Capital'),
            11 => array('la' => 'ຜົ້ງສາລີ', 'en' => 'Phongsaly'),
            12 => array('la' => 'ຫຼວງນ້ຳທາ', 'en' => 'Luangnamtha'),
            13 => array('la' => 'ອຸດົມໄຊ', 'en' => 'Oudomxay'),
            14 => array('la' => 'ບໍ່ແກ້ວ', 'en' => 'Bokeo'),
            15 => array('la' => 'ຫຼວງພະບາງ', 'en' => 'Luangprabang'),
            16 => array('la' => 'ຫົວພັນ', 'en' => 'Huaphanh'),
            17 => array('la' => 'ໄຊຍະບູລີ', 'en' => 'Xayaboury'),
            18 => array('la' => 'ຊຽງຂວາງ', 'en' => 'Xiengkhuang'),
            19 => array('la' => 'ວຽງຈັນ', 'en' => 'Vientiane'),
            20 => array('la' => 'ບໍລິຄຳໄຊ', 'en' => 'Borikhamxay'),
            21 => array('la' => 'ຄຳມ່ວນ', 'en' => 'Khammuane'),
            22 => array('la' => 'ສະຫວັນນະເຂດ', 'en' => 'Savannakhet'),
            23 => array('la' => 'ສາລະວັນ', 'en' => 'Saravane'),
            24 => array('la' => 'ເຊກອງ', 'en' => 'Sekong'),
            25 => array('la' => 'ຈຳປາສັກ', 'en' => 'Champasack'),
            26 => array('la' => 'ອັດຕະປື', 'en' => 'Attapeu'),
            27 => array('la' => 'ໄຊສົມບູນ', 'en' => 'Xaysomboon'),
        );
    }
}
