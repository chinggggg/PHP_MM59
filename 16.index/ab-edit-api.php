<?php
require __DIR__ . '/config.php';
$output = [
    'success' => false,
    'code' => 0,
    'error' => '沒有資料',
];


if (empty($_POST['name'])) {
    echo json_encode($output, JSON_UNESCAPED_UNICODE), exit;
}
$spl = "UPDATE `address_book` SET `name`=?,
`email`=?,
`mobile`=?,
`birthday`=?,
`address`=?
 WHERE `sid`=?";

$stmt = $pdo->prepare($spl);
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address'],
    $_POST['sid'],
]);

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    $output['error'] = '';
} else {
    $output['error'] = '資料沒修改';
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
