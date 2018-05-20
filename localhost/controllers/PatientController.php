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
        //$OperatorCon = new OperatorController();
        return true;
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
    
    public function actionGets()
    {
        if(isset($_POST['getRecords']))
        {
            $id_patient = $this->patientID;
            $recordList = array();
            $recordList = Patient::getUserRecords("3");
            $index =1;
            foreach ($recordList as $record)
            {
                 $option = '<span class="glyphicon glyphicon-edit" aria-hidden="true" style="color:#ffc107" onclick="UpdateRecordedPatient(this)" data-patient_id="'.$id_patient.'" data-doctor_id="'.$record['id_doctor'].'" data-id_schedule="'.$record['id_schedule'].'" ></span>&emsp;'
                         . '<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" onclick="RemoveZapicById(this)" data-id="'.$record['id_schedule'].'" style="color:red"></span>';
                echo '<tr>'
                        . '<td>'.$index++.'</td>'
                        . '<td>'.$record['date_priema'].'</td>'
                        . '<td>'.$record['time_priema'].'</td>'
                        . '<td>'.$record['id_doctor'].'</td>'
                        . '<td>'.$record['id_uslugi'].'</td>'
                        . '<td>'.$record['cost'].'</td>'
                        . '<td>'.$record['notes'].'</td>'
                        . '<td class="optionTD" id = "actionTD">'.$option.'</td>'
                . '</tr>';
            }
            
        }
    }
}