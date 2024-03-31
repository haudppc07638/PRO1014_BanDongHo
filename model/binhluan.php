<?php
class comment
{
 // Khai báo thuộc tính
 var $id = null;
 var $name = null;
 var $create = null;
 var $status = null;
 var $update = null;


 // hàm lấy tất cả dữ liệu của bảng Categoris


 // hàm lấy 1 dòng dữ liệu của bảng categoris dựa trên id
 public function getByID($id) {
     $db = new connect();
     $query = "SELECT * FROM comment where commentID = '$id'";
     $result = $db->pdo_query_one($query);
     return $result;
 }

 //hàm insert dữ liệu, create dữ liệu, thêm mới dữ liệu


 //hàm cập nhập dữ liệu

public function insert_binhluan($content,$product_ID, $user_ID, $created, $updated) {
    $db = new connect();
    $query = "INSERT INTO comment(content, product_ID, user_ID, created, updated) VALUES ('$content','$product_ID', '$user_ID', {$created}, {$updated})";
    $result = $db->pdo_execute($query);
    return $result;
}
public function loadall_binhluan($idpro){
    $db = new connect();
    $query = "select * from comment where 1";
    if($idpro>0) $query.="AND product_ID='".$idpro."'";
    $listbl = $db->pdo_execute($query);
    return $listbl;
}
public function loadall_binhluan1($idpro){
    $db = new connect();
    $query = "select * from comment where product_ID='".$idpro."'";
    $listbl = $db->pdo_execute($query);
    return $listbl;
}
public function delete_binhluan($id)
    {
        $db = new connect();
        $query = "DELETE FROM comment WHERE commentID = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }
}
?>