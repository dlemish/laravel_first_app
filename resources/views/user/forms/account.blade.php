<div class="category-title">Учетная запись</div>

<form method="POST" action="/user/account/update" class="flx-box flx-ver flx-ver-lt">
    @csrf
    <div class="flx-box-itm flx-box flx-hor flx-hor-lc inputs-row">
        <div class="flx-box-itm flx-box-itm-shr inputs-name"><span style="color: #F00">*</span> Идентификатор</div>
        <div class="flx-box-itm flx-box-itm-grw">
            <input type="text" class="input dis-input" name="id" disabled="yes" value="{{ $user -> id }}"/>
        </div>
    </div>

    <div class="flx-box-itm flx-box flx-hor flx-hor-lc inputs-row">
        <div class="flx-box-itm flx-box-itm-shr inputs-name"><span style="color: #F00">*</span> Фамилия</div>
        <div class="flx-box-itm flx-box-itm-grw">
            <input type="text" class="input" name="family" value="{{ $user -> family }}"/>
        </div>
    </div>

    <div class="flx-box-itm flx-box flx-hor flx-hor-lc inputs-row">
        <div class="flx-box-itm flx-box-itm-shr inputs-name"><span style="color: #F00">*</span> Имя</div>
        <div class="flx-box-itm flx-box-itm-grw">
            <input type="text" class="input" name="first_name" value="{{ $user -> first_name }}"/>
        </div>
    </div>

    <div class="flx-box-itm flx-box flx-hor flx-hor-lc inputs-row">
        <div class="flx-box-itm flx-box-itm-shr inputs-name">Отчество</div>
        <div class="flx-box-itm flx-box-itm-grw">
            <input type="text" class="input" name="patronymic" value="{{ $user -> patronymic }}"/>
        </div>
    </div>

    <div class="flx-box-itm flx-box flx-hor flx-hor-lc inputs-row">
        <div class="flx-box-itm flx-box-itm-shr inputs-name"><span style="color: #F00">*</span> E-mail</div>
        <div class="flx-box-itm flx-box-itm-grw">
            <input type="text" class="input" name="email" value="{{ $user -> email }}"/>
        </div>
    </div>

    <div class="flx-box-itm flx-box flx-hor flx-hor-lc inputs-row">
        <div class="flx-box-itm flx-box-itm-shr inputs-name"><span style="color: #F00">*</span> Логин</div>
        <div class="flx-box-itm flx-box-itm-grw">
            <input type="text" class="input dis-input" name="login" value="{{ $user -> login }}"/>
        </div>
    </div>

    <div class="flx-box-itm flx-box flx-hor flx-hor-lc inputs-row" style="margin-top: 10px">
        <div class="flx-box-itm flx-box-itm-shr inputs-name">Новый пароль</div>
        <div class="flx-box-itm flx-box-itm-grw">
            <input type="password" class="input" name="new_password"/>
        </div>
    </div>

    <div class="flx-box-itm flx-box flx-hor flx-hor-lc inputs-row" style="margin-bottom: 5px">
        <div class="flx-box-itm flx-box-itm-shr inputs-name">Новый пароль (повторно)</div>
        <div class="flx-box-itm flx-box-itm-grw">
            <input type="password" class="input" name="new_password_repeat"/>
        </div>
    </div>

    <input type="submit" value="Сохранить" class="common-button"/>

</form>