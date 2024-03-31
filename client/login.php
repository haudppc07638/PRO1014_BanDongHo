<?php
if (isset($_POST['login'])) {
    $userName = $_POST['username'];
    $password = $_POST['password'];

    if (empty($userName)) {
        $errorUsername = "Vui lòng điền tên đăng nhập";
    }
    if (empty($password)) {
        $errorPassword = "Vui lòng điền mật khẩu";
    }
    if (!isset($errorUsername) && !isset($errorPassword)) {
        $user = new User();
        $userInfo = $user->checkUser($userName, $password);
        
        if (!$userInfo) {
            $errorInfo = "Tài khoản hoặc mật khẩu không chính xác";
        } else {
            $_SESSION['login']['username'] = $userName;
            $role = $user->checkRole($userInfo['id']);
            
            if ($role['role'] == 'user') {
                header("Location: ./index.php");
                exit;
            }
            if ($role['role'] == 'admin') {
                header("Location: ./admin/index.php");
                exit;
            } else {
                $errorInfo = "Bạn không có quyền truy cập vào trang này";
            }
        }
    }
}
?>
<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Login account</h2>
                            <form action="?act=login" method="post">
                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="User Name *" name="username" />
                                    <?php
                                    if (!empty($errorUsername)) {
                                        echo '<p style="color:red">' . $errorUsername . '</p>';
                                    }
                                    ?>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg " placeholder="Password *" name="password" />
                                    <?php
                                    if (!empty($errorPassword)) {
                                        echo '<p style="color:red">' . $errorPassword . '</p>';
                                    }
                                    ?>                                   
                                </div>    
                                <?php
                                if (isset($errorInfo)) {
                                    echo '<p style="color:red">' . $errorInfo . '</p>';
                                }
                                ?>                          
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="login">Đăng Nhập</button>
                                </div>
                                <p class="text-center text-muted mt-5 mb-0">Bạn chưa có tài khoản?
                                    <a href="?act=register" class="fw-bold text-body"><u>Đăng ký</u></a> <br>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
