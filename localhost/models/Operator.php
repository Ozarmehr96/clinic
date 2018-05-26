<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Выборка данных для оператора
 *
 * @author Озармехр
 */
class Operator {
    public function __construct() {
        return TRUE;
    }
    /**
     * Выбор расписания
     * @return Массив
     */
    public static function getSchedule()
    {
        $pdo = Db::getConnection();
        $schedule = array();
        
        $sql = "SELECT id_schedule, date_priema, time_priema, id_doctor, id_pacient, id_uslugi, is_payed, cost, notes "
                . "FROM schedule ORDER BY date_priema ASC, time_priema ASC";
        $result = $pdo->query($sql);
        $i = 0;
        while ($zapic = $result->fetch())
        {
            $schedule[$i]['id_schedule'] = $zapic['id_schedule'];
            $schedule[$i]['date_priema'] = $zapic['date_priema'];
            $schedule[$i]['time_priema'] = $zapic['time_priema'];
            $schedule[$i]['id_doctor'] = $zapic['id_doctor'];
            $schedule[$i]['id_pacient'] = $zapic['id_pacient'];
            $schedule[$i]['id_uslugi'] = $zapic['id_uslugi'];
            $schedule[$i]['is_payed'] = $zapic['is_payed'];
            $schedule[$i]['cost'] = $zapic['cost'];
            $schedule[$i]['notes'] = $zapic['notes'];
            $i++;
        }
        //print_r($schedule);
          return $schedule;
    }
    
    
    /**
     * Изменение записи
     * @param type $id_schedule
     * @param type $receivedArray
     */
    public static function changeSchedule($id_schedule, $receivedArray)
    {
        $pdo = Db::getConnection();
        /*$id_schedule = POST['id_schedule']; 
        $id_schedule = POST['id_schedule']; 
        $id_schedule = POST['id_schedule']; 
        $id_schedule = POST['id_schedule']; 
        $id_schedule = POST['id_schedule']; */
    }
    
    public static function getMaxIDFromPatientTable()
    {
         $connection = Db::getConnection();
        $sql = "SELECT MAX(id_pacient) as maxid FROM patient";
        $singleVal = $connection->query($sql);
        $result =  $singleVal->fetch();
        return intval($result['maxid']);
    }

    /**
     * Метод добавление нового (регистрация) пациента
     * @param type $values
     * @return type поледнюю добавленную id_patient
     */
    public static function addPatient($values)
    {
        $user_type = 1;
        $db = Db::getConnection();
        $sql = "INSERT INTO patient (name, surname, patronymic, sex, date_of_birth, passport_num, phone, patient_card_num,"
                . "invalidnost, adress, social_status, id_citizenship, id_region, email, snils, work_place,"
                . "data_vidachi_pass, inn, type_medical_policy, start_medical_policy, end_medical_policy, Id_insurance_company,"
                . "id_doctor, fixing_date, id_university, id_added_operator, user_type, police_number) "
                . "VALUES (:name,:surname,:patronymic,:sex,:date_of_birth,:passport_num,:phone,:patient_card_num,"
                . ":invalidnost,:adress,:social_status,:id_citizenship,:id_region,:email,:snils,:work_place,"
                . ":data_vidachi_pass, :inn,:type_medical_policy, :start_medical_policy, :end_medical_policy,:Id_insurance_company,"
                . ":id_doctor,:fixing_date,:id_university, :id_added_operator, :user_type,:police_number) "
                . " ON DUPLICATE KEY UPDATE passport_num=passport_num ";
        
        $result = $db->prepare($sql);
        
        $result->bindParam(":name", $values['name']);
        $result->bindParam(":surname", $values['surname']);
        $result->bindParam(":patronymic", $values['patronymic']);
        $result->bindParam(":date_of_birth", $values['date_of_birth']);
        $result->bindParam(":sex", $values['sex']);
        $result->bindParam(":phone", $values['phone']);
        $result->bindParam(":passport_num", $values['passport_num']);
        $result->bindParam(":patient_card_num", $values['patient_card_num']);
        $result->bindParam(":invalidnost", $values['invalidnost']);
        $result->bindParam(":adress", $values['adress']);
        $result->bindParam(":social_status", $values['social_status']);
        $result->bindParam(":id_citizenship", $values['id_citizenship']);
        $result->bindParam(":id_region", $values['id_region']);
        $result->bindParam(":email", $values['email']);
        $result->bindParam(":snils", $values['snils']);
        $result->bindParam(":work_place", $values['work_place']);
        $result->bindParam(":data_vidachi_pass", $values['data_vidachi_pass']);
        $result->bindParam(":inn", $values['inn']);
        $result->bindParam(":type_medical_policy", $values['type_medical_policy']);
        $result->bindParam(":start_medical_policy", $values['start_medical_policy']);
        $result->bindParam(":end_medical_policy", $values['end_medical_policy']);
        $result->bindParam(":Id_insurance_company", $values['Id_insurance_company']);
        $result->bindParam(":id_doctor", $values['id_doctor']);
        $result->bindParam(":fixing_date", $values['fixing_date']);
        $result->bindParam(":police_number", $values['police_number']);
        $result->bindParam(":id_university", $values['id_university']);
        $result->bindParam(":id_added_operator", $values['id_added_operator']);
        $result->bindParam(":user_type", $user_type);
        $result->execute();
        if($result->execute())
        {
            $last_id = $db->lastInsertId();
           return $last_id;
        }
    }
    
