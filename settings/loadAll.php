<?php
include $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::create($_SERVER['DOCUMENT_ROOT'], ".env");
$dotenv->load();
include $_SERVER['DOCUMENT_ROOT'] . "/settings/db.php";