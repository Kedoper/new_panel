<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

$user = R::load('users',$_POST['id']);
print_r(json_encode([
    'id' => $user['id'],
    'login' => $user['login'],
    'level' => $user['level'],
    'active' => $user['active'],
]));