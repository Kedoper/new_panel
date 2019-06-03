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

    <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
            crossorigin="anonymous"></script>
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
                        <form action="javascript:void(0)">
                            <label for="login">Введите логин</label>
                            <input type="text" name="login" id="login">
                            <label for="pass">Введите пароль</label>
                            <input type="text" name="pass" id="pass">
                            <button type="submit">Войти</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="toRegister hide">
                <div class="row">
                    <div class="col form-wrap">
                        <form action="javascript:void(0)">
                            <label for="new-login">Придумайте логин</label>
                            <input type="text" name="login" id="new-login">
                            <label for="new-pass">Придумайте пароль</label>
                            <input type="password" name="new-pass" id="new-pass">
                            <label for="re-pass">Повторите пароль</label>
                            <input type="password" name="re-pass" id="re-pass">
                            <button type="submit">Зарегистрироваться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
<script src="/libs/bootstrap/js/bootstrap.bundle.min.js?<?= rand(999999, null) ?>"></script>
<script src="/js/auth.js?<?= rand(999999, null) ?>"></script>
<script !src="">
    $(".acton").on("click", function () {
        var sender = $(this).children()[0];
        if ($(sender).data('action') === "reg") {
            $('[data-action=login]').removeClass("active");
            $('[data-action=reg]').addClass('active');
            $('.toLogin').addClass("hide");
            $('.toRegister').removeClass("hide");
        } else {
            $('[data-action=reg]').removeClass("active");
            $('[data-action=login]').addClass('active')
            $('.toLogin').removeClass("hide");
            $('.toRegister').addClass("hide");
        }
    })
</script>
</html>