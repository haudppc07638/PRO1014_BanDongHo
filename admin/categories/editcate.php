<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $name = $_GET['name'];
    $description = $_GET['description'];
    $image = $_GET['image'];
    $categoryId = $_GET['id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryId = $_POST['categoryId'];
    $name = $_POST['cateName'];
    $description = $_POST['cateDescription'];

    $imagePath = null; 


    if (isset($_FILES['cateImage']) && $_FILES['cateImage']['error'] == 0) {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        $image = $_FILES['cateImage']['name'];
        $target = $uploadDir . basename($image);
        if (move_uploaded_file($_FILES['cateImage']['tmp_name'], $target)) {
            $imagePath = basename($image);
        } else {
            echo "Lỗi khi tải lên hình ảnh.";
            die();
        }
    }

    include_once('../categories/category.php');
    include_once("../includes/pdo.php");
    $category = new category();
    $db = new connect();
    $result = $category->update($categoryId, $name, $description, $imagePath, $db);
    if ($result) {
        echo "Danh mục được cập nhật thành công.";
    } else {
        echo "Có lỗi xảy ra khi cập nhật danh mục.";
    }
    die();
}
?>

<form id="updateCategoryForm" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="categoryId" value="<?php echo $categoryId ?>">
    <div class="form-group">
        <label for="cateName">Tên Danh Mục:</label>
        <input type="text" class="form-control" id="cateName" name="cateName" value="<?php echo ($name); ?>">
    </div>
    <div class="form-group">
        <label for="cateDescription">Mô Tả:</label>
        <textarea class="form-control" id="cateDescription" name="cateDescription"><?php echo htmlspecialchars($description); ?></textarea>
    </div>
    <div class="form-group">
        <label for="cateImage">Hình Ảnh :</label>
        <input type="file" class="form-control" id="cateImage" name="cateImage">
        <?php if (!empty($imagePath)) : ?>
            <img src="/uploads/<?php echo $image ?>" alt="Hình ảnh cũ" style="max-width: 200px;">
        <?php endif; ?>
    </div>
    <div id="text"></div>
    <button type="submit" class="btn btn-primary mt-2">Cập Nhật Danh Mục</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#updateCategoryForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
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
