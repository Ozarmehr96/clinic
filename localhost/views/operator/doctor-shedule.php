<?php include_once(ROOT."/views/layouts/header.php");?>
        <div class="container">
            <div class="profile-content">
                <div id="dortor-schedule">
                    <h3>Расписание работы врача</h3>
                    <table class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th>Специалист</th>
                                <th nowrap>Врач</th>
                                <th>Кабинет</th>
                                <th>Понедельник</th>
                                <th>Вторник</th>
                                <th>Среда</th>
                                <th>Четверг</th>
                                <th>Пятница</th>
                                <th>Суббота</th>
                            </tr>
                        </thead>
                        <tbody id="sheduleBody">
                            <?php OperatorController::getAllDoctorsSchedule(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php include_once(ROOT."/views/layouts/footer.php");?>