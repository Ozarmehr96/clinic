<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Settings
 *
 * @author Озармехр
 */
class Settings {
    public static $key;
    public function __construct() {
        self::$key = "2342sdfsdgsdfgsdfgsdfgte546457yhdgd";
        echo self::$key."<br><br><br><br><br><br>";
        return TRUE;
    }
    
    public static function Encrypt($string, $string2)
    {
        $key = "2342sdfsdgsdfgsdfgsdfgte546457yhdgd";
        $mc_d = mcrypt_module_open(MCRYPT_BLOWFISH, '', MCRYPT_MODE_CFB, '');
        $iv_size = mcrypt_enc_get_iv_size($mc_d);
        $iv = mcrypt_create_iv($iv_size,MCRYPT_RAND);
        mcrypt_generic_init($mc_d, $key, $iv);
        $crypt_text = mcrypt_generic($mc_d,$string);
        mcrypt_generic_deinit($mc_d);
        echo base64_encode($iv.$crypt_text);
        $crypt_text = $string2;
        $iv_size1 = mcrypt_enc_get_iv_size($mc_d);
        $iv1 = substr($iv.$string, 0, $iv_size1);
        $ctyptText2 = substr($iv.$crypt_text, $iv_size1);
        mcrypt_generic_init($mc_d, $key, $iv1);
        $decodeText = mdecrypt_generic($mc_d, $ctyptText2);
        mcrypt_generic_deinit($mc_d);
        echo "<br>".$decodeText;

    }
    
    public static function Decrypt($string)
    {
       /* $key = "2342sdfsdgsdfgsdfgsdfgte546457yhdgd";
        $mc_d = mcrypt_module_open(MCRYPT_BLOWFISH, '', MCRYPT_MODE_CFB, '');
        $iv_size = mcrypt_enc_get_iv_size($mc_d);
        $iv = mcrypt_create_iv($iv_size,MCRYPT_RAND);
        mcrypt_generic_init($mc_d, $key, $iv);
        $crypt_text = mcrypt_generic($mc_d,$string);
        
        $iv1 = substr($iv.$string, 0, $iv_size);
        $ctyptText2 = substr($iv.$string, $iv_size);
        mcrypt_generic_init($mc_d, $key, $iv1);
        $decodeText = mdecrypt_generic($mc_d, $string);
        mcrypt_generic_deinit($mc_d);
        echo "<br>".$decodeText;*/
    }
    
    /**
     * Создание пароля. Гененирование пароля
     * @param type $length длина
     * @return type строка
     */
    public static function generatePassword($length = 12){
        $chars = 'abdefhiknrstyz-ABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return  count_chars($string, 3);
    }
}
