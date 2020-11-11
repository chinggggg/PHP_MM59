<?php include __DIR__ . '/config.php'; ?>



<?php
if (isset($_POST['account']) and isset($_POST['password'])) {
    if ($_POST['account'] === 'cccc' and $_POST['password'] === '1234') {
        $_SESSION['user'] = [
            'account' => 'cccc',
            'nickname' => '小花'
        ];
    } else {
        $msg = '帳號或密碼錯誤';
    }
}
?>

<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12">

            <?php if (isset($msg)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $msg ?>
                </div>
            <?php endif; ?>

            <div class="card">


                <div class="card-body">
                    <h5 class="card-title">登入</h5>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <h6> <?= $_SESSION['user']['nickname'] ?>你好</h6>
                        <p><a href="17.index_lognout.php">登出</a></p>

                    <?php else : ?>


                        <form action="" method="post">
                            <div class="form-group">
                                <label for="account">Account</label>
                                <input type="text" class="form-control" id="account" name="account">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/scripts.php'; ?>
<?php include __DIR__ . '/foot.php'; ?>

<?php



?>