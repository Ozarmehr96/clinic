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
    public function __construct() { 
        return TRUE;
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
