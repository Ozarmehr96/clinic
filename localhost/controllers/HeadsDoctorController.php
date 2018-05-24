<?php
require_once (ROOT.'\controllers\OperatorController.php');
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
        $string = "Hello";
        $string2 = "hello";
        Settings::Encrypt($string,$string2);
        //Settings::Decrypt($string2);
      
    }
    public function actionIndex()
    {
        echo '<a href="user/logout">Выход</a>';
        require_once ROOT.'/views/headsdoctor/index.php';
        return TRUE;
    }
    
    
    public function actionGets()
    {
                /**
         *  Поиск пациентов
         */
        if(isset($_POST['searchDoctor']))
        {
            $values = array();
            $values['name'] = htmlspecialchars($_POST['name']);
            $values['surname'] = htmlspecialchars($_POST['surname']);
            $values['patronymic'] = htmlspecialchars($_POST['patronymic']);
            $values['date_of_birth'] = htmlspecialchars($_POST['date_of_birth']);
            $values['passport_num'] = htmlspecialchars($_POST['passport_num']);
            $values['cabinet'] = htmlspecialchars($_POST['cabinet']);
            $values['special'] = htmlspecialchars($_POST['special']);
            
            $searchResult = array();
            $searchResult = Doctor::getDoctorsByParams($values);
            $i = 0;
           $name = "";
            foreach ($searchResult as $val)
            {
                $i++;
                $fio = $val['fio'];
                echo '<tr  data-id="'.$val['id_pacient'].'" data-zapicat="true" class="open-modal-pacient-data pacientSearchTable" >'
                        . '<td>'.$i.'</td>'
                        . '<td class="pacientFIO " id="pacientFIO" nowrap><a href="/heads-doctor/update/employee/'.$val['id_pacient'].'">'.$fio.'</a></td>'
                        . '<td>'.Patient::ConvertToSex($val['sex']).'</td>'
                        . '<td>'.$val['date_of_birth'].'</td>'
                        . '<td>'.$val['passport_num'].'</td>'
                        . '<td>'.$val['title'].'</td>'
                        . '<td>'.$val['cabinet'].'</td>'
                        . '</tr>';
            }
            return;
        }
    }
    public function actionAddEmployee()
    {
        
        require_once ROOT.'/views/headsdoctor/addDoctor.php';
        if(isset($_POST['submit']))
        {
            $values = array();
            $values['name'] = htmlspecialchars($_POST['name']);
            $values['surname'] = htmlspecialchars($_POST['surname']);
            $values['patronymic'] = htmlspecialchars($_POST['patronymic']);
            $values['date_of_birth'] = htmlspecialchars($_POST['date_of_birth']);
            $values['passport_num'] = htmlspecialchars($_POST['passport_num']);
            $values['sex'] = htmlspecialchars($_POST['sex']);
            $values['specialities'] = htmlspecialchars($_POST['specialities']);
            $values['cabinet'] = htmlspecialchars($_POST['cabinet']); 
            $values['text'] = htmlspecialchars($_POST['text']); 
            foreach ($values as $item)
            {
                echo $item."<br>";
            }
        }
        return TRUE;
    }
}