    public static function UpdatePatientData($values)
    {
        $connection = Db::getConnection(); 
        $passport = "";
        $data_Vidachi_pass = "";
       if (!preg_match('/patient/', $_SESSION['user_type']))
       {
           $passport = 'passport_num = :passport_num,';
           $data_Vidachi_pass = 'data_vidachi_pass=:data_vidachi_pass,';
       }
       else
       {
           $passport ="";
           $data_Vidachi_pass="";
       }
         $sql = "UPDATE patient SET name = :name, surname=:surname, patronymic=:patronymic, sex=:sex, date_of_birth=:date_of_birth,"
                . " $passport phone = :phone, "
                . " invalidnost=:invalidnost, adress=:adress, social_status=:social_status, id_citizenship=:id_citizenship, "
                . " id_region=:id_region, email=:email, snils=:snils, work_place=:work_place, $data_Vidachi_pass "
                . " inn=:inn, type_medical_policy=:type_medical_policy, start_medical_policy=:start_medical_policy,"
                . " end_medical_policy=:end_medical_policy, Id_insurance_company=:Id_insurance_company,"
                . " id_doctor = :id_doctor, fixing_date = :fixing_date, id_university=:id_university, "
                . " id_added_operator = :id_added_operator,police_number = :police_number "
                . " WHERE id_pacient = :idt";
        
        $result = $connection->prepare($sql);
        
        $result->bindValue(":idt", $values['id_patient']);
        $result->bindValue(":name", $values['name'], PDO::PARAM_STR);
        $result->bindValue(":surname", $values['surname'], PDO::PARAM_STR);
        $result->bindValue(":patronymic", $values['patronymic']);
        $result->bindParam(":date_of_birth", $values['date_of_birth']);
        $result->bindParam(":sex", $values['sex']);
        $result->bindParam(":phone", $values['phone']);
        if (!preg_match('/patient/', $_SESSION['user_type']))
        {
            $result->bindParam(":passport_num", $values['passport_num']);
            $result->bindParam(":data_vidachi_pass", $values['data_vidachi_pass']);
        }
        $result->bindParam(":invalidnost", $values['invalidnost']);
        $result->bindParam(":adress", $values['adress']);
        $result->bindParam(":social_status", $values['social_status']);
        $result->bindParam(":id_citizenship", $values['id_citizenship']);
        $result->bindParam(":id_region", $values['id_region']);
        $result->bindParam(":email", $values['email']);
        $result->bindParam(":snils", $values['snils']);
        $result->bindParam(":work_place", $values['work_place']);
       
        $result->bindParam(":inn", $values['inn']);
        $result->bindParam(":type_medical_policy", $values['type_medical_policy']);
        $result->bindParam(":start_medical_policy", $values['start_medical_policy']);
        $result->bindParam(":end_medical_policy", $values['end_medical_policy']);
        $result->bindParam(":Id_insurance_company", $values['Id_insurance_company']);
        $result->bindParam(":id_doctor", $values['id_doctor']);
        $result->bindParam(":id_doctor", $values['id_doctor']);
        $result->bindParam(":fixing_date", $values['fixing_date']);
        $result->bindParam(":police_number", $values['police_number']);
        $result->bindParam(":id_university", $values['id_university']);
        $result->bindParam(":id_added_operator", $values['id_added_operator']);
        $result->execute();
        return $result->rowCount();
       
    }
    
