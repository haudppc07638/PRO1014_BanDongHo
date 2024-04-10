<?php
class category
{
    private $id = null;
    private $categoryName = null;
    private $image = null;
    private $status = null;
    private $created = null;
    private $updated = null;

    public function getList()
    {
        $db = new connect();
        $query = "SELECT * FROM categories";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function getByID($id)
    {
        $db = new connect();
        $query = "SELECT * FROM categories WHERE id = ?";
        $result = $db->pdo_query_one($query, [$id]);
        return $result;
    }
    public function delete($id, $db)
    {
        $query = "DELETE FROM categories WHERE id = ?";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->bindParam(1, $id);
        $result = $stmt->execute();
        return $result;
    }


    public function update($id, $name, $description, $newImageName, $db)
    {
        $query = "UPDATE categories SET categoryName = ?, description = ?";
        if ($newImageName !== null) {
            $query .= ", image = ?";
        }
        $query .= " WHERE id = ?";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $description);
        if ($newImageName !== null) {
            $stmt->bindParam(3, $newImageName);
            $stmt->bindParam(4, $id);
        } else {
            $stmt->bindParam(3, $id);
        }
        $success = $stmt->execute();
        return $success;
    }



    public function add($name, $description, $image, $db)
    {
        $db = new connect();
        $existingCategory = $this->getByName($name, $db);
        if ($existingCategory) {
            return false;
        }
        $query = "INSERT INTO categories (categoryName, description, image) VALUES (?, ?, ?)";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $description);
        $stmt->bindParam(3, $image);
        $success = $stmt->execute();
        return $success;
    }

    public function getByName($name, $db)
    {
        $db = new connect();
        $query = "SELECT * FROM categories WHERE categoryName = ?";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function loadCate($id)
    {
        $db = new connect();
        $sql = "SELECT categoryName FROM categories WHERE id = ?";
        $result = $db->pdo_query_value($sql, [$id]);
        return $result;
    }
    public function categoryNameExists($name, $db)
    {
        $db = new connect();
        $query = "SELECT COUNT(*) FROM categories WHERE categoryName = ?";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->execute([$name]);
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    public function hasProducts($cateId, $db)
    {
        $db = new connect();
        $query = "SELECT COUNT(*) FROM products WHERE category_id = ?";
        $stmt = $db->pdo_get_connection()->prepare($query);
        $stmt->execute([$cateId]);
        $count = $stmt->fetchColumn();
        return $count > 0; 
    }
}
