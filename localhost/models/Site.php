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
    
    public static function getUser($login, $password)
    {
        $connection = Db::getConnection();
        
        $sql = "SELECT count(*), id_pacient, type FROM patient JOIN user_type ON user_type.id = patient.user_type"
                . " WHERE login = :login OR patient_card_num =:pat and password = :password";
        $result = $connection->prepare($sql);
        
        $result->bindParam(":login", $login, PDO::PARAM_STR);
        $result->bindParam(":pat", $login, PDO::PARAM_STR);
        $result->bindParam(":password", $password, PDO::PARAM_STR);
        $result->execute();
        
        return $result->fetch(PDO::FETCH_ASSOC);
       // return $result->rowCount();
    }
}
