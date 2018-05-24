<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Перенаправление сайта и доступ
 *
 * @author Озармехр
 */
class Redirect {
    
    /**
     * Проверяем, вошел ли пользователь
     * Берем id пользователя из сесии, проверяем в БД
     * Если все ок, то ничего, иначе в страницу входа
     * Если тип пользователя не равняет параметру указанному в методе, то выводим "Доступ запрещен!"
     * @param type $user_type
     * @return boolean
     */
    public function __construct($user_type) {
        $userId = "";
        $url = "";
        if (isset($_SESSION['user_id']))
        {
            $userId = $_SESSION['user_id'];
            $getUser = Patient::getPatientByID($userId);
            $result = $getUser['count(*)'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                
            } else {
                if ($result != 1)
            {
                header("Location: /");
                exit();
            }
            
            if($_SESSION['user_type'] != $user_type)
            {
                require_once ROOT.'/views/ErrorPage.php';
                exit();
            }
            }
            

        }
        else
        {
            header("Location: /");
            exit();
        }
        return true; 
    }
    
    /**
     * Метод создает сессию.
     * Хранит в ней id пользователя и тип пользователя
     * проверяет, какой пользователь и направляет страницу в доступную для ему
     * @param type $user_id
     * @param type $user_type
     */
    public function SetSessionAndRedirect($user_id, $user_type)
    {
       
       session_unset();
       $_SESSION['user_id'] = $user_id;
       $_SESSION['user_type'] = $user_type;
       $this->CheckUsertypeAndRedirect($_SESSION['user_type']);
       
    }
    
    /**
     * Метод проверяет тип пользователя и перенаправляет на нужную страницу
     * @param type $userType
     * @return boolean
     */
    public function CheckUsertypeAndRedirect($userType)
    {
       switch ($userType)
       {
           case 'operator': header("Location: /operator");exit();
           case 'patient': header("Location: /patient");exit();
           case 'doctor': header("Location: /doctor");exit();
           case 'heads-doctor': header("Location: /heads-doctor");exit();
           default: break;
       }
       return TRUE;
    }
    
    public static function getUserIDFromSession()
    {
        $userID = "";
        if (isset($_SESSION['user_id'])) $userID = $_SESSION['user_id'];
        return $userID;   
    }
}
