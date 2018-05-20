<style type="text/css">
	.modal-confirm {
		color: #636363;
		width: 400px;
	}
	
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
		text-align: center;
		font-size: 14px;
	}
	
	.modal-confirm .modal-header {
		border-bottom: none;
		position: relative;
	}
	
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -10px;
	}
	
	.modal-confirm .close {
		position: absolute;
		top: -5px;
		right: -2px;
	}
	
	.modal-confirm #remove-modal-body {
		color: #999;
	}
	
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;
		border-radius: 5px;
		font-size: 13px;
		padding: 10px 15px 25px;
	}
	
	.modal-confirm .modal-footer a {
		color: #999;
	}
	
	.modal-confirm .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid #f15e5e;
	}
	
	.modal-confirm .icon-box i {
		color: #f15e5e;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
	
	.modal-confirm .btn {
		color: #fff;
		border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
		line-height: normal;
		min-width: 120px;
		border: none;
		min-height: 40px;
		border-radius: 3px;
		margin: 0 5px;
		outline: none !important;
	}
	
	.modal-confirm .btn-info {
		background: #c1c1c1;
	}
	
	.modal-confirm .btn-info:hover,
	.modal-confirm .btn-info:focus {
		background: #a8a8a8;
	}
	
	.modal-confirm .btn-danger {
		background: #f15e5e;
	}
	
	.modal-confirm .btn-danger:hover,
	.modal-confirm .btn-danger:focus {
		background: #ee3535;
	}

</style>
<!-- Modal HTML -->
<div id="confirm-remove-modal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>
				<h4 class="modal-title">Вы уверены?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body" id="remove-modal-body">
				<p id="remove-modal-comments"></p>
			</div>
			<div class="modal-footer" id="remove-modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal" id="remove-modal-cancel-button">Отмена</button>
				<button type="button" class="btn btn-danger" id="remove-modal-remove-button">Удалить</button>
			</div>
		</div>
	</div>
</div>
