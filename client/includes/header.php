<?php
$count = 0;
if(isset($_SESSION['myCart']) && !empty($_SESSION['myCart'])) {
    $count = count($_SESSION['myCart']);
}
?>
<div class="wrapper">
<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                        <div class="logo">
                            <a href="?act=home"><img src="images/logo-rb.png" alt="logo images" style="width: 105px;"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="?act=home">Trang chủ</a></li>
                                <li class="drop"><a href="?act=shop">Cửa hàng</a>
                                    <!-- <ul class="dropdown mega_dropdown">
                
                                        <li><a class="mega__title" href="product-grid.html">Shop Pages</a>
                                            <ul class="mega__item">
                                                <li><a href="product-grid.html">Product Grid</a></li>
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a class="mega__title" href="product-grid.html">Variable Product</a>
                                            <ul class="mega__item">
                                                <li><a href="#">Category</a></li>
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a class="mega__title" href="product-grid.html">Product Types</a>
                                            <ul class="mega__item">
                                                <li><a href="#">Simple Product</a></li>
                                                <li><a href="#">Variable Product</a></li>
                                                <li><a href="#">Grouped Product</a></li>
                                                <li><a href="#">Downloadable Product</a></li>
                                                <li><a href="#">Simple Product</a></li>
                                            </ul>
                                        </li>
                                    </ul> -->
                                </li>
                                <li class="drop"><a href="#">Bài viết</a>
                                    <!-- <ul class="dropdown">
                                        <li><a href="blog.html">Blog Grid</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul> -->
                                </li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            <div class="header__search search search__open">
                                <a href="#"><i class="icon-magnifier icons"></i></a>
                        </div>
                       <?php
                       if(!isset($_SESSION['login']['username'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin: 0px 10px;">Tài khoản</button>
                            <ul class="dropdown-menu">
                            <li>
                                <a href="?act=profile">
                                    <i class="icon-user icons"></i>
                                </a>
                                </li>   
                            <li><a href="?act=login">Đăng Nhập</a></li>
                            <li>
                                        <a href="?act=forgot" height="auto">Quên mật khẩu</a>
                                    </li>
                            </ul>
                        </div>
                        <?php else: ?>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin: 0px 10px;">Xin Chào, <?= $_SESSION['login']['username']??"" ?> </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="" height="auto">Cập nhật thông tin</a>
                                    </li>  
                                    <li>
                                        <a href="?act=logout" height="auto">Đăng Xuất</a>
                                    </li> 
                                    <li>
                                        <a href="?act=forgot" height="auto">Quên mật khẩu</a>
                                    </li>
                                </ul>
                            </div>
                            <?php
                            if (!isset($_SESSION['login']['username'])) : ?>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin: 0px 10px;">Tài khoản</button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?act=profile">
                                                <i class="icon-user icons"></i>
                                            </a>
                                        </li>
                                        <li><a href="?act=login">Đăng Nhập</a></li>
                                    </ul>
                                </div>
                            <?php else : ?>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin: 0px 10px;">Xin Chào, <?= $_SESSION['login']['username'] ?? "" ?> </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?act=updateUser&id=<?= $_SESSION['login']['id'] ?? "" ?>" height="auto">Cập nhật thông tin</a>
                                        </li>
                                      
                                        <li>
                                            <a href="?act=logout" height="auto">Đăng Xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            <?php
                            endif;
                            ?>
                            <div class="htc__shopping__cart">
                                <a class="" href="?act=viewcart"><i class="icon-handbag icons"></i></a>
                            </div>
                            <?php
                            if (!isset($_SESSION['login']['username'])) : ?>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin: 0px 10px;">Tài khoản</button>
                                    <ul class="dropdown-menu">
                                        <li><a href="?act=login">Đăng Nhập</a></li>
                                        <li><a href="?act=forgot" height="auto">Quên mật khẩu</a></li>
                                    </ul>
                                </div>
                            <?php else : ?>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin: 0px 10px;">Xin Chào, <?= $_SESSION['login']['username'] ?? "" ?> </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="" height="auto">Cập nhật thông tin</a>
                                        </li>
                                        <li>
                                            <a href="?act=forgot" height="auto">Quên mật khẩu</a>
                                        </li>
                                        <li>
                                            <a href="?act=logout" height="auto">Đăng Xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            <?php
                            endif;
                            ?>
                            <?php if (strpos($_SERVER['REQUEST_URI'], '?act=cart') === false) : ?>
                                <div class="htc__shopping__cart">
                                    <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                    <a href="#"><span class="cart__menu htc__qua"><?= $count; ?></span></a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>

<div class="body__overlay"></div>
<!-- Start mini cart -->
<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search__inner">
                        <form method="POST">
                            <input placeholder="Search here... " type="text" name="keyword">
                            <button type="submit" name="ok" value="search"></button>
                        </form>
                        <div class="search__close__btn">
                            <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (strpos($_SERVER['REQUEST_URI'], '?act=cart') === false) : ?>
        <div class="shopping__cart">
            <div class="shopping__cart__inner">
                <div class="offsetmenu__close__btn">
                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                </div>
                <div class="shp__cart__wrap">
                    <?php
                    // unset($_SESSION['myCart']);
                    $totalBill = 0;
                    $i = 0;
                    $tongtienthanhtoan = 0;
                    foreach ($_SESSION['myCart'] as $cart) {
                        $totalPrice = $cart[2] * $cart[4];
                        $totalBill += $totalPrice;
                        ?>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <?php
                                    $imageNames = explode(';', $cart[3]);
                                    if (!empty($imageNames[0])) {
                                        ?>
                                        <a href="#"><img src="images/<?= $imageNames[0] ?>" alt="product img" height="99" /></a>
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html"><?= $cart[1] ?></a></h2>
                                <span class="quantity">Số lượng: <?= $cart[4] ?></span>
                                <span class="shp__price"><?= number_format($cart[2]) ?> VND</span>
                            </div>
                            <div class="remove__btn">
                                <a href="index.php?act=deleCart&cartId=<?= $i ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?')">
                                    <i class="zmdi zmdi-close"></i>
                                </a>
                            </div>
                        </div>
                    <?php
                        $tongtienthanhtoan = $totalBill;
                        $i += 1;
                    }
                    ?>
                </div>
                <ul class="shoping__total">
                    <li class="subtotal">Tổng tiền:</li>
                    <li class="total__price"><?= number_format($totalBill) ?> VNĐ</li>
                </ul>
                <ul class="shopping__btn">
                    <li><a href="?act=cart">View Cart</a></li>
                    <li class="shp__checkout"><a href="?act=checkout">Checkout</a></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>
