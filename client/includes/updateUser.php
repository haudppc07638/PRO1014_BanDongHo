<?php
if (!isset($_SESSION['login']) || !isset($_SESSION['login']['id'])) {
    header("Location: ?act=login");
    exit;
}
$id = $_SESSION['login']['id'];
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
        $editUser = $db->updateUser2($Password, $Fullname, $Email, $Address, $Phone, $id);
        if ($editUser) {
            echo '<script>alert("Cập nhật thông tin thành công")</script>';
            header('Location: ?act=home');
            exit;
        }
    }
}
?>
<section>
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Cập nhật thông tin</h2>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-outline mb-4">
                                    <label>Tài Khoản:</label>
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Tên Tài Khoản *" name="username" value="<?= $row['userName'] ?>" />
                                    <?php if (isset($errors['username'])) : ?>
                                        <small class="text-danger"><?= $errors['username'] ?></small>
                                    <?php endif; ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                <label>Họ và Tên:</label>
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Tên đầy đủ *" name="fullname" value="<?= $row['fullName']; ?>" />
                                    <?php if (isset($errors['fullName'])) : ?>
                                        <small class="text-danger"><?= $errors['fullName'] ?></small>
                                    <?php endif; ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                <label>Email:</label>
                                    <input type="text" id="form3Example4cg" class="form-control form-control-lg " placeholder="Email *" name="email" value="<?= $row['email']; ?>" />
                                    <?php if (isset($errors['email'])) : ?>
                                        <small class="text-danger"><?= $errors['email'] ?></small>
                                    <?php endif; ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                <label>Số điện thoại:</label>
                                    <input type="text" id="form3Example4cg" class="form-control form-control-lg " placeholder="Số điện thoại *" name="phone" value="<?= $row['phone']; ?>" />
                                    <?php if (isset($errors['phone'])) : ?>
                                        <small class="text-danger"><?= $errors['phone'] ?></small>
                                    <?php endif; ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                <label>Địa chỉ:</label>
                                    <input type="text" id="form3Example4cg" class="form-control form-control-lg " placeholder="Địa chỉ *" name="address" value="<?= $row['address']; ?>" />
                                    <?php if (isset($errors['address'])) : ?>
                                        <small class="text-danger"><?= $errors['address'] ?></small>
                                    <?php endif; ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                <label>Mật khẩu:</label>
                                    <input type="text" id="form3Example4cg" class="form-control form-control-lg " placeholder="Mật khẩu *" name="password" value="<?= $row['password']; ?>" />
                                    <?php if (isset($errors['password'])) : ?>
                                        <small class="text-danger"><?= $errors['password'] ?></small>
                                    <?php endif; ?>
                                </div>

                                <!-- ... other form fields ... -->
                                <div class="d-flex justify-content-center mb-5">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="editUser">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>