    /**
     * Удаление пациента
     * @param type $patient_id
     * @return type
     */
    public static function RemovePatientById($patient_id)
    {
        $connection = Db::getConnection();
        $sql = "DELETE FROM patient WHERE id_pacient = :id_patient";
        $result = $connection->prepare($sql);
        $result->bindParam(":id_patient",$patient_id);
        $result->execute();
        if ($result->execute())
        {
            return $result->rowCount();
        }
    }

    /**
     *  Выбор специалиста и назвагте специальности
     * @return type массив
     */
    public static function getDoctorsOfficces()
    {
       $connection = Db::getConnection();
        $sql = "SELECT specialities.id_special, patient.id_pacient, patient.name, patient.surname, patient.patronymic, specialities.title "
                . " FROM patient "
                . " JOIN doctor ON patient.id_pacient = doctor.id_doctor "
                . " JOIN specialities ON specialities.id_special = doctor.id_special "
                . " ORDER BY id_special";
        $result = $connection->query($sql);
        $i = 0;
        $values = array();
        while ($row = $result->fetch()) {
            $values[$i]['id_special'] = $row['id_special'];
            $values[$i]['id_pacient'] = $row['id_pacient'];
            $values[$i]['name'] = $row['name'];
            $values[$i]['surname'] = $row['surname'];
            $values[$i]['patronymic'] = $row['patronymic'];
            $values[$i]['title'] = $row['title'];
            $i++;
        }
        return $values;
    }

    /**
     * Выбор расписание врача, когда пользовател выбирает дату и указывает специалиста
     * @param type $id_doctor id доктора
     * @param type $date дата приема
     * @return type массив
     */
    public static function getDoctorSchedule($id_doctor, $date) {
        $connection = Db::getConnection();

        $sql = "SELECT name, surname, patronymic, time_priema, date_priema, notes, schedule.id_pacient, schedule.id_doctor,schedule.id_schedule "
                . " FROM schedule JOIN patient "
                . " ON patient.id_pacient = schedule.id_pacient"
                . " WHERE date_priema = :date_priema and schedule.id_doctor = :id_doctor ORDER BY time_priema";
        $result = $connection->prepare($sql);
        $result->bindValue(":id_doctor", $id_doctor);
        $result->bindValue(":date_priema", $date);
        $result->execute();

        $i = 0;
        $values = array();
        while ($row = $result->fetch()) {
            $values[$i]['id_schedule'] = $row['id_schedule'];
            $values[$i]['time_priema'] = $row['time_priema'];
            $values[$i]['date_priema'] = $row['date_priema'];
            $values[$i]['notes'] = $row['notes'];
            $values[$i]['id_pacient'] = $row['id_pacient'];
            $values[$i]['id_doctor'] = $row['id_doctor'];
            $values[$i]['name'] = $row['name'];
            $values[$i]['surname'] = $row['surname'];
            $values[$i]['patronymic'] = $row['patronymic'];
            $i++;
        }
        return $values;
    }
    
