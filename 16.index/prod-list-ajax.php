<?php include __DIR__ . '/config.php';


$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;

$c_spl = "SELECT * FROM `categories` WHERE `parent_sid` = 0 ";
$c_rows = $pdo->query($c_spl)->fetchAll();

?>

<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/nav-proj.php'; ?>

<div class="container mt-5">

    <div class="row">
        <div class="col-3 ">
            <div class="btn-group-vertical w-100">

                <button type="button" class=" cate-btn btn btn-outline-info" data-sid="0">所有商品</button>

                <?php foreach ($c_rows as $c) : ?>
                    <button type="button" class="cate-btn btn btn-outline-info" data-sid="<?= $c['sid'] ?>">
                        <?= $c['name'] ?>
                    </button>

                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-9">
            <div class="row product-list">

            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . '/scripts.php'; ?>
<script>
    const cate_btns = $('.cate-btn');
    const productTpl = function(a) {
        return `
        <div class="col-md-3">
                        <div class="card">
                            <img src="../imgs/big/${a.book_id}.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-text">${a.bookname}</h6>
                                <p><i class="fas fa-user"></i> ${a.author}</p>
                                <p><i class="fas fa-dollar-sign"> </i>${a.price}</p>
                                <select class="form-control w-auto " name="" id="" style="display:inline-block">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <button class="btn btn-info"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
        `
    }





    function whenHashChanged() {
        let u = parseInt(location.hash.slice(1)) || 0;
        console.log(u);
        getProductData(u);

        cate_btns.removeClass('btn-info').addClass('btn-outline-info');
        cate_btns.each(function(index, el) {
            const sid = parseInt($(this).attr('data-sid'));
            if (sid === u) {
                $(this).removeClass('btn-outline-info').addClass('btn-info');
            }

        });
        // $(this).removeClass('btn-outline-info').addClass('btn-info');
    }
    window.addEventListener('hashchange', whenHashChanged);
    whenHashChanged();


    cate_btns.on('click', function(event) {
        // cate_btns.removeClass('btn-info').addClass('btn-outline-info');
        // $(this).removeClass('btn-outline-info').addClass('btn-info');

        const sid = $(this).attr('data-sid') * 1;
        console.log(`sid: ${sid}`);
        location.href = "#" + sid;

    });

    function getProductData(cate = 0) {
        $.get('prod-list-ajax-api.php', {
            cate: cate
        }, function(data) {
            console.log(data);

            let str = '';
            if (data.products && data.products.length) {
                data.products.forEach(function(el) {
                    str += productTpl(el);
                });
            }
            $('.product-list').html(str);

        }, 'json');
    }
</script>


<?php include __DIR__ . '/foot.php'; ?>