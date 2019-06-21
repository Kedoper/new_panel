<?php
include $_SERVER['DOCUMENT_ROOT'] . '/settings/loadAll.php';


$info = R::findAll('updhist', "WHERE p_id = ?", [158828869]);
$response = [];
foreach ($info as $item) {
    $response[] = [
        'date' => date('d.m.Y H:i', $item['date']),
        'members' => $item['members'],
        'female' => $item['female'],
        'male' => $item['male'],
        'price' => $item['price'],
        'reach' => $item['reach'],
        'week_stat' => $item['week_stat'],
    ];
}
print_r( json_encode($response) );