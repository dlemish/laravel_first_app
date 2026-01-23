<!DOCTYPE html>
<html>
	<head>
		<title>Требуется авторизация</title>
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

				<form method="POST" action="/user/authenticate" class="flx-box-itm flx-box-itm-shr flx-box flx-ver flx-ver-cc" id="user-authenticate-form">
					@csrf
					<!--Logo-->
					<div class="flx-box-itm"><div class="logo"></div></div>
					<!--Login-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr icon login-icon"></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Логин или E-mail" name="login" required/></div>
					</div>
					<!--Password-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr icon password-icon"></div>
						<div class="flx-box-itm"><input type="password" autocomplete="off" placeholder="Пароль" name="password" required/></div>
					</div>
					<!--Remember-me-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc remember-me-block">
						<div class="flx-box-itm flx-box-itm-shr"><input type="checkbox" autocomplete="off" name="remember" id="remember-me"/></div>
						<div class="flx-box-itm flx-box-itm-grw"><label for="remember-me">Запомнить меня</label></div>
					</div>
					<!--Login-button-->
					<div class="flx-box-itm flx-box-itm-shr">
						<input type="submit" value="Войти" class="action-button"/>
					</div>
					<!--Register-link-->
					<div class="flx-box-itm flx-box-itm-shr">
						<a href="/user/forms/registration" class="register-link">Регистрация</a>
					</div>

				</form>

			</div>
		</div>

	</body>
</html>