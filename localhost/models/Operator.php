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
        
        $sql = "SELECT id_schedule, date_priema, time_priema, id_doctor, id_pacient, id_uslugi, is_payed, cost, notes FROM schedule";
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
    
    /**
     * Метод добавление нового (регистрация) пациента
     * @param type $values
     * @return type поледнюю добавленную id_patient
     */
    public static function addPatient($values)
    {
        
        $db = Db::getConnection();
        $sql = "INSERT INTO patient (name, surname, patronymic, sex, date_of_birth, passport_num, phone, patient_card_num,"
                . "invalidnost, adress, social_status, id_citizenship, id_region, email, snils, work_place,"
                . "data_vidachi_pass, inn, type_medical_policy, start_medical_policy, end_medical_policy, Id_insurance_company,"
                . "id_doctor, fixing_date, id_university, id_added_operator) "
                . "VALUES (:name,:surname,:patronymic,:sex,:date_of_birth,:passport_num,:phone,:patient_card_num,"
                . ":invalidnost,:adress,:social_status,:id_citizenship,:id_region,:email,:snils,:work_place,"
                . ":data_vidachi_pass, :inn,:type_medical_policy, :start_medical_policy, :end_medical_policy,:Id_insurance_company,"
                . ":id_doctor,:fixing_date,:id_university, :id_added_operator)";
        
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
        $result->bindParam(":id_university", $values['id_university']);
        $result->bindParam(":id_added_operator", $values['id_added_operator']);
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
        
         $sql = "UPDATE patient SET name = :name, surname=:surname, patronymic=:patronymic, sex=:sex, date_of_birth=:date_of_birth,"
                . " passport_num = :passport_num, phone = :phone, patient_card_num = :patient_card_num, "
                . " invalidnost=:invalidnost, adress=:adress, social_status=:social_status, id_citizenship=:id_citizenship, "
                . " id_region=:id_region, email=:email, snils=:snils, work_place=:work_place, data_vidachi_pass=:data_vidachi_pass,"
                . " inn=:inn, type_medical_policy=:type_medical_policy, start_medical_policy=:start_medical_policy,"
                . " end_medical_policy=:end_medical_policy, Id_insurance_company=:Id_insurance_company,"
                . " id_doctor = :id_doctor, fixing_date = :fixing_date, id_university=:id_university, id_added_operator = :id_added_operator "
                . " WHERE id_pacient = :idt";
        
        $result = $connection->prepare($sql);
        
        $result->bindValue(":idt", $values['id_patient']);
        $result->bindValue(":name", $values['name'], PDO::PARAM_STR);
        $result->bindValue(":surname", $values['surname'], PDO::PARAM_STR);
        $result->bindValue(":patronymic", $values['patronymic']);
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
        $result->bindParam(":id_university", $values['id_university']);
        $result->bindParam(":id_added_operator", $values['id_added_operator']);
        $result->execute();
        return $result->rowCount();
       
    }
    
     /**
     *  Выбор специалиста и назвагте специальности
     * @return type массив
     */
    public static function getDoctorsOfficces()
    {
       $connection = Db::getConnection();
        $sql = "SELECT specialities.id_special, employee.id, employee.name, employee.surname, employee.patronymic, specialities.title FROM employee JOIN specialities ON specialities.id_special = employee.id_special";
        $result = $connection->query($sql);
        $i = 0;
        $values = array();
        while ($row = $result->fetch()) {
            $values[$i]['id_special'] = $row['id_special'];
            $values[$i]['id'] = $row['id'];
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

        $sql = "SELECT name, surname, patronymic, time_priema, date_priema, notes, schedule.id_pacient FROM schedule JOIN patient "
                . "ON patient.id_pacient = schedule.id_pacient WHERE date_priema = :date_priema and schedule.id_doctor = :id_doctor ORDER BY time_priema";
        // $sql = "SELECT time_priema,date_priema,notes,id_pacient FROM schedule "
        //        . "WHERE date_priema = :date_priema and id_doctor = :id_doctor ORDER BY time_priema";
        $result = $connection->prepare($sql);
        $result->bindValue(":id_doctor", $id_doctor);
        $result->bindValue(":date_priema", $date);
        $result->execute();

        $i = 0;
        $values = array();
        while ($row = $result->fetch()) {
            $values[$i]['time_priema'] = $row['time_priema'];
            $values[$i]['date_priema'] = $row['date_priema'];
            $values[$i]['notes'] = $row['notes'];
            $values[$i]['id_pacient'] = $row['id_pacient'];
            $values[$i]['name'] = $row['name'];
            $values[$i]['surname'] = $row['surname'];
            $values[$i]['patronymic'] = $row['patronymic'];
            $i++;
        }
        return $values;
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
            $sql = "INSERT INTO schedule (id_add_user, date_priema,time_priema, id_doctor, id_pacient,id_uslugi, cost, notes) "
                    . "VALUES (:id_add_user, :date_priema, :time_priema, :id_doctor, :id_pacient, :id_uslugi, :cost, :notes)";

            $result = $connection->prepare($sql);

            $result->bindParam(":id_add_user", $values['addedUserId']);
            $result->bindParam(":date_priema", $values['datetimepickerZapicDataPriema']);
            $result->bindParam(":time_priema", $values['nachaloPriema']);
            $result->bindParam(":id_doctor", $values['doctorID']);
            $result->bindParam(":id_pacient", $values['doctorID']);
            $result->bindParam(":id_uslugi", $values['uslugi']);
            $result->bindParam(":cost", $values['cost']);
            $result->bindParam(":notes", $values['notes']);
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
    
    public static function getByDoctorID($id_doctor,$user_type_id)
    {
        
        $connection = Db::getConnection();
        $sql = "SELECT * FROM patient JOIN user_type ON user_type.id = patient.user_type "
                . "where user_type.id = :user_type_id and patient.id_pacient = :doctor_id";
        $result = $connection->prepare($sql);
        $result->bindParam(":user_type_id",$user_type_id); // 2 это доктор
        $result->bindParam(":doctor_id", $id_doctor);
        $result->execute();
        if ($result->execute())
        {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }
}