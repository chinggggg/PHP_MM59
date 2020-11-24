<?php include __DIR__ . '/config.php'; ?>





<?php include __DIR__ . '/html-head.php'; ?>
<?php include __DIR__ . '/scripts.php'; ?>
<?php include __DIR__ . '/nav-proj.php'; ?>


<div class="container mt-5">
    <?php if (empty($_SESSION['cart'])) : ?>
        <div class="alert alert-danger" role="alert">
            購物車沒商品
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">刪除</th>
                            <th scope="col">預覽</th>
                            <th scope="col">書名</th>
                            <th scope="col">價格</th>
                            <th scope="col">數量</th>
                            <th scope="col">小計</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $i) : ?>


                            <tr class="product-item" data-sid="<?= $i['sid'] ?>" id="prod<?= $i['sid'] ?>">
                                <td> <a href="javascript: removeItem( <?= $i['sid'] ?>) ">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td><img src="../../mmmh57-php/proj/imgs/small/<?= $i['book_id'] ?>.jpg" alt="">
                                </td>

                                <td><?= $i['bookname'] ?></td>
                                <td class="price" data-price="<?= $i['price'] ?>">
                                    <?= $i['price'] ?></td>

                                <td class="quantity" data-quantity="<?= $i['quantity'] ?>">
                                    <select class="quantity form-control w-auto " style="display:inline-block">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>

                                <!-- <td><?= $i['price'] * $i['quantity'] ?></td> -->
                                <td class="subtotal">0</td>
                            </tr>

                        <?php endforeach;  ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row ">
            <div class="col ">
                <div class="alert alert-primary d-flex justify-content-end" role="alert">
                    總計： <span id="totleAmount"></span>
                </div>
            </div>

        </div>
        <div class="row mb-5 ">
            <div class="col d-flex justify-content-end">
                <?php if (isset($_SESSION['user'])) : ?>

                    <button class="btn btn-info pl-5 pr-5 p-2" onclick="doBuy()">結帳</button>
                <?php else : ?>
                    <a href="user-login.php">
                        <button class="btn btn-danger pl-5 pr-5 p-2">請先登入</button>
                    </a>
                <?php endif; ?>
            </div>
        </div>



    <?php endif; ?>


</div>

<script>
    const dallorCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    function removeItem(sid) {
        $.get('handle-cart.php', {
            sid: sid,
            action: 'remove'
        }, function(data) {
            console.log(data);
            countCart(data.cart);
            $('#prod' + sid).remove();
            calcTotal()
        }, 'json');

    };

    function calcTotal() {
        let total = 0;
        $('.product-item').each(function() {
            const tr = $(this);
            const price = parseInt(tr.find('td.price').attr('data-price'))
            const quantity = parseInt(tr.find('td.quantity').attr('data-quantity'))

            tr.find('td.quantity > select').val(quantity);
            tr.find('.subtotal').text('$' + dallorCommas(price * quantity));
            total += price * quantity;
        });
        $('#totleAmount').text('$' + dallorCommas(total))
    }
    calcTotal()


    $('.product-item td.quantity > select').on('change', function() {

        const quantity = $(this).val();
        const tr = $(this).closest('.product-item');
        const sid = tr.attr('data-sid');
        const combo = $(this);

        $.get('handle-cart.php', {
            sid,
            action: 'add',
            quantity
        }, function(data) {
            console.log(data);
            countCart(data.cart);
            combo.closest('td.quantity').attr('data-quantity', quantity);
            calcTotal()
        }, 'json');

    })

    function doBuy() {
        $.get('buy-api.php', function(data) {
            if (data.success) {
                alert('感謝訂購~');
                location.reload(); // 重新載入頁面
            } else {
                console.log(data);
            }
        }, 'json');

    }
  
</script>

<?php include __DIR__ . '/foot.php'; ?>