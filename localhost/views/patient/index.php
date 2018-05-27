<?php include_once(ROOT."/views/layouts/patient_header.php");?>
<?php include_once(ROOT."/views/layouts/main_head.php");?>
<div class="container-fluid">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $patientFIO; ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo $this->getSocialStatusByID($patientDatas['social_status']); ?>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm" data-id="<?php echo $patientDatas['id_pacient'];?>" onclick="PatientOwnRecord(this)">Записаться <span class="glyphicon glyphicon-record"></span></button>
                    <a href="/user/logout" class="btn btn-danger btn-sm">Выйти <span class="glyphicon glyphicon-log-out"></span></a>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active" onclick="GetRecordList()" id="recordsLi">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i> Записи </a>
                        </li>
                        <li data-id="<?php echo $patientDatas['id_pacient']; ?>" onclick="ShowPatientDatasOnModalForPatient(this)">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i> Личные данные </a>
                        </li>
                        <li class="scheduleLi" onclick="ShowDoctorsWorkSchedule()">
                            <a href="#">
                                <i class="glyphicon glyphicon-ok"></i> Расписание работы врачей </a>
                        </li>
                        <li class="HistoryLi" onclick="ShowDoctorsWorkSchedule()">
                            <a href="#">
                                <i class="fa fa-history" style="font-size: 18px;"></i> История посещения </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <div class="records-table">
                    <div class="inline-headers">
                        <h3 style="display: inline-flex;">Записи</h3>
                        <h3 id="refreshIcon" style="" data-toggle="tooltip" title="" data-original-title="Обновить"><i class="fa fa-refresh pull-right" onclick="GetRecordList()"></i></h3>
                    </div>
                    <table class="table table-striped table-bordered add-overflow-x">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th nowrap>Дата приема</th>
                                <th>Время</th>
                                <th>Врач</th>
                                <th>Услуга</th>
                                <th>Цена</th>
                                <th>Заметки</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody id="recordList">

                        </tbody>
                    </table>
                </div>
                <div class="lloader"></div>
                <div id="dortor-schedule">
                    <h3>Расписание работы врачей</h3>
                    <table class="table table-striped table-bordered add-overflow-x">
                        <thead>
                            <tr>
                                <th>Специалист</th>
                                <th nowrap>Врач</th>
                                <th>Кабинет</th>
                                <th>Понедельник</th>
                                <th>Вт</th>
                                <th>Ср</th>
                                <th>Чт</th>
                                <th>Пт</th>
                                <th>Сб</th>
                            </tr>
                        </thead>
                        <tbody id="sheduleBody">
                            <?php OperatorController::getAllDoctorsSchedule(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once(ROOT."/views/modalBoxs/userSelectedModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/RemoveModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/UpdateZapicModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/WarrningModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/DoctorScheduleViewModal.php");?>
<div class="loading">Loading&#8230;</div>
<?php include_once(ROOT."/views/layouts/patient_footer.php");?>
