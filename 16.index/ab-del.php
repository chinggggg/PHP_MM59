<?php
require __DIR__ . '/config.php'; ?>

<?php
require __DIR__ . '/ab-admin-required.php';
if (isset($_GET['sid'])) {
    $sid = intval($_GET['sid']);
} else {
    header('Location: ab-list.php');
    exit;
}
$sql = "DELETE FROM `address_book` WHERE sid=$sid";
$pdo->query($sql);


if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ab-list.php');
}
?>

<?php include __DIR__ . '/scripts.php'; ?>

<?php include __DIR__ . '/foot.php'; ?>
