<?php
session_start();
ob_start();
if(!isset($_SESSION['myCart'])) {
    $_SESSION['myCart'] = [];
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HKH SHOP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo-mini.jpg">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="client/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="client/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="client/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="client/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="client/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="client/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="client/css/custom.css">
    <!-- Modernizr JS -->
    <!-- <link rel="stylesheet" href="client/css/comments.css"> -->
    <script src="client/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <?php
    include('admin/includes/pdo.php');
    include('admin/products/pro.php');
    include('client/includes/header.php');
    include('admin/categories/category.php');
    include('client/includes/giohang.php');
    include('admin/users/user.php');
    include('client/includes/comment.php');;
    include('model/donhang.php');
    if (isset($_GET['act'])) {
        $tam = $_GET['act'];
    } else {
        $tam = '';
    }
    if (isset($_GET['act'])) {
        switch ($tam) {
            case "shop":
                include('client/includes/shoppage.php');
                break;
            case "home":
                include('client/includes/page.php');
                break;
            case "contact":
                include('client/includes/contact.php');
                break;
            case "viewcart":
                include('client/includes/cart.php');
                break;
            case "fogotpass":
                include('client/includes/fogotpass.php');
                break;
            case "detail":
                include('client/includes/productdetail.php');
                break;
            case "checkout":
                if(isset($_POST['dathang'])) {
                    $id = $_POST['id'];
                    $username = isset($_POST['userName']) ? trim($_POST['userName']) : '';
                    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
                    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
                    $totalBill = $_POST['totalBill'];
                    $paymentType = $_POST['paymentType'];
                    $dongy = isset($_POST['dongy']) ? $_POST['dongy'] : '';
                    $errors = $clientController->validation_dathang($username, $address, $dongy, $phone);

                    if($errors == 1) {
                        $result = $bill->add($username, $phone, $address, $totalBill, $paymentType, $fk_userId);
                        if($result) {
                            if(isset($_SESSION['myCart']) && count($_SESSION['myCart']) > 0) {
                                foreach($_SESSION['myCart'] as $item) {
                                    $billDetail = $bill->add_billDetail($result, $item[0], $item[4], $item[2], $note);
                                }
                                unset($_SESSION['myCart']);
                                header('Location: index.php?act=lichsu');
                            }
                        } else {
                            echo "tb";
                        }
                    }
                }
                include('client/includes/donhang.php');
                break;
            case "updateUser":
                include('client/includes/updateUser.php');
                break;
            case "login":
                include("client/login.php");
                break;
            case "logout":
                unset($_SESSION['login']['username']);
                unset($_SESSION['myCart']);
                session_destroy();
                header("location:index.php");
                break;
                // case "profile":
                //     break;
            case "register":
                include('client/register.php');
                break;
            case "forgot":
                include('PHPMailer-master/forgot.php');
                break;
            case "cart":
                if(isset($_POST['addcart'])) {
                    $productId = $_POST['productId'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $image = $_POST['image'];
                    if(isset($_POST['quantity']) && $_POST['quantity'] > 0) {
                        $quantity = $_POST['quantity'];
                    } else {
                        $quantity = 1;
                    }
                    $totalPrice = $price * $quantity;
                    $fg = 0;
                    $i = 0;
                    foreach($_SESSION['myCart'] as $item) {
                        if($item[0] == $productId) {
                            $quantityNew = $item[4] + $quantity;
                            $_SESSION['myCart'][$i][4] = $quantityNew;
                            $fg = 1;
                            break;
                        }
                        $i++;
                    }
                    if($fg == 0) {
                        $productCart = [$productId, $name, $price, $image, $quantity, $totalPrice];
                        $_SESSION['myCart'][] = $productCart;
                    }

                    header("Location:index.php?act=cart");
                }
                include "client/includes/cart.php";
                break;
            case 'deleCart':
                if(isset($_GET['cartId'])) {
                    array_splice($_SESSION['myCart'], $_GET['cartId'], 1);
                } else {
                    $_SESSION['myCart'] = [];
                }
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $previousPage = $_SERVER['HTTP_REFERER'];
                    $query = parse_url($previousPage, PHP_URL_QUERY);
                    parse_str($query, $params);
                    if(isset($params['act'])) {
                        $act = $params['act'];
                        header("Location: index.php?act=$act");
                        exit;
                    }
                }
                break;
            default:
                include('client/includes/page.php');
        }
    } else {
        include('client/includes/page.php');
    }
    include('client/includes/footer.php');
    ?>
    <!-- Body main wrapper end -->
    <script src="client/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="client/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="client/js/plugins.js"></script>
    <script src="client/js/slick.min.js"></script>
    <script src="client/js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="client/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="client/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
ob_end_flush();
