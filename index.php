<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

function pre($data = [])
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

$page = array_keys($_REQUEST);
if (!empty($_SESSION['login_token'])) {
    if ($_SESSION['logged_user']['active'] == 0) header("Location: /disabled");
    if ($_SERVER['REQUEST_METHOD'] == "GET"){
        switch ($page[0]){
            case "home":
                include $_SERVER['DOCUMENT_ROOT'].getenv("HOME_DIR")."/home.php";
                break;
            case "settings":
                include $_SERVER['DOCUMENT_ROOT'].getenv("HOME_DIR")."/settings.php";
                break;
            case "create-report":
                include $_SERVER['DOCUMENT_ROOT'].getenv("HOME_DIR")."/create-report.php";
                break;
            case "report":
                include $_SERVER['DOCUMENT_ROOT'].getenv("HOME_DIR")."/showReportInfo.php";
                break;
            default:
                header("Location: /?home");
                break;
        }
    } else {
        echo "df";
    }
} else {
    header("Location: /auth");
}