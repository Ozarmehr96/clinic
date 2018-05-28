<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Страница входа на сайт
 *
 * @author Озармехр
 */
class SiteController extends Redirect {
    
    public function __construct() {
        /*$pass = password_hash("124567", PASSWORD_DEFAULT);
        echo $pass;*/
        if (isset($_SESSION['user_type']))
        {
            parent::CheckUsertypeAndRedirect($_SESSION['user_type']);
            exit();
        }
        return true;
    }

    public function actionIndex()
    {
        $login = "";
        $password = "";
        $isExistUSer = true;
        if (isset($_POST['submit']))
        {
           $login = $_POST['login'];
           $password = $_POST['password'];
           
            $users = array();
            $users = Site::getUser($login);
            
            foreach ($users as $user)
            {
                if (password_verify($password, $user['password']) && $user['login'] == $login || $user['patient_card_num'] == $login)
                {
                     parent::SetSessionAndRedirect($user['id_pacient'], $user['type']);
                     break;
                }
                else {
                     $isExistUSer = false;
                }
            }
            
        }
        require_once ROOT.'/views/index/index.php';
        return TRUE;
    }
    
    public function actionAuthorization()
    {
        if (isset($_POST['authorization']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
           
            $users = array();
            $users = Site::getUser($login);
            $count = 0;
            foreach ($users as $user)
            {
                if (password_verify($password, $user['password']) && $user['login'] == $login || $user['patient_card_num'] == $login)
                {
                     echo "1";
                     break;
                }
            }
            exit();
        }
    }
}
