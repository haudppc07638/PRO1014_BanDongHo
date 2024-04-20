<?php
session_start(); // Bắt đầu phiên

$id = $_GET['id'];

$db = new connect();
$pdo = $db->pdo_get_connection();
$data = new Products();
$rowProd = $data->getByID($id);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_comment'])) {
        $content = $_POST['content'];
        $product_ID = $_POST['product_id'];

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION['user_id'])) {
            $user_ID = $_SESSION['user_id']; // Lấy user_id từ phiên đã lưu
            // Xác thực dữ liệu nhập vào (Ví dụ: đảm bảo không rỗng)
            if (!empty($content) && !empty($product_ID)) {
                // Thêm bình luận vào cơ sở dữ liệu
                $stmt = $pdo->prepare("INSERT INTO comment (content, product_id, user_id, created_at) VALUES (?, ?, ?, NOW())");
                $stmt->execute([$content, $product_ID, $user_ID]);

                // Hiển thị thông báo hoặc làm mới trang để hiển thị bình luận mới
                echo "<script>alert('Bình luận đã được thêm.'); window.location.href=window.location.href;</script>";
            } else {
                // Hiển thị lỗi nếu dữ liệu nhập vào không hợp lệ
                echo "<p>Vui lòng nhập đầy đủ thông tin bình luận.</p>";
            }
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng hoặc hiển thị thông báo lỗi
            echo "<script>alert('Vui lòng đăng nhập để bình luận.'); window.location.href='?act=login';</script>";
        }
    }
    die();
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $product_ID = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM comment WHERE product_id = ?");
    $stmt->execute([$product_ID]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Lấy bình luận từ cơ sở dữ liệu

?>
<!-- Các phần HTML khác được giữ nguyên -->

<!-- Các phần HTML khác được giữ nguyên -->

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
<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Start List And Grid View -->
                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="description active"><a href="#description" role="tab"
                            data-toggle="tab">description</a></li>
                    <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">review</a>
                    </li>
                    <li role="presentation" class="comment"><a href="#comment" role="tab" data-toggle="tab">Comment</a>
                    </li>
                </ul>
                <!-- End List And Grid View -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <!-- Bắt đầu Phần Nội dung Chi Tiết Sản Phẩm -->
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                        <!-- Hiển thị tiêu đề phần đánh giá nếu có bình luận -->
                        <?php if (!empty($comments)): ?>
                            <h4 class="ht__pro__title">Đánh Giá Sản Phẩm</h4>
                            <?php foreach ($comments as $comment): ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="card-text">ID Người dùng: <?php echo htmlspecialchars($comment['user_id']); ?>
                                        </p>
                                        <p class="card-text">Nội dung : <?php echo htmlspecialchars($comment['content']); ?></p>
                                        <p class="card-text">Ngày: <?php echo htmlspecialchars($comment['created_at']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">Chưa có đánh giá nào cho sản phẩm này.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- End Single Content -->

                    <!-- Start Single Content -->
                    <div role="tabpanel" id="comment" class="pro__single__content tab-pane fade">
                        <h4 class="ht__pro__title">Thêm Bình Luận</h4>
                        <form action="" method="post"> <!-- Gửi form đến chính trang này -->
                            <div class="form-group">
                                <label for="comment_content"></label>
                                <textarea class="form-control" id="comment_content" name="content" rows="4"
                                    placeholder="Nhập nội dung bình luận"></textarea>
                            </div>
                            <!-- Các trường ẩn -->
                            <input type="hidden" name="product_id" value="<?php echo $id ?>">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <input type="hidden" name="user_ID" value="<?php echo $_SESSION['user_id'] ?>">
                            <?php endif; ?>
                            <!-- Thay $user_id bằng ID của người dùng đã đăng nhập -->
                            <button type="submit" name="submit_comment" class="btn btn-primary">Gửi Bình Luận</button>
                        </form>
                    </div>
                    <!-- End Single Content -->

                    <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>