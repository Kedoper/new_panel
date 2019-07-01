<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

    $news = R::dispense('news');
    $news->time = time();
    $news->title = "Запуск ";
    $news->text = "Сегодня была запущена панель";
    $news->small_text = "";
    $news->docs = json_encode([
        'files' => [],
        'photos' => []
    ]);
    R::store($news);
