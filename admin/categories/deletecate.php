<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['act']) && $_GET['act'] == 'deletecate') {
    $cateId = $_GET['id'];
    $category = new Category();
    $db = new connect();
    if ($category->hasProducts($cateId, $db)) {
        echo "<script>alert('Hiện tại không thể xóa danh mục này vì có sản phẩm thuộc về nó.'); window.history.back();</script>";
    } else {
        $result = $category->delete($cateId, $db);
        if ($result) {
            echo "<script>document.location='?act=list';</script>";
        } else {
            echo "<script>alert('Xảy ra lỗi khi xóa danh mục.'); window.history.back();</script>";
        }
    }
    die();
}?>