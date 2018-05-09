<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author Озармехр
 */
class PatientController extends Redirect {
    //put your code here
    public function __construct() {
        parent::__construct("patient");
        return true;
    }
    public function actionIndex()
    {
        return TRUE;
    }
}
