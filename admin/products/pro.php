<?php

class Products {

    var $id = null;
    var $name= null;
    var $image= null; 
    var $price= null;
    var $description= null;
    var $category_ID= null;
    var $discount= null;

    public function getList() {
        $db = new connect();
        $sql = "SELECT * FROM products ORDER BY productID";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getList1() {
        $db = new connect();
        $sql = "SELECT * FROM products ORDER BY productID DESC";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getById($id) {
        $db = new connect();
        $sql = "SELECT * FROM products WHERE productID = $id LIMIT 1";
        $result = $db->pdo_query($sql);  
        return $result[0]; 
      }
    
    

    public function add($name, $price, $image, $description, $category_ID, $discount) {
        $db = new connect();
        $sql = "INSERT INTO products(name, price, image, description, category_id, discount) VALUE ('$name', $price, '$image', '$description', $category_ID, $discount)";  
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function update($id, $name, $price, $image, $description, $category_ID, $discount) {
        $db = new connect();
        $sql = "UPDATE products SET name='$name', price=$price, image='$image', description='$description', category_id=$category_ID, discount=$discount WHERE productID= $id";
        $result = $db->pdo_query($sql);
        return $result;
    }
    
    public function delete($id){
        $db = new connect();
        $sql = "DELETE FROM products WHERE productID = '$id'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }
    public function get_dssp($cateid){
        $db = new connect();
        $query = "SELECT * FROM products WHERE category_ID = '$cateid'";
        $result = $db->pdo_query($query);
        return $result;
    }
 
public function getCategories() {
    $db = new connect();
    $sql = "SELECT * FROM categories";
    
    $result = $db->pdo->prepare($sql);
    $result->execute();
    
    return $result->fetchAll();  
  }
    public function Countpro(){
        $db = new connect();
        $sql = "SELECT COUNT(productID) AS Countpro FROM products";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    
        
    
}