<?php include __DIR__ . '/config.php';
$pagename = 'ab-insert';
require __DIR__ . '/ab-admin-required.php';

?>

<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/nav.php'; ?>
<style>
    small.form-text {
        color: red
    }
</style>


<div class="container">
    <div class="row mt-5">
        <div class="col-12">

    
            <div id="info-bar" class="alert alert-danger" role="alert" style="display: none;">
                <?= $msg ?>
            </div>


            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">新增通訊錄</h5>
                    <!-- <form action="ab-insert-api.php" method="post"> -->

                    <form name="form1" onsubmit="checkForm(); return false;" novalidate>
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <small class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <small class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
                            <small class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday"></label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                            <small class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                            <small class="form-text"></small>

                        </div>


                        <button type="submit" class="btn btn-primary">新增</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/scripts.php'; ?>
<script>
    const name = $('#name');
    const email = $('#email');
    const info_bar = $('#info-bar');

    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;


    function checkForm() {
        name.next().text('')
        email.next().text('')


        let isPass = true;

        if (name.val().length < 2) {
            isPass = false;
            name.next().text('請填寫正確姓名');
        }

        if (email.val()) {
            if (!email_re.test(email.val())) {
                isPass = false;
                email.next().text('請填寫正確 email格式');
            }
        }

        if (isPass) {
            $.post('ab-insert-api.php', $(document.form1).serialize(), function(data) {

                console.log(data);

                if (data.success) {
                    info_bar
                        .text('新增完成')
                        .removeClass('alert-danger')
                        .addClass('alert-success');
                } else {
                    info_bar
                        .text(data.error || '新增失敗')
                        .removeClass('alert-success')
                        .addClass('alert-danger');
                }
                info_bar.slideDown();

                setTimeout(function() {
                    info_bar.slideUp();
                }, 3000);
            }, 'json')
        }
    }
    // 參考
    // https://github.com/shinder/mmmh57-php/blob/master/proj/login.php
</script>

<?php include __DIR__ . '/foot.php'; ?>