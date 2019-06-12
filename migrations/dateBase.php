<?php

include $_SERVER['DOCUMENT_ROOT']."/settings/loadAll.php";

$new_user = R::dispense("users");
$new_user->login = 'user';
$new_user->password = password_hash('user', PASSWORD_DEFAULT);
$new_user->google_secret = 'google secret here';
$new_user->email = 'user@example.com';
$new_user->telephone = '81234567890';
$new_user->sex = 1;
$new_user->vk_id = 121212;
$new_user->vk_token = "sdsd12dfdsf!as";
$new_user->profile_photo = "https://pp.userapi.com/c845323/v845323781/20a211/pugMssxxiFU.jpg?ava=1";
$new_user->level = 'test';
$new_user_id = R::store($new_user);

$new_test_stats = R::dispense("stats");
$new_test_stats->user_id = $new_user_id;
$new_test_stats->orders = 0;
$new_test_stats->clients = 0;
$new_test_stats->money = 0;
$new_test_stats->commissions = 0;
R::store($new_test_stats);