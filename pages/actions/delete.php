<?
    $target = explode('-',$_GET['target']);
    if ($target[0] === 'fid') {
        $target_info = R::load('fareports',$target[1]);
    } else if ($target[0] === 'id') {
        $target_info = R::load('reports',$target[1]);
    } else {
        echo 'bad';
        die();
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель | Удаление отчета</title>

    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css?<?= rand(999999, null) ?>">
    <link rel="stylesheet" href="/css/datatablesCustom.css">
    <link rel="stylesheet" href="/libs/charts/charts.css">
    <link rel="stylesheet" href="/css/deletePage.css?<?= rand(999999, null) ?>">

    <script src="/libs/jquery/jq.js"></script>
    <script src="/libs/charts/charts.js"></script>
    <script>
        let user = `<?=$_SESSION['logged_user']['id']?>`,
            target_id = `<?=$target[1]?>`;
    </script>
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
        <button class="" type="button">Закрыть</button>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="row__title">
            <span>Удаление</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Подтвердите удаление записи. Важно: <b>Это действие не обратимо</b></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Удаляется: Отчет с номером <b><?=$target[1]?></b></p>
            <p>Детали отчета вы можете посмотреть по ссылке: <a href="/?report&<?=$target[0]?>=<?=$target[1]?>" target="_blank">Перейти</a></p>
            <p>Для подтверждения действия введите код из приложения <b>Google Authenticator</b>:</p>
            
            <div class="input-row">
                <input type="text" id="googleCode">
                <button type="button" id="submitButton" disabled="disabled" class="ms-item">Подтвердить</button>
            </div>
        </div>
    </div>
</div>
</body>
<script defer src="/js/deletePage.js"></script>
</html>