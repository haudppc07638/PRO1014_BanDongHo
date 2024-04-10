<?php
        $id = $_GET['id'];
        $db = new User();
        $row = $db->getByID($id);
    if(isset($_POST['editUser']) && isset($id)){
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $Fullname = $_POST['fullname'];
        $Email = $_POST['email'];  
        $Address = $_POST['address']; 
        $Phone = $_POST['phone'];  
        
    }else{
        $editUser = $db->updateUser($Username, $Password, $Fullname, $Email, $Address, $Phone,$id);    
    }
?>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <br><br><br>
            <h3 class="card-title">Cập Nhật Thông Tin</h3>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Tên Tài Khoản</label>
                    <input type="text" class="form-control" placeholder="Name" name="username" value="<?= $row['userName']?>">
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="text" class="form-control" placeholder="Name" name="password" value="<?= $row['password']?>">
                </div>
                <div class="form-group">
                    <label for="note">FullName</label>
                    <input type="text" class="form-control" placeholder="Note" name="fullname" value="<?= $row['fullName']?>">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" placeholder="Name" name="email" value="<?= $row['email']?>">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" placeholder="Name" name="address" value="<?= $row['address']?>">
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" placeholder="Name" name="phone" value="<?= $row['phone']?>">
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="editUser">Submit</button>
            </form>
        </div>
    </div>
</div>


