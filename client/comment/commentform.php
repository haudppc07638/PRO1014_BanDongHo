<?
    // session_start();
    // $iduser=$_SESSION['user']['id'];
    $idpro=$_REQUEST['idpro'];
    include ('../../admin/includes/pdo.php');
    include ('../../model/binhluan.php');
    if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])){
        $content=$_POST['noidung'];
        $product_ID=$_POST['idpro'];
        // $iduser=$_SESSION['user']['id'];
        $create = 'NOW()';
        $update = 'NOW()';
        $user_ID = 1;
        $db = new comment();
        $insert_binhluan = $db-> insert_binhluan($content, $product_ID,$user_ID, $create, $update);
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
    $db = new comment();
    $dsbl = $db->loadall_binhluan1($idpro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="../css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="../css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="../style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Modernizr JS -->
    <link rel="stylesheet" href="../css/comments.css">
</head>

<body>
    <section class="htc__produc__decription bg__white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Start List And Grid View -->
                    <ul class="pro__details__tab" role="tablist">
                        <li role="presentation" class="description active"><a href="#description" role="tab"data-toggle="tab">Tất cả đánh giá ()</a></li>
                        <!-- <li role="presentation" class="shipping"><a href="#shipping" role="tab"
                            data-toggle="tab">shipping</a></li> -->
                    </ul>
                    <!-- End List And Grid View -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="ht__pro__details__content">
                                <!-- Start Single Content -->
                                <div role="tabpanel" id="description"
                                    class="pro__single__content tab-pane fade in active">
                                    <div class="pro__tab__content__inner">
                                        <div class="card">
                                            <div class="card-body">
                                                <?
                                                    foreach ($dsbl as $bl){
                                                        extract($bl);
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-2" style="width: 11.666667%;">
                                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg"
                                                            class="img img-rounded img-fluid" />
                                                        <p class="text-secondary text-center">Ngài cập nhật gần nhất: <?echo $updated?></p>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p>
                                                            <a class="float-left"
                                                                href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>ID người dùng: <?echo $user_ID?></strong></a>

                                                        </p>
                                                        <div class="clearfix"></div>
                                                        <p>
                                                            <?
                                                                echo "Nội dung bình luận: " .$content;
                                                            ?>
                                                        </p>
                                                        <p>
                                                            <a class="float-right btn btn-outline-primary ml-2"> <i
                                                                    class="fa fa-reply"></i> Trả lời</a>
                                                            <!-- <a class="float-right btn text-white btn-danger"> <i
                                                                    class="fa fa-heart"></i> Like</a> -->
                                                        </p>
                                                    </div>
                                                </div>
                                                <?}?>
                                            </div>
                                        </div>
                                        <!-- form start -->
                                        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                                            <div class="card1">
                                                <div class="row1">
                                                    <div class="col-10">    
                                                        <div class="comment-box ml-2" style="margin: 20px;">
                                                            <h4 style="font-size: 20px;">Viết bình luận</h4>
                                                            <div class="comment-area1">
                                                                <input type="hidden" name="idpro" value="<?=$idpro?>">
                                                                <input type="text" class="form-control" name="noidung" placeholder="Viết nội dung của bạn*" rows="4" style="margin: 15px 0px;"></input>
                                                                <input type="submit" class="btn btn-success send1 btn-sm" name="guibinhluan" id="guibinhluan"></input>
                                                            </div>
                                                            <!-- <div class="comment-btns mt-2">
                                                                <div class="row1">
                                                                    <div class="col-61">
                                                                        <div class="pull-right">
                                                                            <button type="submit" class="btn btn-success send1 btn-sm" name="ds">Send</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>