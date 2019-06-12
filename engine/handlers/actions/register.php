<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";
//print_r($_POST);
//$search_user = R::findOne('users', 'login = ?', [$_POST['reg_login']]);
//if (!$search_user['id']) {
    try {
        $ga = new PHPGangsta_GoogleAuthenticator();

        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl('panel.whiteprice.store', $secret);

        $new_user = R::dispense("users");
        $new_user->login = $_POST['reg_login'];
        $new_user->password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);
        $new_user->google_secret = $secret;
        $new_user->email = $_POST['reg_email'];
        $new_user->telephone = $_POST['reg_telephone'];
        $new_user->sex = 1;
        $new_user->vk_id = 121212;
        $new_user->vk_token = "sdsd12dfdsf!as";
        $new_user->profile_photo = "https://pp.userapi.com/c845323/v845323781/20a211/pugMssxxiFU.jpg?ava=1";
        $new_user->level = $_POST['reg_level'];
        $new_user_id =  R::store($new_user);


        $new_user_stats = R::dispense("stats");
        $new_user_stats->user_id = $new_user_id;
        $new_user_stats->orders = 0;
        $new_user_stats->clients = 0;
        $new_user_stats->money = 0;
        $new_user_stats->commissions = 0;
        R::store($new_user_stats);

        print_r(json_encode([
            "code" => 0,
            "message" => "Успешная регистрация"
        ]));
        $_SESSION['GoogleAuth'] = $qrCodeUrl;
    } catch (Exception $exception) {
        print_r(json_encode([
            "code" => 1,
            "message" => "При регистрации возникли проблемы, подробнее: ".$exception->getMessage()
        ]));
        die();
//    }

}