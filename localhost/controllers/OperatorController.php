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
        
        if(isset($_POST['removeScheduleById']))
        {
            $schedule_id = $_POST['schedule_id'];
            $result = Operator::RemoveZapisById($schedule_id);
            if ($result != NULL)
            {
                return $result;
            }
            return;
        }
        require_once ROOT.'/views/operator/schedule.php';
        //echo '<script>OpenWarningModal("Ошибка", "Доктор уже занят в указанное время");</script>';
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
                header("Location: /operator/patients");
                exit();
            }
        }
        
        foreach ($values as $key => $val) {
           echo $key." -> ".$val."<br>";
        }
    }
    
    /**
     * Метод удалениепациента
     */
    public function actionRemovePatient()
    {
        $patient_id = "";
        if (isset($_POST['removepatient']))
        {
            $patient_id = $_POST['id'];
            $result = Operator::RemovePatientById($patient_id);
            if ($result != NULL)
            {
                 header("Location: /operator/patients");
                exit();
            }
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
                 header("Location: /operator/patients");
                exit();
            }
            else
            {
                echo "Что-то пошло не так. <br> Результат запроса: ".$result;
            }
            
        }
        return TRUE;
    }
    
    public function actionPatients()
    {
        if(isset($_POST['getMaxPatientId']))
        {
            $maxIdFromPatientTable = Operator::getMaxIDFromPatientTable();
            echo $maxIdFromPatientTable;
            return;
        }
        if(isset($_POST['id']))
        {
            $patient_id = $_POST['id'];
            $patient = array();
            $patient = Patient::getPatientByID($patient_id);
            echo json_encode($patient);
            return;
        }
        /**
         *  Поиск пациентов
         */
        if(isset($_POST['search']))
        {
            $values = array();
            $values['name'] = htmlspecialchars($_POST['name']);
            $values['surname'] = htmlspecialchars($_POST['surname']);
            $values['patronymic'] = htmlspecialchars($_POST['patronymic']);
            $values['date_of_birth'] = htmlspecialchars($_POST['date_of_birth']);
            $values['passport_num'] = htmlspecialchars($_POST['passport_num']);
            $values['police_number'] = htmlspecialchars($_POST['police_number']);
            $values['patient_card_num'] = htmlspecialchars($_POST['patient_card_num']);
            
            $searchResult = array();
            $searchResult = Patient::SearchByTags($values);
            $i = 0;
           $name = "";
            foreach ($searchResult as $val)
            {
                $i++;
                $surname = $val['surname'];
                $patronymic = $val['patronymic'];
                $fio = $val['surname']." ". $val['name']." ".$val['patronymic'];
                echo '<tr data-id="'.$val['id_pacient'].'" data-zapicat="true" class="open-modal-pacient-data pacientSearchTable" onclick="ShowUserDatasOnModal(this)">'
                        . '<td>'.$i.'</td>'
                        . '<td class="pacientFIO" id="pacientFIO" nowrap>'.$fio.'</td>'
                        . '<td>'.Patient::ConvertToSex($val['sex']).'</td>'
                        . '<td>'.$val['date_of_birth'].'</td>'
                        
                        . '<td>'.$val['passport_num'].'</td>'
                        . '<td>'.$val['police_number'].'</td>'
                        . '<td>'.$val['patient_card_num'].'</td>'
                        . '</tr>';
            }
            //echo json_encode($teg);
            return;
        }
        
        if (isset($_POST['seachByParams']))
        {
            $val = $_POST['val'];
            $param = $_POST['param'];
            $db = $_POST['db'];
            //$param = 'passport_num';
            $result = Operator::SearchUserByParamsReturnRowCount($db,$param, $val);
            echo $result;
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
    
    /**
     *  Запись пациента
     */
    public function actionRegisterJournalRecord()
    {
        /**
         *  Проверяем, свободен ли доктор в указанное время
         */
        if (isset($_POST['seachisfreedoctor']))
        {
            $date = $_POST['date'];
            $time = $_POST['time'];
            $doctorID = $_POST['iddoctor'];
            $result = Operator::CheckIsFreeDoctorBeforeRecordPatient($date,$time,$doctorID);
            if($result != NULL)
            {
                echo $result;
                exit();
            }
            return;
 
        }
        /**
         * Метод проверяет, не записан ли пациент или же 
         * не записывается ли повторно к одному и тому же доктору в одно время
         */
        if (isset($_POST['checkisnotrecordedpatient'])) {
            $articul = $_POST['articul'];
            $result = Operator::CheckIsNotRecordedPatientBeforeInsert($articul);
            if ($result != NULL) {
                echo $result;
                exit();
            }
            return;
        }
        
        /**
         * Метод выбора пациента с помощью пасспорта или номер мед.карты
         */
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
            $recordDatas['articul'] = $_POST['articul'];
           
            $result = Operator::PatientRecord($recordDatas);
           if ($result != NULL)
            {
                header("Location: /operator/register-journal");
                exit();
            }
            return true;
         /*foreach ($recordDatas as $key=>$value)
         {
             echo $key."=>".$value."<br>";
         }*/
            
           
        }
    }
    
    public function actionRegisterJournalRecordUpdate()
    {
        if (isset($_POST['getScheduleById']))
        {
            $scheduleID = $_POST['scheduleID'];
            $scheduleGet = Operator::getScheduleByID($scheduleID);
            echo json_encode($scheduleGet);
            return;
        }
        
        if (isset($_POST['fillDoctorBySpeciality'])) {
            $special_id = $_POST['speciality_id'];
            echo $this->FillSelectionOptiontWithDoctorBySpeciality($special_id);
            return;
        }
        
        if (isset($_POST['filldoctorwithtimes'])) 
        {
            $date = $_POST['date'];
            $doctorId = $_POST['id_doctor'];
            //echo $this->FillSelectOptionsWithDoctorTimeWork($doctorId, $date);
            echo $this->FillSelectOptionsWithDoctorTimeWork($doctorId, $date);
            return;
        }
        
        
        if (isset($_POST['checkisfreedoctorupdate'])) 
        {
            $date = $_POST['date'];
            $time = $_POST['time'];
            $doctorID = $_POST['iddoctor'];
            $patientID = $_POST['idpatient'];
            $result = Operator::CheckIsDoctorFreeBeforeUpdateRecordedPatient($date, $time, $doctorID, $patientID);
           //$result2 = Operator::CheckIsPatientNotFreeBeforeUpdateRecordedPatient($date, $time, $doctorID, $patientID);
            echo $result;
            return;
        }
        
        if (isset($_POST['updateRecordedPat']))
        {
            $recordUpdateDatas = array();
            $recordUpdateDatas['updatedatetimepickerZapicDataPriema'] = $_POST['updatedatetimepickerZapicDataPriema'];
            $recordUpdateDatas['uslugi'] = $_POST['uslugi'];
            $recordUpdateDatas['updatenachaloPriema'] = $_POST['updatenachaloPriema'];
            $recordUpdateDatas['updatecost'] = $_POST['updatecost'];
            $recordUpdateDatas['update-notes'] = $_POST['update-notes'];
            $recordUpdateDatas['addedUserId'] = "1";
            $recordUpdateDatas['update-doctorID'] = $_POST['update-doctorID'];
            $recordUpdateDatas['update-articul'] = $_POST['update-articul'];
            $recordUpdateDatas['scheduleID'] = $_POST['scheduleID'];
           
            $result = Operator::UpdateRecordOfPatient($recordUpdateDatas);
           if ($result != NULL)
            {
                header("Location: /operator");
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
        $string = preg_replace('/\s+/', '', $name); // Убираем все пробелы
        if (preg_match("~^$string~", $lastElemOfArray)) echo 'active';
        
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
    
    /**
     * Метод заполнения выпадающего списка данными
     * Вызавается метод таким образом Название класса::Название метода() OperatorController::FullSelectOptions($dbname,$title,$id)
     * @param type $dbname
     * @param type $title
     * @param type $id
     */
    public static function FullSelectOptions($dbname,$title,$id)
    {
        $optionsValues = Operator::getDatasForFillSelectOptions($dbname,$title,$id);
        //echo '<option value="">Не выбрано</option>';
        foreach ($optionsValues as $key => $val)
        {
           echo '<option value="'.$val['id'].'">'.$val['title'].'</option>';
        } 
    }
    
    /**
     * Метод заполнения выпадающего списка 
     * Выбираются доктора в зависимости от специализации
     * @param type $specialID id специализаци
     */
    public static function FillSelectionOptiontWithDoctorBySpeciality($specialID)
    {
        $optionsValues = Operator::getDoctorsBySpeciality($specialID);
        echo '<option value="">Не выбрано</option>';
        foreach ($optionsValues as $key => $val)
        {
           //$speciality_id = 'data-speciality_id="'.$val['id_special'].'"';
           echo '<option value="'.$val['id_doctor'].'">'.$val['fio'].'</option>';
        } 
    }
    
    
    public static function FillSelectOptionsWithDoctorTimeWork($id_doctor,$date)
    {
        $doctorDatas = array();
        $doctorDatas = Operator::getDoctorSchedule($id_doctor, $date);
        $TimesInArray = OperatorController::TimesInArray(15);
        if ($doctorDatas == NULL) {
            echo '<option value="">Не выбрано</option>';
            for ($i = 8; $i < 18; $i++) {
                for ($j = 0; $j < 60; $j += 15) {
                    $time = new DateTime();
                    $time->setTime($i, $j, 00);
                    echo '<option>' . $time->format('H:i:s') . '</option>';
                }
            }
        } else {
            echo '<option value="">Не выбрано</option>';
            foreach ($TimesInArray as $keyofTimes => $valOfTimes) {
                $arrayOf = array();
                foreach ($doctorDatas as $valofDoctorSchedule) {
                    // если тек. время == время записи пациента
                    if ($valofDoctorSchedule['time_priema'] == $keyofTimes) { // Если есть запись и время приема != тек.время в массиве
                        $arrayOf[$keyofTimes] = ""; // создадим массив для хранения времени когда он занят
                    } else {
                        continue;
                    }
                }
                
                if (!array_key_exists($keyofTimes, $arrayOf)) { // если не занят то выводим, то есть если индекс $TimesInArray!= индекс $arrayOf
                    echo '<option>' . $keyofTimes . '</option>';
                }
            }
        }
        return TRUE;
    }

}