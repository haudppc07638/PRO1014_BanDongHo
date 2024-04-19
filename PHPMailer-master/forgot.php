<?php
$loi = "";
if (isset($_POST['nutguiyeucau'])) {
    $email = $_POST['email'];
    $conn = new PDO("mysql:host=localhost;dbname=hkhstore;charset=utf8", "root", "mysql");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $loi = "Email chưa được đăng kí.";
    } else {
        $newpass = substr(md5(rand(0, 99999)), 0, 8);
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$newpass, $email]);
        $kq = GuiMatKhauMoi($email, $newpass);
        if ($kq == true) {
            echo "<div class='container mt-3 alert alert-success'>Mật khẩu mới đã được gửi đến địa chỉ email của bạn.</div>";
        } else {
            echo "<div class='container mt-3 alert alert-danger'>Có lỗi xảy ra khi gửi email.</div>";
        }
    }
}

function GuiMatKhauMoi($email, $newpass)
{
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com'; //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'khcute2004@gmail.com'; // SMTP username
        $mail->Password = 'zulxynvjiiildqud'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL
        $mail->Port = 465; // port to connect to
        $mail->setFrom('khcute2004@gmail.com', 'Hiếu');
        $mail->addAddress($email);
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Thư gủi lại mật khẩu';
        $noidungthu = "Thư yêu cầu mật khẩu mới: Mật khẩu của bạn là $newpass";
        $mail->Body = $noidungthu;
        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
        return false;
    }
}
?>

<form method="post">
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Quên mật khẩu </h2>
                                <?php if ($loi != "") { ?>
                                    <div class="alert alert-danger"><?= $loi ?></div>
                                <?php } ?>
                                <div class="form-outline mb-4">
                                    <label for="email" class="form-label" placeholder="Email *" >Nhập Email</label>
                                    <input value="<?php if (isset($email) == true)
                                        echo $email ?>" type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"
                                            name="nutguiyeucau" value="nutgui">Xác nhận </button>
                                    </div>
                                    <p class="text-center text-muted mt-5 mb-0">Nếu đã nhận được mã 
                                    <a href="?act=login" class="fw-bold text-body"><u>Đăng nhập </u></a> <br>
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </form>
    </body>

    </html>