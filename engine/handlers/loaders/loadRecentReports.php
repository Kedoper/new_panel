<?php
include $_SERVER['DOCUMENT_ROOT'] . '/settings/loadAll.php';

//$loader = R::findAll('reports','user = ?', [$_SESSION['logged_user']['login']]);
$loader = R::findAll('reports','user = ? ORDER BY id DESC LIMIT 14', ['kolab']);

$response = [];
foreach ($loader as $item) {
    $response[] = [
        'report_id' => $item['id'],
        'report_datetime' => date('d.m.Y H:i',$item['datetime']),
        'report_price' => $item['total_price'],
        'report_photo' => json_decode($item['files'],true)
    ];
}
print_r(json_encode($response));