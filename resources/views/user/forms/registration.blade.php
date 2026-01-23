<!DOCTYPE html>
<html>
	<head>
		<title>Регистрация нового пользователя</title>
		<meta charset="utf-8"/>
		<link rel="icon" type="image/icon" href="/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="/src/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="/src/css/forms/user/authentication.css"/>
	</head>
	<body>

		<!--Page-wrapper-->
		<div class="flx-box flx-ver flx-ver-cc page-wrapper">
			<!--Error-text-->
			<?php if(!empty($error)){ ?>
				<div class="error-text">{{ $error }}</div>
			<?php } ?>
			<!--Controls-window-->
			<div class="flx-box-itm flx-box-itm-shr flx-box flx-ver flx-ver-cc controls-window">

				<form method="POST" action="/user/register" class="flx-box-itm flx-box-itm-shr flx-box flx-ver flx-ver-cc" id="user-register-form">
					@csrf
					<!--Logo-->
					<div class="flx-box-itm"><div class="logo"></div></div>
					<!--Family-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr flx-box flx-box-hor flx-hor-cc icon"><span style="color: #F00">*</span></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Фамилия" name="family" required value="<?= $prev_family ?>"/></div>
					</div>
					<!--First-name-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr flx-box flx-box-hor flx-hor-cc icon"><span style="color: #F00">*</span></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Имя" name="first_name" required value="<?= $prev_first_name ?>"/></div>
					</div>
					<!--Patronymic-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr flx-box flx-box-hor flx-hor-cc icon"><span></span></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Отчество" name="patronymic" value="<?= $prev_patronymic ?>"/></div>
					</div>
					<!--Email-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input" style="margin-bottom: 15px">
						<div class="flx-box-itm flx-box-itm-shr flx-box flx-box-hor flx-hor-cc icon"><span style="color: #F00">*</span></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="E-mail" name="email" required value="<?= $prev_email ?>"/></div>
					</div>
					<!--Login-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr icon login-icon"></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Логин" name="login" required value="<?= $prev_login ?>"/></div>
					</div>
					<!--Password-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr icon password-icon"></div>
						<div class="flx-box-itm"><input type="password" autocomplete="off" placeholder="Пароль" required name="password"/></div>
					</div>
					<!--Login-button-->
					<div class="flx-box-itm flx-box-itm-shr">
						<input type="submit" value="Зарегистрироваться" class="action-button"/>
					</div>
					<!--Register-link-->
					<div class="flx-box-itm flx-box-itm-shr">
						<a href="/user/forms/authentication" class="register-link">Ко входу</a>
					</div>

				</form>

			</div>
		</div>

	</body>
</html>