<?php 
    $id = $_GET['id'];
    $data = new category();
    $dele = $data->delete($id);  
    echo "<script>document.location='?act=list';</script>";
?>
