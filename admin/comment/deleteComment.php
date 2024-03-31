<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dele = new comment();
    $dele->delete_binhluan($id);
    echo "<script>document.location='?act=listComment';</script>";
}
?>