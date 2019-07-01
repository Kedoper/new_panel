<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель | Создать отчет</title>

    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css?<?= rand(999999, null) ?>">
    <link rel="stylesheet" href="/css/create-report.css?<?= rand(999999, null) ?>">

    <script src="/libs/jquery/jq.js"></script>

</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/static/header.php";
?>
<div class="message-slide ms-item" id="message_slider">
    <div class="message-slide__header ms-item">
        <span class="ms-item" id="message_slider__header">{MESSAGE_SLIDER_HEADER}</span>
    </div>
    <div class="message-slide__text ms-item">
        <span class="ms-item" id="message_slider__text">{MESSAGE_SLIDER_TEXT}</span>
    </div>
    <div class="message-slide__button ms-item">
        <button class="ms-item" type="button">Закрыть</button>
    </div>
</div>
<div class="container-fluid">
    <div class="row cr-row">
        <div class="col-12 text-center">
            Создание отчета
        </div>
    </div>

    <div class="row cr-row">
        <div class="col-2 side-menu">
            <div class="custom-list">

                <div class="custom-list__item select" data-place="vk">
                    <span>Вконтакте</span>
                </div>

                <div class="custom-list__item" data-place="fa">
                    <span>ФА</span>
                </div>

            </div>
        </div>
        <div class="col" id="report_content"></div>
    </div>
</div>
</body>
<script src="/libs/bootstrap/js/bootstrap.bundle.min.js?<?= rand(999999, null) ?>"></script>
<script src="/js/create-report.js?<?= rand(999999, null) ?>"></script>

</html>
