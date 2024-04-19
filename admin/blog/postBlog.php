<?php
class postBlog
{
    // Khai báo thuộc tính
    var $id = null;
    var $title = null;
    var $create = null;
    var $content = null;
    var $user_id = null;
    var $blogcate_id = null;


    // hàm lấy tất cả dữ liệu của bảng Categoris
    public function getList()
    {
        $db = new connect();
        $query = "SELECT * FROM blog"; // viết câu lệnh sql select *
        $result = $db->pdo_query($query);
        return $result;
    }

    // hàm lấy 1 dòng dữ liệu của bảng categoris dựa trên id
    public function getByID($id)
    {
        $db = new connect();
        $query = "SELECT * FROM blog where id = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    //hàm insert dữ liệu, create dữ liệu, thêm mới dữ liệu


    //hàm cập nhập dữ liệu

    public function delete($id)
    {
        $db = new connect();
        $query = "DELETE FROM blog WHERE id = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function update($title, $id, $content, $blogcate_id)
    {
        $db = new connect();
        $query = "UPDATE blog SET title = '$title', content = '$content', blogcate_id = '$blogcate_id' WHERE id = '$id'";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function add($title, $content, $blogcate_id, $user_id)
    {
        $db = new connect();
        $existingCategory = $this->getByName($title);
        if ($existingCategory) {
            return false;
        }
        $query = "INSERT INTO blog (title, content, user_id, blogcate_id) VALUES ('$title', '$content', '$user_id', '$blogcate_id')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function getByName($title)
    {
        $db = new connect();
        $query = "SELECT * FROM blog WHERE title = '$title'";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function getPostsByCategoryId($cateId)
    {
        $db = new connect();
        $query = "SELECT * FROM blog WHERE blogcate_id = '$cateId'";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function getNameUser($user_id)
    {
        $db = new connect();
        $query = "SELECT userName FROM users JOIN blog ON users.id = user_id WHERE user_id = '$user_id';";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function getCategoryName($blogcate_id)
    {
        $db = new connect();
        $query = "SELECT blogcategories.name FROM blogcategories JOIN blog ON blogcategories.id = blogcate_id WHERE blogcate_id = '$blogcate_id';";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function countPosts()
    {
        $db = new connect();
        $query = "SELECT COUNT(*) FROM blog";
        $count = $db->pdo_query_value($query);
        return $count;
    }
}
