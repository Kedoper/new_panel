<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

$users = R::findCollection('users');
$response = [];
while ($user = $users->next()){
    $response[] = [
        'id' => $user['id'],
        'login' => $user['login'],
        'email' => $user['email'],
        'level' => $user['level'],
        'active' => $user['active'],
    ];
}
print_r(json_encode($response));