<?php
if (isset($_GET['act']) && $_GET['act'] == 'deletepro') {
    $id = $_GET['id'];
    $product = new Products();
    $result = $product->delete($id);
    if ($result) {
        echo "<script>document.location='index.php?act=listpro';</script>";
    } else {
        echo "Lỗi .";
    }
}
?>
