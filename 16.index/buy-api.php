<?php
require __DIR__ . '/config.php';

if (!isset($_SESSION['user'])) {
    echo json_encode([
        'error' => '沒登入會員',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}


if (empty($_SESSION['cart'])) {
    echo json_encode([
        'code' => 300,
        'error' => '購物車沒內容',

    ], JSON_UNESCAPED_UNICODE);
    exit;
}



$totle = 0;

foreach ($_SESSION['cart'] as $i) {
    $totle += $i['price'] * $i['quantity'];
}

$o_sql = "INSERT INTO `orders`( `member_sid`, `amount`, `order_date`) VALUES(?,?,NOW())";

$o_stmt = $pdo->prepare($o_sql);
$o_stmt->execute([
    $_SESSION['user']['id'],
    $totle
]);



$order_sid = $pdo->lastInsertId();

$d_sql = "INSERT INTO `order_details`(  `order_sid`, `product_sid`, `price`, `quantity`) VALUES(?,?,?,?)";
$d_stmt = $pdo->prepare($d_sql);

foreach ($_SESSION['cart'] as $i) {
    $d_stmt->execute([
        $order_sid,
        $i['sid'],
        $i['price'],
        $i['quantity'],
    ]);
}

unset($_SESSION['cart']);

// echo json_encode([
//     'new_id' => $pdo->c
// ], JSON_UNESCAPED_UNICODE);

echo json_encode([
    'success' => true
], JSON_UNESCAPED_UNICODE);
