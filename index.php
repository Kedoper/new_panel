<?php
include $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::create(__DIR__,".env");
$dotenv->load();
include $_SERVER['DOCUMENT_ROOT'] . "/settings/db.php";

function pre($data = [])
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}
$request_method = $_SERVER['REQUEST_METHOD'];

if (!empty($_SESSION['login_token'])) {
    if ($request_method == "GET"){
        switch (array_key_first($_REQUEST)){
            case "home":
                include $_SERVER['DOCUMENT_ROOT'].getenv("HOME_DIR")."/home.php";
                break;
        }
    }
} else {
    header("Location: /auth.php");
}

