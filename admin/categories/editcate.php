<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $name = $_GET['name'];
    $image = $_GET['image'];
    $categoryId = $_GET['id'];
    
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryId = $_POST['categoryId'];
    $name = $_POST['cateName'];
    $image = null;
    $errors = array();
    if (empty($name)) {
        $errors[] = "Tên danh mục không được bỏ trống.";
    }
    if (isset($_FILES['cateImage']) && $_FILES['cateImage']['error'] == 0) {
        // Lấy tên hình ảnh mới
        $image = $_FILES['cateImage']['name'];
        // Đường dẫn tạm thời của hình ảnh trên máy chủ
        $tmp_path = $_FILES['cateImage']['tmp_name'];
        // Đường dẫn đích của hình ảnh trên máy chủ
        $upload_path = '/images/' . $image;
        // Di chuyển hình ảnh từ đường dẫn tạm thời đến đường dẫn đích
        if (move_uploaded_file($tmp_path, $_SERVER['DOCUMENT_ROOT'] . $upload_path)) {
            // Hình ảnh đã được di chuyển thành công, bạn có thể tiếp tục xử lý
        } else {
            $errors[] = "Có lỗi khi tải lên hình ảnh.";
        }
    }
    include_once('../categories/category.php');
    include_once("../includes/pdo.php");
    $category = new category();
    $db = new connect();
    
    $oldCategoryName = $category->getCategoryNameById($categoryId, $db);
    if ($oldCategoryName !== $name) {
        // Category name has been changed, so validate for name existence
        if ($category->categoryNameExists($name, $db)) {
            $errors[] = "Tên danh mục đã được sử dụng.";
        }
    }
    if (isset($_FILES['cateImage']) && $_FILES['cateImage']['error'] == 0) {
        $allowedExtensions = array('jpg', 'jpeg', 'png');
        $fileExtension = pathinfo($_FILES['cateImage']['name'], PATHINFO_EXTENSION);
        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors[] = "Hình ảnh chỉ được sử dụng định dạng jpg, jpeg, hoặc png.";
        }
    }
    if (empty($errors)) {
        if (isset($_FILES['cateImage']) && $_FILES['cateImage']['error'] == 0) {
        }

        $result = $category->update($categoryId, $name, $image, $db);
        if ($result) {
            echo "Danh mục được cập nhật thành công.";
        } else {
            echo "Có lỗi xảy ra khi cập nhật danh mục.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
    die();
}
?>

<form id="updateCategoryForm" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="categoryId" value="<?php echo $categoryId ?>">
    <div class="form-group">
        <label for="cateName">Tên Danh Mục:</label>
        <input type="text" class="form-control" id="cateName" name="cateName" value="<?php echo htmlspecialchars($name); ?>">
    </div>
    <div class="form-group">
        <label for="cateImage">Hình Ảnh :</label>
        <input type="file" class="form-control" id="cateImage" name="cateImage">
        <br>
        <?php if (!empty($image)) : ?>
            <img id="oldImage" src="/images/<?php echo htmlspecialchars($image); ?>" alt="Hình ảnh cũ" style="max-width: 200px;">
        <?php endif; ?>
    </div>
    <div id="text"></div>
    <button type="submit" class="btn btn-primary mt-2">Cập Nhật Danh Mục</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#cateImage').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $('#oldImage').attr('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $('#updateCategoryForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'categories/editcate.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                document.getElementById("text").innerHTML = response;
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>

