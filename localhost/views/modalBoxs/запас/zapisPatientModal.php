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