    /**
     *  Получение расписании определенного доктора
     * @param type $id_doctor
     * @return type
     */
    public static function getScheduleOfDoctorByIDInBD ($id_doctor)
    {
        $connection = Db::getConnection();
        $sql = "SELECT schedule FROM doctor WHERE id_doctor = $id_doctor";
        $result = $connection->query($sql);
        $result->execute();
        
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUslugi() {
        $connection = Db::getConnection();
        $sql = "SELECT id,name,status FROM uslugi WHERE status = '1'";
        $result = $connection->query($sql);
        $i = 0;
        $values = array();
        while ($row = $result->fetch()) {

            $values[$i]['id'] = $row['id'];
            $values[$i]['name'] = $row['name'];
            $i++;
        }
        return $values;
    }
    
    
    /**
     * Перед записью пациента проверяет, не записал ли пациент в указанный день и время
     * @param type $articul
     * @return type количество затронутных строк
     */
    public static function CheckIsNotRecordedPatientBeforeInsert($articul)
    {
        $connection = Db::getConnection();
        $sql1 = "SELECT * FROM schedule WHERE articul = :articul";
        $result1 = $connection->prepare($sql1);
        $result1->bindParam(":articul",$articul);
        $result1->execute();
        $count = $result1->rowCount();
        if ($count == null) {
            return '0';
        } else {
            return $count;
        }
    }
    
    /**
     * Перед записью пациента проверяет, свободен ли доктор в указанный день и время
     * @param type $values
     * @return type количество затронутных строк
     */
    public static function CheckIsFreeDoctorBeforeRecordPatient($date,$time,$doctorID)
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM schedule WHERE date_priema = :date_priema and time_priema =  :time_priema and id_doctor = :id_doctor";
        $result = $connection->prepare($sql);
        $result->bindParam(":date_priema", $date);
        $result->bindParam(":time_priema", $time);
        $result->bindParam(":id_doctor", $doctorID);
        $result->execute();
        $count = $result->rowCount();
        if ($count == null) {
            return '0';
        } else {
            return $count;
        }
    }

    /**
     *  Запись пациента на прием
     * @param type $values
     * @return string
     */
    public static function PatientRecord($values) {
        $connection = Db::getConnection();
        $sql1 = "SELECT * FROM schedule WHERE date_priema = :date_priema and time_priema =  :time_priema and id_doctor = :id_doctor";
        $result1 = $connection->prepare($sql1);
        $result1->bindParam(":date_priema", $values['datetimepickerZapicDataPriema']);
        $result1->bindParam(":time_priema", $values['nachaloPriema']);
        $result1->bindParam(":id_doctor", $values['doctorID']);
        $result1->execute();
        $count = $result1->rowCount();
        if ($count == 0) {
            $sql = "INSERT INTO schedule (id_add_user, date_priema,time_priema, id_doctor, id_pacient,id_uslugi, cost, notes, articul) "
                    . "VALUES (:id_add_user, :date_priema, :time_priema, :id_doctor, :id_pacient, :id_uslugi, :cost, :notes, :articul) "
                    . " ON DUPLICATE KEY UPDATE articul=articul";

            $result = $connection->prepare($sql);

            $result->bindParam(":id_add_user", $values['addedUserId']);
            $result->bindParam(":date_priema", $values['datetimepickerZapicDataPriema']);
            $result->bindParam(":time_priema", $values['nachaloPriema']);
            $result->bindParam(":id_doctor", $values['doctorID']);
            $result->bindParam(":id_pacient", $values['patientID']);
            $result->bindParam(":id_uslugi", $values['uslugi']);
            $result->bindParam(":cost", $values['cost']);
            $result->bindParam(":notes", $values['notes']);
            $result->bindParam(":articul", $values['articul']);
            $result->execute();
            if ($result->execute()) {
                $last_id = $connection->lastInsertId();
                return $last_id;
            }
        } else {
            return "Доктор занят в это время!";
        }
    }

    /**
     * Выбор услуги с помощь ID
     * @param type $id
     * @return type
     */
    public static function getUslugiById($id)
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM uslugi where id = :id ";
        
