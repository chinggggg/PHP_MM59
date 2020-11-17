<?php
if (!isset($pageName)) {
    $pageName = '';
}
if (!isset($_SESSION)) {
    session_start();
}
?>

<style>
    .navbar-nav .nav-item a.nav-link.active {
        color: cadetblue;
        border-bottom: solid 3px cadetblue
    }

    .navbar-nav .nav-item a.nav-link:hover {
        color: cadetblue;
    }
</style>





<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">MM59</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item mr-3">
                    <a class="nav-link <?= $pagename == 'ab-list' ? 'active' : '' ?> " href="ab-list.php">通訊錄列表</a>
                </li>

                <?php if (isset($_SESSION['admin'])) : ?>
                    <li class="nav-item ">
                        <a class="nav-link <?= $pagename == 'ab-insert' ? 'active' : '' ?> " href="ab-insert.php">新增通訓資料</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item ">
                        <a class="nav-link disabled<?= $pagename == 'ab-insert' ? 'active' : '' ?> " href="ab-insert.php">新增通訓資料</a>
                    </li>
                <?php endif; ?>

                <?php if (!isset($_SESSION['admin'])) : ?>
                    <li class="nav-item ">
                        <a class="nav-link <?= $pagename == 'ab-login' ? 'active' : '' ?>" href="ab-login.php">login</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item ">
                        <a class="nav-link"> <?= $_SESSION['admin']['nickname'] ?> ，你好</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="ab-logout.php">登出</a>
                    </li>
                <?php endif; ?>

            </ul>

        </div>
    </div>
</nav>