<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель | Отчеты</title>

    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css?<?= rand(999999, null) ?>">
    <link rel="stylesheet" href="/css/datatablesCustom.css">
    <link rel="stylesheet" href="/libs/charts/charts.css">
    <link rel="stylesheet" href="/css/reportsList.css?<?= rand(999999, null) ?>">

    <script src="/libs/jquery/jq.js"></script>
    <script src="/libs/charts/charts.js"></script>
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/static/header.php";
?>
<div class="container-fluid">
    <div class="row">
        <div class="row__title">
            <span>Список отчетов</span>
        </div>
    </div>
    <div class="row">
        <div class="col table-wrapper">
            <table id="reportsTable" class="display stripe order-column hover">
                <thead>
                <tr>
                    <td>#</td>
                    <td>timestamp</td>
                    <td>Площадка</td>
                    <td>Создал</td>
                    <td>Дата и время создания</td>
                    <td>WP</td>
                    <td>Подробнее</td>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script src="/libs/dataTables/datatables.js"></script>
<script src="/js/static.js"></script>
<script src="/js/reportsList.js"></script>
</html>
