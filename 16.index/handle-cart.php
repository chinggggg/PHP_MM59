<?php

include __DIR__ . '/config.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$output = [];

$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;




switch ($action) {

    default:
    case 'read':
        break;

    case 'add':
        if (!$sid or !$quantity) {
            $output['code'] = 401;
        } else {

            if (isset($_SESSION['cart']['sid'])) {
                $_SESSION['cart'][$sid]['quantity'] = $quantity;
            } else {

                $sql = "SELECT * FROM products WHERE sid=$sid";
                $row = $pdo->query($sql)->fetch();

                if (empty($row)) {
                    $output['code'] = 401;
                } else {
                    $row['quantity'] = $quantity;
                    $_SESSION['cart'][$row['sid']] = $row;
                }
            }
        }
        break;

    case 'remove':
        if (isset($_SESSION['cart'][$sid])) {
            unset($_SESSION['cart'][$sid]);
        } else {
            $output['code'] = 402;
        }

        break;
}
$output['cart'] = $_SESSION['cart'];
echo json_encode($output, JSON_UNESCAPED_UNICODE);
