<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель | Главная</title>

    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css?<?= rand(999999, null) ?>">
    <link rel="stylesheet" href="/libs/charts/charts.css">
    <link rel="stylesheet" href="/css/home.css?<?= rand(999999, null) ?>">

    <script src="/libs/jquery/jq.js"></script>
    <script src="/libs/charts/charts.js"></script>
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/static/header.php";
?>
<div class="container-fluid">
    <div class="row row-user-info">
        <div class="col row-user-info__photo-name">
            <div class="user-photo">
                <img src="<?= $_SESSION['logged_user']['profile_photo'] ?>" alt="">
            </div>
            <div class="user-inf">
                <span><?= $_SESSION['logged_user']['login'] ?></span>
                <span id="u_work">{USER_WORK}</span>
            </div>

        </div>
        <div class="col row-user-info__stats">
            <p class="stats__orders">Всего заказов: <span id="user_orders_count">{user_orders_count}</span></p>
            <p class="stats__clients">Всего клиентов: <span id="user_clients_count">{user_clients_count}</span></p>
            <p class="stats__money">Заказов на: <span id="user_orders_m_count">{user_orders_m_count}</span> руб.
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="money-bill-alt" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-money">
                    <path fill="currentColor"
                          d="M320 144c-53.02 0-96 50.14-96 112 0 61.85 42.98 112 96 112 53 0 96-50.13 96-112 0-61.86-42.98-112-96-112zm40 168c0 4.42-3.58 8-8 8h-64c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h16v-55.44l-.47.31a7.992 7.992 0 0 1-11.09-2.22l-8.88-13.31a7.992 7.992 0 0 1 2.22-11.09l15.33-10.22a23.99 23.99 0 0 1 13.31-4.03H328c4.42 0 8 3.58 8 8v88h16c4.42 0 8 3.58 8 8v16zM608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zm-16 272c-35.35 0-64 28.65-64 64H112c0-35.35-28.65-64-64-64V176c35.35 0 64-28.65 64-64h416c0 35.35 28.65 64 64 64v160z"
                          class=""></path>
                </svg>
            </p>
            <p class="stats__commissions">Комиссий на: <span id="user_commissions_count">{user_commissions_count}</span>
                руб.
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="money-bill-alt" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-money">
                    <path fill="currentColor"
                          d="M320 144c-53.02 0-96 50.14-96 112 0 61.85 42.98 112 96 112 53 0 96-50.13 96-112 0-61.86-42.98-112-96-112zm40 168c0 4.42-3.58 8-8 8h-64c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h16v-55.44l-.47.31a7.992 7.992 0 0 1-11.09-2.22l-8.88-13.31a7.992 7.992 0 0 1 2.22-11.09l15.33-10.22a23.99 23.99 0 0 1 13.31-4.03H328c4.42 0 8 3.58 8 8v88h16c4.42 0 8 3.58 8 8v16zM608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zm-16 272c-35.35 0-64 28.65-64 64H112c0-35.35-28.65-64-64-64V176c35.35 0 64-28.65 64-64h416c0 35.35 28.65 64 64 64v160z"
                          class=""></path>
                </svg>
            </p>
        </div>
        <div class="col news_block">
            <div class="warn-message">
                <div class="warn-message__icon">
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle"
                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="warning-icon__big">
                        <path fill="currentColor"
                              d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"
                              class=""></path>
                    </svg>
                </div>
                <div class="warn-message__text">
                    <p>При загрузке возникли проблемы, попробуйте позже</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row main-other">
        <div class="row__title">
            <span>Последние отчеты</span>
        </div>
        <div class="col">
        <div class="recent-reports-block"></div>
        </div>
    </div>


</div>


</body>
<script src="/libs/bootstrap/js/bootstrap.bundle.min.js?<?= rand(999999, null) ?>"></script>
<script src="/js/home.js?<?= rand(999999, null) ?>"></script>

<script>
    document.getElementById('u_work').innerHTML = work_search('<?=$_SESSION['logged_user']['level']?>');
    document.getElementById('user_orders_count').innerHTML = "<?=$_SESSION['logged_user_stats']['orders']?>";
    document.getElementById('user_clients_count').innerHTML = "<?=$_SESSION['logged_user_stats']['clients']?>";
    document.getElementById('user_orders_m_count').innerHTML = "<?=$_SESSION['logged_user_stats']['money']?>";
    document.getElementById('user_commissions_count').innerHTML = "<?=$_SESSION['logged_user_stats']['commissions']?>";
</script>
</html>