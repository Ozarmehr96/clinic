<!-- Модальное окно для записи пациента -->
<div id="recordPacientAppointmentModalBox" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form" method="post" id="recordPatientForm" action="/operator/register-journal-record">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title add_new_zapic_ModalBoxTitle" id="recordPacientModalTitle">SDFsdfsdf</h4>
                </div>
                <div class="modal-body record-pacient-modal-body">
                    <div class="col-xs-6" id="">
                        <div class="form-group">
                            <label for="datetimepickerZapicDataPriema" class="">Дата приема</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="datetimepickerZapicDataPriema" name="datetimepickerZapicDataPriema" readonly="readonly">
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
                                <input type="text" class="form-control" id="nachaloPriema" name="nachaloPriema" readonly="readonly">
                                <span class="input-group-addon">
                                    <span class="glyphicon-time glyphicon"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6" id="">
                        <div class="form-group">
                            <label for="pacientpassportnumber" class="">Номер полиса</label>
                            <div class="input-group date">
                                <input type="text" name="passportNum" class="form-control" id="pacientpassportnumber" placeholder="Номер медицинского полиса страхования" required="required" data-toggle="tooltip" title="" data-original-title="Номер медицинского полиса страхования">
                                <span class="input-group-addon">
                                    <span class="glyphicon">№</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6" id="">
                        <div class="form-group">
                            <label for="date_born_record_pacient" class="">Номер карты</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="medicine-cart-number" name="medicineCartNum" data-toggle="tooltip" title="" placeholder="Номер карты" data-original-title="Номер амбулаторной карточки пациента">
                                <span class="input-group-addon">
                                    <span class="glyphicon">№</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12" id="fullnamePatient">
                        <div class="form-group">
                            <label for="patient-fio" class="col-xs-12 control-label" id="patient-fio-label">ФИО</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="patient-fio" placeholder="ФИО" id="patient-fio" data-id="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="uslugi">Услуги</label>
                            <select class="form-control" name="uslugi" id="uslugi" required>
                               <option value="" >Не выбрано</option>
                                <?php foreach ($uslugi as $val): ?>
                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="cost">Стоимость</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cost" placeholder="Стоимость" id="cost" pattern="\d+(\.\d{2})?">
                                <span class="input-group-addon">
                                    <span class="glyphicon-ruble glyphicon"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="comment">Заметки:</label>
                            <textarea class="form-control" maxlength="400" rows="5" name="notes" id="notes"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Футер модального окна -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <input type="hidden" name="recordPatientCheck" id="datasForSendRecord">
                    <input type="hidden" name="doctorID" id="doctorID">
                    <input type="hidden" name="patientID" id="patientID">
                    <input type="hidden" name="articul" id="articul-for-add">
                    <input type="submit" class="btn btn-info" id="recorePatient" value="Записать">

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
