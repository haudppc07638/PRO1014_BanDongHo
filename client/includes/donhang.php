<div class="checkout-wrap ptb--100">
    <div class="container">
        <form action="?act=donhangsubmit" method="post">
            <div class="row">
                <div class="col-md-8">
                    <div class="checkout__inner">
                        <div class="accordion-list">
                            <div class="accordion">
                                <div class="accordion__title">
                                    Thông tin người đặt hàng
                                </div>
                                <div class="accordion__body">
                                    <div class="shipinfo">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="">Họ và tên</label>
                                                        <input type="text" placeholder="Tên người đặt hàng" name="hoten" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="">Địa chỉ</label>
                                                        <input type="text" placeholder="Địa chỉ" name="diachi" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="">Email</label>
                                                        <input type="email" placeholder="Email" name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <label for="">Điện thoại</label>
                                                        <input type="text" placeholder="Số điện thoại" name="dienthoai" required>
                                                    </div>
                                                </div>
                                            </div>
                                        <a href="" class="ship-to-another-trigger" style="text-decoration: none;"><i
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-details">
                        <h5 class="order-details__title">Đơn hàng</h5>
                        <?foreach ($_SESSION['giohang'] as $sp) {
                        extract($sp);
                        $tt = $price * $soluong;
                        ?>
                        <div class="order-details__item">
                            <!-- product -->
                            <div class="single-item">
                                <div class="single-item__thumb" style="width: 120px;">
                                    <img src="images/<?=$img?>" alt="ordered item">
                                </div>
                                <div class="single-item__content">
                                    <a href=""><?=$name?></a>
                                    <span class="price"><?=number_format($tt)?> VND</span>
                                </div>
                                <div class="single-item__remove">
                                    <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                </div>
                            </div>
                            <!-- end product -->
                        </div>
                        <?};?>
                        <div class="order-details__count">
                            <div class="order-details__count__single">
                                <h5>VOUCHE: </h5>
                                <span class="price"></span>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Tổng</h5>
                                <span class="price">5.000.000 VND</span>
                            </div>
                            <div class="order-details__count__single">
                                <div>
                                    <h5>Phương thức thanh toán:</h5>
                                    <input type="radio" id="html" name="pttt" value="1" checked>
                                    <label for="tienmat">Tiền mặt</label><br>
                                    <input type="radio" id="css" name="pttt" value="2">
                                    <label for="vidientu">Ví điện tử</label><br>
                                    <input type="radio" id="javascript" name="pttt" value="3">
                                    <label for="chuyenkhoan">Chuyển khoản</label>
                                </div>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Phí giao hàng</h5>
                                <span class="price">42.000 VND</span>
                            </div>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Tổng thanh toán</h5>
                            <span class="price"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success" name="donhangsubmit"style="width: 340px; margin: 30px 0px; border: 2px solid;">ĐẶT HÀNG</button>
                </div>
            </div>
        </form>
    </div>
</div>