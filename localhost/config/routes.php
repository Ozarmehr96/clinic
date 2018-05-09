<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
    'operator'  =>  'operator/index',
    'operator/schedule'  =>  'operator/index',
    //'operator/get/pacietn/by/id/([0-9]+)'  =>  'operator/GetUserById/$1',
    'operator/register-journal'  =>  'operator/registerJournal',
    'operator/register-journal-record'  =>  'operator/registerJournalRecord',
    'operator/patients'  =>  'operator/patients',
    'operator/add/patient' =>  'operator/addPatient',
    'operator/update/patient/([0-9]+)' =>  'operator/updatePatient/$1',
    'patient'      =>  'patient/index',
    'doctor'    =>  'doctor/index',
    ''  =>  'site/index'
);