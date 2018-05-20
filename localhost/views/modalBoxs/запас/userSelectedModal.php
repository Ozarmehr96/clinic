<!-- Модальное окно выбранного пациентА  || КАРТОЧКА ПАЦИЕНТА-->
<div id="selectedPacientModalBox" class="modal fade" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form form-horizontal selected-user-form" method="POST" action="operator/add/patient" enctype="multipart/form-data" id="operator_add_patient">

				<!-- Заголовок модального окна -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title selected_PacientModalBoxTitle">Пациент: ФИО</h4>
				</div>
				<!-- Основное содержимое модального окна -->
				<div class="modal-body user-selected-modal-body">
					<ul class="nav nav-tabs user_tabs">
						<li class="active" id=""><a href="#" onclick="ShowUser_Data('basic-information');">Основные сведения</a></li>
						<li><a href="#" id="" onclick="ShowUser_Data('contacts');">Контакты</a></li>
						<li><a href="#" id="" onclick="ShowUser_Data('insurance-policy');">Страховой полис</a></li>
						<li><a href="#" id="" onclick="ShowUser_Data('education');">Место работы/учебы</a></li>
						<li><a href="#" id="" onclick="ShowUser_Data('documents');">Документы</a></li>
						<li><a href="#" id="" onclick="ShowUser_Data('patient_historty_visit');">История посещения</a></li>
						<button type="button" class="btn btn-primary pull-right" id="zapicat">Записать</button>
					</ul>

					<div id="basic-information">
						<div class="form-group addPlaceholder">
							<label for="selected-user-name" class="col-xs-2 control-label">Имя</label>
							<div class="col-xs-10">
								<input type="text" name="name" class="form-control" id="selected-user-name" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-surname" class="col-xs-2 control-label">Фамилия</label>
							<div class="col-xs-10">
								<input type="text" name="surname" class="form-control" id="selected-user-surname" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="inputEmail" class="col-xs-2 control-label">Отчество</label>
							<div class="col-xs-10">
								<input type="text" name="patronymic" class="form-control" id="selected-user-patronymic" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-sex" class="col-xs-2 control-label">Пол</label>
							<div class="col-xs-10">
								<select class="form-control" name="sex" id="selected-user-sex">
                                    <option value="1">Мужской</option>
									<option value="0">Женской</option>
                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="inputEmail" class="col-xs-2 control-label">Дата рождения</label>
							<div class="col-xs-10 date input-group" style="padding-left: 15px;
  									padding-right: 15px;" id="date_of_birth">
								<input type="text" name="date_of_birth" class="form-control" id="date_of_birth">
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-phone" class="col-xs-2 control-label">Телефон</label>
							<div class="col-xs-10">
								<input type="text" name="phone" class="form-control" id="selected-user-phone" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-patient_card_num" class="col-xs-2 control-label">№ амбулаторной карты</label>
							<div class="col-xs-10">
								<input type="text" name="patient_card_num" class="form-control" id="selected-user-patient_card_num" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-invalidnost" class="col-xs-2 control-label">Инвалидность</label>
							<div class="col-xs-10">
								<select class="form-control" name="invalidnost" id="selected-user-invalidnost">
									<option value="1">Первая группа</option>
									<option value="2">Вторая группа</option>
									<option value="3">Третья группа</option>
								</select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-adress" class="col-xs-2 control-label">Адрес</label>
							<div class="col-xs-10">
								<input type="text" name="adress" class="form-control" id="selected-user-adress" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-ss" class="col-xs-2 control-label">Социальный статус</label>
							<div class="col-xs-10">
								<select class="form-control" name="ss" id="selected-user-ss">
                                    <option value="1">Служащий</option>
                                    <option value="2">Рабочий</option>
                                    <option value="3">Студент</option>
                                </select>
							</div>
						</div>

						<div class="form-group addPlaceholder">
							<label for="selected-user-pacientdoctor" class="col-xs-2 control-label">Обязанный врач</label>
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
							<div class="col-xs-10 date input-group" style="padding-left: 15px; padding-right: 15px;" id="fixing_date">
								<input type="text" name="fixing_date" class="form-control" id="fixing_date">
							</div>
						</div>
					</div>
					<div id="contacts">
						<div class="form-group addPlaceholder">
							<label for="selected-user-id_citizenship" class="col-xs-2 control-label">Гражданство</label>
							<div class="col-xs-10">
								<select name="id_citizenship" class="form-control" id="selected-user-id_citizenship">
                                    <option value="1">Россия</option>
                                    <option value="2">Таджикистан</option>
                                    <option value="3">Украина</option>
                                    <option value="4">Учащийся</option>
                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-region" class="col-xs-2 control-label">Регион</label>
							<div class="col-xs-10">
								<select class="form-control" name="id_region" id="selected-user-region">
                                    <option value="1">Кемеровская область</option>
                                    <option value="2">Московская область</option>

                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-email" class="col-xs-2 control-label">Email адрес</label>
							<div class="col-xs-10">
								<input type="text" name="email" class="form-control" id="selected-user-email" required>
							</div>
						</div>
					</div>
					<div id="insurance-policy">
						<div class="form-group addPlaceholder">
							<label for="selected-user-type_medical_policy" class="col-xs-2 control-label">Вид</label>
							<div class="col-xs-10">
								<select name="type_medical_policy" class="form-control" id="selected-user-type_medical_policy">
                                    <option value="1">Обязательный</option>
                                    <option value="0">Добровольный</option>
                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="datetimepicker-policy_start" class="col-xs-2 control-label">Начало скрока действия</label>
							<div class="col-xs-10 date input-group" style="padding-left: 15px;
  									padding-right: 15px;" id="datetimepicker-policy-start">
								<input type="text" name="start_medical_policy" class="form-control" id="datetimepicker-policy-start">
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="datetimepicker-policy-end" class="col-xs-2 control-label">Окончание скрока действия</label>
							<div class="col-xs-10 date input-group" style="padding-left: 15px;
  									padding-right: 15px;" id="datetimepicker-policy-end">
								<input type="text" name="end_medical_policy" class="form-control" id="datetimepicker-policy-end">
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-comp" class="col-xs-2 control-label">Страховая компания</label>
							<div class="col-xs-10">
								<select name="Id_insurance_company" id="selected-user-comp" class="form-control">
									<option value="1">Альфа-Страхование</option>
									<option value="2">Страхование 1</option>
									<option value="3">Страхование</option>
								</select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-snils" class="col-xs-2 control-label">СНИЛС</label>
							<div class="col-xs-10">
								<input name="snils" type="text" class="form-control" id="selected-user-snils">
							</div>
						</div>
					</div>
					<div id="education">
						<div class="form-group addPlaceholder">
							<label for="selected-user-university" class="col-xs-2 control-label">Место учебы</label>
							<div class="col-xs-10">
								<select class="form-control" name="id_university" id="selected-user-university">
                                    <option value="1">КузГТУ</option>
                                    <option value="2">КемГУ</option>
                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-university" class="col-xs-2 control-label">Место работы</label>
							<div class="col-xs-10">
								<input type="text" name="work_place" class="form-control" id="selected-user-work">
							</div>
						</div>
					</div>
					<div id="documents">
						<div class="col-xs-10 ">
							<div class="form-group addPlaceholder">
								<label for="selected-user-passport" class="">№ документа, удосверяющего личность</label>
								<div class="input-group">
									<span class="input-group-addon">
                                        <span class="glyphicon-number glyphicon">№</span>
									</span>
									<input type="text" name="passport_num" class="form-control" id="selected-user-passport">
								</div>
							</div>
						</div>
						<div class="col-xs-10">
							<div class="form-group addPlaceholder">
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
							<div class="form-group addPlaceholder">
								<label for="selected-user-inn" class="">ИНН (Идентификационный номер налогоплательщика)</label>
								<div class="input-group">
									<span class="input-group-addon">
                                        <span class="glyphicon-number glyphicon">№</span>
									</span>
									<input type="text" name="inn" class="form-control" id="selected-user-inn">
								</div>
							</div>
						</div>
					</div>
					<div id="patient_historty_visit">
						<h2>История посещения</h2>
					</div>
				</div>

				<!-- Футер модального окна -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
					<input type="submit" name="submit" class="btn btn-primary add-new-pacient" value="Добавить">
					<input type="submit" class="btn btn-primary" id="save-user-selected-info" value="Сохранить изменения">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
