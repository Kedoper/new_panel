<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

$change = R::load('users',$_POST['id']);
$change->active = $_POST['new_active'];
R::store($change);