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
        <a class="navbar-brand" href="#">SHOP 59</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">

                <li class="nav-item mr-3">
                    <a class="nav-link <?= $pagename == 'prod-list' ? 'active' : '' ?> " href="prod-list.php">商品列表</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link <?= $pagename == 'ab-insert' ? 'active' : '' ?> " href="cart-list.php">購物車
                        <span class="badge badge-pill badge-danger count-badge">0</span>
                    </a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link <?= $pagename == 'ab-list' ? 'active' : '' ?> " href="prod-list-ajax.php">商品列表ajax</a>
                </li>


            </ul>

            <ul class="navbar-nav ml-auto ">

                <?php if (isset($_SESSION['user'])) : ?>

                    <li class="nav-item mr-3 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['user']['nickname'] ?>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="order-history.php">歷史訂單</a>
                            <a class="dropdown-item" href="#">修改資料</a>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link <?= $pagename == 'prod-insert' ? 'active' : '' ?> " href="user-logout.php">登出</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item mr-3">
                        <a class="nav-link <?= $pagename == 'prod-list' ? 'active' : '' ?> " href="user-login.php">登入</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link <?= $pagename == 'prod-insert' ? 'active' : '' ?> " href="user-sign-in.php">註冊</a>
                    </li>
                <?php endif; ?>




            </ul>

        </div>
    </div>
</nav>


<script>
    const count_badge = $('.count-badge');

    function countCart(cart) {
        let count = 0;
        for (let i in cart) {
            count += cart[i].quantity * 1;
        }
        count_badge.html(count);
    }


    $.get('handle-cart.php', function(data) {
        console.log(data);
        countCart(data.cart);
    }, 'json');
</script>