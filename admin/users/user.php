
<?php
class User
{
    var $id = null;
    var $UserID = null;
    var $Username = null;
    var $Password = null;
    var $FullName = null;
    var $Email = null;
    var $role = null;
    var $Address = null;
    var $Phone = null;

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

        if ($result != null) {
            $this->role = $result['role'];
            return true;
        } else {
            return false;
        }
    }
    public function userid($username, $password)
    {
        $db = new connect();
        $select = "select UserID from users where userName='$username' and password='$password'";
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
    public function updateUser($Username, $Password, $Fullname, $Email, $Address, $Phone, $UserID)
    {
        $db = new connect();
        $query = "UPDATE users SET username = '$Username', Password = '$Password', fullName = '$Fullname', 
                email = '$Email', dddress = '$Address', phone = '$Phone' WHERE id = '$UserID'";
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
    function getRole()
    {
        return $this->role;
    }
    public function countUser(){
        $db = new connect();
        $sql = "SELECT COUNT(id) AS countUser FROM users";
        $result = $db->pdo_execute($sql);
        return $result;
    } 
}
?>
