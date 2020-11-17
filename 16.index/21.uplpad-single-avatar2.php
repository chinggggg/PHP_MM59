<?php
require __DIR__ . '/config.php';
header('Content-Type: application/json');
// echo json_encode($_FILES);

$allowFiles = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
]

$output = [
    'img' => '',
    'error' => '只接受 jpeg, png, gif 圖檔'
];

if (empty($_FILES['avatar']) or $_FILES['avatar']['type'] !== 'image/jpeg') {
    $output['ori'] = $_FILES;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};



move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/uploads/' . $_FILES['avatar']['name']);
$output['img'] = '/uploads/' . $_FILES['avatar']['name'];
$output['error'] = '';




echo json_encode($output, JSON_UNESCAPED_UNICODE);
