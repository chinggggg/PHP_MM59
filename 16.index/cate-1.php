<?php
include __DIR__ . '/config.php';

$spl = "SELECT * FROM `categories` WHERE `visible` = 1 ORDER BY `sequence`";

$rows = $pdo->query($spl)->fetchAll();

$cate = [];

foreach ($rows as $r) {
    if ($r['parent_sid'] == 0) {
        $cate[] = $r;
    }
}

foreach ($cate as $k => $c) {

    foreach ($rows as $k2 => $r) {
        if ($c['sid'] == $r['parent_sid']) {
            $cate[$k]['children'][] = $r;
        }
    }
}





echo json_encode($cate, JSON_UNESCAPED_UNICODE);
