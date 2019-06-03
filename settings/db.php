<?php

include $_SERVER['DOCUMENT_ROOT'] . getenv("READ_BEAN");
$ed = R::setup("mysql:host=" . getenv('DATE_BASE__IP') . ":" . getenv('DATE_BASE__PORT') . ";dbname=" . getenv('DATE_BASE__DBNAME'),
    getenv('DATE_BASE__LOGIN'), getenv('DATE_BASE__PASSWORD'));


session_save_path($_SERVER['DOCUMENT_ROOT'].getenv("SESSION_PATH"));
session_name("Test");
session_set_cookie_params(172800,$_SERVER['DOCUMENT_ROOT'].getenv("SESSION_PATH"));
session_start();