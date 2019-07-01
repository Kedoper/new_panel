<?php

include $_SERVER['DOCUMENT_ROOT'] . getenv("READ_BEAN");
$ed = R::setup("mysql:host=" . getenv('DATE_BASE__IP') . ":" . getenv('DATE_BASE__PORT') . ";dbname=" . getenv('DATE_BASE__DBNAME'),
    getenv('DATE_BASE__LOGIN'), getenv('DATE_BASE__PASSWORD'));

// TODO: Разобраться с сохранением сессий на сервере
// Если сессии не сохраняются, закомментировать строчки ниже

session_save_path($_SERVER['DOCUMENT_ROOT'].getenv("SESSION_PATH"));
session_set_cookie_params(172800,$_SERVER['DOCUMENT_ROOT'].getenv("SESSION_PATH"));

// Если сессии не сохраняются, раскомментировать строчки ниже

//session_set_cookie_params(172800);

session_start();