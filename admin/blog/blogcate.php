<?php
class blogcategories
{
    // Khai báo thuộc tính
    var $id = null;
    var $name = null;
    var $create = null;
    var $parent_id = null;
    var $user_id = null;


    // hàm lấy tất cả dữ liệu của bảng Categoris
    public function getList()
    {
        $db = new connect();
        $query = "SELECT * FROM blogcategories"; // viết câu lệnh sql select *
        $result = $db->pdo_query($query);
        return $result;
    }

    // hàm lấy 1 dòng dữ liệu của bảng categoris dựa trên id
    public function getByID($id)
    {
        $db = new connect();
        $query = "SELECT * FROM blogcategories where id = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    //hàm insert dữ liệu, create dữ liệu, thêm mới dữ liệu


    //hàm cập nhập dữ liệu

    public function delete($id)
    {
        $db = new connect();
        $query = "DELETE FROM blogcategories WHERE id = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function update($name, $id, $parent_id)
    {
        $db = new connect();
        $query = "UPDATE blogcategories SET name = '$name', parent_id = '$parent_id' WHERE id = '$id'";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function add($name, $parent_id, $user_id)
    {
        $db = new connect();
        $existingCategory = $this->getByName($name);
        if ($existingCategory) {
            return false;
        }
        $query = "INSERT INTO blogcategories (id, name, parent_id, user_id) VALUES (null, '$name', '$parent_id', '$user_id') ";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function getByName($name)
    {
        $db = new connect();
        $query = "SELECT * FROM blogcategories WHERE name = '$name'";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function loadCate($id)
    {
        $db = new connect();
        $query = "SELECT users.name FROM blogcategories
              LEFT JOIN users ON blogcategories.user_id = users.id
              WHERE blogcategories.id = ?";
        $result = $db->pdo_query_one($query, [$id]);

        if ($result) {
            return $result['name'];
        } else {
            return "";
        }
    }
}

?>