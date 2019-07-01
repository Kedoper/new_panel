<?php
include $_SERVER['DOCUMENT_ROOT'] . "/settings/loadAll.php";
include $_SERVER['DOCUMENT_ROOT'] . "/libs/vkParser/VkParser.php";
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
    $vParser = new \VParser\VkParser();
    $cart = [];

    $screen_patch = [];
    foreach ($_FILES['photos']['name'] as $k => $val) {
        $file_name = time() . ".png";
        $files_dir = $_SERVER['DOCUMENT_ROOT'] . getenv('UPLOADS_DIR') . "/reports/vk/" . $file_name;
        $screen_patch['invoice'][] = $file_name;
        copy("{$_FILES['photos']['tmp_name'][$k]}", "{$files_dir}");
        sleep(1);
    }

    for ($i = 0; $i < $data['pubCounter']; $i++) {
        $cart[] = [
            'pub_id' => $data["pubs{$i}"],
            'posts_count' => $data["post_count{$i}"]
        ];
    }
    $client_domain = $vParser->getDomain($data['client_url']);
    $user = $vk->users()->get('db75892feaaacdb3f779b2433b572fd1d774831ede9a8ee6f7dec94d0f42a6205cd73acc950ed5e2a30f6', [
        'user_ids' => $client_domain
    ]);

    $new_report = R::dispense('reports');
    $new_report->user = $_SESSION['logged_user']['id'];
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
    $new_report->operation_comment = $data['operation_comment'];
    R::store($new_report);

    $new_client = R::dispense('clients');
    $new_client->vk = $user[0]['id'];
    $new_client->first_name = $user[0]['first_name'];
    $new_client->last_name = $user[0]['last_name'];
    $new_client->last_buy = time();
    R::store($new_client);

    print_r(json_encode([
        'code' => 1,
        'message' => "Отчет успешно создан, вы можете просмотреть его на главной странице."
    ]));
}