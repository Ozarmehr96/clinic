<?php include_once(ROOT."/views/layouts/header.php");?>

<!-- 	ЖУРНАЛ РЕГИСТРАЦИИ ПАЦИЕНТОВ -->
<div class="container-fluid" id="pacient-register-journal">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="datetimepicker_for_doctor_get" class="">Дата приема</label>
                <div class="input-group date" id="datetimepicker_for_doctor_get">
                    <input type="text" class="form-control data-priema" id="datetimepicker_for_doctor_get">
                    <span class="input-group-addon">
                        <span class="glyphicon-calendar glyphicon"></span>
                    </span>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked office">
                <?php $nextID = null; $prevID = null; $currentId = null; $i = 0; foreach ($officces as $key=>$val):?>

                <?php $currentId = $officces[$key]['id_special']; 
                                                $i++; $index = $i; 
                                                $fio = $val['name']." ".$val['surname']." ".$val['patronymic'];
                                                if (isset($officces[$key+1]['id_special']))
                                                {
                                                    $nextID = $officces[$key+1]['id_special'];
                                                }
                                                if (isset($officces[$key-1]['id_special']))
                                                {
                                                    $prevID = $officces[$key-1]['id_special'];
                                                }
                                            ?>
                <?php if ($currentId != $prevID):?>
                <li class="active" data-toggle="collapse" data-target="#demo<?php echo $index; ?>">
                    <a href="#">
                        <?php echo $val['title'];  ?>
                    </a>
                </li>
                <li>
                    <ul class="nav menu-second-level collapse" id="demo<?php echo $index; ?>">
                        <?php foreach ($officces as $inner_key => $innerVal): ?>
                        <?php if ($innerVal['id_special'] == $currentId): ?>
                        <li class="doctor-pills-name" data-id="<?php echo $innerVal['id_pacient']; ?>">
                            <a>
                                <?php echo $innerVal['name']." ".$innerVal['surname']." ".$innerVal['patronymic']; ?>&nbsp;
                                <i data-id="<?php echo $innerVal['id_pacient']; ?>" class="fa fa-eye" id="readMoreEye" onclick="ViewСertainDoctorSchedule(this)" data-toggle="tooltip" title="" data-original-title="Подробнее" style="font-size:18px;"></i>
                            </a>

                        </li>
                        <?php endif;   ?>
                        <?php endforeach;?>
                    </ul>
                </li>
                <?php else: continue; ?>
                <?php endif;   ?>
                <?php  endforeach;  ?>
            </ul>
        </div>
        <div class="col-md-9 doctor-schedule-content">
            <form class="form" method="post">
                <div class="form-group row">
                    <label class="">Записи</label>
                    <table class="table table-striped table-hover table-bordered doctor-schedule-table" id="doctor-schedule-table">
                        <thead>
                            <tr>
                                <th>Время</th>
                                <th>ФИО пациента</th>
                                <th>Заметки</th>
                                <th width="84px">Действие</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<div>
    <form method="post" action="/operator/register-journal" class="forAddingNewform">
    </form>
</div>
<?php include_once(ROOT."/views/modalBoxs/zapisPatientModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/userSelectedModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/RemoveModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/WarrningModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/UpdateZapicModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/DoctorScheduleViewModal.php");?>
<?php include_once(ROOT."/views/layouts/footer.php");?>
