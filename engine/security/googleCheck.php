<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    print_r(json_encode([
        'code' => 1,
        'message' => "Method not allowed here"
    ]));
} else {
    $ga = new PHPGangsta_GoogleAuthenticator();
    $user = R::load('users',$_POST['user']);
    if (empty($user)) {
        print_r(json_encode([
            'code' => 1,
            'message' => "User not found"
        ]));
        die();
    }
    $secret = $user['google_secret'];

    $checkCode = $ga->verifyCode($secret,$_POST['code']);
    if ($checkCode) {
        print_r(json_encode([
            'code' => 0,
            'message' => "OK"
        ]));
        die();
    } else {
        print_r(json_encode([
            'code' => 1,
            'message' => "Wrong code"
        ]));
        die();
    }
}