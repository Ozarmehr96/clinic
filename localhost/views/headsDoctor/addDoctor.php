<?php include_once(ROOT."/views/layouts/headsDoctorheader.php");?>
<div class="col-lg-9">
    <h4>Добавление сотрудников</h4>
    <form class="form" method="post" action="/heads-doctor/add/employee" id="addDoctorForm">
        <div class="form-group row">
            <div class="col-xs-2">
                <label for="name">Имя</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Имя" required>
            </div>
            <div class="col-xs-2">
                <label for="surname">Фамилия</label>
                <input class="form-control" id="surname" type="text" placeholder="Фамилия" name="surname" required>
            </div>
            <div class="col-xs-2">
                <label for="fullname">Отчество</label>
                <input type="text" class="form-control" placeholder="Отчество" name="fullname" id="fullname" required>
            </div>
            <div class="col-xs-3" id="resizable">
                <div class="form-group">
                    <label for="datetimepicker1" class="">Дата рождения</label>
                    <div class="input-group date">
                        <input type="text" class="form-control" id="datetimepicker1" name="date_of_birth" required>
                        <span class="input-group-addon">
								<span class="glyphicon-calendar glyphicon"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <label for="passport">Номер паспорта</label>
                <input type="text" name="passport_num" class="form-control" placeholder="№ документа, удостверяещего личность" id="passport">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-3">
                <label for="sex">Пол</label>
                <select class="form-control" name="sex" id="selected-user-sex">
                        <option value="1">Мужской</option>
                        <option value="0">Женской</option>
                    </select>
            </div>
            <div class="col-xs-3">
                <label for="specialities">Специальность</label>
                <select class="form-control" name="specialities" id="specialities" required>
                        <option value="">Не выбрано</option>
                        <?php echo OperatorController::FullSelectOptions("specialities", "title", "id_special"); ?>
                </select>
            </div>
            <div class="col-xs-3">
                <label for="cabinet">Номер паспорта</label>
                <input type="text" class="form-control" placeholder="Кабинет" id="cabinet" name="cabinet">
            </div>
        </div>
        <div class="form-group row" style="margin:0px">

            <h3>Расписание работы</h3>
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Понедельник</th>
                        <th>Вторник</th>
                        <th>Среда</th>
                        <th>Четверг</th>
                        <th>Пятница</th>
                        <th>Суббота</th>
                    </tr>
                </thead>
                <tbody id="sheduleBody">
                    <tr>
                        <td>
                            Начало
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days01" min="08:00:00" max="18:00:00"> Конец
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days02" min="08:00:00" max="18:00:00">
                        </td>
                        <td>
                            Начало
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days11" min="08:00:00" max="18:00:00"> Конец
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days12" min="08:00:00" max="18:00:00">
                        </td>
                        <td>
                            Начало
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days21" min="08:00:00" max="18:00:00"> Конец
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days22" min="08:00:00" max="18:00:00">
                        </td>
                        <td>
                            Начало
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days31" min="08:00:00" max="18:00:00"> Конец
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days32" min="08:00:00" max="18:00:00">
                        </td>
                        <td>
                            Начало
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days41" min="08:00:00" max="18:00:00"> Конец
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days42" min="08:00:00" max="18:00:00">
                        </td>
                        <td>
                            Начало
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days51" min="08:00:00" max="18:00:00"> Конец
                            <input type="time" step="900" class="form-control" placeholder="Вторник" id="days52" min="08:00:00" max="18:00:00">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col-xs-3">
                <label for="addPacient" style="color:#ffffff;">&#160</label>
                <input type="submit" class="form-control btn btn-success col-xs-3" value="Добавить">
            </div>
        </div>
        <input type="hidden" name="text" id="text">
    </form>
    <?php include_once(ROOT."/views/modalBoxs/userSelectedModal.php");?>
    <?php include_once(ROOT."/views/modalBoxs/ConfirmModals/RemoveModal.php");?>
    <?php include_once(ROOT."/views/modalBoxs/UpdateZapicModal.php");?>
    <?php include_once(ROOT."/views/modalBoxs/ConfirmModals/WarrningModal.php");?>
    <?php include_once(ROOT."/views/modalBoxs/DoctorScheduleViewModal.php");?>
    <?php include_once(ROOT."/views/layouts/headsDoctorfooter.php");?>
