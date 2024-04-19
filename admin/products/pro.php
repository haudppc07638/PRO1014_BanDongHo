<?php

class Products
{

    var $id = null;
    var $name = null;
    var $image = null;
    var $price = null;
    var $description = null;
    var $category_ID = null;
 

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
    public function getCategoryName($cateID)
    {
        $db = new connect();
        $sql = "SELECT categoryName, id
            FROM categories 
            WHERE id = $cateID";
        $result = $db->pdo_query($sql);
        return $result[0];
    }



    public function add($name, $price, $imageStr, $description, $category_ID, $db)
    {
        $query = "INSERT INTO products (name, price, image, description, category_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $price);
        $stmt->bindParam(3, $imageStr);
        $stmt->bindParam(4, $description);
        $stmt->bindParam(5, $category_ID);
        $success = $stmt->execute();
        return $success;
    }

    public function update($id, $name, $price, $image, $description, $category_ID)
    {
        $db = new connect();
        $oldProduct = $this->getById($id);
        $newImage = $oldProduct['image']; 
        if (!empty($image)) {
            $newImage = $image;
        }
        $sql = "UPDATE products SET name=?, price=?, image=?, description=?, category_id=? WHERE id=?";
        $stmt = $db->pdo_get_connection()->prepare($sql);
        $stmt->execute([$name, $price, $newImage, $description, $category_ID, $id]);
        return $stmt->rowCount() > 0;
    }

    public function delete($id)
    {
        $db = new connect();
    
        // Xóa bình luận liên quan đến sản phẩm
        $sqlDeleteComment = "DELETE FROM comment WHERE product_id = ?";
        $stmtComment = $db->pdo_get_connection()->prepare($sqlDeleteComment);
        $stmtComment->execute([$id]);
    
        // Xóa sản phẩm
        $sqlDeleteProduct = "DELETE FROM products WHERE id = ?";
        $stmtProduct = $db->pdo_get_connection()->prepare($sqlDeleteProduct);
        $result = $stmtProduct->execute([$id]);
    
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
    public function countProducts()
    {
        $db = new connect();
        $query = "SELECT COUNT(*) FROM products";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }
    public function countProductsByCategory($categoryId)
    {
        $db = new connect();
        $query = "SELECT COUNT(*) AS productCount FROM products WHERE category_id = ?";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->execute([$categoryId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['productCount'];
    }

    public function getProductNameById($id)
    {
        $db = new connect(); // Tạo kết nối đến cơ sở dữ liệu
        $query = "SELECT name FROM products WHERE id = ?"; // Truy vấn để lấy tên sản phẩm dựa trên id
        $stmt = $db->pdo_get_connection()->prepare($query); // Chuẩn bị câu truy vấn
        $stmt->execute([$id]); // Thực thi truy vấn với tham số id
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy kết quả trả về từ truy vấn
        return $result['name']; // Trả về tên sản phẩm
    }
    public function getCategoryNameById($category_ID)
{
    $db = new connect(); // Tạo kết nối đến cơ sở dữ liệu
    $query = "SELECT categoryName FROM categories WHERE id = ?"; // Truy vấn để lấy tên danh mục dựa trên id
    $stmt = $db->pdo_get_connection()->prepare($query); // Chuẩn bị câu truy vấn
    $stmt->execute([$category_ID]); // Thực thi truy vấn với tham số category_ID
    $result = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy kết quả trả về từ truy vấn
    return $result['categoryName']; // Trả về tên danh mục
}
}
