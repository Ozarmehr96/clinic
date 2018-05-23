<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManagementController
 *
 * @author Озармехр
 */
class ManagementController {
    public function __construct() {
        header("Location: /");
        return TRUE;
    }
    public function actionIndex()
    {
        if (isset($_POST['setSession']))
        {
            $_SESSION["actionsTrue"] = true;
            $_SESSION["last_time"] = time();
        }
        return;
    }
    
    /**
     *  Метод используется для обхода блокировки доступа к контроллерам
     * Когда пациент пытается обновить данные, он не сможет, потому что доступ к другому контроллету ему запрещен
     * Для это используем сессию, при отправки запроса, создадим сессию, которая обходит блокировку
     */
    public static function UnsetSession()
    {
        if (isset($_SESSION["actionsTrue"]))
        {
            unset($_SESSION['actionsTrue']); 
            echo 'dsfdf';
        }
    }
    
    public function actionRegisterJournal(){
        
        $officces = array();
        $officces = Operator::getDoctorsOfficces();
        //print_r($officces);
        $uslugi = array();
        $uslugi = Operator::getUslugi();
        //print_r($officces);
        $doctorSchedule = array();
        $doctorSchedule = Operator::getDoctorSchedule("8","2018-05-15");
       // print_r($doctorSchedule);
        $time1 = new DateTime();
        $TimesInArray = $this->TimesInArray(15);
        
        
        if (isset($_POST['scheduleSubmit'])) {
            $date = $_POST['date'];
            $id_doctor = $_POST['id_doctor'];

            $doctorSchedule = array();
            $doctorSchedule = Operator::getDoctorSchedule($id_doctor,$date);
            $res = "";
            
            // 1. Нам нужно получить номер дня в недели
             $numbeyDayInWeek = PatientController::getNumberDayOfWeek($date);   
            // 2. Получить расписание доктора в текстовом виде
            $text = $doctorSchedule['doctor_schedule'];
            // 3. В завичимости от номера дня в недели, получить график работы определенного дня ( в массиве день понед. начинается с нулья
            
            
            
            if ($doctorSchedule == NULL) 
            {
                for ($i = 8; $i < 18; $i++) {
                    for ($j = 0; $j < 60; $j += 15) {
                        $time = new DateTime();
                        $time->setTime($i, $j, 00);
                        echo '<tr id="timeZapic" onclick="ZapicPatient(this)" data-id="">'
                        . '<td>' . $time->format('H:i:s') . '</td>'
                        . '<td data-id=""></td>'
                        . '<td data-id=""></td>'
                        . '<td data-id=""></td>'
                        . '</tr>';
                    }
                }
            } 
           else 
            {
                $fioPatient = "";
                $patient_id = "";
                $notess = "";
                
                foreach ($TimesInArray as $keyofTimes => $valOfTimes) {
                    $notess = "";
                    $option = '<td data-id=""></td>';
                    foreach ($doctorSchedule as $valofDoctorSchedule) {
                        $fioPatient = $valofDoctorSchedule['surname']." ".$valofDoctorSchedule['name']." ".$valofDoctorSchedule['patronymic'];
                        // если тек. время == время записи пациента
                        if ($valofDoctorSchedule['time_priema'] == $keyofTimes) {
                            $valOfTimes = '<td onclick = "ShowUserDatasOnModal(this)" data-id="' . $valofDoctorSchedule['id_pacient'] . '">' . $fioPatient. '</td>';
                            $patient_id = $valofDoctorSchedule['id_pacient'];
                            $notess = $valofDoctorSchedule['notes'];
                            $option = '<td class="optionTD" id = "actionTD">'
                                        . '<span class="glyphicon glyphicon-edit" aria-hidden="true" style="color:#ffc107" onclick="UpdateRecordedPatient(this)" data-patient_id="'.$valofDoctorSchedule['id_pacient'].'" data-doctor_id="'.$valofDoctorSchedule['id_doctor'].'" data-id_schedule="'.$valofDoctorSchedule['id_schedule'].'" ></span>&emsp;'
                                        . '<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" onclick="RemoveZapicById(this)" data-id="'.$valofDoctorSchedule['id_schedule'].'" style="color:red"></span>'
                                    . '</td>';
                        }
                    }
                    
                    
                    /*
                     *  data-id_schedule="$zapic['id_schedule']" 
                     * data-doctor_id="$zapic['id_doctor']" 
                     * data-patient_id="$zapic['id_pacient']" 
                     */
                    if ($valOfTimes == "") $valOfTimes = '<td data-id=""></td>';
                     $notes = '<td data-id="">'.$notess.'</td>';
                    $timePriem = '<td id="timeZapic" onclick="ZapicPatient(this)" data-id="'.$patient_id.'">' . $keyofTimes . '</td>';
                    //if ($valOfTimes == "") $valOfTimes = $timePriem;
                    //$TimesInArray[$keyofTimes] = $valOfTimes;  // хранить в тек. время ФИО пользователя
                   //echo $keyofTimes . "=>" . $valOfTimes . "<br>";
                    
                    echo '<tr>'
                            . $timePriem
                            . $valOfTimes
                            . $notes
                            . $option
                         .'</tr>';
                }
            }
            return;
        }
        
        
        
        require ROOT.'/views/operator/registerjournal.php';
        return TRUE;
    }
}
