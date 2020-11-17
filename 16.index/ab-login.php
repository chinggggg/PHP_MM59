<?php include __DIR__ . '/config.php'; ?>
<?php
if (isset($_SESSION['admin'])) {
    header('Location: ab-list.php');
}
?>
<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/nav.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">


            <div id="info-bar" class="alert alert-danger" role="alert" style="display: none;">
            </div>

            <div class="card">


                <div class="card-body">
                    <h5 class="card-title">管理通訊錄-登入</h5>



                    <form name="form1" onsubmit="checkForm(); return false;">
                        <div class="form-group">
                            <label for="account">Account</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">

                        </div>

                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/scripts.php'; ?>
<script>
    const account = $('#account');
    const password = $('#password');
    const info_bar = $('#info-bar');

    function checkForm() {
        $.post('ab-login-api.php', {
            account: account.val(),
            password: password.val()
        }, function(data) {
            if (data.success) {
                info_bar
                    .text('登入成功')
                    .removeClass('alert-danger')
                    .addClass('alert-success');
                location.href = 'ab-list.php';
            } else {
                info_bar
                    .text('登入失敗')
                    .removeClass('alert-success')
                    .addClass('alert-danger');
            }

            info_bar.slideDown();

            setTimeout(function() {
                info_bar.slideUp();
            }, 3000);


        }, 'json');
    }
</script>



<?php include __DIR__ . '/foot.php'; ?>

<?php



?>