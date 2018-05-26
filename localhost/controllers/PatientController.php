<?php
require_once (ROOT.'\controllers\OperatorController.php');
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
    private $patientID;
    public function __construct() {
        parent::__construct("patient");
        $this->patientID = $_SESSION['user_id'];
       
        return true;
    }
    
    /**
     *  Метод для заполнения временем чего либо
     * @param type $text само расписание в виде $text = "08:00-13:30, 13:00-17:00, 08:00-17:00, 08:00-17:00, 08:00-17:00";
     * @param type $numberDayInWeek номер дня в недели (Напимер: Если указывается 2, то это вторник)
     * @param type $callbackFunction метод обраного вызова
     */
    public static function SheduleOfDoctors($text,$date,$callbackFunction2, $callbackFunction)
    {
        //$text = "08:00-13:30, 13:00-17:00, 08:00-17:00, 08:00-17:00, 08:00-17:00";
        //echo $text;
        $numberDayInWeek = self::getNumberDayOfWeek($date);
        $text = $text;
        $scheduleOnlyOneTime = array();
        $schedule = explode(",", $text);
        //print_r($schedule);
        //$time = $schedule[0]; // Выбран понедельник
        $time = $schedule[$numberDayInWeek-1]; // 
       // echo "<br>".$time."<br>";
        $oneDayTime = explode("-", $time);
        //print_r($oneDayTime);
       
        $start = $oneDayTime[0];    // 08:00
        $end = $oneDayTime[1];      // 17:00
        $startParts = explode(":",$start); // 1=>08 2=>00 (08:00)
        $endParts = explode(":",$end); //   1=>17 2=>30 (17:00)
        
        /*echo '<br>Начало работы '.$start;
        echo '<br>Конец работы '.$end;*/
        
        $nachalo = new DateTime();
        $konest = new DateTime();
        
        /* echo '<br>Начало работы  часы '.intval($startParts[0]);
         echo '<br>Начало работы  мунуты '.intval($startParts[1]);
        echo '<br>Конец работы часы '.intval($endParts[0]);
        echo '<br>Конец работы минуты '.intval($endParts[1]);*/
        
        $nachaloHour = intval($startParts[0]);  //Начало часы    (08:00) => 08 
        $nachaloMin = intval($startParts[1]-15);   // Начало минуты (08:00) => 00
        $nachaloSec = 0;
        
        $konestHour = intval($endParts[0]);     //Конец часы    (17:30) => 17 
        $konestMin = intval($endParts[1]);      //Конец минуты  (17:30) => 30 
        $konestSec = 0;
        
        $nachalo->setTime($nachaloHour, $nachaloMin, $nachaloSec);
        $konest->setTime($konestHour, $konestMin, $konestSec);
        $timesInArray = array();
        while ($nachalo->setTime($nachaloHour, $nachaloMin+=15, $nachaloSec) < $konest)
        {
            $timesInArray[$nachalo->format('H:i:s')] = "";
            if (is_callable($callbackFunction))
            {
                call_user_func($callbackFunction, $nachalo);
            }
            
            //echo "<br>".$nachalo->format('H:i:s');
            if ($nachalo === $konest) continue;
        }
        if (is_callable($callbackFunction2))
        {
            return $timesInArray = call_user_func($callbackFunction2, $timesInArray);
        }
        
       /* $date = "2018-05-20";
        echo self::getNumberDayOfWeek($date);*/
    }
    
    /**
     * Метод возващает номер дня в неделели. 
     * Понедельник начинается с 1
     * @param type $date дата в формате год-мес-день
     * @return type дата
     */
    public static function getNumberDayOfWeek($date)
    {
        $datetime = date($date);
        $day_num = date('w', strtotime($datetime));
        return $day_num;
    }

    public function actionIndex()
    {
        $userID = "";
        $patientFIO = "";
        $patientDatas = "";
        if (isset($_SESSION['user_id']))
        {
            $userID = $_SESSION['user_id'];
            $patientFIO = OperatorController::getPatientFIOBbyId($userID);
            $patientDatas = Patient::getPatientByID($userID);
        }
        
        if(isset($_POST['id']))
        {
            $patient_id = $_POST['id'];
            $patient = array();
            $patient = Patient::getPatientByID($patient_id);
            echo json_encode($patient);
            return;
        }
        require_once ROOT.'/views/patient/index.php';
        $text = "08:00-13:30, 13:00-17:00, 08:00-15:00, 08:00-17:00, 08:00-17:00";
        /*$this->SheduleOfDoctors($text, 3, function($time){
             echo "<br>".$time->format('H:i:s');
         });*/
        return TRUE;
    }
    
    public function actionUpdate($id)
    {
        OperatorController::actionUpdatePatient($id);
        header("Location: /");
    }

    public static function getSocialStatusByID($socialID)
    {
        $result = Patient::getSocialStatusByID($socialID);
        return $result['title'];
    }
    
    /**
     * Метод для возвращение фамилии и имени пользователя
     * @return type имя и фамилия пользователя
     */
    public function getPatientFI()
    {
        $result = Patient::getPatientByID($this->patientID);
        return $result['name']." ".$result['surname'];
    }

    public function actionGets()
    {
        if(isset($_POST['getRecords']))
        {
            $id_patient = $this->patientID;
            $recordList = array();
            $recordList = Patient::getUserRecords($id_patient);
            $index =1;
            foreach ($recordList as $record)
            {
                $doctorFIO = OperatorController::getDoctorByID($record['id_doctor']);
                $titleOfUSlugi = OperatorController::getUsligiByID($record['id_uslugi']);
                 $option = '<span class="glyphicon glyphicon-edit" aria-hidden="true" style="color:#ffc107" onclick="UpdateRecordedPatient(this)" data-patient_id="'.$id_patient.'" data-doctor_id="'.$record['id_doctor'].'" data-id_schedule="'.$record['id_schedule'].'" ></span>&emsp;'
                         . '<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" onclick="RemoveZapicById(this)" data-id="'.$record['id_schedule'].'" style="color:red"></span>';
                echo '<tr>'
                        . '<td>'.$index++.'</td>'
                        . '<td>'.$record['date_priema'].'</td>'
                        . '<td>'.$record['time_priema'].'</td>'
                        . '<td class="canClick" onclick="ViewСertainDoctorSchedule(this)" data-id="'.$record['id_doctor'].'">'.$doctorFIO.'</td>'
                        . '<td>'.$titleOfUSlugi.'</td>'
                        . '<td>'.$record['cost'].'</td>'
                        . '<td>'.$record['notes'].'</td>'  
                        . '<td class="optionTD" id = "actionTD">'.$option.'</td>'
                . '</tr>';
            }
            
        }

        if(isset($_POST['getListUslugi']))
        {
           OperatorController::FullSelectOptions("uslugi", "name", "id");
        }
        
        /**
         * Добавление новой записи
         */
         if (isset($_POST['updateRecordedPat']))
        {
            $recordUpdateDatas = array();
            $recordUpdateDatas['updatedatetimepickerZapicDataPriema'] = $_POST['updatedatetimepickerZapicDataPriema'];
            $recordUpdateDatas['uslugi'] = $_POST['uslugi'];
            $recordUpdateDatas['updatenachaloPriema'] = $_POST['updatenachaloPriema'];
            $recordUpdateDatas['updatecost'] = $_POST['updatecost'];
            $recordUpdateDatas['update-notes'] = $_POST['update-notes'];
            $recordUpdateDatas['addedUserId'] = $_SESSION['user_id'];
            $recordUpdateDatas['patientID'] = $_SESSION['user_id'];
            $recordUpdateDatas['update-doctorID'] = $_POST['update-doctorID'];
            $recordUpdateDatas['update-articul'] = $_POST['update-articul'];
            $recordUpdateDatas['scheduleID'] = $_POST['scheduleID'];
           
            $result = Patient::RecordZapis($recordUpdateDatas);
           if ($result != NULL)
            {
                header("Location: /");
                exit();
            }
            return true;
            /*echo $result;
            foreach ($recordUpdateDatas as $key=>$val)
            {
                echo $key."->".$val."<br>";
            }*/
        }
    }
}