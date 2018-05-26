<!-- Модальное окно выбранного пациентА  || КАРТОЧКА ПАЦИЕНТА data-keyboard="false" data-backdrop="static"-->
<div id="selectedPacientModalBox" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form form-horizontal selected-user-form" method="POST" action="" enctype="multipart/form-data" id="operator_add_patient">

                <!-- Заголовок модального окна -->
                <div class="modal-header" id="patientModalDatasHeader">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title selected_PacientModalBoxTitle">Пациент: ФИО</h4>
                    <ul class="nav nav-tabs user_tabs">
                        <li class="active" id="basic"><a href="#" onclick="ShowUser_Data('basic-information');">Основные сведения</a></li>
                        <li><a href="#" id="" onclick="ShowUser_Data('contacts');">Контакты</a></li>
                        <li><a href="#" id="" onclick="ShowUser_Data('insurance-policy');">Страховой полис</a></li>
                        <li><a href="#" id="" onclick="ShowUser_Data('education');">Место работы/учебы</a></li>
                        <li><a href="#" id="" onclick="ShowUser_Data('documents');">Документы</a></li>
                        <li><a href="#" id="" onclick="ShowUser_Data('security');">Безопасность</a></li>
                        <li><a href="#" id="patient_historty_visitA" onclick="ShowUser_Data('patient_historty_visit');">История посещения</a></li>
                        <button type="button" class="btn btn-primary pull-right" id="zapicat" onclick="RedirectForRecord()">Записать</button>
                    </ul>
                </div>
                <!-- Основное содержимое модального окна -->
                <div class="modal-body user-selected-modal-body">
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
                                <select class="form-control" name="sex" id="selected-user-sex" required>
                                    <option value selected="selected">Не выбрано</option>
                                    <option value="1">Мужской</option>
									<option value="0">Женской</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group addPlaceholder">
                            <label for="inputEmail" class="col-xs-2 control-label">Дата рождения</label>
                            <div class="col-xs-10 input-group" style="padding-left: 15px;
  									padding-right: 15px;">
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
                            </div>
                        </div>

                        <?php if (!preg_match('/patient/', $_SESSION['user_type'])):  ?>
                        <div class="form-group addPlaceholder">
                            <label for="selected-user-passport" class="col-xs-2 control-label">№ документа, удосверяющего личность</label>
                            <div class="col-xs-10">
                                <input type="text" name="passport_num" class="form-control" id="selected-user-passport">
                            </div>
                        </div>
                        <?php endif;?>
                        <div class="form-group addPlaceholder">
                            <label for="selected-user-phone" class="col-xs-2 control-label">Телефон</label>
                            <div class="col-xs-10">
                                <input type="text" name="phone" class="form-control" id="selected-user-phone" required>
                            </div>
                        </div>
                        <div class="form-group addPlaceholder">
                            <label for="selected-user-patient_card_num" class="col-xs-2 control-label">№ амбулаторной карты</label>
                            <div class="col-xs-10">
                                <input type="text" name="patient_card_num" class="form-control" id="selected-user-patient_card_num" required readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group addPlaceholder">
                            <label for="selected-user-invalidnost" class="col-xs-2 control-label">Инвалидность</label>
                            <div class="col-xs-10">
                                <select class="form-control" name="invalidnost" id="selected-user-invalidnost">
									<option value="0">Нет</option>
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
                                <select class="form-control" name="ss" id="selected-user-ss" required>
                                    <option value selected="selected">Не выбрано</option>
                                   <?php  OperatorController::FullSelectOptions("socilaStatus", "title", "id");?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group addPlaceholder">
                            <label for="selected-user-pacientdoctor" class="col-xs-2 control-label">Обязанный врач</label>
                            <div class="col-xs-10">
                                <select name="id_doctor" class="form-control" name="pacientdoctor" id="selected-pacientdoctor" required>
                                   <option value selected="selected">Не выбрано</option>
                                   <?php  OperatorController::FillDoctorSelectOption();?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fixing_date" class="col-xs-2 control-label">Дата закрипления</label>
                            <div class="col-xs-10 input-group" style="padding-left: 15px; padding-right: 15px;">
                                <input type="date" name="fixing_date" class="form-control" id="fixing_date" required pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
                            </div>
                        </div>
                    </div>
                    <div id="contacts">
                        <div class="form-group addPlaceholder">
                            <label for="selected-user-id_citizenship" class="col-xs-2 control-label">Гражданство</label>
                            <div class="col-xs-10">
                                <select name="id_citizenship" class="form-control" id="selected-user-id_citizenship">
                                    <option value selected="selected">Не выбрано</option>
                                   <?php  OperatorController::FullSelectOptions("countries", "name_country", "id_country");?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group addPlaceholder">
                            <label for="selected-user-region" class="col-xs-2 control-label">Регион</label>
                            <div class="col-xs-10">
                                <select class="form-control" name="id_region" id="selected-user-region">
                                    <option value selected="selected">Не выбрано</option>
                                   <?php  OperatorController::FullSelectOptions("region", "title", "id");?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group addPlaceholder">
                            <label for="selected-user-email" class="col-xs-2 control-label">Email адрес</label>
                            <div class="col-xs-10">
                                <input type="text" name="email" class="form-control" id="selected-user-email">
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
                            <label for="selected-user-email" class="col-xs-2 control-label">Номер медицинского полиса</label>
                            <div class="col-xs-10">
                                <input type="text" name="police_number" class="form-control" id="selected-user-police_number" placeholder="Номер медицинского полиса">
                            </div>
                        </div>
                        <div class="form-group addPlaceholder">
                            <label for="datetimepicker-policy_start" class="col-xs-2 control-label">Начало скрока действия</label>
                            <div class="col-xs-10 input-group" style="padding-left: 15px;
  									padding-right: 15px;">
                                <input type="date" name="start_medical_policy" class="form-control" id="datetimepicker-policy-start" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
                            </div>
                        </div>
                        <div class="form-group addPlaceholder">
                            <label for="datetimepicker-policy-end" class="col-xs-2 control-label">Окончание скрока действия</label>
                            <div class="col-xs-10 input-group" style="padding-left: 15px;
  									padding-right: 15px;">

                                <input type="date" name="end_medical_policy" class="form-control" id="datetimepicker-policy-end" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
                            </div>
                        </div>
                        <div class="form-group addPlaceholder">
                            <label for="selected-user-comp" class="col-xs-2 control-label">Страховая компания</label>
                            <div class="col-xs-10">
                                <select name="Id_insurance_company" id="selected-user-comp" class="form-control">
									<option value selected="selected">Не выбрано</option>
                                   <?php  OperatorController::FullSelectOptions("insurance", "title", "id");?>
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
                                    <option value selected="selected">Не выбрано</option>
                                   <?php  OperatorController::FullSelectOptions("university", "title", "id");?>
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
                        <?php if (!preg_match('/patient/', $_SESSION['user_type'])):  ?>
                        <div class="col-xs-10">
                            <div class="form-group addPlaceholder">
                                <label for="selected-user-passportDateStart" class="">Дата выдачи документа, удосверяющего личность</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon-calendar glyphicon"></span>
                                    </span>
                                    <input type="date" name="data_vidachi_pass" class="form-control" id="selected-user-passportDateStart" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
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
                    <div id="security">
                        <?php if (!preg_match('/patient/', $_SESSION['user_type'])):  ?>
                        <div class="alert alert-danger">
                            <ul>
                                <strong>Внимание!</strong>
                                <li>
                                    Восстановить пароль только при предъявлении паспорта
                                </li>
                                <li>
                                    Для входа в систему в качестве логина используется номер амбулаторной карточки
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 id="forLogin">Логин: </h3>
                            <h3 id="forPass"></h3>
                            <h4 id="forTimer"></h4>
                            <div id="butPassAndPrint">
                                <button type="button" id="recoverPassword" class="btn btn-success" onclick="CreatePass()">Создать или восстановить пароль</button>
                                <button type="button" id="printPassword" class="btn btn-primary" onclick="PrintPass()">Распечатать пароль</button>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="alert alert-danger">
                            <ul>
                                <strong>Внимание!</strong>
                                <li>
                                    Для восстановлении пароля необходимо обратиться в поликлнику к любому из сотрудников регистратуры
                                </li>
                                <li>
                                    Пароль можно восстановить только при предъявлении документа удостворяющего личности
                                </li>
                                <li>
                                    Для входа в систему в качестве логина используется номер амбулаторной карточки
                                </li>
                                <li>
                                    Для безопсности Ваших личных данных, в системе не используется cookie
                                </li>
                                <li>
                                    В случае не активности более 600 секунд, необходимо заново пройти авторизацию
                                </li>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div id="patient_historty_visit">
                        <h2>История посещения</h2>
                    </div>
                </div>

                <!-- Футер модального окна -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="button" name="remove-patient-button" id="remove-patient-button" class="btn btn-danger remove-pacient" onclick="RemovePatientFromDB(this)" data-id="ва">Удалить</button>
                    <input type="submit" name="submit" class="btn btn-primary add-new-pacient" value="Добавить">
                    <input type="submit" name="update_patient_data" class="btn btn-primary" id="save-user-selected-info" value="Сохранить изменения" onclick="UpdateUserData()">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
