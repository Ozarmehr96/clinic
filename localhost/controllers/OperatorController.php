<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperatorController
 *
 * @author Озармехр
 */
class OperatorController extends Redirect {
    
    public function __construct() {
        parent::__construct("operator");
       // print_r($_SESSION);
        return true;
    }
    public function actionIndex()
    {
        
        $schedule = array();
        $schedule = Operator::getSchedule();
        
        require_once ROOT.'/views/operator/schedule.php';
        return TRUE;
    }
    
    public function actionAddPatient()
    {
        $values = array();
        if (isset($_POST['submit']))
        {
            $values['social_status'] = htmlspecialchars($_POST['ss']);
            $values['name'] = htmlspecialchars($_POST['name']);
            $values['surname'] = htmlspecialchars($_POST['surname']);
            $values['patronymic'] = htmlspecialchars($_POST['patronymic']);
            $values['sex'] = htmlspecialchars($_POST['sex']);
            $values['date_of_birth'] = htmlspecialchars($_POST['date_of_birth']);
            $values['phone'] = htmlspecialchars($_POST['phone']);
            $values['passport_num'] = htmlspecialchars($_POST['passport_num']);
            $values['patient_card_num'] = htmlspecialchars($_POST['patient_card_num']);
            $values['invalidnost'] = htmlspecialchars($_POST['invalidnost']);
            $values['adress'] = htmlspecialchars($_POST['adress']);
            $values['id_citizenship'] = htmlspecialchars($_POST['id_citizenship']);
            $values['id_region'] = htmlspecialchars($_POST['id_region']);
            $values['email'] = htmlspecialchars($_POST['email']);
            $values['type_medical_policy'] = htmlspecialchars($_POST['type_medical_policy']);
            $values['snils'] = htmlspecialchars($_POST['snils']);
            $values['work_place'] = htmlspecialchars($_POST['work_place']);
            $values['data_vidachi_pass'] = htmlspecialchars($_POST['data_vidachi_pass']);
            $values['inn'] = htmlspecialchars($_POST['inn']);
            $values['start_medical_policy'] = htmlspecialchars($_POST['start_medical_policy']);
            $values['end_medical_policy'] = htmlspecialchars($_POST['end_medical_policy']);
            $values['Id_insurance_company'] = $_POST['Id_insurance_company'];
            $values['id_doctor'] = htmlspecialchars($_POST['id_doctor']);
            $values['fixing_date'] = htmlspecialchars($_POST['fixing_date']);
            $values['id_university'] = htmlspecialchars($_POST['id_university']);
            $values['id_added_operator'] = $_SESSION['user_id'];
            
            $result = Operator::addPatient($values);
            if ($result != NULL)
            {
               echo '<br><h1>Seccess! Patient added!<h1>'.$result;
            }
        }
        
        foreach ($values as $key => $val) {
           echo $key." -> ".$val."<br>";
        }
    }
    
    /**
     * Изменение данных выбранного пациента
     * @param type $id_patient
     * @return boolean
     */
    public function actionUpdatePatient($id_patient)
    {
        $values = array();
        if (isset($_POST['update_patient_data']))
        {
            $values['id_patient']  = $id_patient;
            $values['social_status'] = htmlspecialchars($_POST['ss']);
            $values['name'] = htmlspecialchars($_POST['name']);
            $values['surname'] = htmlspecialchars($_POST['surname']);
            $values['patronymic'] = htmlspecialchars($_POST['patronymic']);
            $values['sex'] = htmlspecialchars($_POST['sex']);
            $values['date_of_birth'] = htmlspecialchars($_POST['date_of_birth']);
            $values['phone'] = htmlspecialchars($_POST['phone']);
            $values['passport_num'] = htmlspecialchars($_POST['passport_num']);
            $values['patient_card_num'] = htmlspecialchars($_POST['patient_card_num']);
            $values['invalidnost'] = htmlspecialchars($_POST['invalidnost']);
            $values['adress'] = htmlspecialchars($_POST['adress']);
            $values['id_citizenship'] = htmlspecialchars($_POST['id_citizenship']);
            $values['id_region'] = htmlspecialchars($_POST['id_region']);
            $values['email'] = htmlspecialchars($_POST['email']);
            $values['type_medical_policy'] = htmlspecialchars($_POST['type_medical_policy']);
            $values['snils'] = htmlspecialchars($_POST['snils']);
            $values['work_place'] = htmlspecialchars($_POST['work_place']);
            $values['data_vidachi_pass'] = htmlspecialchars($_POST['data_vidachi_pass']);
            $values['inn'] = htmlspecialchars($_POST['inn']);
            $values['start_medical_policy'] = htmlspecialchars($_POST['start_medical_policy']);
            $values['end_medical_policy'] = htmlspecialchars($_POST['end_medical_policy']);
            $values['Id_insurance_company'] = $_POST['Id_insurance_company'];
            $values['id_doctor'] = htmlspecialchars($_POST['id_doctor']);
            $values['fixing_date'] = htmlspecialchars($_POST['fixing_date']);
            $values['id_university'] = htmlspecialchars($_POST['id_university']);
            $values['id_added_operator'] = $_SESSION['user_id'];
            $result = Operator::UpdatePatientData($values);
            if ($result != NULL)
            {
                header("Location: /operator");
                exit();
            }
        }
        
        
        //header("Location: /");
        //require ROOT.'/views/patient/updateOrChange.php';
        return TRUE;
    }
    
