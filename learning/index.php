<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        
         <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mx-5" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <img src="assets/images/logo.png" alt="" height="50px"/>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Góp ý</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Hỏi đáp</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tài khoản
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="#">Quên mật khẩu</a></li>
                            <li><a class="dropdown-item" href="#">Đăng ký thành viên</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                            <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                            <li><a class="dropdown-item" href="#">Cập nhật hồ sơ</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                            <li><a class="dropdown-item" href="#">Hàng đã mua</a></li>
                        </ul>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a class="dropdown-item px-3" href="#">English</a></li>
                        <a class="dropdown-item" href="#">Việt Nam</a></li>
                    </div>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <?php include "particals/home-product.php"?>
        </main>
        <footer id="footer" class="bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 md-3">
                        <ul class="menu-footer">
                            <li class="list-group-item"><a href="" class="text-decoration-none">THÔNG TIN CHUNG</a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 ">
                        <ul class="menu-footer">
                            <li class="list-group-item"><a href="" class="text-decoration-none">HỖ TRỢ KHÁCH HÀNG</a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 ">
                        <ul class="menu-footer">
                            <li class="list-group-item"><a href="" class="text-decoration-none">DANH MỤC</a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                            <li class="list-group-item"><a href="" class="text-decoration-none"></a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 ">
                        <ul class="menu-footer">
                            <li class="list-group-item"><a href="" class="text-decoration-none">HỆ THỐNG CỬA HÀNG</a></li>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245.58883347646477!2d105.75823825677232!3d9.98201182642635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1709816333227!5m2!1svi!2s" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </ul>
                    </div>
                    <div class="col-12">
                        <p class="text-center">VPGD: Số 55 Trần Đăng Ninh – Cầu Giấy – TP. Hà Nội - Email: contact@dangquangwatch.vn
                                                Giấy CNĐKKD và MSDN số: 0104938104 đăng ký lần đầu do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp ngày 07/1</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
