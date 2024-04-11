<?php

class Products
{

    var $id = null;
    var $name = null;
    var $image = null;
    var $price = null;
    var $description = null;
    var $category_ID = null;
    var $discount = null;

    public function getList()
    {
        $db = new connect();
        $sql = "SELECT * FROM products ORDER BY id";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getList1()
    {
        $db = new connect();
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getById($id)
    {
        $db = new connect();
        $sql = "SELECT * FROM products WHERE id = $id LIMIT 1";
        $result = $db->pdo_query($sql);
        return $result[0];
    }



    public function add($name, $price, $imageStr, $description, $category_ID, $discount, $db)
    {
        $query = "INSERT INTO products (name, price, image, description, category_id, discount) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $price);
        $stmt->bindParam(3, $imageStr);
        $stmt->bindParam(4, $description);
        $stmt->bindParam(5, $category_ID);
        $stmt->bindParam(6, $discount);
        $success = $stmt->execute();
        return $success;
    }

    public function update($id, $name, $price, $image, $description, $category_ID, $discount)
    {
        $db = new connect();
        $sql = "UPDATE products SET name='$name', price=$price, image='$image', description='$description', category_id=$category_ID, discount=$discount WHERE id= $id";
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function delete($id)
    {
        $db = new connect();
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $db->pdo_get_connection()->prepare($sql);
        $result = $stmt->execute([$id]);
        return $result;
    }

    public function get_dssp($cateid)
    {
        $db = new connect();
        $query = "SELECT * FROM products WHERE category_id = '$cateid'";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function checkProductNameExists($name, $db)
    {
        $query = "SELECT COUNT(*) FROM products WHERE name = ?";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->execute([$name]);
        $count = $stmt->fetchColumn();
        return $count > 0; // Trả về true nếu tên sản phẩm tồn tại, ngược lại false
    }

    public function searchProduct($search)
    {
        $db = new connect();
        $query = "SELECT * FROM products WHERE name LIKE '%$search%'";
        $result = $db->pdo_query($query);
        return $result;
    }
}
