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
    'operator/register-journal-record-update'  =>  'operator/registerJournalRecordUpdate',
    'operator/patients'  =>  'operator/patients',
    'operator/add/patient' =>  'operator/addPatient',
    'operator/remove/patient' =>  'operator/removePatient',
    'operator/update/patient/([0-9]+)' =>  'operator/updatePatient/$1',
    'patient/update/([0-9]+)'      =>  'patient/update/$1',
    'patient/gets'      =>  'patient/gets',
    'patient'      =>  'patient/index',
    'doctor'    =>  'doctor/index',
    'management'    =>  'management/index',
    ''  =>  'site/index'
);