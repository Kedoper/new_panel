<?php
include $_SERVER['DOCUMENT_ROOT'] . '/settings/loadAll.php';

$reports = [];

$vk_reports = R::findCollection('reports');
$fa_reports = R::findCollection('fareports');

function cmp_function_desc($a, $b){
    return ($a['datetime'] < $b['datetime']);
}

while ($vk_report = $vk_reports->next()) {
    $reports[] = [
        'id' => $vk_report['id'],
        'creator' => $vk_report['user'],
        'wp_amount' => $vk_report['total_price'],
        'datetime' => $vk_report['datetime'],
        'timestamp' => $vk_report['datetime'],
//        'normal_time' => date('d.m.Y H:i:s',$vk_report['datetime']),
        'social' => 'vk',
        'link' => 'id'
    ];
}
while ($fa_report = $fa_reports->next()) {
    $reports[] = [
        'id' => $fa_report['id'],
        'creator' => $fa_report['user'],
        'wp_amount' => $fa_report['total_amount'],
        'datetime' => $fa_report['datetime'],
        'timestamp' => $fa_report['datetime'],
//        'normal_time' => date('d.m.Y H:i:s',$fa_report['datetime']),
        'social' => 'fa',
        'link' => 'fid'
    ];
}



uasort($reports, 'cmp_function_desc');
$reports = array_values($reports);
$i = 0;
foreach ($reports as $report_item) {
    $reports[$i]['datetime'] = date('d.m.Y H:i:s',$report_item['datetime']);
    $i++;
}
print_r(json_encode($reports));