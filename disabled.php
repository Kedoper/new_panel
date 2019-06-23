<?
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

if (!empty($_SESSION['login_token'])) {

    $user = R::load('users', $_SESSION['logged_user']['id']);
    $_SESSION['logged_user'] = $user;
} else {
    header("Location: /");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>White Price | Активация</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #2d2e33;
            color: #fff;
        }
        .message {
            margin: 10% auto;
            width: 50%;
        }

        .message>a {
            display: block;
        }

    </style>
</head>
<body>
    <div class="message">
        <span style="font-size: 30pt;display: block;text-align: center;margin-bottom: 50px;">Необходимо подтверждение</span>
        <span style="font-size: 20pt;display: block;text-align: center; margin-bottom: 50px;">Вы успешно создали аккаунт, но он еще не активен. Свяжитесь с администрацией для продолжения работы.</span>
        <a href="/" style="font-size: 20pt;display: block;text-align: center; color:#fff;">На сайт</a>
    </div>
</body>
</html>