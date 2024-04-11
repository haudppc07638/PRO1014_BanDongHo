<?php
$id = $_GET['id'];
$db = new User();
$row = $db->getByID($id);
$errors = [];
if (isset($_POST['editUser']) && isset($id)) {
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $Fullname = $_POST['fullname'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Phone = $_POST['phone'];
    if (empty($Username)) {
        $errors['username'] = "Tên tài khoản không được để trống.";
    }
    if (empty($Password)) {
        $errors['password'] = "Password không được để trống.";
    }
    if (empty($Fullname)) {
        $errors['fullname'] = "FullName không được để trống.";
    }
    if (empty($Email)) {
        $errors['email'] = "Email không được để trống.";
    }
    if (empty($Address)) {
        $errors['address'] = "Địa chỉ không được để trống.";
    }
    if (empty($Phone) || !is_numeric($Phone)) {
        $errors['phone'] = "Số điện thoại không được để trống hoặc không phải là số";
    }
    if (!$errors) {
        $editUser = $db->updateUser($Username, $Password, $Fullname, $Email, $Address, $Phone, $id);
        if ($editUser) {
            header('Location: ?act=listUser');
            exit;
        }
    }
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
                    <input type="text" class="form-control" placeholder="Name" name="username" value="<?= $row['userName'] ?>">
                    <?php if (isset($errors['username'])) : ?>
                        <small class="text-danger"><?= $errors['username'] ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="text" class="form-control" placeholder="Name" name="password" value="<?= $row['password'] ?>">
                    <?php if (isset($errors['password'])) : ?>
                        <small class="text-danger"><?= $errors['password'] ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="note">FullName</label>
                    <input type="text" class="form-control" placeholder="Note" name="fullname" value="<?= $row['fullName'] ?>">
                    <?php if (isset($errors['fullname'])) : ?>
                        <small class="text-danger"><?= $errors['fullname'] ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" placeholder="Name" name="email" value="<?= $row['email'] ?>">
                    <?php if (isset($errors['email'])) : ?>
                        <small class="text-danger"><?= $errors['email'] ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" placeholder="Name" name="address" value="<?= $row['address'] ?>">
                    <?php if (isset($errors['address'])) : ?>
                        <small class="text-danger"><?= $errors['address'] ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" placeholder="Name" name="phone" value="<?= $row['phone'] ?>">
                    <?php if (isset($errors['phone'])) : ?>
                        <small class="text-danger"><?= $errors['phone'] ?></small>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="editUser">Submit</button>
            </form>
        </div>
    </div>
</div>