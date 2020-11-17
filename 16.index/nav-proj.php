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
                    <a class="nav-link <?= $pagename == 'ab-list' ? 'active' : '' ?> " href="prod-list.php">商品列表</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link <?= $pagename == 'ab-insert' ? 'active' : '' ?> " href="">購物車
                        <span class="badge badge-pill badge-danger count-badge">0</span>
                    </a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link <?= $pagename == 'ab-list' ? 'active' : '' ?> " href="prod-list-ajax.php">商品列表ajax</a>
                </li>


            </ul>

            <ul class="navbar-nav ml-auto ">

                <li class="nav-item mr-3">
                    <a class="nav-link <?= $pagename == 'ab-list' ? 'active' : '' ?> " href="proj-login.php">登入</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link <?= $pagename == 'ab-insert' ? 'active' : '' ?> " href="proj-sign-in.php">註冊</a>
                </li>


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