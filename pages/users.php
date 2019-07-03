<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель | Пользователи</title>

    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css?<?= rand(999999, null) ?>">
    <link rel="stylesheet" href="/css/users.css?<?= rand(999999, null) ?>">
    <link rel="stylesheet" href="/css/datatablesCustom.css">
    <script src="/libs/jquery/jq.js"></script>
    <script src="/libs/dataTables/datatables.js"></script>
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/static/header.php";
?>
<div class="editUserWindow hide">
    <div class="editUserWindow__content UserWindow">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p>Текущие настройки для пользователя под номером <b id="userID_">000</b>, с логином <b id="userLogin_">NAME</b></p>
                    <div class="fake-form">
                        <p>Статус: <b id="oldStatus">STATUS</b></p>
                    </div>
                </div>
                <div class="col">
                    <p>Вы редактируете пользователя под номером <b id="userID">000</b>, с логином <b id="userLogin">NAME</b></p>
                    <form action="javascript:void(0)" enctype="application/x-www-form-urlencoded">
                        <label for="active">Выбор статуса</label>
                        <select name="active" id="active">
                            <option value="0">Нужно подтверждение</option>
                            <option value="1">Активен</option>
                            <option value="2">Заблокирован</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <button type="button" onclick="saveEdit()">Сохранить</button>
        <button type="button" onclick="closeEditWindow()">Закрыть</button>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="info-message-block">
                <div class="info-text">
                    <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="warn-icon">
                        <path fill="currentColor"
                              d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"
                              class=""></path>
                    </svg>
                    <p>На данной странице осуществляется управление всеми пользователями в системе.</p>
                    <p>В данный момент можно управлять только менеджерами проекта</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table id="usersTable" class="display">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Логин</td>
                    <td>Почта</td>
                    <td>Статус</td>
                    <td>Должность</td>
                    <td>Действия</td>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script src="/js/users.js?<?= rand(999999, null) ?>"></script>
</html>
