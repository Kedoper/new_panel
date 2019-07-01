<?php
include $_SERVER['DOCUMENT_ROOT'] . '/settings/loadAll.php';

$user = R::load('users',$_SESSION['logged_user']['id']);
//$loader = R::findAll('reports','user = ?', [$_SESSION['logged_user']['login']]);
$loader = R::findAll('reports','user = ? ORDER BY id DESC LIMIT 14', [$user['login']]);

$response = [];
foreach ($loader as $item) {
    $response[] = [
        'place' => 'vk',
        'report_id' => $item['id'],
        'report_datetime' => date('d.m.Y H:i',$item['datetime']),
        'report_price' => $item['total_price'],
    ];
}
unset($loader);
$loader = R::findAll('fareports','user = ? ORDER BY id DESC LIMIT 14', [$user['login']]);

foreach ($loader as $item) {
    $response[] = [
        'place' => 'fa',
        'report_id' => $item['id'],
        'report_datetime' => date('d.m.Y H:i',$item['datetime']),
        'report_price' => $item['total_amount'],
    ];
}
print_r(json_encode($response));