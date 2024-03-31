<?php
class category
{
 // Khai báo thuộc tính
 var $id = null;
 var $name = null;
 var $create = null;
 var $status = null;
 var $update = null;


 // hàm lấy tất cả dữ liệu của bảng Categoris
 public function getList() {
     $db = new connect();
     $query = "SELECT * FROM categories"; // viết câu lệnh sql select *
     $result = $db->pdo_query($query);
     return $result;
 }

 // hàm lấy 1 dòng dữ liệu của bảng categoris dựa trên id
 public function getByID($id) {
     $db = new connect();
     $query = "SELECT * FROM categories where id = '$id'";
     $result = $db->pdo_query_one($query);
     return $result;
 }

 //hàm insert dữ liệu, create dữ liệu, thêm mới dữ liệu


 //hàm cập nhập dữ liệu

 public function delete($id){
     $db = new connect();
     $query = "DELETE FROM categories WHERE id = '$id'";
     $result = $db->pdo_query_one($query);
     return $result;
 }

 public function countCate(){
     $db = new connect();
     $sql = "SELECT COUNT(id) AS countCate FROM categories";
     $result = $db->pdo_execute($sql);
     return $result;
 }
 public function update($name, $id){
    $db = new connect();
    $query = "UPDATE categories SET categoryName = '$name', updated = now() WHERE id = '$id'";
    $result = $db->pdo_execute($query);
    return $result;
}
public function add($name) {
    $db = new connect();
    $existingCategory = $this->getByName($name);
    if ($existingCategory) {
        return false;
    }
    $query = "INSERT INTO categories (id, categoryName) VALUES (null, '$name')";
    $result = $db->pdo_execute($query);
    return $result;
}
public function getByName($name) {
    $db = new connect();
    $query = "SELECT * FROM categories WHERE categoryName = '$name'";
    $result = $db->pdo_query_one($query);
    return $result;
}
public function loadCate($id)
{
    $db = new connect();
    $sql = "SELECT * FROM categories WHERE id = ?";
    $cate = $db->pdo_query_one($id);

    if ($cate) {
        return $cate['name']; // Access the 'name' directly instead of using extract
    } else {
        return "";
    }
}


 }

?>