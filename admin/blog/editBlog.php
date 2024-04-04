<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
$db = new postBlog();
$blog = $id ? $db->getByID($id) : null;

$notification = "";

if (isset($_POST['editblog'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $blogcate_id = $_POST['blogcate_id']; // Đã sửa tên thành 'blogcate_id'
    $user_id = 1;
    if (empty($title)) {
        $notification = "Tên danh mục không được bỏ trống!";
    } else {
        $edit = $db->update($title, $id, $content, $blogcate_id);
        if ($edit) {
            $notification = "Bài viết đã được cập nhật thành công!";
            echo "<script>document.location='?act=listBlog';</script>";
        } else {
            $notification = "Đã xảy ra lỗi khi cập nhật bài viết!";
        }
    }
}
?>

<div class="col-lg-12 mb-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">SỬA BÀI VIẾT</h4>
            <form method="post">
                <div class="mb-3 mt-3">
                    <div class="form-item mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề ..."
                            value="<?= $blog['title'] ?>">
                        <span id="cateNameError" class="error text-danger"></span>
                    </div>
                    <div class="form-item mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea cols="30" rows="10" class="form-control" id="content" name="content" placeholder="Nội dung ..."><?= $blog['content'] ?></textarea>
                        <span id="cateNameError" class="error text-danger"></span>
                    </div>
                    <div class="form-item mb-3">
                        <label for="blogcate_id" class="form-label">Danh mục</label>
                        <select class="form-select" aria-label="Default select example" name="blogcate_id" id="blogcate_id">
                            <option selected value="">Chọn</option>
                            <?php
                            $data = new blogcategories();
                            $categories = $data->getList();
                            foreach ($categories as $cat):
                                ?>
                                <option value="<?= $cat['id'] ?>" <?php if ($cat['id'] == $blog['blogcate_id']) echo 'selected'; ?>>
                                    <?= $cat['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="editblog" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
