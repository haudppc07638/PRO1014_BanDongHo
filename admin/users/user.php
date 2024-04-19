
<?php
class User
{
    var $id = null;
    var $Username = null;
    var $Password = null;
    var $FullName = null;
    var $Email = null;
    var $role = null;
    var $Address = null;
    var $Phone = null;

    var $status = null;

    function getUser()
    {
        $db = new connect();
        $select = "select * from users";
        return $db->pdo_query($select);
    }
    function checkUser($Username, $Password)
    {
        $db = new connect();
        $select = "select * from users where userName='$Username' and password='$Password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    function checkUserName($Username)
    {
        $db = new connect();
        $select = "SELECT COUNT(userName) as count from users where userName='$Username'";
        $result = $db->pdo_query_one($select);
        if($result['count'] > 0){
            return false;
        }else{
            return $result;
        }
    }
    function checkUserEmail($Email)
    {
        $db = new connect();
        $select = "SELECT COUNT(email) as count from users where email='$Email'";
        $result = $db->pdo_query_one($select);
        if($result['count'] > 0){
            return false;
        }else{
            return $result;
        }
    }
    public function userid($Username, $Password)
    {
        $db = new connect();
        $select = "select id from users where userName='$Username' and password='$Password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function getList()
    {
        $db = new connect();
        $query = "SELECT * FROM users";
        $result = $db->pdo_query($query);
        return $result;
    }

    // hàm lấy 1 dòng dữ liệu của bảng categoris dựa trên id
    public function getByID($id)
    {
        $db = new connect();
        $query = "SELECT * FROM users where id = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    //hàm insert dữ liệu, create dữ liệu, thêm mới dữ liệu
    public function addUser($Username, $FullName, $Email, $Phone, $Address, $Password, $role)
    {
        if (empty($Username) || empty($FullName) || empty($Email) || empty($Phone) || empty($Address) || empty($Password) || empty($role) || isset($Username) || isset($Email)) {
            return false;
        }
        $db = new connect();
        $query = "INSERT INTO users (id, userName, fullName, email,phone, address, password, role) 
                  values (null, '$Username', '$FullName', '$Email', '$Phone', '$Address','$Password', 'user')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function addUser2($Username, $Password, $FullName, $Address, $Email, $Phone)
    {
        $db = new connect();
        $query = "INSERT INTO users (id, userName, password, fullName, address, email, phone,   role) 
                  values (null, '$Username', '$Password', '$FullName', '$Address', '$Email', '$Phone',  'user')";
        $result = $db->pdo_execute_id($query);
        return $result;
    }

    //hàm cập nhập dữ liệu
    public function updateUser($Username, $Password, $Fullname, $Email, $Address, $Phone, $id)
    {
        $db = new connect();
        $query = "UPDATE users SET userName = '$Username', password = '$Password', fullName = '$Fullname', 
                email = '$Email', address = '$Address', phone = '$Phone' WHERE id = '$id'";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function updateUser2($Password, $Fullname, $Email, $Address, $Phone, $id)
    {
        $db = new connect();
        $query = "UPDATE users SET password = '$Password', fullName = '$Fullname', 
                email = '$Email', address = '$Address', phone = '$Phone' WHERE id = '$id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function deleteUser($id)
    {
        $db = new connect();
        $query = "DELETE FROM users WHERE id = '$id'";
        $result = $db->pdo_query_one($query);

        return $result;
    }
    public function checkRole($id){
        $db = new connect();
        $sql = "SELECT role FROM users WHERE id = '$id'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }
    public function countUser()
    {
        $db = new connect();
        $sql = "SELECT COUNT(id) AS countUser FROM users";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    
}
?>
