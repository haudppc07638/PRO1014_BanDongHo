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
    <div class=container>
        <h4> Quên Pass</h4>
        <?php if ($loi != "") { ?>
            <div class="alert alert-danger"><?= $loi ?></div>
        <?php } ?>
        <div class="mb-3">
            <label for="email" class="form-label">Nhập mail</label>
            <input value="<?php if (isset($email) == true) echo $email ?>" type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" name="nutguiyeucau" value="nutgui" class="btn btn-primary">Submit</button>
    </div>
</form>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
