<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-stt">STT</th>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // unset($_SESSION['myCart']);
                                $totalBill = 0;
                                $i = 0;
                                $tongtienthanhtoan = 0;
                                foreach ($_SESSION['myCart'] as $cart) :
                                    $totalPrice = $cart[2] * $cart[4];
                                    $totalBill += $totalPrice;
                                ?>
                                    <tr>
                                        <td><?= (1 + $i) ?></td>
                                        <td class="product-thumbnail">
                                            <?php
                                            $imageNames = explode(';', $cart[3]);
                                            if (!empty($imageNames[0])) : ?>
                                                <a href="?act=detail&id=<?= $cart[0] ?>"><img src="images/<?= $imageNames[0] ?>" alt="product img" width="60px" height="86px" /></a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="product-name"><a href=""><?= $cart[1] ?></a></td>
                                        <td>
                                            <ul class="pro__prize">
                                                <li><?= number_format($cart[2]) ?> VND</li>
                                            </ul>
                                        </td>
                                        <td class="product-quantity">
                                            <ul class="pro__prize">
                                                <li><?= $cart[4] ?></li>
                                            </ul>
                                        </td>
                                        <td class="product-price"><span class="amount"><?= number_format($totalPrice) ?>
                                                VNĐ</span></td>
                                        <td class="product-remove">
                                            <a href="index.php?act=deleCart&cartId=<?= $i ?>">
                                                <i class="icon-trash icons"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $tongtienthanhtoan = $totalBill;
                                    $i += 1;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="?act=shop">Tiếp tục mua hàng</a>
                                </div>
                                <div class="buttons-cart checkout--btn">
                                    <?php
                                    if (isset($_GET['del']) && $_GET['del'] == 1) {
                                        unset($_SESSION['myCart']);
                                        header("Location: ?act=viewcart");
                                        exit;
                                    }
                                    ?>
                                    <a href="?act=viewcart&del=1" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm khỏi giỏ hàng không?')">Xóa
                                        tất cả</a>
                                    <a href="?act=donhang">Tiếp tục đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="ht__coupon__code">
                                <span>Nhập mã giảm giá</span>
                                <div class="coupon__box">
                                    <input type="text" placeholder="">
                                    <div class="ht__cp__btn">
                                        <a href="#">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="htc__cart__total">
                                <h6>Tổng hóa đơn</h6>
                                <div class="cart__desk__list">
                                    <ul class="cart__desc">
                                        <li>Tổng hóa đơn</li>
                                    </ul>
                                    <ul class="cart__price">
                                        <li><?= number_format($totalBill) ?> VNĐ</li>
                                    </ul>
                                </div>
                                <div class="cart__total">
                                    <span>Thành tiền</span>
                                    <span><?php if ($tongtienthanhtoan <= 0)
                                                $tongtienthanhtoan = 0; ?>
                                        <?= number_format($tongtienthanhtoan) ?> VNĐ</span>
                                </div>
                                <ul class="payment__btn">
                                    <li class="active">
                                        <a href="index.php?act=<? if ($tongtienthanhtoan >= 1000) {
                                                                    echo "checkout";
                                                                } else {
                                                                    echo "cart";
                                                                    $Note['tren1k'] = 'Tiền thanh toán phải từ 1000 VNĐ trở lên!';
                                                                } ?>" <?php
                                                                        if (!isset($_SESSION['login'])) {
                                                                            echo 'data-toggle="modal" data-target="#loginModal"';
                                                                        } else {
                                                                            echo "";
                                                                        }
                                                                        ?>>Thanh toán</a>
                                        <?php if (isset($Note['tren1k'])) 
                                        echo "<br><span class='text-star ms-5' style='color: red;'>" .  $Note['tren1k'] . "</span><br>"; ?>
                                    </li>
                                    <li><a href="#">continue shopping</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>