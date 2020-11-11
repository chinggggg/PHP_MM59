<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <pre>
                <?php print_r($_GET) ?>
            </pre>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <form action="" method="get">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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