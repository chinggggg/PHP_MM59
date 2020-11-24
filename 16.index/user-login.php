<?php include __DIR__ . '/config.php'; ?>
<?php
if (isset($_SESSION['user'])) {
    header('Location: prod-list.php');
}

if (isset($_SERVER['HTTP_REFERER'])) {
    $gotoURL = $_SERVER['HTTP_REFERER'];
} else {
    $gotoURL = 'prod-list.php';
}
?>

<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/scripts.php'; ?>
<?php include __DIR__ . '/nav-proj.php'; ?>


<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-7">


            <div id="info-bar" class="alert alert-danger" role="alert" style="display: none;">
            </div>

            <div class="card">


                <div class="card-body">
                    <h5 class="card-title">SHOP59-登入</h5>



                    <form name="form1" onsubmit="checkForm(); return false;">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="texts" class="form-control" id="email" name="email">
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


<script>
    const email = $('#email');
    const password = $('#password');
    const info_bar = $('#info-bar');

    function checkForm() {
        $.post('user-login-api.php', {
            email: email.val(),
            password: password.val()
        }, function(data) {
            if (data.success) {
                info_bar
                    .text('登入成功')
                    .removeClass('alert-danger')
                    .addClass('alert-success');
                location.href = '<?= $gotoURL ?>';
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