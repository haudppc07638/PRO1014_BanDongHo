<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once ('../products/pro.php');
    include_once ("../includes/pdo.php");

    $db = new connect();
    $products = new Products();
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $category_ID = trim($_POST['category_ID']);


    $errors = [];
    $imageFiles = ['image', 'image2', 'image3'];
    $images = [];
    foreach ($imageFiles as $imageFile) {
        if (isset($_FILES[$imageFile]) && $_FILES[$imageFile]['error'] == 0) {
            if (!isImageValid($_FILES[$imageFile]['name'])) {
                $errors[] = "Hình ảnh chỉ được sử dụng định dạng PNG và JPEG.";
            } else {
                $images[$imageFile] = $_FILES[$imageFile]['name'];
            }
        }
    }
    if (empty($name)) {
        $errors[] = "Tên sản phẩm không được để trống.";
    }
    if (empty($price) || !is_numeric($price) || $price <= 0) {
        $errors[] = "Giá sản phẩm không hợp lệ.";
    }
    if ($products->checkProductNameExists($name, $db)) {
        $errors[] = "Tên sản phẩm đã tồn tại.";
    }

    if (count($errors) == 0) {
        $uploadedImages = [];
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
        foreach ($images as $imageTmp => $imageName) {
            $target = $upload_dir . basename($imageName);
            move_uploaded_file($_FILES[$imageTmp]['tmp_name'], $target);
            $uploadedImages[] = $imageName;
        }

        $imagesStr = implode(";", $uploadedImages);
        echo $imagesStr;

        $success = $products->add($name, $price, $imagesStr, $description, $category_ID, $db);

        if ($success) {
            echo "Thêm thành công .";
        } else {
            echo "Lỗi .";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br/>";
        }
    }
    die();
}

function isImageValid($filename)
{
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    return in_array($extension, $allowedExtensions);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm sản phẩm </h4>
            </div>
            <form id="form" enctype="multipart/form-data">
                <div class="">
                    <label for="name">Tên</label>
                    <br>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm ">
                </div>
                <div class="">
                    <label for="price">Giá </label>
                    <br>
                    <input type="test" class="form-control" id="price" name="price" placeholder="Giá ">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image1">Hình 1</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <img id="uploadedImage1" src="" style="max-width: 300px; max-height: 300px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image2">Hình 2</label>
                            <input type="file" class="form-control" id="image2" name="image2">
                            <img id="uploadedImage2" src="" style="max-width: 300px; max-height: 300px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image3">Hình 3</label>
                            <input type="file" class="form-control" id="image3" name="image3">
                            <img id="uploadedImage3" src="" style="max-width: 300px; max-height: 300px;">
                        </div>
                    </div>
                </div>


                <div class="">
                    <label for="description">Mô tả :</label>
                    <br>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>
                <div class="">
                    <label for="category_ID">Danh mục </label>
                    <br>
                    <select class="form-control" id="category_ID" name="category_ID" value="0">
                        <?php
                        include_once ('../categories/category.php');
                        include_once ("../includes/pdo.php");
                        $db = new connect();
                        $dbCate = new category();

                        $rows = $dbCate->getList();
                        foreach ($rows as $row) { ?>
                            <option value="<?php echo $row['id']; ?>">
                                <?php echo $row['categoryName']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div id="message"></div>
                <button type="submit" class="btn btn-primary" name="addProduct">Thêm sản phẩm </button>
            </form>

        </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#image').change(function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadedImage1').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#image2').change(function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadedImage2').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#image3').change(function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadedImage3').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#form').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: 'products/addprod.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#message').html(response);
                    var form = document.getElementById("form");

                    form.reset();
                    $('#uploadedImage1').attr('src', "");
                    $('#uploadedImage2').attr('src', "");
                    $('#uploadedImage3').attr('src', "");
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
<div>

</div>

</html>