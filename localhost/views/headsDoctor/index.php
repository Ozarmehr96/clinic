<?php include_once(ROOT."/views/layouts/headsDoctorheader.php");?>
<div class="col-lg-9">
    <h4>Поиск сотрудников</h4>
    <!-- ************************  Форма поиска пациентов             *****************************************-->
    <form class="form" method="post">
        <div class="form-group row">
            <div class="col-xs-2">
                <label for="name">Имя</label>
                <input class="form-control" id="name" type="text" placeholder="Имя">
            </div>
            <div class="col-xs-2">
                <label for="surname">Фамилия</label>
                <input class="form-control" id="surname" type="text" placeholder="Фамилия">
            </div>
            <div class="col-xs-2">
                <label for="fullname">Отчество</label>
                <input type="text" class="form-control" placeholder="Отчество" id="fullname">
            </div>
            <div class="col-xs-3" id="resizable">
                <div class="form-group">
                    <label for="datetimepicker1" class="">Дата рождения</label>
                    <div class="input-group date">
                        <input type="text" class="form-control" id="datetimepicker1">
                        <span class="input-group-addon">
								<span class="glyphicon-calendar glyphicon"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <label for="passport">Номер паспорта</label>
                <input type="text" class="form-control" placeholder="№ документа, удостверяещего личность" id="passport">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-4">
                <div class="form-group">
                    <label for="specialities">Специалист</label>
                    <select class="form-control" name="uslugi" id="specialities" onchange="SpecialityChangeFun(this)" required>
                               <option value="">Не выбрано</option>
                                <?php echo OperatorController::FullSelectOptions("specialities", "title", "id_special"); ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-2">
                <label for="doctor-cabinet">Кабинет</label>
                <input type="text" class="form-control" placeholder="Кабинет" id="doctor-cabinet">
            </div>
            <div class="col-xs-3">
                <label for="search" style="color:#ffffff;">&#160</label>
                <button type="button" id="search" class="form-control btn btn-primary col-xs-3" onclick="SearchDoctors()">
						Поиск   <span class="glyphicon glyphicon-search"></span> 
					</button>
            </div>
            <div class="col-xs-3">
                <label for="addPacient" style="color:#ffffff;">&#160</label>
                <a href="/heads-doctor/add/employee/" class="form-control btn btn-success col-xs-3" role="button">
						Добавить   <span class="glyphicon glyphicon-plus"></span> 
					</a>
            </div>
        </div>
        <table class="table table-striped table-hover table-bordered" id="search_table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>ФИО</th>
                    <th>Пол</th>
                    <th>Дата рождения</th>
                    <th>№ паспорта</th>
                    <th>Специальность</th>
                    <th>Кабинет</th>
                </tr>
            </thead>
            <tbody id="search_table_body">

            </tbody>

        </table>
        <div class="ac">

        </div>
    </form>
</div>
<?php include_once(ROOT."/views/modalBoxs/userSelectedModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/RemoveModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/UpdateZapicModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/WarrningModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/DoctorScheduleViewModal.php");?>

<?php include_once(ROOT."/views/layouts/headsDoctorfooter.php");?>
