<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['cateName'];
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
    $image = $_FILES['cateImage']['name'];
    $target = $uploadDir . basename($image);

    include_once('../categories/category.php');
    include_once("../includes/pdo.php");
    $category = new category();
    $db = new connect();

    if (empty($name)  || empty($image)) {
        echo "Vui lòng nhập đủ dữ liệu.";
    } else
    if (!isImageValid($image)) {
        echo "Định dạng hình ảnh không hợp lệ. Chỉ cho phép tải lên hình ảnh PNG và JPEG.";
    } else
          if ($category->categoryNameExists($name, $db)) {
        echo "Tên danh mục đã tồn tại, vui lòng chọn tên khác.";
    } else {
        if (move_uploaded_file($_FILES['cateImage']['tmp_name'], $target)) {
            $result = $category->add($name, basename($image), $db);
            if ($result) {
                echo "Thêm danh mục thành công.";
            }
        }
    }
    die();
}

function isImageValid($file)
{
    $allowedExtensions = array('jpg', 'jpeg', 'png');
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($extension, $allowedExtensions);
}
?>

<div class="container-fluid">
    <h2>Add New Category</h2>
    <form id="addCategoryForm" enctype="multipart/form-data">
        <div class="form-group">
            <label for="cateName">Category Name:</label>
            <input type="text" class="form-control" id="cateName" name="cateName">
        </div>
        <div class="form-group">
            <label for="cateImage">Image:</label>
            <input type="file" class="form-control" id="cateImage" name="cateImage">
        </div>
        <div class="form-group">
            <img id="uploadedImage" src="" style="max-width: 300px; max-height: 300px;">

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div id="message"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#cateImage').change(function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#uploadedImage').attr('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
        $('#addCategoryForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: 'categories/addcate.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#message').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>