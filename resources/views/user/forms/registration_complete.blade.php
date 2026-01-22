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
			<!--Controls-window-->
			<div class="flx-box-itm flx-box-itm-shr flx-box flx-ver flx-ver-cc controls-window" style="width: 400px; padding: 40px">

				<div class="flx-box-itm flx-box-itm-shr flx-box flx-ver flx-ver-cc">
					<!--Logo-->
					<div class="flx-box-itm"><div class="logo"></div></div>
					<div class="flx-box-itm" align="center" style="margin-bottom: 10px">
						Благодарим вас за регистрацию! Через несколко секунд вы будете перенаправлены на страницу входа. Если этого до сих пор не произошло, можете самостоятельно перейти по ссылке: 
					</div>
					<a href="/user/forms/authentication" class="register-link">Ко входу</a>
				</div>

			</div>
		</div>

	</body>
</html>

<script type="text/javascript" defer>
setTimeout(function(){
	window.location.href = "/user/forms/authentication";
}, 5000);
</script>