        $result = $connection->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        if ($result->execute())
        {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    
    /**
     *  Выбор пациента с помощью ID
     * @param type $userID пользователь
     * @param type $user_type_id
     * @return type массив
     */
    public static function getByDoctorID($userID,$user_type_id)
    {
        
        $connection = Db::getConnection();
        $sql = "SELECT * FROM patient JOIN user_type ON user_type.id = patient.user_type "
                . "where user_type.id = :user_type_id and patient.id_pacient = :doctor_id";
        $result = $connection->prepare($sql);
        $result->bindParam(":user_type_id",$user_type_id); // 2 это доктор
        $result->bindParam(":doctor_id", $userID);
        $result->execute();
        if ($result->execute())
        {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    /**
     * Метод удаления записи с помощью ID
     * @param type $id_schedule
     * @return type
     */
    public static function RemoveZapisById($id_schedule)
    {
        $connection = Db::getConnection();
        $sql = "DELETE FROM schedule WHERE id_schedule = :id_schedule";
        $result = $connection->prepare($sql);
        $result->bindParam(":id_schedule", $id_schedule);
        $result->execute();
        if ($result->execute())
        {
            return $result->rowCount();
        }
    }
    
    /**
     * Метод для получения данных пользоваеля
     * И получение данных о конкретном пользователе в таблице записанных
     * @param type $patientid
     * @param type $schedule_id
     * @return type массив данных
     */
    public static function getPatientDatasAndDatasInSchedule($patientid,$schedule_id)
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM patient "
                . " JOIN schedule ON schedule.id_pacient = patient.id_pacient "
                . " where schedule.id_schedule= :id_schedule and patient.id_pacient = :id_pacient";
        $result = $connection->prepare($sql);
        $result->bindParam(":id_schedule",$schedule_id); 
        $result->bindParam(":id_pacient", $patientid);
        $result->execute();
        if ($result->execute())
        {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    /**
     * Метод для поиска пользователя с помощью указанного параметра
     * @param string $param номер пасспорта либо номер мед карты
     * @param type $val 
     * @return type кличество затронутых строк
     */
    public static function SearchUserByParamsReturnRowCount($dbname,$param, $val)
    {
        $connection = Db::getConnection();
        $param = $param;
        $dbname = $dbname;
        $sql = "SELECT * FROM $dbname WHERE $param = :param";
        $result = $connection->prepare($sql);
        $result->bindParam(":param", $val);
        $result->execute();
        if ($result->execute())
        {
            return $result->rowCount();
        }
    }
    
    public function getScheduleByID($schedule_id)
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM schedule JOIN doctor ON schedule.id_doctor = doctor.id_doctor "
                . " WHERE id_schedule = :id_schedule ";
        $result = $connection->prepare($sql);
        $result->bindParam(":id_schedule",$schedule_id); 
        $result->execute();
        if ($result->execute())
        {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    
    /**
     *  Метод для заполнения выпадающего списка данными
     * @param type $tableName таблица
     * @param type $title название
     * @param type $id id
     * @return type массив данных
     */
    public static function getDatasForFillSelectOptions($tableName, $title,$id)
    {
        $connection = Db::getConnection();
        $sql = "SELECT $id, $title FROM $tableName WHERE status = 1";
        $result = $connection->query($sql);
        $i = 0;
        $values = array();
        while ($row = $result->fetch()) {
            $values[$i]['id'] = $row[$id];
            $values[$i]['title'] = $row[$title];
            $i++;
        }
        return $values;
    }
    
    /**
     * Метод выбора специалиста(доктора) с помощью ID
     * @param type $specialityID
     * @return string
     */
    public static function getDoctorsBySpeciality($specialityID)
    {
        $connection = Db::getConnection();
        $sql = "SELECT doctor.id_doctor, patient.name, patient.surname, patient.patronymic FROM doctor"
                . " JOIN patient ON doctor.id_doctor = patient.id_pacient "
                . " WHERE doctor.id_special = $specialityID";
        $result = $connection->query($sql);
        $i = 0;
        $values = array();
        while ($row = $result->fetch()) {
            $values[$i]['id_doctor'] = $row['id_doctor'];
            $values[$i]['fio'] = $row['surname']." ".$row['name']." ".$row['patronymic'];
            $i++;
        }
        return $values;
    }
    
    
    /**
     * Получение списка докторов
     * @return string массив
     */
    public static function getDoctors()
    {
        $connection = Db::getConnection();
        $sql = "SELECT doctor.id_doctor, name, surname, patronymic FROM doctor "
                . " JOIN patient ON doctor.id_doctor = patient.id_pacient "
                . " ORDER BY surname ASC, name ASC, patronymic ASC";
        $result = $connection->query($sql);
        $i = 0;
        $values = array();
        while ($row = $result->fetch()) {
            $values[$i]['id_doctor'] = $row['id_doctor'];
            $values[$i]['fio'] = $row['surname']." ".$row['name']." ".$row['patronymic'];
            $i++;
        }
        return $values;
    }

    /**
     * Метод для проверки записал ли пациент или же свободен ли доктор 
     * Используется перед редактированием записи
     * Указывается дата,id доктора и id пациента, берется где,  не сущетствует id пациента
     * @param type $date дата
     * @param type $time время
     * @param type $doctorID ID доктора
     * @param type $patientID ID пациента
     * @return type количетсво затронутых строк
     */
    public static function CheckIsDoctorFreeBeforeUpdateRecordedPatient($date,$time,$doctorID,$patientID)
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM schedule WHERE date_priema = :date_priema and time_priema = :time_priema and "
                . " id_doctor = :id_doctor AND id_pacient <> :id_pacient";
        $result = $connection->prepare($sql);
        $result->bindParam(":date_priema", $date);
        $result->bindParam(":time_priema", $time);
        $result->bindParam(":id_doctor", $doctorID);
        $result->bindParam(":id_pacient", $patientID);
        $result->execute();
        $count = $result->rowCount();
        return $count;
    }
    
    /**
     *  Проверяем, записан ли человек в указанное дата и время в этот день
     * @param type $date
     * @param type $time
     * @param type $doctorID
     * @param type $patientID
     * @return type
     */
    public static function CheckIsPatientNotFreeBeforeUpdateRecordedPatient($date, $time, $doctorID, $patientID) 
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM schedule WHERE date_priema = :date_priema and time_priema = :time_priema and "
                . " id_doctor = :id_doctor AND id_pacient = :id_pacient";
        $result = $connection->prepare($sql);
        $result->bindParam(":date_priema", $date);
        $result->bindParam(":time_priema", $time);
        $result->bindParam(":id_doctor", $doctorID);
        $result->bindParam(":id_pacient", $patientID);
        $result->execute();
        $count = $result->rowCount();
        return $count;
    }
    
    public static function UpdateRecordOfPatient($values)
    {
        $connection = Db::getConnection();
        $SQL = "UPDATE schedule SET "
                 . "date_priema = :date_priema, time_priema = :time_priema, id_doctor = :id_doctor, id_uslugi = :id_uslugi, "
                 . "cost = :cost, articul = :articul, id_add_user = :id_add_user, notes = :notes "
                 . "WHERE id_schedule = :id_schedule ";
        $result = $connection->prepare($SQL);
        $result->bindParam(":id_add_user", $values['addedUserId']);
        $result->bindParam(":date_priema", $values['updatedatetimepickerZapicDataPriema']);
        $result->bindParam(":time_priema", $values['updatenachaloPriema']);
        $result->bindParam(":id_doctor", $values['update-doctorID']);
        $result->bindParam(":id_uslugi", $values['uslugi']);
        $result->bindParam(":cost", $values['updatecost']);
        $result->bindParam(":notes", $values['update-notes']);
        $result->bindParam(":articul", $values['update-articul']);
        $result->bindParam(":id_schedule", $values['scheduleID']);
        $result->execute();
        $count = $result->rowCount();
        return $count;
    }
    
    /**
     * Получение расписание докторов
     * @return type
     */
    public static function getDoctorsSchele()
    {
         $connection = Db::getConnection();
         $SQL = "SELECT name, surname, patronymic, specialities.title, doctor.id_doctor, doctor.cabinet, doctor.id_special, doctor.schedule FROM doctor "
                 . " JOIN patient ON doctor.id_doctor = patient.id_pacient "
                 . " JOIN specialities ON doctor.id_special = specialities.id_special "
                 . " ORDER By title";
        $result = $connection->query($SQL);
        $i = 0;
        $values = array();
        while ($row = $result->fetch()) {
            $values[$i]['schedule'] = $row['schedule'];
            $values[$i]['fio'] = $row['surname']." ".$row['name']." ".$row['patronymic'];
            $values[$i]['title'] = $row['title'];
            $values[$i]['id_doctor'] = $row['id_doctor'];
            $values[$i]['cabinet'] = $row['cabinet'];
            $values[$i]['id_special'] = $row['id_special'];
            $i++;
        }
        return $values;
    }
    
    public static function getDoctorDatasByID($doctorID)
    {
        $connection = Db::getConnection();
         $SQL = "SELECT name, surname, patronymic, specialities.title, doctor.id_doctor, doctor.cabinet, doctor.id_special, doctor.schedule FROM doctor "
                 . " JOIN patient ON doctor.id_doctor = patient.id_pacient "
                 . " JOIN specialities ON doctor.id_special = specialities.id_special "
                 . " WHERE doctor.id_doctor = :id_doctor";
        $result = $connection->prepare($SQL);
        $result->bindParam(":id_doctor", $doctorID);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);

    }
    
    /**
     * После генерации пароля проверяем, ну сеществует ли такой пароль в БД
     * @param type $passwd
     * @return type
     */
    public static function CheckIsExistsPasswd($passwd)
    {
        $connection = Db::getConnection();
        $SQL = "SELECT id_pacient FRom patient WHERE password = '$passwd' ";
        $result = $connection->query($SQL);
        $result->execute();
        return $result->rowCount();
    }
    
    /**
     * Редактирование пароля пользователя
     * @param type $pass пароль
     * @param type $id id_пользователя
     * @return type количество затронутых строк
     */
    public static function UpdateUserPass($pass,$id)
    {
        $connection = Db::getConnection();
        $SQL = "UPDATE patient SET password = '$pass' WHERE id_pacient = '$id' ";
        $result = $connection->query($SQL);
        $result->execute();
        return $result->rowCount();
    }
}
/*
 * 
        
 */
/*$optionsValues = Operator::getDatasForFillSelectOptions($dbname,$title,$id);
        foreach ($optionsValues as $key => $val)
        {
           echo '<option value="'.$val['id'].'">'.$val['title'].'</option>';
        }*/
/*
 * <ul class="nav nav-pills nav-stacked office">
				<?php $previousID= null; $previousFIO = null; $i = 0; foreach ($officces as $key=>$val):?>
                                            
				<?php  $i++; $index = $i; $fio = $val['name']." ".$val['surname']." ".$val['patronymic'];?>
                                            
                                            <li class="active" data-toggle="collapse" data-target="#demo<?php echo $index; ?>">
					<a href="#">
						<?php echo $val['title']; ?>
					</a>
				</li>
                                            <li>
					<ul class="nav menu-second-level collapse" id="demo<?php echo $index; ?>">
                                                    
						<li class="doctor-pills-name" data-id="<?php echo$val['id']; ?>" onclick="ShowDoctorSchedule(this)">
							<a>
								<?php echo $val['name']." ".$val['surname']." ".$val['patronymic']; ?>
							</a>
						</li>
                                                                    <?php if ($val['id_special'] == $previousID):?>
                                                                        <li class="doctor-pills-name" data-id="<?php echo $previousID; ?>" onclick="ShowDoctorSchedule(this)">
							<a>
								<?php echo $previousFIO; ?>
							</a>
                                                                        </li>
                                                                    <?php $key = $key+1 ; endif;?>
					</ul>
				</li>
                                            <?php $previousID = $val['id_special'];  $previousFIO = $fio;?>
                                             
                                            <?php endforeach; ?>
			</ul>
 */

/* if (array_key_exists($keyofTimes, $arrayOf))
                    {
                        echo '<option value="">'.$keyofTimes.'</option>';
                    }*/