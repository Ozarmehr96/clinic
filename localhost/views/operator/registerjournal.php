<?php include_once(ROOT."/views/layouts/header.php");?>

<!-- 	ЖУРНАЛ РЕГИСТРАЦИИ ПАЦИЕНТОВ -->
<div class="container-fluid" id="pacient-register-journal">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="datetimepicker_for_doctor_get" class="">Дата приема</label>
				<div class="input-group date" id="datetimepicker_for_doctor_get">
					<input type="text" class="form-control data-priema" id="datetimepicker_for_doctor_get">
					<span class="input-group-addon">
                        <span class="glyphicon-calendar glyphicon"></span>
					</span>
				</div>
			</div>
			<ul class="nav nav-pills nav-stacked office">
				<?php $i = 0; foreach ($officces as $key=>$val):?>
				<?php $i++; $index = $i; ?>
				<li class="active" data-toggle="collapse" data-target="#demo<?php echo $index; ?>">
					<a href="#">
						<?php echo $val['title']; ?>
					</a>
				</li>
				<li>
					<ul class="nav menu-second-level collapse" id="demo<?php echo $index; ?>">
						<li class="doctor-pills-name" data-id="<?php echo$val['id']; ?>" onclick="ShowDoctorSchedule(this)">
							<a>
								<?php echo $val['name']." ".$val['surname']." ".$val['patronymic']; ?>
							</a>
						</li>
					</ul>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="col-md-9 doctor-schedule-content">
			<form class="form" method="post">
				<div class="form-group row">
					<table class="table table-striped table-hover table-bordered doctor-schedule-table" id="doctor-schedule-table">
						<thead>
							<tr>
								<th>Время</th>
								<th>ФИО пациента</th>
							</tr>
						</thead>
						<tr data-id="12" id="" data-name="table3">
							<td id="timeZapic" onclick="ZapicPatient(this)" data-id="12">1</td>
							<td data-id="12" id="table3_vkladka3" class="open-modal-pacient-data doctor_work_placeTable">Одилов Озармехр УмриллоевИЧ</td>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include_once(ROOT."/views/modalBoxs/zapisPatientModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/userSelectedModal.php");?>
<?php include_once(ROOT."/views/layouts/footer.php");?>
