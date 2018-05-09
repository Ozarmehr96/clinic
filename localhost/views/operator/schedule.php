<?php include_once(ROOT."/views/layouts/header.php");?>
<!-- 	РАСПИСАНИЕ -->
<div class="container" id="schedule">
	<h4>Предварительная запись на прием</h4>
	<form class="form" method="post">
		<div class="form-group row">
			<table class="table table-striped table-hover table-bordered pacient-schedule-table">
				<thead>
					<tr>
						<th>№</th>
						<th>Дата приема</th>
						<th>Время</th>
						<th>Врач</th>
						<th>ФИО пациента</th>
						<th>Услуга</th>
						<th>Стоимость</th>
						<th>Заметки</th>
						<th>Изменить</th>
						<th>Удалить</th>
					</tr>
				</thead>

				<?php $i = 1; foreach ($schedule as $zapic):?>
				<tr data-id="<?php echo $zapic['id_pacient']; ?>">
					<td>
						<?php echo  $i++;?>
					</td>
					<td>
						<?php echo $zapic['date_priema']; ?>
					</td>
					<td>
						<?php echo $zapic['time_priema'];//date_format($zapic['time_priema'], 'g:i A'); ?>
					</td>
					<td data-id="<?php echo $zapic['id_doctor']; ?>" class="open-modal-doctor-data">
						<?php echo $this->getDoctorByID($zapic['id_doctor']); ?>
					</td>
					<td data-id="<?php echo $zapic['id_pacient']; ?>" onclick="ShowUserDatasOnModal(this)">
						<?php echo $this->getPatientFIOBbyId($zapic['id_pacient']); ?>
					</td>
					<td>
						<?php echo $this->getUsligiByID($zapic['id_uslugi']); ?>
					</td>
                                                        <td>
						<?php echo $zapic['cost']; ?>
					</td>
					<td>
						<?php echo $zapic['notes']; ?>
					</td>
					<td data-id="<?php echo $zapic['id_schedule']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
					<td data-id="<?php echo $zapic['id_schedule']; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
	</form>
</div>
<?php include_once(ROOT."/views/modalBoxs/userSelectedModal.php");?>
<?php include_once(ROOT."/views/modalBoxs/userSelectedUpdateModal.php");?>

<?php include_once(ROOT."/views/layouts/footer.php");?>
