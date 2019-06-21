<?php


include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";

use VK\Client\VKApiClient;

if ($_SERVER['REQUEST_METHOD'] != "POST" || empty($_POST)) {
    die("bad");
} else {
    $data = $_POST;
    $vk = new VKApiClient();

    $screen_patch = [];
    foreach ($_FILES['photos']['name'] as $k => $val) {
        $file_name = time() . ".png";
        $files_dir = $_SERVER['DOCUMENT_ROOT'] . getenv('UPLOADS_DIR') . "/reports/vk/" .$file_name;
        $screen_patch['invoice'][] = $file_name;
        copy("{$_FILES['photos']['tmp_name'][$k]}", "{$files_dir}");
        sleep(1);
    }
    $cart = [];
    for ($i = 0;$i < $data['pubCounter']-1;$i++) {
        $cart[] = [
            'pub_id' => $data["pubs{$i}"],
            'posts_count' => $data["post_count{$i}"]
        ];
    }
    $client_domain = explode('@', $data['client_url']);
    $client_domain = $client_domain[1];
    $user = $vk->users()->get('db75892feaaacdb3f779b2433b572fd1d774831ede9a8ee6f7dec94d0f42a6205cd73acc950ed5e2a30f6',[
        'user_ids' => $client_domain
    ]);

    $new_report = R::dispense('reports');
    $new_report->user = $_SESSION['logged_user']['login'];
    $new_report->client = $user[0]['id'];
    $new_report->total_price = $data['total'];
    $new_report->total_posts = $data['total_posts'];
    $new_report->client_pay = $data['client_pay'];
    $new_report->admin_send = $data['admin_send'];
    $new_report->commission = $data['commission'];
    $new_report->pay_up = $data['pay_up'];
    $new_report->pay_off = $data['pay_off'];
    $new_report->basket = json_encode($cart);
    $new_report->files = json_encode($screen_patch);
    $new_report->datetime = time();
    R::store($new_report);
    die("OK");


}