<!-- Модальное окно для записи пациента -->

<div id="updaterecordPacientAppointmentModalBox" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form" method="post" id="updaterecordPatientForm" action="/operator/register-journal-record-update">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="updaterecordPacientModalTitle">Редактирование записи</h4>
                </div>
                <div class="modal-body record-pacient-modal-body">
                    <div class="col-xs-12" id="patFIOcol-xs">
                        <div class="form-group">
                            <label for="updatefullnamePatient" class="">Выбранный пациент</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="updatefullnamePatient" name="updatefullnamePatient" data-id="" readonly>
                                <span class="input-group-addon">
                                    <span class="glyphicon-user glyphicon"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12" id="">
                        <div class="form-group">
                            <label for="updatedatetimepickerZapicDataPriema" class="">Дата приема</label>
                            <div class="input-group date ">
                                <input type="text" class="form-control datepicker" id="updatedatetimepickerZapicDataPriema" name="updatedatetimepickerZapicDataPriema" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="specialities">Специалист</label>
                            <select class="form-control" name="uslugi" id="specialities" onchange="SpecialityChangeFun(this)" required>
                               <option value="">Не выбрано</option>
                                <?php echo OperatorController::FullSelectOptions("specialities", "title", "id_special"); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="doctors">Врач</label>
                            <select class="form-control" name="doctors" id="doctors" onchange="DoctorChangeFun(this)" required>
                               <option value="" >Не выбрано</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 offset-xs-6">
                        <div class="form-group">
                            <label for="updatenachaloPriema">Начало приема</label>
                            <select class="form-control" name="updatenachaloPriema" id="updatenachaloPriema" required>
                               <option value="" >Не выбрано</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="uslugi">Услуги</label>
                            <select class="form-control" name="uslugi" id="uslugi" required>
                               <option value="" >Не выбрано</option>
                                <?php echo OperatorController::FullSelectOptions("uslugi", "name", "id"); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="updatecost">Стоимость</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="updatecost" placeholder="Стоимость" id="updatecost" pattern="\d+(\.\d{2})?">
                                <span class="input-group-addon">
                                    <span class="glyphicon-ruble glyphicon"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="update-notes">Заметки:</label>
                            <textarea class="form-control" maxlength="400" rows="5" name="update-notes" id="update-notes"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Футер модального окна -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <input type="hidden" name="scheduleID" id="scheduleID">
                    <input type="hidden" name="update-doctorID" id="update-doctorID">
                    <input type="hidden" name="update-patientID" id="update-patientID">
                    <input type="hidden" name="update-articul" id="update-articul">
                    <input type="hidden" name="updateRecordedPat" id="updateRecordedPat">
                    <input type="submit" class="btn btn-info" id="recorePatientUpdate" value="Сохранить изменения">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
