<!DOCTYPE html>
<html>
	<head>
		<title>Требуется авторизация</title>
		<meta charset="utf-8"/>
		<link rel="icon" type="image/icon" href="/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="/src/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="/src/css/forms/user/authentication.css"/>
		<script type="text/javascript" src="/src/js/jquery-3.7.1.min.js"></script>
		<script type="text/javascript" src="/src/js/common.js"></script>
	</head>
	<body>

		<!--Loading-screen-->
		<div class="flx-box flx-hor flx-hor-cc modal-box modal-white loading-screen" id="loading-screen">
			<img src="/src/img/loading.gif" width="100px"/>
		</div>

		<!--Page-wrapper-->
		<div class="flx-box flx-ver flx-ver-cc page-wrapper">
			<!--Notifications-->
			<div class="flx-box flx-ver flx-ver-ct" id="notification-list"></div>
			<!--Controls-window-->
			<div class="flx-box-itm flx-box-itm-shr flx-box flx-ver flx-ver-cc controls-window">

				<form class="flx-box-itm flx-box-itm-shr flx-box flx-ver flx-ver-cc" id="user-authenticate-form">
					@csrf
					<!--Logo-->
					<div class="flx-box-itm"><div class="logo"></div></div>
					<!--Login-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr icon login-icon"></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Логин или E-mail" name="login"/></div>
					</div>
					<!--Password-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr icon password-icon"></div>
						<div class="flx-box-itm"><input type="password" autocomplete="off" placeholder="Пароль" name="password"/></div>
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

<script type="text/javascript" defer>
	$(window).on('load', function(){
		hideLoading(function(){
			initAjaxJsonForm('user-authenticate-form', '/user/authenticate', 'POST');
		});
	});
</script>