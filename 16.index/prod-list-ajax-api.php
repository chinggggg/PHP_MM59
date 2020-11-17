<?php include __DIR__ . '/config.php';
$output = [];

$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;

$c_spl = "SELECT * FROM `categories` WHERE `parent_sid` = 0 ";
$c_rows = $pdo->query($c_spl)->fetchAll();

$where = 'WHERE 1';
if (!empty($cate)) {
    $params['cate'] = $cate;
    $where .= " AND `category_sid`=$cate ";
}


$t_sql = "SELECT COUNT(1) FROM products $where";
$t_stmt = $pdo->query($t_sql);

// echo json_encode($t_stmt->fetch(PDO::FETCH_NUM)[0])exit;;//總筆數
$totalRows = $t_stmt->fetch(PDO::FETCH_NUM)[0]; //總筆數

if ($totalRows != 0) {

    $sql = sprintf(
        "SELECT * FROM products %s ORDER BY sid ",
        $where,
    );

    // echo $sql; exit;

    $stmt = $pdo->query($sql);

    $row = $stmt->fetchAll();
    // header('Content-Type: application/json');
    // echo json_encode($row, JSON_UNESCAPED_UNICODE);

} else {
    $row = [];
}
$output['products'] = $row;

header('Content-Type: application/json');

echo json_encode($output,JSON_UNESCAPED_UNICODE);
