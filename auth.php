<?
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";
if (!empty($_SESSION['login_token'])) {
    header("Location: /?home");
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>

    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css?<?= rand(999999, null) ?>">
    <link rel="stylesheet" href="/css/auth.css?<?= rand(999999, null) ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/static/header.php";
?>
<div class="container-fluid">
    <div class="row home">
        <div class="col">
            <div class="toLogin">
                <div class="row">
                    <div class="col form-wrap">
                        <form action="javascript:void(0)" id="form_login">
                            <label for="u-login">Введите логин</label>
                            <input type="text" name="login" id="u-login">
                            <label for="u-pass">Введите пароль</label>
                            <input type="password" name="pass" id="u-pass">
                            <button type="submit">Войти</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="toRegister hide">
                <div class="row">
                    <div class="col form-wrap">
                        <form action="javascript:void(0)" id="form_reg">
                            <label for="new-login">Придумайте логин</label>
                            <input type="text" name="login" id="new-login" required>

                            <label for="new-email">Введите действительный Email</label>
                            <input type="email" name="new-email" id="new-email" required>

                            <label for="new-telephone">Введите действительный номер телефона</label>
                            <input type="tel" name="new-telephone" id="new-telephone" required>

                            <label for="level">Кто вы?</label>
                            <select name="level" id="level" required>
                                <option value="manager">Менеджер Вконтакте</option>
                                <option value="manager_fa">Менеджер ФА</option>
                                <option value="other">Другое (С вами свяжутся)</option>
                            </select>

                            <label for="new-pass">Придумайте пароль</label>
                            <input type="password" name="new-pass" id="new-pass" required>

                            <label for="re-pass">Повторите пароль</label>
                            <input type="password" name="re-pass" id="re-pass" required>

                            <button type="submit">Зарегистрироваться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="error-message error-message__hide" id="error_msg">
    <div class="error-message__text">
    </div>
</div>
</body>
<script src="/libs/bootstrap/js/bootstrap.bundle.min.js?<?= rand(999999, null) ?>"></script>
<script src="/js/auth.js?<?= rand(999999, null) ?>"></script>

</html>