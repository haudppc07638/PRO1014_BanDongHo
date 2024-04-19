<?php
session_start();
ob_start();
if (!isset($_SESSION['login']['username'])) {
  header("Location: ../index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HKH SHOP</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="../images/logo-mini.jpg" />
</head>

<body>
  <div class="container-scroller">
    <?php include('includes/header.php'); ?>
    <?php include('includes/slidebar.php'); ?>
    <?php include('includes/pdo.php') ?>
    <?php include('users/user.php'); ?>
    <?php include('categories/category.php'); ?>
    <?php include('products/pro.php');?>
    <?php include('blog/blogcate.php');?>
    <?php include('blog/postBlog.php');?>
    <div class="main-panel">
      <?php
      $action = "home";
      if (isset($_GET['act']))
        $action = $_GET['act'];
      // if (!isset($_SESSION['admin'])) {
      //   $action = "login";
      // }
      switch ($action) {
        case "home":
          include('includes/dashboard.php');
          break;
        case "list":
          include('categories/list.php');
          break;
        case "addcate":
          include('categories/addcate.php');
          break;
        case "deletecate":
          include('categories/deletecate.php');
          break;
        case "editcate":
          include('categories/editcate.php');
          break;
        case "listpro":
          include('products/listpro.php');
          break;
        case "addprod":
          include('products/addprod.php');
          break;
        case "editpro":
          include('products/editpro.php');
          break;
        case "deletepro":
          include('products/deletepro.php');
          break;
        case "listUser":
          include('users/listUser.php');
          break;
        case "editUser":
          include("users/editUser.php");
          break;
        case "active":
          include("users/active.php");
          break;
        case "deleteUser":
          include('users/deleteUser.php');
          break;
        case "logout":
          unset($_SESSION['username']);
          session_destroy();
          header("location:../index.php");
          break;
        case "addCoupon":
          include('coupons/addCoupon.php');
          break;
          case "listComment":
            include 'comment/listComment.php';
            break;
        // case "listComment":
        //   $comment = new comment();
        //   $listbinhluan= $comment->loadall_binhluan(0);
        //   include 'comment/listComment.php';
        //   break;
        // case "deleteComment":
        //   include 'comment/deleteComment.php';
        //   break;
        // case "logout":
        //     unset($_SESSION['admin']);
        //     session_destroy();
        //     header("location:../index.php");
        //   break;
        case "cateBlog":
          include('blog/listCateBlog.php');
          break;
        case "editCateBlog":
          include('blog/editCateBlog.php');
          break;
        case "listBlog":
          include('blog/listBlog.php');
          break;
        case "editBlog":
          include('blog/editBlog.php');
          break;
        case "addBlog":
          include('blog/addBlog.php');
          break;
        default:
          include('includes/dashboard.php');
      }
      include('includes/footer.php');
      ?>
    </div>
  </div>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>

</html>
<?php 
ob_end_flush();
