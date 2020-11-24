<?php include __DIR__ . '/config.php';

if (!isset($_SESSION['user'])) {
    header('Location:user-login.php');
    exit;
}
$member_sid = intval($_SESSION['user']['id']);
$o_sql = "SELECT * FROM `orders` WHERE `member_sid` = $member_sid ORDER BY `order_date` DESC";

$o_rows = $pdo->query($o_sql)->fetchAll();

if (empty($o_rows)) {
    header('Location:user-login.php');
    exit;
}

$order_sid = [];
foreach ($o_rows as $o) {
    $order_sids[] = $o['sid'];
}

$d_sql = sprintf("SELECT  d.*, p.bookname, p.book_id FROM `order_details`  d  JOIN `products` p ON p.sid = d.product_sid
WHERE d.`order_sid` IN (%s)", implode(',', $order_sids));

$d_rows = $pdo->query($d_sql)->fetchAll();

// echo json_encode([
//     'order' => $o_rows,
//     'details' => $d_rows,
// ]);
// exit;
?>

<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/scripts.php'; ?>
<?php include __DIR__ . '/nav-proj.php'; ?>


<div class="container mt-5">

    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <tbody>
                    <?php foreach ($o_rows as $o) : ?>

                        <tr class="table-info">

                            <td>訂單編號： <?= $o['sid'] ?></td>
                            <td>總金額： <?= $o['amount'] ?></td>
                            <td>訂購時間 ：<?= $o['order_date'] ?></td>

                        <tr>
                            <td colspan="3">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>商品名</td>
                                            <td>書號</td>
                                            <td>價格</td>
                                            <td>數量</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($d_rows as $d) : ?>
                                            <?php if ($o['sid'] == $d['order_sid']) : ?>
                                                <tr>
                                                    <td><?= $d['product_sid'] ?></td>
                                                    <td><?= $d['bookname'] ?></td>
                                                    <td><?= $d['book_id'] ?></td>
                                                    <td><?= $d['price'] ?></td>
                                                    <td><?= $d['quantity'] ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach;  ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>



                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row ">
        <div class="col ">
            <div class="alert alert-primary d-flex justify-content-end" role="alert">
                總計： <span id="totleAmount"></span>
            </div>
        </div>

    </div>


</div>

<script>

</script>

<?php include __DIR__ . '/foot.php'; ?>