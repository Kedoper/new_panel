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
                if (isset($_GET['id'])) {
                    include $_SERVER['DOCUMENT_ROOT'] . getenv("HOME_DIR") . "/showReportInfo.php";
                } else if (isset($_GET['fid'])) {
                    include $_SERVER['DOCUMENT_ROOT'] . getenv("HOME_DIR") . "/showReportInfoFA.php";
                }
                break;
            case "reports":
                include $_SERVER['DOCUMENT_ROOT'] . getenv("HOME_DIR") . "/reportsList.php";
                break;
            default:
                header("Location: /?home");
                break;
        }
        echo '<script src="/js/static.js?'.rand().'"></script>';
    } else {
        echo "df";
    }
} else {
    header("Location: /auth");
}