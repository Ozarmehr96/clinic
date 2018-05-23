<?php include_once(ROOT."/views/layouts/header.php");?>
<!-- 	ПАЦИЕНТЫ -->
<div class="container" id="patients">
    <h4>Поиск пациентов</h4>
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
            <div class="col-xs-3">
                <label for="inn">Номер полиса</label>
                <input type="text" class="form-control" id="police_number" data-placement="top" data-toggle="tooltip" title="Номер медицинского полиса пациента (ОМС, ДМС)" placeholder="Номер полиса">
            </div>
            <div class="col-xs-3">
                <label for="medicine-cart-number">Номер мед. карты</label>
                <input type="text" class="form-control" id="medicine-cart-number" data-toggle="tooltip" title="Номер медицинской карты пациента" placeholder="Номер карты">
            </div>
            <div class="col-xs-3">
                <label for="search" style="color:#ffffff;">&#160</label>
                <button type="button" id="search" class="form-control btn btn-primary col-xs-3" onclick="SearchPatients()">
						Поиск   <span class="glyphicon glyphicon-search"></span> 
					</button>
            </div>
            <div class="col-xs-3">
                <label for="addPacient" style="color:#ffffff;">&#160</label>
                <button type="button" id="addPacient" class="form-control btn btn-success col-xs-3">
						Добавить   <span class="glyphicon glyphicon-plus"></span> 
					</button>
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
                    <th>№ полиса</th>
                    <th>№ мед. карты</th>
                </tr>
            </thead>
            <tbody id="search_table_body">

            </tbody>

        </table>
        <div class="ac">

        </div>
    </form>
</div>
<div>
    <form method="post" action="/operator/register-journal" class="forAddingNewform">
    </form>
</div>
<?php include_once(ROOT."/views/modalBoxs/userSelectedModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/RemoveModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/ConfirmModals/WarrningModal.php");?>
<div class="for-alerts">
    <div class="span4 pull-right alert-div">
        <div class="alert alert-danger fade">
            <button type="button" class="close">×</button>
            <strong id="title-alert"></strong><span id="text-alert">Here is my message..</span>
        </div>
    </div>
</div>
<?php include_once(ROOT."/views/layouts/footer.php");?>
