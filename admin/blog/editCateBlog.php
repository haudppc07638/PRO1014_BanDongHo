<?php
$id = $_GET['id'];
$db = new blogcategories();
$category = $db->getByID($id);

$notification = "";

if (isset($_POST['editcate'])) {
    $name = $_POST['cateName'];
    $parent_id = $_POST['parent'];
    if (empty($name)) {
        $notification = "Tên danh mục không được bỏ trống!";
    } else {
        $edit = $db->update($name, $id, $parent_id);
        if ($edit) {
            $notification = "Danh mục đã được sửa thành công!";
            echo "<script>document.location='?act=cateBlog';</script>";
        } else {
            $notification = "Đã xảy ra lỗi khi sửa danh mục!";
        }
    }
}
?>
<div class="container-fluid">
    <div class="card-header">
        <h2>Sửa Danh mục bài viết</h2>
    </div>

    <form method="post">
        <div class="mb-3 mt-3">
            <div class="form-item mb-3">
                <label for="cateName" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="cateName" name="cateName" placeholder="Tên danh mục ..." value="<?= $category['name'] ?>">
                <span id="cateNameError" class="error text-danger"><?= $notification ?></span>
            </div>
            <div class="form-item mb-3">
                <label for="parent" class="form-label">Danh mục cha</label>
                <select class="form-select" aria-label="Default select example" name="parent" id="parent">
                    <option selected value="">Chọn</option>
                    <?php
                    $categories = $db->getList();
                    foreach ($categories as $cat):
                        ?>
                        <option value="<?= $cat['id'] ?>" <?php if($cat['id'] == $category['parent_id']) echo 'selected'; ?>>
                            <?= $cat['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="submit" name="editcate" class="btn btn-primary">Lưu</button>
    </form>
</div>
