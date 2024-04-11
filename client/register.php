<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = trim($_POST['username']);
    $fullName = trim($_POST['fullname']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);
    $errorMessages = [];

    if (isset($_POST['register'])) {
        if (empty($userName) ) {
            $errorMessages['username'] = "Bạn chưa điền tên tài khoản";
        }
        if (empty($fullName)) {
            $errorMessages['fullname'] = "Bạn chưa điền đầy đủ họ tên";
        }
        if (empty($address)) {
            $errorMessages['address'] = "Bạn chưa điền địa chỉ";
        }
        if (empty($email)) {
            $errorMessages['email'] = "Bạn chưa điền email";
        }
        if (empty($phone) || !is_numeric($phone)) {
            $errorMessages['phone'] = "Bạn chưa điền số điện thoại hoặc không phải số";
        }
        if (empty($password)) {
            $errorMessages['password'] = "Bạn chưa điền mật khẩu";
        }
        if (empty($confirm) || $password !== $confirm) {
            $errorMessages['confirm'] = "Nhập sai mật khẩu";
        }

        if (!empty($errorMessages)) {
        
        } else {
            $user = new User();
            $user->addUser($userName, $fullName, $email, $phone, $address, $password, 'user');
            $listUser = $user->userid($userName, $password);
            extract($listUser);
            $_SESSION['userId'] = $listUser['id'];
            echo '<script> alert("Tạo tài khoản thành công"); window.location.href = "?act=login"; </script>';
            exit;
        }
    }
}
?>
<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp'); height: 155vh!important;">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Register account</h2>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Tên Tài Khoản *" name="username" />
                                    <?php if (isset($errorMessages['username'])) {
                                        echo '<p style="color:red">' . $errorMessages['username'] . '</p>';
                                    } ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Tên đầy đủ *" name="fullname" />
                                    <?php if (isset($errorMessages['fullname'])) {
                                        echo '<p style="color:red">' . $errorMessages['fullname'] . '</p>';
                                    } ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example4cg" class="form-control form-control-lg " placeholder="Email *" name="email" />
                                    <?php if (isset($errorMessages['email'])) {
                                        echo '<p style="color:red">' . $errorMessages['email'] . '</p>';
                                    } ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example4cg" class="form-control form-control-lg " placeholder="Số điện thoại *" name="phone" />
                                    <?php if (isset($errorMessages['phone'])) {
                                        echo '<p style="color:red">' . $errorMessages['phone'] . '</p>';
                                    } ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example4cg" class="form-control form-control-lg " placeholder="Địa chỉ *" name="address" />
                                    <?php if (isset($errorMessages['address'])) {
                                        echo '<p style="color:red">' . $errorMessages['address'] . '</p>';
                                    } ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example4cg" class="form-control form-control-lg " placeholder="Mật khẩu *" name="password" />
                                    <?php if (isset($errorMessages['password'])) {
                                        echo '<p style="color:red">' . $errorMessages['password'] . '</p>';
                                    } ?>

                                </div>
                                <!-- ... other form fields ... -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example4cg" class="form-control form-control-lg " placeholder="Nhập lại mật khẩu *" name="confirm" />
                                    <?php if (isset($errorMessages['confirm'])) {
                                        echo '<p style="color:red">' . $errorMessages['confirm'] . '</p>';
                                    } ?>

                                </div>

                                <!-- ... other form fields ... -->
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="register">Đăng Ký</button>
                                </div>
                                <p class="text-center text-muted mt-5 mb-0">Bạn đã có tài khoản?
                                    <a href="?act=login" class="fw-bold text-body"><u>Đăng Nhập</u></a> <br>
                                </p>
                                <!-- ... other form fields ... -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>