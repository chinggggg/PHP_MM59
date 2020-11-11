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
$spl = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, 
    `birthday`, `address`, `created_at`) VALUES (
    ?,?,?,
    ?,?,now()

    )";

$stmt = $pdo->prepare($spl);
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address'],
]);

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    $output['error'] = '';
};
echo json_encode($output, JSON_UNESCAPED_UNICODE);
