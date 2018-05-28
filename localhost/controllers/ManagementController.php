<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManagementController
 *
 * @author Озармехр
 */
class ManagementController {
    public function __construct() {
        header("Location: /");
        $password = '123456';
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        echo $hashed_password;
        return TRUE;
    }
    public function actionIndex()
    {
        if (isset($_POST['setSession']))
        {
            $_SESSION["actionsTrue"] = true;
            $_SESSION["last_time"] = time();
        }
        return;
    }
    
    /**
     *  Метод используется для обхода блокировки доступа к контроллерам
     * Когда пациент пытается обновить данные, он не сможет, потому что доступ к другому контроллету ему запрещен
     * Для это используем сессию, при отправки запроса, создадим сессию, которая обходит блокировку
     */
    public static function UnsetSession()
    {
        if (isset($_SESSION["actionsTrue"]))
        {
            unset($_SESSION['actionsTrue']); 
            echo 'dsfdf';
        }
    }
    
   
}
