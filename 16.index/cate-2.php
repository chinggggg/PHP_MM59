<?php
include __DIR__ . '/config.php';

$spl = "SELECT * FROM `categories` WHERE `visible` = 1 ORDER BY `sequence`";

$rows = $pdo->query($spl)->fetchAll();

$cate = [];

foreach ($rows as $r) {
    if ($r['parent_sid'] == 0) {
        $cate[] = $r;
    }
}

foreach ($cate as $k => $c) {

    foreach ($rows as $k2 => $r) {
        if ($c['sid'] == $r['parent_sid']) {
            $cate[$k]['children'][] = $r;
        }
    }
}

// echo json_encode($cate, JSON_UNESCAPED_UNICODE);
?>

<?php include __DIR__ . '/html-head.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php foreach ($cate as $k => $c) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <?= $c['name'] ?>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($c['children'] as $c2) : ?>
                            <a class="dropdown-item" href="?sid=<?= $c2['sid'] ?>"><?= $c2['name'] ?></a>
                        <?php endforeach; ?>
                    </div>

                </li>
            <?php endforeach; ?>

        </ul>

    </div>
</nav>




<?php include __DIR__ . '/scripts.php'; ?>
<?php include __DIR__ . '/foot.php'; ?>