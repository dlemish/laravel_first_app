<?php
    $title = 'Личный кабинет пользователя';
    switch($tool){
        default: $title = "$title | Учетная запись"; break;
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		<meta charset="utf-8"/>
		<link rel="icon" type="image/icon" href="/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="/src/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="/src/css/forms/user/cabinet.css"/>
	</head>
	<body>
        
        <!--Page-wrapper-->
        <div class="flx-box flx-ver flx-ver-ct page-wrapper">
            <!--Top-->
            <div class="flx-box-itm flx-box-itm-shr flx-box flx-hor flx-hor-lc side top-menu">
                <div class="flx-box-itm flx-box-itm-shr">
                    <a href="/"><div class="logo"></div></a>
                </div>
                <div class="flx-box-itm flx-box-itm-shr soft-name">
                    Тестовая информационная система
                </div>
                <div class="flx-box-itm flx-box-itm-grw"></div>
                <div class="flx-box-itm flx-box-itm-shr flx-box flx-box-hor flx-box-hor-lc account-holder">
                    <div class="flx-box-itm flx-box-itm-shr">
                        <div class="avatar"></div>
                    </div>
                    <div class="flx-box-itm flx-box-itm-grw flx-box flx-ver flx-ver-lc">
                        <div class="flx-box-itm">{{ $user -> family }} {{ $user -> first_name }} {{ $user -> patronymic }}</div>
                        <div class="flx-box-itm"><div class="login">{{ $user -> login }}</div></div>
                    </div>
                    <div class="flx-box-itm flx-box-itm-shr logout-holder">
                        <form method="POST" action="/user/logout">
                            @csrf
                            <input type="submit" value="" class="logout-button">
                        </form>
                    </div>
                </div>
            </div>
            <!--Bottom-->
            <div class="flx-box-itm flx-box-itm-grw flx-box flx-hor flx-hor-lt side">
                <!--Menu-->
                <div class="flx-box-itm flx-box-itm-shr left-menu">
                    <div class="item"><a href="/user/account"><div>Учетная запись</div></a></div>
                    <div class="item"><a href="/user/notes"><div>Мои заметки</div></a></div>
                </div>
                <!--Content-area-->
                <div class="flx-box-itm flx-box-itm-grw content-area">

                    <?php if(isset($success)){ ?>
                        <div class="success-text">{{ $success }}</div>
                    <?php } ?>

                    <?php if(isset($error)){ ?>
                        <div class="error-text">{{ $error }}</div>
                    <?php } ?>

                    @if($tool == 'notes') @include('user.forms.notes_list')
                    @else @include('user.forms.account', $user)
                    @endif
                </div>
            </div>
        </div>

    </body>
</html>