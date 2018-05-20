<?php include_once(ROOT."/views/layouts/patient_header.php");?>
<div class="container">
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
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <a href="/user/logout" class="btn btn-danger btn-sm">Выйти</a>
                    <input type="hidden" value="exit">
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active" onclick="GetRecordList()">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i> Записи </a>
                        </li>
                        <li data-id="<?php echo $patientDatas['id_pacient']; ?>" onclick="ShowPatientDatasOnModalForPatient(this)">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i> Личные данные </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-ok"></i> Записи </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i> Новая запись </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <div class="records">
                    <table class="table table-striped table-hover table-bordered pacient-schedule-table">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Дата приема</th>
                                <th>Время</th>
                                <th>Врач</th>
                                <th>Услуга</th>
                                <th>Стоимость</th>
                                <th>Заметки</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody id="recordList">

                        </tbody>
                    </table>
                </div>
                Some user related content goes here...
                <div class="lloader">Loading...</div>
            </div>
        </div>
    </div>
</div>
<?php include_once(ROOT."/views/modalBoxs/userSelectedModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/RemoveModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/UpdateZapicModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/WarrningModal.php");?>
<?php include_once(ROOT."/views/layouts/patient_footer.php");?>
