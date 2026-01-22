<!DOCTYPE html>
<html>
	<head>
		<title>Регистрация нового пользователя</title>
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

				<form class="flx-box-itm flx-box-itm-shr flx-box flx-ver flx-ver-cc" id="user-register-form">
					@csrf
					<!--Logo-->
					<div class="flx-box-itm"><div class="logo"></div></div>
					<!--Family-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr flx-box flx-box-hor flx-hor-cc icon"><span style="color: #F00">*</span></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Фамилия" name="family"/></div>
					</div>
					<!--First-name-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr flx-box flx-box-hor flx-hor-cc icon"><span style="color: #F00">*</span></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Имя" name="first_name"/></div>
					</div>
					<!--Patronymic-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr flx-box flx-box-hor flx-hor-cc icon"><span style="color: #F00"></span></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Отчество" name="patronymic"/></div>
					</div>
					<!--Email-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input" style="margin-bottom: 15px">
						<div class="flx-box-itm flx-box-itm-shr flx-box flx-box-hor flx-hor-cc icon"><span style="color: #F00">*</span></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="E-mail" name="email"/></div>
					</div>
					<!--Login-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr icon login-icon"></div>
						<div class="flx-box-itm"><input type="text" autocomplete="off" placeholder="Логин" name="login"/></div>
					</div>
					<!--Password-input-->
					<div class="flx-box-itm flx-box flx-box-hor flx-box-hor-cc iconed-input">
						<div class="flx-box-itm flx-box-itm-shr icon password-icon"></div>
						<div class="flx-box-itm"><input type="password" autocomplete="off" placeholder="Пароль" name="password"/></div>
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

<script type="text/javascript" defer>
	$(window).on('load', function(){
		hideLoading(function(){
			initAjaxJsonForm('user-register-form', '/user/register', 'POST');
		});
	});
</script>