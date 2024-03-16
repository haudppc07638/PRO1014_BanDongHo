
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
        $select = "select * from users where UserName='$Username' and Password='$Password'";
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
        $select = "select UserID from users where UserName='$username' and Password='$password'";
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
        $query = "SELECT * FROM users where UserID = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    //hàm insert dữ liệu, create dữ liệu, thêm mới dữ liệu
    public function addUser($Username, $FullName, $Email, $Phone, $Address, $Password, $role)
    {
        $db = new connect();
        $query = "INSERT INTO users (UserID, UserName, fullName, email,phone, address, password, role) 
                  values (null, '$Username', '$FullName', '$Email', '$Phone', '$Address','$Password', 'user')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function addUser2($Username, $Password, $FullName, $Address, $Email, $Phone)
    {
        $db = new connect();
        $query = "INSERT INTO users (UserID, UserName, password, fullName, address, email, phone,   role) 
                  values (null, '$Username', '$Password', '$FullName', '$Address', '$Email', '$Phone',  'user')";
        $result = $db->pdo_execute_id($query);
        return $result;
    }

    //hàm cập nhập dữ liệu
    public function updateUser($Username, $Password, $Fullname, $Email, $Permissions, $Address, $Phone, $UserID)
    {
        $db = new connect();
        $query = "UPDATE users SET Username = '$Username', Password = '$Password', FullName = '$Fullname', 
                Email = '$Email', Permissions = '$Permissions', Address = '$Address', Phone = '$Phone' WHERE UserID = '$UserID'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function deleteUser($id)
    {
        $db = new connect();
        $query = "DELETE FROM users WHERE UserID = '$id'";
        $result = $db->pdo_query_one($query);
        
        return $result;
    }
    function getRole()
    {
        return $this->role;
    }
    public function countUser(){
        $db = new connect();
        $sql = "SELECT COUNT(userID) AS countUser FROM users";
        $result = $db->pdo_execute($sql);
        return $result;
    } 
}
?>
