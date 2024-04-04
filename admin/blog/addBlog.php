<?php
$db = new postBlog();
?>
<div class="col-lg-12 mb-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">THÊM MỚI BÀI VIẾT</h4>
            <form method="post">
                <div class="mb-3 mt-3">
                    <div class="form-item mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề ...">
                        <span id="titleError" class="error text-danger"></span>
                    </div>
                    <div class="form-item mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea cols="30" rows="10" class="form-control" id="content" name="content"
                            placeholder="Nội dung ..."></textarea>
                        <span id="contentError" class="error text-danger"></span>
                    </div>
                    <div class="form-item mb-3">
                        <label for="blogcate_id" class="form-label">Danh mục</label>
                        <select class="form-select" aria-label="Default select example" name="blogcate_id"
                            id="blogcate_id">
                            <option selected value="">Chọn</option>
                            <?php
                            $data = new blogcategories();
                            $categories = $data->getList();
                            foreach ($categories as $category):
                                ?>
                                <option value="<?= $category['id'] ?>">
                                    <?= $category['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <span id="blogcateError" class="error text-danger"></span>
                    </div>
                </div>
                <button type="submit" name="addBlog" class="btn btn-primary">Thêm Mới</button>
            </form>
        </div>
    </div>
</div>

<?php
$notification = "";
if (isset($_POST['addBlog'])) {
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['blogcate_id'])) {
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $blogcate_id = htmlspecialchars($_POST['blogcate_id']);
        $user_id = 1;

        if (empty($title)) {
            $notification = "Tiêu đề không được bỏ trống!";
        } elseif (empty($content)) {
            $notification = "Nội dung không được bỏ trống!";
        } else {
            $existingCategory = $db->getByName($title);
            if ($existingCategory) {
                $notification = "Tên danh mục đã tồn tại!";
            } else {
                $addPro = $db->add($title, $content, $blogcate_id, $user_id);
                if ($addPro) {
                    $notification = "Danh mục đã được thêm thành công!";
                    echo '<script>alert("' . $notification . '");</script>';
                    echo '<script>document.getElementById("notification").innerHTML = "' . $notification . '";</script>';
                    echo '<script>window.location.href = "http://127.0.0.1:5000/admin/?act=listBlog";</script>';
                } else {
                    $notification = "Đã xảy ra lỗi khi thêm danh mục!";
                }
            }
        }
    } else {
        $notification = "Có lỗi xảy ra!";
    }

    echo '<script>document.getElementById("titleError").innerHTML = "' . $notification . '";</script>';
    echo '<script>document.getElementById("contentError").innerHTML = "' . $notification . '";</script>';
    echo '<script>document.getElementById("blogcateError").innerHTML = "' . $notification . '";</script>';
}
?>