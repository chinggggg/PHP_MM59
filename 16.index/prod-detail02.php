<?php include __DIR__ . '/config.php';

if (!isset($_GET['sid'])) {
    header('Location: prod-list.php');
    exit;
}

$sid = intval($_GET['sid']);

$sql = "SELECT * FROM products WHERE sid=$sid";
$row = $pdo->query($sql)->fetch();

if (empty($row)) {
    header('Location: prod-list.php');
    exit;
};

echo json_encode($row, JSON_UNESCAPED_UNICODE);
