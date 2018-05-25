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
           
            $user = array();
            $user = Site::getUser($login, $password);
            $result = $user['count(*)'];
            if ($result == 1)
            {
                 parent::SetSessionAndRedirect($user['id_pacient'], $user['type']);
            }
            else {
                 $isExistUSer = false;
            }
        }
        if (isset($_POST['authorization']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
           
            $user = array();
            $user = Site::getUser($login, $password);
            $result = $user['count(*)'];
            echo $result;
            exit();
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
           
            $user = array();
            $user = Site::getUser($login, $password);
            $result = $user['count(*)'];
            echo $result;
            exit();
        }
    }
}
