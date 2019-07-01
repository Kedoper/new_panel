<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

$news_list = R::findCollection('news');
$response = [];
while ($news = $news_list->next()) {
    $response[] = [
        'id' => $news['id'],
        'time' => date('d.m.Y H:i',$news['time']),
        'title' => $news['title'],
        'text' => $news['text'],
        'small_text' => $news['small_text']
    ];
}
print_r(json_encode($response));