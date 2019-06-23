<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

use VK\Client\VKApiClient;

if (empty($_SESSION['logged_user']['login']) || $_SERVER['REQUEST_METHOD'] != "POST" || empty($_POST)) {
    print_r(json_encode([
        'code' => 0,
        'message' => "Возникла ошибка. Повторите позже."
    ]));
    die();
} else {
    $data = $_POST;
    $vk = new VKApiClient();

    $screen_patch = [];
    foreach ($_FILES['photos']['name'] as $k => $val) {
        $file_name = time() . ".png";
        $files_dir = $_SERVER['DOCUMENT_ROOT'] . getenv('UPLOADS_DIR') . "/reports/fa/" . $file_name;
        $screen_patch['invoice'][] = $file_name;
        copy("{$_FILES['photos']['tmp_name'][$k]}", "{$files_dir}");
        sleep(1);
    }

    $client_domain = explode('@', $data['worker_url_vk']);
    $client_domain = $client_domain[1];
    $user = $vk->users()->get('db75892feaaacdb3f779b2433b572fd1d774831ede9a8ee6f7dec94d0f42a6205cd73acc950ed5e2a30f6', [
        'user_ids' => $client_domain
    ]);

    $new_report = R::dispense('fareports');
    $new_report->user = $_SESSION['logged_user']['login'];
    $new_report->worker_url = $user[0]['id'];
    $new_report->place = $data['place'];
    $new_report->our_email = $data['our_email'];
    $new_report->worker_url_fa = $data['worker_url_fa'];
    $new_report->client_email = $data['client_email'];
    $new_report->course = $data['course'];
    $new_report->our_percents = $data['our_percents'];
    $new_report->client_amount = $data['client_amount'];
    $new_report->rub_amount = $data['rub_amount'];
    $new_report->worker_pay = $data['worker_pay'];
    $new_report->total_amount = $data['total_amount'];
    $new_report->refer_urls = $data['refer_urls'];
    $new_report->operation_comment = $data['operation_comment'];
    $new_report->files = json_encode($screen_patch);
    $new_report->datetime = time();
    R::store($new_report);

    print_r(json_encode([
        'code' => 1,
        'message' => "Отчет успешно создан, вы можете просмотреть его на главной странице."
    ]));
}