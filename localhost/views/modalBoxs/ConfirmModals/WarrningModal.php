<style type="text/css">
	.warrning-modal-confirm {
		color: #434e65;
		width: 525px;
	}
	
	.warrning-modal-confirm .modal-content {
		padding: 20px;
		font-size: 16px;
		border-radius: 5px;
		border: none;
	}
	
	.warrning-modal-confirm .modal-header {
		background: #e85e6c;
		border-bottom: none;
		position: relative;
		text-align: center;
		margin: -20px -20px 0;
		border-radius: 5px 5px 0 0;
		padding: 35px;
	}
	
	.warrning-modal-confirm h4 {
		text-align: center;
		font-size: 36px;
		margin: 10px 0;
	}
	
	.warrning-modal-confirm .form-control,
	.warrning-modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px;
	}
	
	.warrning-modal-confirm .close {
		position: absolute;
		top: 15px;
		right: 15px;
		color: #fff;
		text-shadow: none;
		opacity: 0.5;
	}
	
	.warrning-modal-confirm .close:hover {
		opacity: 0.8;
	}
	
	.warrning-modal-confirm .icon-box {
		color: #fff;
		width: 95px;
		height: 95px;
		display: inline-block;
		border-radius: 50%;
		z-index: 9;
		border: 5px solid #fff;
		padding: 15px;
		text-align: center;
	}
	
	.warrning-modal-confirm .icon-box i {
		font-size: 58px;
		margin: -2px 0 0 -2px;
	}
	
	.warrning-modal-confirm.modal-dialog {
		margin-top: 80px;
	}
	
	.warrning-modal-confirm .btn {
		color: #fff;
		border-radius: 4px;
		background: #eeb711;
		text-decoration: none;
		transition: all 0.4s;
		line-height: normal;
		border-radius: 30px;
		margin-top: 10px;
		padding: 6px 20px;
		min-width: 150px;
		border: none;
	}
	
	.warrning-modal-confirm .btn:hover,
	.warrning-modal-confirm .btn:focus {
		background: #eda645;
		outline: none;
	}
	
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}

</style>
<!-- Modal HTML -->
<div id="warning-modal" class="modal fade">
	<div class="modal-dialog warrning-modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="warrning-modal-body text-center">
				<h4 id="warning-modal-title"></h4>
				<p id="warning-modal-comments"></p>
				<button class="btn btn-success" data-dismiss="modal">Повторить попытку</button>
			</div>
		</div>
	</div>
</div>
