<?php
include $_SERVER['DOCUMENT_ROOT'] . '/settings/loadAll.php';
$loader = R::findCollection('pubs','ORDER BY id DESC');

$response = [];
while ($load_item = $loader->next()) {
    $response[] = [
        'id' => $load_item['p_id'],
        'title' => $load_item['title']
    ];
}
print_r(json_encode($response));