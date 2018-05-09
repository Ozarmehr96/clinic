<?php include_once(ROOT."/views/layouts/index_header.php");?>
<div class="container" id="enter_content">
	<form class="form" method="post" id="loginForm" autocomplete="off" action="">
		<div class="legend">
			<legend>
				<h3>Студентческая поликлиника №10</h3>
			</legend>
		</div>

		<div class="form-group row">
			<?php if (isset($isExistUSer) && $isExistUSer == false)
                        {
                           echo "* Неправильно ввели пароль или логин";
                        } ?>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="name">Логин</label>
					<input class="form-control" id="login" type="text" placeholder="Логин" name="login" value="" autocomplete="off" required>
				</div>
			</div>


			<div class="form-group row">
				<div class="col-xs-12">
					<label for="name">Пароль</label>
					<input class="form-control" id="password" type="password" placeholder="Пароль" name="password" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<input class="form-control btn btn-primary" id="submit" type="submit" value="Войти" name="submit">
				</div>
			</div>
			<a href="#" id="forgot">Забыли пароль?</a>
		</div>
	</form>
</div>
<?php include_once(ROOT."/views/layouts/index_footer.php");?>
