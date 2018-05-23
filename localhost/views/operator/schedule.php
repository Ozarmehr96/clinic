<?php include_once(ROOT."/views/layouts/header.php");?>
<!-- 	РАСПИСАНИЕ -->
<div class="container-fluid" id="schedule">
    <h4>Предварительная запись на прием</h4>
    <form class="form" method="post">
        <div class="form-group row">
            <table class="table table-striped table-hover table-bordered pacient-schedule-table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Дата приема</th>
                        <th>Время</th>
                        <th>Врач</th>
                        <th>ФИО пациента</th>
                        <th>Услуга</th>
                        <th>Стоимость</th>
                        <th>Заметки</th>
                        <th>Действие</th>
                    </tr>
                </thead>

                <?php $i = 1; foreach ($schedule as $zapic):?>
                <tr data-id="<?php echo $zapic['id_pacient']; ?>">
                    <td>
                        <?php echo  $i++;?>
                    </td>
                    <td>
                        <?php echo $zapic['date_priema']; ?>
                    </td>
                    <td>
                        <?php echo $zapic['time_priema'];//date_format($zapic['time_priema'], 'g:i A'); ?>
                    </td>
                    <td data-id="<?php echo $zapic['id_doctor']; ?>" class=" canClick" onclick="ViewСertainDoctorSchedule(this)">
                        <?php echo $this->getDoctorByID($zapic['id_doctor']); ?>&nbsp;

                    </td>
                    <td class="canClick " data-id="<?php echo $zapic[ 'id_pacient']; ?>" onclick="ShowUserDatasOnModal(this)">
                        <?php echo $this->getPatientFIOBbyId($zapic['id_pacient']); ?>
                    </td>
                    <td>
                        <?php echo $this->getUsligiByID($zapic['id_uslugi']); ?>
                    </td>
                    <td>
                        <?php echo $zapic['cost']; ?>
                    </td>
                    <td width="120px">
                        <?php echo $zapic['notes']; ?>
                    </td>
                    <td class="optionTD">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true" style="color:#ffc107" data-id_schedule="<?php echo $zapic['id_schedule']; ?>" data-doctor_id="<?php echo $zapic['id_doctor']; ?>" data-patient_id="<?php echo $zapic['id_pacient']; ?>" onclick="UpdateRecordedPatient(this)"></span>&emsp;
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true" onclick="RemoveZapicById(this)" data-id="<?php echo $zapic['id_schedule']; ?>" style="color:red"></span>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
    </form>
</div>
<?php include_once(ROOT."/views/modalBoxs/userSelectedModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/RemoveModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/UpdateZapicModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/WarrningModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/DoctorScheduleViewModal.php");?>
<?php include_once(ROOT."/views/layouts/footer.php");?>
