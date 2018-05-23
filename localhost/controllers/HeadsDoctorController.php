<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Страница глав-врача
 *
 * @author Озармехр
 */
class HeadsDoctorController extends Redirect {
    public function __construct() {
        parent::__construct("heads-doctor");
    }
    public function actionIndex()
    {
        echo 'Страница главного врача';
        echo '<a href="user/logout">Выход</a>';
        return TRUE;
    }
}