    public function actionPatients()
    {
        if(isset($_POST['id']))
        {
            $patient_id = $_POST['id'];
            $patient = array();
            $patient = Patient::getPatientByID($patient_id);
            echo json_encode($patient);
            return;
        }
        if(isset($_POST['search']))
        {
            $values = array();
            $values['name'] = htmlspecialchars($_POST['name']);
            $values['surname'] = htmlspecialchars($_POST['surname']);
            $values['patronymic'] = htmlspecialchars($_POST['patronymic']);
            $values['date_of_birth'] = htmlspecialchars($_POST['date_of_birth']);
            $values['passport_num'] = htmlspecialchars($_POST['passport_num']);
            $values['inn'] = htmlspecialchars($_POST['inn']);
            $values['patient_card_num'] = htmlspecialchars($_POST['patient_card_num']);
            
            $searchResult = array();
            $searchResult = Patient::SearchByTags($values);
            $i = 0;
           $name = "";
            foreach ($searchResult as $val)
            {
                $i++;
                
                $surname =  $val['surname'];
                  $patronymic     =$val['patronymic'];
               $fio = $val['surname']." ". $val['name']." ".$val['patronymic'];
                echo '<tr data-id="'.$val['id_pacient'].'" data-zapicat="true" class="open-modal-pacient-data pacientSearchTable" onclick="ShowUserDatasOnModal(this)">'
                        . '<td>'.$i.'</td>'
                        . '<td class="pacientFIO" id="pacientFIO">'.$fio.'</td>'
                        . '<td>'.Patient::ConvertToSex($val['sex']).'</td>'
                        . '<td>'.$val['date_of_birth'].'</td>'
                        . '<td>'.$val['inn'].'</td>'
                        . '<td>'.$val['passport_num'].'</td>'
                        . '<td>'.$val['patient_card_num'].'</td>'
                        . '</tr>';
            }
            //echo json_encode($teg);
            return;
        }
        require ROOT.'/views/operator/patients.php';
        return TRUE;
    }

     /**
     * Запись пациента, журнал регистрации пациентов
     * @return boolean
     */
    public function actionRegisterJournal(){
        
        $officces = array();
        $officces = Operator::getDoctorsOfficces();
        $uslugi = array();
        $uslugi = Operator::getUslugi();
        //print_r($officces);
        $doctorSchedule = array();
        $doctorSchedule = Operator::getDoctorSchedule("1","2018-04-16");
        //print_r($doctorSchedule);
        $time1 = new DateTime();
        $TimesInArray = $this->TimesInArray(15);
        
        
        if (isset($_POST['scheduleSubmit'])) {
            $date = $_POST['date'];
            $id_doctor = $_POST['id_doctor'];

            $doctorSchedule = array();
            $doctorSchedule = Operator::getDoctorSchedule($id_doctor, $date);
            $res = "";
           
            
            if ($doctorSchedule == NULL) 
            {
                for ($i = 8; $i < 18; $i++) {
                    for ($j = 0; $j < 60; $j += 15) {
                        $time = new DateTime();
                        $time->setTime($i, $j, 00);
                        echo '<tr>'
                        . '<td  id="timeZapic" onclick="ZapicPatient(this)" data-id="">' . $time->format('H:i:s') . '</td>'
                        . '<td data-id=""></td>'
                        . '</tr>';
                    }
                }
            } 
           else 
            {
                $fioPatient = "";
                $patient_id = "";
                foreach ($TimesInArray as $keyofTimes => $valOfTimes) {
                    foreach ($doctorSchedule as $valofDoctorSchedule) {
                        $fioPatient = $valofDoctorSchedule['surname']." ".$valofDoctorSchedule['name']." ".$valofDoctorSchedule['patronymic'];
                        // если тек. время == время записи пациента
                        if ($valofDoctorSchedule['time_priema'] == $keyofTimes) {
                            $valOfTimes = '<td onclick = "ShowUserDatasOnModal(this)" data-id="' . $valofDoctorSchedule['id_pacient'] . '">' . $fioPatient. '</td>';
                            $patient_id = $valofDoctorSchedule['id_pacient'];
                        }
                        
                    }
                    if ($valOfTimes == "") $valOfTimes = '<td data-id=""></td>';
                    $timePriem = '<td id="timeZapic" onclick="ZapicPatient(this)" data-id="'.$patient_id.'">' . $keyofTimes . '</td>';
                    //if ($valOfTimes == "") $valOfTimes = $timePriem;
                    //$TimesInArray[$keyofTimes] = $valOfTimes;  // хранить в тек. время ФИО пользователя
                   //echo $keyofTimes . "=>" . $valOfTimes . "<br>";
                    echo '<tr>'
                            . $timePriem
                            .  $valOfTimes. '</tr>';
                    
                }
            }
            return;
        }
        
        
        
        require ROOT.'/views/operator/registerjournal.php';
        return TRUE;
    }
    
