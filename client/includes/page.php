<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel" style="height: 600px;">
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height" style="background-image: url('images/banner1.jpg'); height: 600px;">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2 style='color: white;'>collection 2018</h2>
                                <h1 style='color: white;'>NICE CHAIR</h1>
                                <div class="cr__btn">
                                    <a href="?act=shop">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="images/banner2.jpg" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height" style="background-image: url('images/banner2.jpg'); height: 600px;">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2 style='color: white;'>collection 2018</h2>
                                <h1 style='color: white;'>NICE CHAIR</h1>
                                <div class="cr__btn">
                                    <a href="?act=shop">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="images/banner1.jpg" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
</div>
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line" style="font-family: 'sans-serif';">Sản Phẩm Nổi Bật</h2>
                    <p style="font-family: 'sans-serif';">Tận hưởng sự hoàn hảo tại đỉnh cao với hiệu suất vượt trội</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Category -->
                <?
                if (isset($_GET['id'])) {
                    $idCat = $_GET['id'];
                    $dblis = new Products();
                    $rows = $dblis->get_dssp($idCat);
                } else {
                    $dblis = new Products();
                    $rows = $dblis->getList();
                }
                foreach ($rows as $row) { ?>
                    <form action="?act=cart" method="post">
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12 mb-3">
                            <div class="category" style="border: 0.5px solid #eaeaea;">
                                <div class="ht__cat__thumb">
                                    <a href="?act=detail&id=<?= $row['id'] ?>&idCat=<?= $row['category_id'] ?>">
                                        <?php
                                        $imageNames = explode(';', $row['image']);
                                        if (!empty($imageNames[0])) {
                                            echo '<img src="images/' . $imageNames[0] . '" alt="image-product" width="290" height="300">';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <input type="hidden" name='productId' value='<?= $row['id'] ?>'>
                                        <input type="hidden" name='name' value='<?= $row['name'] ?>'>
                                        <input type="hidden" name='price' value='<?= $row['price'] ?>'>
                                        <input type="hidden" name='image' value='<?= $row['image'] ?>'>
                                        <li><button type="submit" name="addcart"><a><i class="icon-handbag icons"></i></a></button></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4 class="m-0">
                                        <a href="?act=detail&id=<?= $row['id'] ?>&idCat=<?= $row['category_id'] ?>" class="text-decoration-none">
                                            <?= $row['name'] ?>
                                        </a>
                                    </h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize"><del class="d-inline">
                                                <?= number_format($row['oldPrice']) ?> VND
                                            </del> </li>
                                        <li>
                                            <?= number_format($row['price']) ?> VND
                                        </li>
                                    </ul>
                                </div>
                                <ul class="shopping__btn p-3">
                                    <li class="shp__checkout"><a href="?act=checkout&id=<?= $row['id'] ?>">Mua Ngay</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                <? } ?>
            </div>
        </div>
        </div>
    </div>
</section>
<section class="htc__good__sale bg__cat--3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-6 col-xs-12">
                <div class="prize__inner">
                    <div class="prize__thumb">
                        <img src="images/banner1.jpg" alt="banner images">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftr__product__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line" style="font-family: 'sans-serif';">Sản phẩm bán chạy
                    </h2>
                    <p>Thiết kế sang trọng và tính năng độc quyền</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Category -->
                <?
                if (isset($_GET['id'])) {
                    $idCat = $_GET['id'];
                    $dblis = new Products();
                    $rows = $dblis->get_dssp($idCat);
                } else {
                    $dblis = new Products();
                    $rows = $dblis->getList();
                }
                foreach ($rows as $row) { ?>
                    <form action="?act=cart" method="post">
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12 mb-3">
                            <div class="category" style="border: 0.5px solid #eaeaea;">
                                <div class="ht__cat__thumb">
                                    <a href="?act=detail&id=<?= $row['id'] ?>&idCat=<?= $row['category_id'] ?>">
                                        <?php
                                        $imageNames = explode(';', $row['image']);
                                        if (!empty($imageNames[0])) {
                                            echo '<img src="images/' . $imageNames[0] . '" alt="image-product" width="290" height="300">';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <input type="hidden" name='productId' value='<?= $row['id'] ?>'>
                                        <input type="hidden" name='name' value='<?= $row['name'] ?>'>
                                        <input type="hidden" name='price' value='<?= $row['price'] ?>'>
                                        <input type="hidden" name='image' value='<?= $row['image'] ?>'>
                                        <li><button type="submit" name="addcart"><a><i class="icon-handbag icons"></i></a></button></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4 class="m-0">
                                        <a href="?act=detail&id=<?= $row['id'] ?>&idCat=<?= $row['category_id'] ?>" class="text-decoration-none">
                                            <?= $row['name'] ?>
                                        </a>
                                    </h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize"><del class="d-inline">
                                                <?= number_format($row['oldPrice']) ?> VND
                                            </del> </li>
                                        <li>
                                            <?= number_format($row['price']) ?> VND
                                        </li>
                                    </ul>
                                </div>
                                <ul class="shopping__btn p-3">
                                    <li class="shp__checkout"><a href="?act=checkout&id=<?= $row['id'] ?>">Mua Ngay</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                <? } ?>
                <!-- End Single Category -->

            </div>
        </div>
    </div>
</section>
<section class="top__rated__area bg__white pt--100 pb--110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line" style="font-family: 'sans-serif';">Được đánh giá tốt
                    </h2>
                    <p>Đắm chìm trong sự xuất sắc cùng HKH SHOP - Nâng tầm cuộc sống, một trải
                        nghiệm không thể bỏ qua!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Category -->
                <?
                if (isset($_GET['id'])) {
                    $idCat = $_GET['id'];
                    $dblis = new Products();
                    $rows = $dblis->get_dssp($idCat);
                } else {
                    $dblis = new Products();
                    $rows = $dblis->getList();
                }
                foreach ($rows as $row) { ?>
                    <form action="?act=cart" method="post">
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12 mb-3">
                            <div class="category" style="border: 0.5px solid #eaeaea;">
                                <div class="ht__cat__thumb">
                                    <a href="?act=detail&id=<?= $row['id'] ?>&idCat=<?= $row['category_id'] ?>">
                                        <?php
                                        $imageNames = explode(';', $row['image']);
                                        if (!empty($imageNames[0])) {
                                            echo '<img src="images/' . $imageNames[0] . '" alt="image-product" width="290" height="300">';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <input type="hidden" name='productId' value='<?= $row['id'] ?>'>
                                        <input type="hidden" name='name' value='<?= $row['name'] ?>'>
                                        <input type="hidden" name='price' value='<?= $row['price'] ?>'>
                                        <input type="hidden" name='image' value='<?= $row['image'] ?>'>
                                        <li><button type="submit" name="addcart"><a><i class="icon-handbag icons"></i></a></button></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4 class="m-0">
                                        <a href="?act=detail&id=<?= $row['id'] ?>&idCat=<?= $row['category_id'] ?>" class="text-decoration-none">
                                            <?= $row['name'] ?>
                                        </a>
                                    </h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize"><del class="d-inline">
                                                <?= number_format($row['oldPrice']) ?> VND
                                            </del> </li>
                                        <li>
                                            <?= number_format($row['price']) ?> VND
                                        </li>
                                    </ul>
                                </div>
                                <ul class="shopping__btn p-3">
                                    <li class="shp__checkout"><a href="?act=checkout&id=<?= $row['id'] ?>">Mua Ngay</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                <? } ?>
                <!-- End Single Category -->

            </div>
        </div>
    </div>
</section>