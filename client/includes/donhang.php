<div class="checkout-wrap ptb--100">
    <div class="container">
        <form action="?act=checkout" method="post">
            <div class="row">
                <div class="col-md-8">
                    <div class="checkout__inner">
                        <div class="accordion-list">
                            <div class="accordion">
                                <?php
                                if (isset($_SESSION['userId'])) {
                                    $user = new User;
                                    $userListInfor = $user->getByID($_SESSION['userId']);
                                    extract($userListInfor);
                                } else {
                                    echo '';
                                }
                                ?>
                                <div class="accordion__title">
                                    Thông tin người đặt hàng
                                </div>
                                <div class="accordion__body">
                                    <div class="shipinfo">
                                        <div class="row">
                                            <input type="hidden" name='id' value='<?= $_SESSION['userId'] ?>'>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <label for="">Tên người nhận</label>
                                                    <input type="text" placeholder="Tên người đặt hàng" name="userName" id="userName" value='<?= $userName ?>'>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <label for="address">Địa chỉ</label>
                                                    <input type="text" placeholder="Địa chỉ" name="address" id="address" value='<?= $address ?>'>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <label for="email">Email</label>
                                                    <input type="email" placeholder="Email" name="email" value='<?= $email ?>'>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <label for="phone">Điện thoại</label>
                                                    <input type="text" placeholder="Số điện thoại" name="phone" value='<?= $phone ?>'>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="" class="ship-to-another-trigger" style="text-decoration: none;"><i
                                                class="zmdi zmdi-long-arrow-right"></i>Thay đổi thông tin đặt hàng</a>
                                        <div class="ship-to-another-content">
                                                <div class="row">
                                                    <h5>Thông tin người nhận:</h5>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <label for="">Họ và tên</label>
                                                            <input type="text" placeholder="Tên người nhận" name="hoten_nguoinhan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <label for="">Địa chỉ</label>
                                                            <input type="text" placeholder="Địa chỉ" name="diachi_nguoinhan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <label for="">Điện thoại</label>
                                                            <input type="text" placeholder="Số điện thoại" name="dienthoai_nguoinhan">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-details">
                        <h5 class="order-details__title">Hóa đơn</h5>
                        <div class="order-details__item">
                            <!-- product -->
                            <?php

                            $totalBill = 0;
                            $i = 0;

                            foreach ($_SESSION['myCart'] as $cart) :
                                $totalPrice = $cart[2] * $cart[4];
                                $totalBill += $totalPrice;
                                $tongtienthanhtoan = $totalBill;
                                $ship = 42000;
                                $tongthanhtoan = $tongtienthanhtoan + $ship;
                            ?>
                                <div class="single-item">
                                    <div class="single-item__thumb" style="width: 120px;">
                                        <?php
                                            $imageNames = explode(';', $cart[3]);
                                            if (!empty($imageNames[0])) : ?>
                                                <a href="?act=detail&id=<?= $cart[0] ?>"><img src="images/<?= $imageNames[0] ?>" alt="product img" width="60px" height="86px" /></a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="single-item__content">
                                        <a href="?act=detail&id=<?= $cart[0] ?>"><?= $cart[1] ?><span class="middle"> x <?= $cart[4] ?></a>
                                        <span class="price"><?= number_format($cart[2]) ?> VND</span>
                                    </div>

                                </div>
                            <? $i += 1;
                            endforeach; ?>
                            <!-- end product -->
                        </div>
                        <div class="order-details__count">
                            <!-- <div class="order-details__count__single">
                                <h5>VOUCHE: </h5>
                                <span class="price"></span>
                            </div> -->
                            <div class="order-details__count__single">
                                <h5>Tổng tiền hàng</h5>
                                <p><span class="price"><?= number_format($tongtienthanhtoan) ?> VND</span></p>
                            </div>
                            <div class="order-details__count__single">
                                <div>
                                    <h5>Phương thức thanh toán:</h5>
                                    <input type="radio" id="pttt" name="pttt" value="1" checked>
                                    <label for="tienmat">Thanh toán khi nhận hàng</label><br>
                                    <input type="radio" id="pttt" name="pttt" value="2">
                                    <label for="chuyenkhoan">Chuyển khoản</label><br>
                                </div>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Phí giao hàng</h5>
                                <span class="price"><?= number_format($ship) ?> VND</span>
                            </div>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Tổng thanh toán</h5>
                            <span class="price"><?= number_format($tongthanhtoan) ?></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success" name="donhangsubmit" style="width: 340px; margin: 30px 0px; border: 2px solid;">ĐẶT HÀNG</button>
                </div>
            </div>
        </form>
    </div>
</div>