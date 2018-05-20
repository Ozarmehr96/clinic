<!-- Модальное окно выбранного врача || Рабочее место врача-->
<div id="selectedDoctorModalBox" class="modal fade" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Заголовок модального окна -->
			<div class="modal-header doctor_datas_selected_from_table">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title doctor_workModalBoxTitle" id="doctor_workModalBoxTitle">Пациент: ФИО</h4>
			</div>
			<!-- Основное содержимое модального окна -->
			<div class="modal-body user-selected-modal-body">
				<ul class="nav nav-tabs user_tabs">
					<li class="active" id=""><a href="#" onclick="ShowUser_Data('basic-information');">Основные сведения</a></li>
					<li><a href="#" id="" onclick="ShowUser_Data('contacts');">Контакты</a></li>
					<li><a href="#" id="" onclick="ShowUser_Data('insurance-policy');">Страховой полис</a></li>
					<li><a href="#" id="" onclick="ShowUser_Data('education');">Место работы/учебы</a></li>
					<li><a href="#" id="" onclick="ShowUser_Data('documents');">Документы</a></li>

				</ul>

				<form class="form form-horizontal selected-user-form" method="post" action="">
					<div id="basic-information">
						<div class="form-group addPlaceholder">
							<label for="selected-user-name" class="col-xs-2 control-label">Имя</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-name" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-surname" class="col-xs-2 control-label">Фамилия</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-surname" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="inputEmail" class="col-xs-2 control-label">Отчество</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-patronymic" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-sex" class="col-xs-2 control-label">Пол</label>
							<div class="col-xs-10">
								<select class="form-control" id="selected-user-sex">
                                    <option>Мужской</option>
                                    <option>Женский</option>
                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="inputEmail" class="col-xs-2 control-label">Дата рождения</label>
							<div class="col-xs-10 date input-group" style="padding-left: 15px;
  									padding-right: 15px;" id="datetimepicker2">
								<input type="text" class="form-control" id="datetimepicker2">
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-passport" class="col-xs-2 control-label">Номер паспорта</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-address" placeholder="Адрес" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-phone" class="col-xs-2 control-label">Телефон</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-phone" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-cartnumber" class="col-xs-2 control-label">№ амбулаторной карты</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-cartnumber" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-adress" class="col-xs-2 control-label">Адрес</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-adress" required>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-sex" class="col-xs-2 control-label">Социальный статус</label>
							<div class="col-xs-10">
								<select class="form-control" id="selected-user-sex">
                                    <option>Не указан</option>
                                    <option>Служащий</option>
                                    <option>Рабочий</option>
                                    <option>Учащийся</option>
                                </select>
							</div>
						</div>
					</div>
					<div id="contacts">
						<div class="form-group addPlaceholder">
							<label for="selected-user-country" class="col-xs-2 control-label">Гражданство</label>
							<div class="col-xs-10">
								<select class="form-control" id="selected-user-country">
                                    <option>Россия</option>
                                    <option>Таджикистан</option>
                                    <option>Украина</option>
                                    <option>Учащийся</option>
                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-region" class="col-xs-2 control-label">Регион</label>
							<div class="col-xs-10">
								<select class="form-control" id="selected-user-region">
                                    <option>Кемеровская область</option>
                                    <option>Московская область</option>
                                    <option>Новосибирская область</option>
                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-email" class="col-xs-2 control-label">Email адрес</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-email" required>
							</div>
						</div>
					</div>
					<div id="insurance-policy">
						<div class="form-group addPlaceholder">
							<label for="selected-user-region" class="col-xs-2 control-label">Вид</label>
							<div class="col-xs-10">
								<select class="form-control" id="selected-user-region">
                                    <option>Обязательный</option>
                                    <option>Добровольный</option>
                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="datetimepicker-policy_start" class="col-xs-2 control-label">Начало скрока действия</label>
							<div class="col-xs-10 date input-group" style="padding-left: 15px;
  									padding-right: 15px;" id="datetimepicker-policy-start">
								<input type="text" class="form-control" id="datetimepicker-policy-start">
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="datetimepicker-policy-end" class="col-xs-2 control-label">Окончание скрока действия</label>
							<div class="col-xs-10 date input-group" style="padding-left: 15px;
  									padding-right: 15px;" id="datetimepicker-policy-end">
								<input type="text" class="form-control" id="datetimepicker-policy-end">
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-comp" class="col-xs-2 control-label">Страховая компания</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-comp">
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-snils" class="col-xs-2 control-label">СНИЛС</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-snils">
							</div>
						</div>
					</div>
					<div id="education">
						<div class="form-group addPlaceholder">
							<label for="selected-user-university" class="col-xs-2 control-label">Место учебы</label>
							<div class="col-xs-10">
								<select class="form-control" id="selected-user-university">
                                    <option>КузГТУ</option>
                                    <option>КемГУ</option>
                                </select>
							</div>
						</div>
						<div class="form-group addPlaceholder">
							<label for="selected-user-university" class="col-xs-2 control-label">Место работы</label>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="selected-user-work">
							</div>
						</div>
					</div>
					<div id="documents">
						<div class="col-xs-10 ">
							<div class="form-group addPlaceholder">
								<label for="selected-user-passport" class="">№ документа, удосверяющего личность</label>
								<div class="input-group" id="selected-user-passport">
									<span class="input-group-addon">
                                        <span class="glyphicon-number glyphicon">№</span>
									</span>
									<input type="text" class="form-control" id="selected-user-passport">
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
									<input type="text" class="form-control" id="selected-user-passportDateStart">
								</div>
							</div>
						</div>
						<div class="col-xs-10">
							<div class="form-group addPlaceholder">
								<label for="selected-user-inn" class="">ИНН (Идентификационный номер налогоплательщика)</label>
								<div class="input-group" id="selected-user-inn">
									<span class="input-group-addon">
                                        <span class="glyphicon-number glyphicon">№</span>
									</span>
									<input type="text" class="form-control" id="selected-user-inn">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<!-- Футер модального окна -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button type="button" class="btn btn-danger" id="change">Изменить</button>
				<button type="button" class="btn btn-primary" id="save-user-selected-info">Сохранить изменения</button>
			</div>

		</div>
		<!-- /.modal-content -->

	</div>
	<!-- /.modal-dialog -->

