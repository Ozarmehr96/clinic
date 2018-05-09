<?php include_once(ROOT."/views/layouts/header.php");?>
<div class="container">
	<form class="form form-horizontal selected-user-form" method="POST" action="operator/add/patient" enctype="multipart/form-data" id="operator_add_patient">

		<!-- Заголовок модального окна -->
		<div class="header">
			<h4 class="selected_PacientTitle">Пациент: ФИО</h4>
		</div>
		<div class="container">
			<ul class="nav nav-tabs user_tabs">
				<li class="active" id=""><a href="#" onclick="ShowUser_Data('basic-information');">Основные сведения</a></li>
				<li><a href="#" id="" onclick="ShowUser_Data('contacts');">Контакты</a></li>
				<li><a href="#" id="" onclick="ShowUser_Data('insurance-policy');">Страховой полис</a></li>
				<li><a href="#" id="" onclick="ShowUser_Data('education');">Место работы/учебы</a></li>
				<li><a href="#" id="" onclick="ShowUser_Data('documents');">Документы</a></li>
				<li><a href="#" id="" onclick="ShowUser_Data('history');">История посещений</a></li>
				<button type="button" class="btn btn-primary pull-right" id="zapicat">Записать</button>
			</ul>
		</div>
		<!-- Основное содержимое модального окна -->
		<div class="container patient-selected-page">
			<div class="user-page-container">
				<div id="basic-information" class="col-md-9">
					<div class="form-group addPlaceholders">
						<label for="selected-user-name" class="col-xs-2 control-label">Имя</label>
						<div class="col-xs-10">
							<input type="text" name="name" class="form-control" id="selected-user-name" required>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-surname" class="col-xs-2 control-label">Фамилия</label>
						<div class="col-xs-10">
							<input type="text" name="surname" class="form-control" id="selected-user-surname" required>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="inputEmail" class="col-xs-2 control-label">Отчество</label>
						<div class="col-xs-10">
							<input type="text" name="patronymic" class="form-control" id="selected-user-surname" required>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-sex" class="col-xs-2 control-label">Пол</label>
						<div class="col-xs-10">
							<select class="form-control" name="sex" id="selected-user-sex">
                                    <option>Мужской</option>
                                    <option>Женской</option>
                                </select>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="inputEmail" class="col-xs-2 control-label">Дата рождения</label>
						<div class="col-xs-10 date input-group" style="padding-left: 15px;
  									padding-right: 15px;" id="datetimepicker2">
							<input type="text" name="date_of_birth" class="form-control" id="datetimepicker2">
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-phone" class="col-xs-2 control-label">Телефон</label>
						<div class="col-xs-10">
							<input type="text" name="phone" class="form-control" id="selected-user-phone" required>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-cartnumber" class="col-xs-2 control-label">№ амбулаторной карты</label>
						<div class="col-xs-10">
							<input type="text" name="patient_card_num" class="form-control" id="selected-user-cartnumber" required>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-invalidnost" class="col-xs-2 control-label">Инвалидность</label>
						<div class="col-xs-10">
							<input type="text" name="invalidnost" class="form-control" id="selected-user-invalidnost">
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-adress" class="col-xs-2 control-label">Адрес</label>
						<div class="col-xs-10">
							<input type="text" name="adress" class="form-control" id="selected-user-adress" required>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-s1" class="col-xs-2 control-label">Социальный статус</label>
						<div class="col-xs-10">
							<select class="form-control" name="ss" id="selected-user-names">
                                    <option value="1">Служащий</option>
                                    <option value="2">Рабочий</option>
                                    <option value="3">Студент</option>
                                </select>
						</div>
					</div>

					<div class="form-group addPlaceholders">
						<label for="selected-pacientdoctor" class="col-xs-2 control-label">Обязанный врач</label>
						<div class="col-xs-10">
							<select name="id_doctor" class="form-control" name="pacientdoctor" id="selected-pacientdoctor">
                                    <option value="1">Иван</option>
                                    <option value="2">Анна</option>
                                    <option value="3">ввня</option>
                                    <option value="4">ыва</option>
                                </select>
						</div>
					</div>
					<div class="form-group">
						<label for="fixing_date" class="col-xs-2 control-label">Дата закрипления</label>
						<div class="col-xs-10 date input-group" style="padding-left: 15px; padding-right: 15px;">
							<input type="text" name="fixing_date" class="form-control" id="fixing_date">
						</div>
					</div>
				</div>
				<div id="contacts" class="col-md-9">
					<div class="form-group addPlaceholders">
						<label for="selected-user-country" class="col-xs-2 control-label">Гражданство</label>
						<div class="col-xs-10">
							<select name="id_citizenship" class="form-control" id="selected-user-country">
                                    <option value="1">Россия</option>
                                    <option value="2">Таджикистан</option>
                                    <option value="3">Украина</option>
                                    <option value="4">Учащийся</option>
                                </select>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-region" class="col-xs-2 control-label">Регион</label>
						<div class="col-xs-10">
							<select class="form-control" name="id_region" id="selected-user-region">
                                    <option value="1">Кемеровская область</option>
                                    <option value="2">Московская область</option>

                                </select>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-email" class="col-xs-2 control-label">Email адрес</label>
						<div class="col-xs-10">
							<input type="text" name="email" class="form-control" id="selected-user-email" required>
						</div>
					</div>
				</div>
				<div id="insurance-policy" class="col-md-9">
					<div class="form-group addPlaceholders">
						<label for="selected-user-region" class="col-xs-2 control-label">Вид</label>
						<div class="col-xs-10">
							<select name="type_medical_policy" class="form-control" id="selected-user-region">
                                    <option value="1">Обязательный</option>
                                    <option value="0">Добровольный</option>
                                </select>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="datetimepicker-policy_start" class="col-xs-2 control-label">Начало скрока действия</label>
						<div class="col-xs-10 date input-group" style="padding-left: 15px;
  									padding-right: 15px;" id="datetimepicker-policy-start">
							<input type="text" name="start_medical_policy" class="form-control" id="datetimepicker-policy-start">
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="datetimepicker-policy-end" class="col-xs-2 control-label">Окончание скрока действия</label>
						<div class="col-xs-10 date input-group" style="padding-left: 15px;
  									padding-right: 15px;" id="datetimepicker-policy-end">
							<input type="text" name="end_medical_policy" class="form-control" id="datetimepicker-policy-end">
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-comp" class="col-xs-2 control-label">Страховая компания</label>
						<div class="col-xs-10">
							<input type="text" name="Id_insurance_company" class="form-control" id="selected-user-comp">
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-snils" class="col-xs-2 control-label">СНИЛС</label>
						<div class="col-xs-10">
							<input name="snils" type="text" class="form-control" id="selected-user-snils">
						</div>
					</div>
				</div>
				<div id="education" class="col-md-9">
					<div class="form-group addPlaceholders">
						<label for="selected-user-university" class="col-xs-2 control-label">Место учебы</label>
						<div class="col-xs-10">
							<select class="form-control" name="id_university" id="selected-user-university">
                                    <option value="1">КузГТУ</option>
                                    <option value="2">КемГУ</option>
                                </select>
						</div>
					</div>
					<div class="form-group addPlaceholders">
						<label for="selected-user-university" class="col-xs-2 control-label">Место работы</label>
						<div class="col-xs-10">
							<input type="text" name="work_place" class="form-control" id="selected-user-work">
						</div>
					</div>
				</div>
				<div id="documents" class="col-md-9">
					<div class="col-xs-10 ">
						<div class="form-group addPlaceholders">
							<label for="selected-user-passport" class="">№ документа, удосверяющего личность</label>
							<div class="input-group" id="selected-user-passport">
								<span class="input-group-addon">
                                        <span class="glyphicon-number glyphicon">№</span>
								</span>
								<input type="text" name="passport_num" class="form-control" id="selected-user-passport">
							</div>
						</div>
					</div>
					<div class="col-xs-10">
						<div class="form-group addPlaceholders">
							<label for="selected-user-passportDateStart" class="">Дата выдачи документа, удосверяющего личность</label>
							<div class="input-group date" id="selected-user-passportDateStart">
								<span class="input-group-addon">
                                        <span class="glyphicon-calendar glyphicon"></span>
								</span>
								<input type="text" name="data_vidachi_pass" class="form-control" id="selected-user-passportDateStart">
							</div>
						</div>
					</div>
					<div class="col-xs-10">
						<div class="form-group addPlaceholders">
							<label for="selected-user-inn" class="">ИНН (Идентификационный номер налогоплательщика)</label>
							<div class="input-group" id="selected-user-inn">
								<span class="input-group-addon">
                                        <span class="glyphicon-number glyphicon">№</span>
								</span>
								<input type="text" name="inn" class="form-control" id="selected-user-inn">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Футер модального окна -->
		<div class="footer">
			<a href="/google.com" class="btn btn-default">Назад</a>
			<input type="submit" name="submit" class="btn btn-primary add-new-pacient" value="Сохранить изменения">
		</div>
	</form>
</div>
<?php include_once(ROOT."/views/layouts/footer.php");?>
