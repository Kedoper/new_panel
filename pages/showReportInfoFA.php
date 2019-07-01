<?php
if (empty($_SESSION['login_token'])) {
    header('Location: /');
}

$report_search = R::load('fareports', $_GET['fid']);

function getCard($img)
{
    $url = '"/uploads/reports/fa/' . $img . '"';
    $card = "<div class='photos-item' style='background-image: url({$url})'
                             onclick='openImg({$url})'>
                             <div class='clear'></div>
</div>";
    return $card;
}

$photos = json_decode($report_search['files'], true);
$refers = explode(',', $report_search['refer_urls']);

$refers_list = [];
$i = 1;
foreach ($refers as $item) {
    $cart_info[] = [
        'num' => $i,
        'refer' => $item,
    ];
    $i++;
}
$cart_info = json_encode($cart_info);
unset($item);

$cards = "";
foreach ($photos['invoice'] as $item) {
    $cards .= getCard($item);
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель | Информация об отчете</title>

    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css?<?= rand(999999, null) ?>">
    <link rel="stylesheet" href="/css/datatablesCustom.css">
    <link rel="stylesheet" href="/css/report-info.css?<?= rand(999999, null) ?>">


    <script src="/libs/jquery/jq.js"></script>

    <script>
        let table_items = `<?=$cart_info?>`;
    </script>
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/static/header.php";
if ($report_search['id']) {
    ?>
    <div class="container">
        <div class="row row__title">
            <div class="col"><span>Информация об отчете</span></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="info-row d-flex">
                    <div class="info-row__left-side">
                        <span class="row__title">Основная информация</span>
                        <p>Очет создал: <span><?= $report_search['user'] ?></span></p>
                        <p>Дата создания: <span><?= date('d.m.Y H:i', $report_search['datetime']) ?></span></p>
                        <p>Исполнитель: <span><a href="//vk.com/id<?= $report_search['worker_url'] ?>">ссылка</a></span></p>
                        <p>Тариф: <span><?= $report_search['tariff'] ?></span></p>
                        <p>Наша почта: <span><?= $report_search['our_email'] ?></span></p>
                        <p>FA исполнителя: <span><?= $report_search['worker_url_fa'] ?></span></p>
                        <p>Почта клиента: <span><?= $report_search['client_email'] ?></span></p>
                        <p>Курс к рублю: <span><?= $report_search['course'] ?></span></p>
                        <p>Наши проценты: <span><?= $report_search['our_percents'] ?></span></p>
                        <p>Клиент заплатил: <span>$<?= $report_search['client_amount']?></span></p>
                        <p>Сумма в рублях: <span><?= $report_search['rub_amount']?></span></p>
                        <p>Исполнителю: <span><?= $report_search['worker_pay']?></span></p>
                        <p>Итого: <span><?= $report_search['total_amount']?></span></p>
                        <p>Комментарий к операции: <br><span><?=$report_search['operation_comment']?></span></p>
                    </div>
                    <div class="info-row__right-side">
                        <span class="row__title">Корзина</span>
                        <div class="table-wrap">
                            <table id="cartTable" class="display">
                                <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Ссылка</td>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <span class="row__title">Скриншоты операции</span>
                <div class="info-row">
                    <div class="photos-wrap">
                        <?= $cards ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
} else {
    ?>
    <div class="container">
        <div class="row row__title">
            <div class="col"><span>Информация об отчете</span></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="info-row">
                    <div class="warn-message">
                        <div class="warn-message__icon">
                            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle"
                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                 class="warning-icon__big">
                                <path fill="currentColor"
                                      d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"
                                      class=""></path>
                            </svg>
                        </div>
                        <div class="warn-message__text">
                            <p>При загрузке возникли проблемы, попробуйте позже</p>
                        </div>
                    </div>
                </div>
                <span class="row__title">Скриншоты оплаты</span>
                <div class="info-row">
                    <div class="warn-message">
                        <div class="warn-message__icon">
                            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle"
                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                 class="warning-icon__big">
                                <path fill="currentColor"
                                      d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"
                                      class=""></path>
                            </svg>
                        </div>
                        <div class="warn-message__text">
                            <p>При загрузке возникли проблемы, попробуйте позже</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
}
?>
</body>
<script src="/libs/dataTables/datatables.js"></script>
<script src="/js/reportInfoFA.js"></script>
</html>
