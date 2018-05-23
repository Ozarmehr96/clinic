<!-- Модальное окно для записи пациента -->
<div id="doctorScheduleModalBox" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-contentdoctorScheduleModalBox">
            <form class="form" method="post" id="doctorScheduleModalBoxForm" action="/operator/doctorView">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="doctorScheduleModalBoxTitle" id="doctorScheduleModalBoxTitle">
                    </h4>
                </div>
                <div class="modal-body doctorScheduleModalBox-modal-body">
                    <h4 id="cabinetViewDoctorShedule"></h4>
                    <h4>График работы</h4>
                    <table class="table table-striped table-bordered">
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
                                <th id="days0">Понедельник</th>
                                <th id="days1">Вторник</th>
                                <th id="days2">Среда</th>
                                <th id="days3">Четверг</th>
                                <th id="days4">Пятница</th>
                                <th id="days5">Суббота</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Футер модального окна -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