    /**
     *  Запись пациента
     */
    public function actionRegisterJournalRecord()
    {
        if (isset($_POST['getUserByPassportAndMedCart'])) {
            $medicineCartNum = $_POST['medicineCartNum'];
            $passportNum = $_POST['passportNum'];
            $val = array();
            $val = Patient::getPatientByPassportAndMedicineCart($passportNum, $medicineCartNum);
            echo json_encode($val);
            return;
        }
        
        if (isset($_POST['recordPatientCheck']))
        {
            $recordDatas = array();
            $recordDatas['datetimepickerZapicDataPriema'] = $_POST['datetimepickerZapicDataPriema'];
            $recordDatas['uslugi'] = $_POST['uslugi'];
            $recordDatas['nachaloPriema'] = $_POST['nachaloPriema'];
            $recordDatas['cost'] = $_POST['cost'];
            $recordDatas['notes'] = $_POST['notes'];
            $recordDatas['addedUserId'] = "1";
            $recordDatas['doctorID'] = $_POST['doctorID'];
            $recordDatas['patientID'] = $_POST['patientID'];
           
            $result = Operator::PatientRecord($recordDatas);
            /*if ($result != NULL)
            {
                header("Location: /operator/register-journal");
            }*/
            echo $result;
            
           
        }
    }

    /**
     * Добавление класс active для меню
     * @param type $name
     */
    public function AddClassActiveForMenu($name)
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');;
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        $uri = explode('/', $uri);
        $lastElemOfArray = array_pop($uri);
        //if ($lastElemOfArray === $name) echo 'active';
        if (preg_match("~^$name$~", $lastElemOfArray)) echo 'active';
    }
    
    
    /**
     * Хранение времени в массив
     * @return type массив
     */
    public static function TimesInArray($period)
    {
        $time = new DateTime();
        $TimesInArray = array();
        for ($i = 8; $i < 18; $i++) {
            for ($j = 0; $j < 60; $j += $period) {
                $time->setTime($i, $j, 00);
                $TimesInArray[$time->format('H:i:s')] = "";
            }
        }
        return $TimesInArray;
    }
    
    /**
     * Выводит ФИО пациента, если с другой страницы был отправлен ID
     */
    public function SetUserDataOnUlIfExists()
    {
        if (isset($_POST['patient_id']))
        {
            $id_patiet = $_POST['patient_id'];
            $patientDatas = array();
            $patientDatas= Patient::getPatientByID($id_patiet);
            $fio = $patientDatas['surname']." ".$patientDatas['name']." ".$patientDatas['patronymic'];
            echo '<ul class="nav navbar-nav pull-right" id="idSelectedPatientFromSearchUl"> 
		<li class="IdPatientFromUlLi"><a href="#" id="idSelectedPatientFromSearch" data-id = "'.$id_patiet.'">'.$fio.'<span class="glyphicon glyphicon-remove" aria-hidden="true" id="removeIdPatientFromUlLi" onclick="RemoveIdPatientFromUlLi()"></span></a></li>
                   </ul>';
        }
    }
    
    /**
     * Возвращает ФИО пациента с помощью ID
     * @param type $id_patiet
     */
    public function getPatientFIOBbyId($id_patiet)
    {
        $patientDatas = array();
        $patientDatas= Patient::getPatientByID($id_patiet);
        $fio = $patientDatas['surname']." ".$patientDatas['name']." ".$patientDatas['patronymic'];
        return $fio;
    }
    
    /**
     * Выбор название услуги с помощью ID
     * @param type $id_uslugi
     */
    public function getUsligiByID($id_uslugi)
    {
        $uslugi = array();
        $uslugi = Operator::getUslugiById($id_uslugi);
        return $uslugi['name'];
    }
    
    public function getDoctorByID($id_doctor)
    {
        $doctor = array();
        $doctor= Operator::getByDoctorID($id_doctor,2);
        $fio = $doctor['surname']." ".$doctor['name']." ".$doctor['patronymic'];
        return $fio;
    }
    
    public function getOperatorByID($id_operator)
    {
        $operator = array();
        $operator= Operator::getByDoctorID($id_operator,3);
        $fio = $operator['surname']." ".$operator['name']." ".$operator['patronymic'];
        return $fio;
    }
}