<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DoctorController
 *
 * @author Озармехр
 */
class DoctorController extends Redirect {
    
    public function __construct() {
        parent::__construct("doctor");
        echo "Страница врача";
        return true;
    }
    public function actionIndex()
    {
        
        return TRUE;
    }
}
