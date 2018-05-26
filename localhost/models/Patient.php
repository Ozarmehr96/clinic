<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Patient
 *
 * @author Озармехр
 */
class Patient {
    public function __construct() {
        return TRUE;
    }
    
    public static function getPatientByID($id_patiet)
    {
        $connection = Db::getConnection();
        $arr= array();
        $sql = "SELECT count(*), id_pacient, name, surname, patronymic, sex, date_of_birth, passport_num, phone, patient_card_num,"
                . "invalidnost, adress, social_status, id_citizenship, id_region, email, snils, work_place,"
                . "data_vidachi_pass, inn, type_medical_policy, start_medical_policy, end_medical_policy, Id_insurance_company,"
                . "id_doctor, fixing_date, id_university,police_number FROM patient WHERE id_pacient = :id";

        $result = $connection->prepare($sql);
        $result->bindParam(":id", $id_patiet);
        $result->execute();
        
        return $result->fetch(PDO::FETCH_ASSOC);
        //return $arr;
    }
    
    public static function getPatientByPassportAndMedicineCart($passport, $medicineCartNum)
    {
        $connection = Db::getConnection();
        $sql = "SELECT*FROM patient WHERE police_number = :passport_num OR patient_card_num = :patient_card_num";
        $result = $connection->prepare($sql);
        $result->bindParam(":passport_num", $passport);
        $result->bindParam(":patient_card_num", $medicineCartNum);
        $result->execute();
        
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Поск пациентов
     * @param type $values
     * @return type массив
     */
    public static function SearchByTags($values)
    {
        $connection = Db::getConnection();
        $patientsList = array();
        $name  = $values['name'];
        $surname = $values['surname'];
        $patronymic = $values['patronymic'];
        $date_of_birth = $values['date_of_birth'];
        $passport_num = $values['passport_num'];
        $police_number = $values['police_number'];
        $patient_card_num =  $values['patient_card_num'];
        $user_type = 1;
        
        $sql = "SELECT id_pacient, name, sex, surname, patronymic, date_of_birth, police_number,passport_num,patient_card_num FROM patient WHERE user_type = $user_type and name LIKE '%$name%'"
                . " OR user_type = $user_type and surname LIKE '%$surname%' OR user_type = $user_type and patronymic LIKE '%$patronymic%'  OR user_type = $user_type and date_of_birth "
                . "LIKE '%$date_of_birth%' OR user_type = $user_type and police_number = '$police_number' OR passport_num='$passport_num' OR user_type = $user_type and patient_card_num=$patient_card_num ";
        $result = $connection->query($sql);
        $i = 0;
        while ($row = $result->fetch())
        {
            $patientsList[$i]['id_pacient'] = $row['id_pacient'];
            $patientsList[$i]['name'] = $row['name'];
            $patientsList[$i]['surname'] = $row['surname'];
            $patientsList[$i]['sex'] = $row['sex'];
            $patientsList[$i]['patronymic'] = $row['patronymic'];
            $patientsList[$i]['date_of_birth'] = $row['date_of_birth'];
            $patientsList[$i]['police_number'] = $row['police_number'];
            $patientsList[$i]['passport_num'] = $row['passport_num'];
            $patientsList[$i]['patient_card_num'] = $row['patient_card_num'];
            $i++;
        }
        return $patientsList;
    }
    
    /**
     * Преобразование в пол
     */
    public static function ConvertToSex($id)
    {
        if ($id == 1)
        {
            return "Мужской";
        }
        if ($id == 0)
        {
            return "Женской";
        }
    }
    
    public static function getSocialStatusByID($socialID)
    {
        $connection = Db::getConnection();
        $SQL = "SELECT id, title FROM socilaStatus WHERE status = '1' and id=$socialID";
        $result = $connection->query($SQL);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function getUserRecords($patientID)
    {
        $connection = Db::getConnection();
        $SQL = "SELECT * FROM schedule WHERE id_pacient = $patientID ORDER BY date_priema ASC, time_priema ASC";
        $result= $connection->query($SQL);
        $result->execute();
        $i = 0;
        $recordList = array();
        while ($row = $result->fetch())
        {
            $recordList[$i]['id_schedule'] = $row['id_schedule'];
            $recordList[$i]['date_priema'] = $row['date_priema'];
            $recordList[$i]['time_priema'] = $row['time_priema'];
            $recordList[$i]['id_doctor'] = $row['id_doctor'];
            $recordList[$i]['id_uslugi'] = $row['id_uslugi'];
            $recordList[$i]['cost'] = $row['cost'];
            $recordList[$i]['notes'] = $row['notes'];
            $recordList[$i]['articul'] = $row['articul'];
            $i++;
        }
        return $recordList;
    }
    
    public static function RecordZapis($values)
    {
        $connection = Db::getConnection();
        $sql = "INSERT INTO schedule (id_add_user, date_priema,time_priema, id_doctor, id_pacient, id_uslugi, cost, notes, articul) "
                    . "VALUES (:id_add_user, :date_priema, :time_priema, :id_doctor, :id_pacient, :id_uslugi, :cost, :notes, :articul) "
                    . " ON DUPLICATE KEY UPDATE articul=articul";

            $result = $connection->prepare($sql);

            $result->bindParam(":id_add_user", $values['addedUserId']);
            $result->bindParam(":date_priema", $values['updatedatetimepickerZapicDataPriema']);
            $result->bindParam(":time_priema", $values['updatenachaloPriema']);
            $result->bindParam(":id_doctor", $values['update-doctorID']);
            $result->bindParam(":id_pacient", $values['patientID']);
            $result->bindParam(":id_uslugi", $values['uslugi']);
            $result->bindParam(":cost", $values['updatecost']);
            $result->bindParam(":notes", $values['update-notes']);
            $result->bindParam(":articul", $values['update-articul']);
            $result->execute();
            if ($result->execute()) {
                $last_id = $connection->lastInsertId();
                return $last_id;
            }
    }
}

//LIKE '%$queryString%'
/*$sql = "SELECT name, surname,patronymic, date_of_birth, inn,passport_num,patient_card_num FROM patient WHERE name LIKE '%$name%'"
                . " OR surname LIKE '%$surname%' OR patronymic LIKE '%$patronymic%'  OR date_of_birth="
                . "$date_of_birth OR inn=$inn OR passport_num=$passport_num OR patient_card_num=$patient_card_num";*/
 /*  <?php $i = 0; foreach ($officces as $key=>$val):?>
                <?php $i++; $index = $i;?>
                <li class="active" data-toggle="collapse" data-target="#demo<?php echo $index; ?>"><a href="#"><?php echo $val['title']; ?></a></li>
                <li>
                    <ul class="nav menu-second-level collapse" id="demo<?php echo $index; ?>">
                        <li class="doctor-pills-name"><a data-id = "<?php echo$val['id']; ?>"><?php echo $val['name']." ".$val['surname']." ".$val['patronymic']; ?></a></li>
                    </ul>
                </li>
                <?php endforeach; ?>*/