</div>
<!-- /.modal -->


<!-- Модальное окно для записи пациента -->
<div id="recordPacientAppointmentModalBox" class="modal fade" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Заголовок модального окна -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title add_new_zapic_ModalBoxTitle" id="recordPacientModalTitle">SDFsdfsdf</h4>
			</div>
			<div class="modal-body record-pacient-modal-body">
				<form class="form" method="post">
					<div class="col-xs-6" id="">
						<div class="form-group">
							<label for="datetimepicker1" class="">Дата приема</label>
							<div class="input-group date">
								<input type="text" class="form-control" id="dataPriema">
								<span class="input-group-addon">
                                    <span class="glyphicon-calendar glyphicon"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-xs-6" id="">
						<div class="form-group">
							<label for="nachaloPriema" class="">Начало приема</label>
							<div class="input-group date">
								<input type="text" class="form-control" id="nachaloPriema" value="10:40">
								<span class="input-group-addon">
                                    <span class="glyphicon-calendar glyphicon"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-xs-6" id="">
						<div class="form-group">
							<label for="pacientpassportnumber" class="">Номер паспорта</label>
							<div class="input-group date">
								<input type="text" class="form-control" id="pacientpassportnumber" placeholder="Номер паспорта">
								<span class="input-group-addon">
                                    <span class="glyphicon">№</span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-xs-6" id="">
						<div class="form-group">
							<label for="date_born_record_pacient" class="">Дата рождения</label>
							<div class="input-group date">
								<input type="text" class="form-control" id="date_born_record_pacient">
								<span class="input-group-addon">
                                    <span class="glyphicon-calendar glyphicon"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="selected-user-recordered_pacient_fullname" class="col-xs-2 control-label">ФИО</label>
						<div class="col-xs-12">
							<select class="form-control" id="recordered_pacient_fullname">
                                <option>Иванов Иван Иванович</option>
                                <option>Иванов Иван Иванович</option>
                            </select>
						</div>
					</div>
				</form>
			</div>
			<!-- Футер модального окна -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button type="button" class="btn btn-danger" id="change">Изменить</button>
				<button type="button" class="btn btn-primary" id="save-user-selected-info">Сохранить изменения</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- 			ОКНО ПОДТВЕРЖДЕНИЯ ДЕЙСТВИЙ			-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirmar</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="modal-btn-si">Si</button>
				<button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
			</div>
		</div>
	</div>
</div>
