<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

if ($_SERVER['REQUEST_METHOD'] != "POST") die("bad");



try {
    $find_user = R::findOne("users", "login = ?", [$_POST['u_login']]);
    if ($find_user) {

        if ($_SESSION['login_fail_count'] >= 5) {
            if (isset($_SESSION['login_ban_to']) && $_SESSION['login_ban_to'] < time()) {
                $_SESSION['login_fail_count'] = 0;
                $find_user = R::findOne("users", "login = ?", [$_POST['u_login']]);
                $find_user->login_ban_to = 0;
                R::store($find_user);

                unset($_SESSION['login_ban_to']);
                $_SESSION['login_ban'] = false;
                goto check;
            }

            if ($_SESSION['login_ban'] == true) {
                $find_user = R::findOne("users", "login = ?", [$_POST['u_login']]);
                $_SESSION['login_ban_to'] = $find_user['login_ban_to'];
                print_r(json_encode([
                    "code" => 2,
                    "message" => "Превышено количество неудачных попыток входа",
                    "time" => $find_user['login_ban_to']
                ]));
                exit();
            } else {
                $_SESSION['login_ban'] = true;
                $find_user = R::findOne("users", "login = ?", [$_POST['u_login']]);
                $ban_time = strtotime("+ 5 minutes");
                $find_user->login_ban_to = $ban_time;
                R::store($find_user);
                $_SESSION['login_ban_to'] = $ban_time;
                print_r(json_encode([
                    "code" => 2,
                    "message" => "Превышено количество неудачных попыток входа",
                    "time" => $ban_time
                ]));
                exit();
            }
        }
        check:
        if (password_verify($_POST['u_password'], $find_user['password'])) {
            $_SESSION['login_fail_count'] = 0;
            $_SESSION['login_ban'] = false;
            unset($_SESSION['login_ban_to']);
            $find_user_stats = R::findOne("stats","user_id = ?",[$find_user['id']]);
            $_SESSION['logged_user'] = $find_user;
            $_SESSION['logged_user_stats'] = $find_user_stats;
            $_SESSION['login_token'] = hash("md5",time());
            print_r(json_encode([
                "code" => 0,
                "message" => "Успешный вход"
            ]));
        } else {
            $_SESSION['login_fail_count'] += 1;
            print_r(json_encode([
                "code" => 1,
                "message" => "Пароль введен не верно"
            ]));
        }
    } else {
        print_r(json_encode([
            "code" => 1,
            "message" => "Пользователь с данным логином или паролем не найден"
        ]));
    }
} catch (Exception $exception) {
    print_r(json_encode([
        "code" => 500,
        "message" => "Серверная ошибка"
    ]));
}