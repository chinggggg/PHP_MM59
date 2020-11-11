<?php include __DIR__ . '/config.php';
$pagename = 'ab-insert';


?>




<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/nav.php'; ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-12">

            <?php if (isset($msg)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $msg ?>
                </div>
            <?php endif; ?>

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">新增通訊錄</h5>

                    <form action="ab-insert-api.php" method="post">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="mobile">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
                        </div>
                        <div class="form-group">
                            <label for="birthday"></label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>

                        </div>

                        <button type="submit" class="btn btn-primary">新增</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/scripts.php'; ?>
<?php include __DIR__ . '/foot.php'; ?>

<?php



?>