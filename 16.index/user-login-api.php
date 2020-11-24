<?php
require __DIR__ . '/config.php';
$output = [
    'success' => false,
];


if (empty($_POST['email'])) {
    echo json_encode($output, JSON_UNESCAPED_UNICODE), exit;
}


$spl = "SELECT * FROM `members` WHERE `email`=? AND `password`=SHA1(?)";
$output['spl'] = $spl;


$stmt = $pdo->prepare($spl);
$stmt->execute([
    $_POST['email'],
    $_POST['password'],
]);


if ($stmt->rowCount() > 0) {
    $output['success'] = true;
    $_SESSION['user'] = $stmt->fetch();
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
