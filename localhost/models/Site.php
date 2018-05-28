<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Site
 *
 * @author Озармехр
 */
class Site {
    
    public function __construct() {
        
        return true;
    }
    
    public static function getUser($login)
    {
        $connection = Db::getConnection();
        
        $sql = "SELECT count(*), id_pacient,password,login,patient_card_num, type FROM patient JOIN user_type ON user_type.id = patient.user_type"
                . " WHERE login = :login OR patient_card_num =:pat ";
        $result = $connection->prepare($sql);
        
        $result->bindParam(":login", $login, PDO::PARAM_STR);
        $result->bindParam(":pat", $login, PDO::PARAM_STR);
        $result->execute();
        $i= 0;
        $users = array();
        while ($user = $result->fetch())
        {
            $users[$i]['id_pacient'] = $user['id_pacient'];
            $users[$i]['password'] = $user['password'];
            $users[$i]['login'] = $user['login'];
            $users[$i]['patient_card_num'] = $user['patient_card_num'];
            $users[$i]['type'] = $user['type'];
            $users[$i]['count(*)'] = $user['count(*)'];
            $i++;
        }
        return $users;
    }
}
