<?php

/**
 * Класс для работы с сотрудниками и вообще системой
 *
 * @author Озармехр
 */
class Doctor {
    public function __construct() {
        return TRUE;
    }
    
    public static function getDoctorsByParams($values)
    {
        $connection = Db::getConnection();
        $doctorList = array();
        $name  = $values['name'];
        $surname = $values['surname'];
        $patronymic = $values['patronymic'];
        $date_of_birth = $values['date_of_birth'];
        $passport_num = $values['passport_num'];
        $cabinet = $values['cabinet'];
        $special =  $values['special'];
        
        $sql = "SELECT patient.id_pacient, patient.name, patient.surname, passport_num,  patient.patronymic, "
                . " sex, date_of_birth, specialities.title, cabinet "
                . " FROM doctor "
                . " JOIN patient ON doctor.id_doctor = patient.id_pacient "
                . " JOIN specialities ON doctor.id_special = specialities.id_special "
                . " WHERE name LIKE '%$name%' OR surname LIKE '%$surname%' OR patronymic LIKE '%$patronymic%' "
                . " OR date_of_birth = '$date_of_birth' OR  cabinet = '$cabinet' OR specialities.id_special = '$special' "
                . " OR passport_num = '$passport_num' "
                . " GROUP BY patient.id_pacient";
        $result = $connection->query($sql);
        $i = 0;
        while ($row = $result->fetch())
        {
            $doctorList[$i]['id_pacient'] = $row['id_pacient'];
            $doctorList[$i]['fio'] = $row['surname']." ".$row['name']." ".$row['patronymic'];
            $doctorList[$i]['date_of_birth'] = $row['date_of_birth'];
            $doctorList[$i]['cabinet'] = $row['cabinet'];
            $doctorList[$i]['passport_num'] = $row['passport_num'];
            $doctorList[$i]['title'] = $row['title'];
            $doctorList[$i]['sex'] = $row['title'];
            $i++;
        }
        return $doctorList;
    }
    
}
