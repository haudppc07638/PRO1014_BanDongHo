<?php
$id = $_GET['id'];
$data = new Products();
$rowProd = $data->getByID($id);
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(images/banner1.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner bg-white">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="?act=home">Trang chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <a class="breadcrumb-item" href="?act=shop">Cửa hàng</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Chi tiết</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Details Area -->
<section class="htc__product__details bg__white ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images" style="border: 2px solid #eaeaea;">
                            <div class="portfolio-full-image tab-content">
                                <?php
                                $imageNames = explode(';', $rowProd['image']);
                                foreach ($imageNames as $index => $imageName):
                                    if (!empty($imageName)):
                                        $tabId = "img-tab-" . ($index + 1);
                                        $activeClass = ($index === 0) ? 'in active' : '';
                                        ?>
                                        <div role="tabpanel" class="tab-pane fade <?= $activeClass ?>" id="<?= $tabId ?>">
                                            <img src="images/<?= $imageName ?>" alt="image-product" width="100px">
                                        </div>
                                        <?php
                                    endif;
                                endforeach;
                                ?>

                            </div>
                        </div>
                        <!-- End Product Big Images -->
                        <!-- Start Small images -->
                        <ul class="product__small__images" role="tablist">
                            <?php foreach ($imageNames as $index => $imageName): ?>
                                <?php if (!empty($imageName)): ?>
                                    <?php
                                    $tabId = "img-tab-" . ($index + 1);
                                    $activeClass = ($index === 0) ? 'active' : '';
                                    ?>
                                    <li role="presentation" class="pot-small-img <?= $activeClass ?>">
                                        <a href="#<?= $tabId ?>" role="tab" data-toggle="tab">
                                            <img src="images/<?= $imageName ?>" alt="image-product" width="100px">
                                        </a>
                                    </li>
                                    <?php
                                endif;
                            endforeach;
                            ?>

                        </ul>
                        <!-- End Small images -->
                    </div>
                </div>

                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2>
                            <?php echo $rowProd['name'] ?>
                        </h2>
                        <!-- <h6>Model: <span>MNG001</span></h6> -->
                        <!-- <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul> -->
                        <br>
                        <ul class="pro__prize">
                            <li class="old__prize"><del class="d-inline">
                                    <?php echo number_format($rowProd['oldPrice']) ?> VND
                                </del> </li>
                            <li>
                            <li>
                                <?php echo number_format($rowProd['price']) ?> VND
                            </li>
                        </ul>
                        <p class="pro__info">
                            <?php echo $rowProd['description'] ?>
                        </p>
                        <div class="ht__pro__desc">
                            <div class="sin__desc">
                                <p><span>Tình trạng:</span> Còn hàng</p>
                            </div>
                            <!-- <div class="sin__desc product__share__link">
                                <p><span>Share this:</span></p>
                                <ul class="pro__share">
                                    <li><a href="#" target="_blank"><i class="icon-social-twitter icons"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="icon-social-instagram icons"></i></a></li>

                                    <li><a href="https://www.facebook.com/Furny/?ref=bookmarks" target="_blank"><i
                                                class="icon-social-facebook icons"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="icon-social-google icons"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="icon-social-pinterest icons"></i></a></li>
                                </ul>
                            </div> -->
                            <br>
                            <form action="?act=addcart" method="post">
                                <input type="number" name="soluong" id="" min="1" value="1" max="10"
                                    style="width: 200px"> <br /><br>
                                <input type="hidden" name="id" value="<?php echo $rowProd['id'] ?>">
                                <input type="hidden" name="name" value="<?php echo $rowProd['name'] ?>">
                                <input type="hidden" name="img" value="<?php echo $rowProd['image'] ?>">
                                <input type="hidden" name="price" value="<?php echo $rowProd['price'] ?>">
                                <input type="submit" value="Thêm Vào Giỏ Hàng" name="addcart" class="btn btn-success"
                                    style="padding: 10px;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Details Top -->
</section>

<!-- <section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row" id=comment>
            <iframe src="public/comment/commentform.php?idpro=<?= $id ?>" frameborder="0" width="100%" height="600px"></iframe>
        </div>
    </div>
</section> -->

<!-- End Product Description -->
<!-- Start Product Area -->
<section class="htc__product__area--2 pb--100 product-details-res">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Sản Phẩm Liên Quan</h2>
                    <!-- <p>But I must explain to you how all this mistaken idea</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Product -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="images/dongho1.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="#"><i class="icon-heart icons"></i></a></li>

                                <li><a href="#"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="product-details.html">Product Title Here </a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize">$30.3</li>
                                <li>$25.9</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
                <!-- Start Single Product -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="images/dongho2.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="#"><i class="icon-heart icons"></i></a></li>

                                <li><a href="#"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="product-details.html">Product Title Here </a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize">$30.3</li>
                                <li>$25.9</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
                <!-- Start Single Product -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="images/dongho3.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="#"><i class="icon-heart icons"></i></a></li>

                                <li><a href="#"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="product-details.html">Product Title Here </a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize">$30.3</li>
                                <li>$25.9</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
                <!-- Start Single Product -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="images/dongho6.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="#"><i class="icon-heart icons"></i></a></li>

                                <li><a href="#"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="product-details.html">Product Title Here </a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize">$30.3</li>
                                <li>$25.9</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
        </div>
    </div>
</section>