<?php
require __DIR__ . '/config.php';
$output = [
    'success' => false,
];


if (empty($_POST['account'])) {
    echo json_encode($output, JSON_UNESCAPED_UNICODE), exit;
}


$spl = "SELECT `sid`, `account`, `nickname` FROM `admin` WHERE `account`=? AND `password`=SHA1(?)";
$output['spl'] = $spl;


$stmt = $pdo->prepare($spl);
$stmt->execute([
    $_POST['account'],
    $_POST['password'],
]);


if ($stmt->rowCount() > 0) {
    $output['success'] = true;
    $_SESSION['admin'] = $stmt->fetch();
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
