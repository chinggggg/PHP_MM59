<?php include __DIR__ . '/config.php';


$params = [];
$perpage = 4; //每筆五頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
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
$totalpages = ceil($totalRows / $perpage);

if ($totalRows != 0) {

    if ($page < 1) {
        header('Location:prod-list.php');
        exit;
    }
    if ($page > $totalpages) {
        header('Location:prod-list.php?page=' . $totalpages);
        exit;
    }
    $sql = sprintf(
        "SELECT * FROM products %s ORDER BY sid DESC LIMIT %s, %s",
        $where,
        ($page - 1) * $perpage,
        $perpage
    );

    // echo $sql; exit;

    $stmt = $pdo->query($sql);

    $row = $stmt->fetchAll();
    // header('Content-Type: application/json');
    // echo json_encode($row, JSON_UNESCAPED_UNICODE);

} else {
    $row = [];
}
?>


<!-- <style>
    * {
        outline: solid 1px red;
    }
</style> -->


<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/scripts.php'; ?>
<?php include __DIR__ . '/nav-proj.php'; ?>


<div class="container mt-5">
    <!-- <p> -->
    <!-- <?= json_encode($row, JSON_UNESCAPED_UNICODE) ?> -->
    <!-- </p> -->

    <div class="row">
        <div class="col-3 ">
            <div class="btn-group-vertical w-100">

                <a type="button" class="btn btn<?= empty($cate) ? '' : '-outline' ?>-info" href="prod-list.php">所有商品</a>

                <?php foreach ($c_rows as $c) : ?>
                    <a type="button" class="btn btn<?= $cate == $c['sid'] ?  '' : '-outline' ?>-info" href="?cate=<?= $c['sid'] ?>"><?= $c['name'] ?></a>


                <?php endforeach; ?>



                <!-- <button type="button" class="btn btn-outline-info">Info</button>
                    <button type="button" class="btn btn-outline-info">Info</button> -->

            </div>
        </div>
        <div class="col-9">
            <div class="row">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                        <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>"><a class="page-link" href="?=<?php $params['page'] = $page - 1;
                                                                                                                echo http_build_query($params);
                                                                                                                ?>">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </li>


                        <?php for ($i = $page - 2; $i <= $page + 2; $i++) : ?>
                            <?php if ($i >= 1 and $i <= $totalpages) : ?>


                                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                    <a class="page-link" href="?
                                    <?php
                                    $params['page'] = $i;
                                    echo http_build_query($params);
                                    ?>">
                                        <?= $i ?>
                                    </a></li>
                            <?php endif ?>
                        <?php endfor ?>
                        <li class="page-item <?= $page == $totalpages ? 'disabled' : '' ?>"><a class="page-link" href="?<?php
                                                                                                                        $params['page'] = $page + 1;
                                                                                                                        echo http_build_query($params);
                                                                                                                        ?>">
                                <i class="fas fa-arrow-right"></i>
                            </a></li>
                    </ul>
                </nav>
            </div>

            <div class="row">
                <?php foreach ($row as $r) : ?>
                    <div class="col-md-3 product-item" data-sid="<?= $r['sid'] ?>">
                        <div class="card">
                            <img src="../imgs/big/<?= $r['book_id'] ?>.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-text"><?= $r['bookname'] ?></h6>
                                <p><i class="fas fa-user"></i> <?= $r['author'] ?></p>
                                <p><i class="fas fa-dollar-sign"> </i><?= $r['price'] ?></p>

                                <select class="quantity form-control w-auto " name="" id="" style="display:inline-block">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <button class="btn btn-info buy-btn"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>




</div>



<script>
    $('.buy-btn').on('click', function() {
        console.log('this', this);
        const item = $(this).closest('.product-item');
        console.log('item', item);

        const sid = item.attr('data-sid');
        console.log('sid', sid);

        const qty = item.find('.quantity').val();
        console.log('qty', qty);

        console.log({
            sid: sid,
            quantity: qty
        });

        // $get('handle-cart.php', {
        //     sid: sid,
        //     quantity: qty,
        //     action: 'add'
        // }, function(data) {
        //     console.log(data)
        // }, 'json');


        $.get('handle-cart.php', {
            sid: sid,
            quantity: qty,
            action: 'add'
        }, function(data) {
            console.log(data);
        }, 'json');

    });
</script>

<?php include __DIR__ . '/foot.php'; ?>