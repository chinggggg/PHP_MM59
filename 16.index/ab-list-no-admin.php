<?php
require __DIR__ . '/config.php';
$pagename = 'ab-list';

$perpage = 5; //每筆五頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_sql = "SELECT COUNT(1) FROM address_book ";
$t_stmt = $pdo->query($t_sql);

// echo json_encode($t_stmt->fetch(PDO::FETCH_NUM)[0])exit;;//總筆數
$totalRows = $t_stmt->fetch(PDO::FETCH_NUM)[0]; //總筆數
$totalpages = ceil($totalRows / $perpage);

if ($totalRows != 0) {

    if ($page < 1) {
        header('Location:ab-list.php');
        exit;
    }
    if ($page > $totalpages) {
        header('Location:ab-list.php?page=' . $totalpages);
        exit;
    }
    $sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perpage, $perpage);

    // echo $sql; exit;

    $stmt = $pdo->query($sql);

    $row = $stmt->fetchAll();
    // header('Content-Type: application/json');
    // echo json_encode($row, JSON_UNESCAPED_UNICODE);

} else {
    $row = [];
}
?>

<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/nav.php'; ?>
<div class="container">
    <div class="row mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $page - 1 ?>">
                        <i class="fas fa-arrow-left"></i>
                    </a></li>
                <?php for ($i = $page - 2; $i <= $page + 2; $i++) : ?>
                    <?php if ($i >= 1 and $i <= $totalpages) : ?>
                        <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>
                <li class="page-item <?= $page == $totalpages ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $page + 1 ?>"><i class="fas fa-arrow-right"></i></a></li>
            </ul>
        </nav>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">birthday</th>
                    <th scope="col">Address</th>
                    <th scope="col">建立時間</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $r) : ?>
                    <tr>

                        <td> <?= $r['sid'] ?></td>
                        <td> <?= htmlentities($r['name']) ?></td>
                        <td> <?= $r['email'] ?></td>
                        <td> <?= $r['mobile'] ?></td>
                        <td> <?= $r['birthday'] ?></td>
                        <td> <?= strip_tags($r['address']) ?></td>
                        <td> <?= $r['created_at'] ?></td>


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<?php include __DIR__ . '/scripts.php'; ?>
<script>
    function delete_it(sid) {
        if (confirm(`確定要刪除${sid}的資料嗎？`)) {

            location.href = "ab-del.php?sid=" + sid;

        }
    }
</script>



<?php include __DIR__ . '/foot.php'; ?>