<?php
$db = new blogcategories();
$data = new postBlog();
$notification = "";
?>
<div class="row mt-3">
    <div class="col">
        <div class="text-center">
            <p id="notification" class="text-success"></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 mb-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">THÊM DANH MỤC BÀI VIẾT</h4>
                <form method="post">
                    <div class="mb-3 mt-3">
                        <div class="form-item mb-3">
                            <label for="cateName" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="cateName" name="cateName"
                                placeholder="Tên danh mục ...">
                            <span id="cateNameError" class="error text-danger"></span>
                        </div>
                        <div class="form-item mb-3">
                            <label for="parent" class="form-label">Danh mục cha</label>
                            <select class="form-select" aria-label="Default select example" name="parent" id="parent">
                                <option selected value="">Chọn</option>
                                <?php
                                $categories = $db->getList();
                                foreach ($categories as $category):
                                    ?>
                                    <option value="<?= $category['id'] ?>">
                                        <?= $category['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="addBlogCate" class="btn btn-primary">Thêm Mới</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mb-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DANH SÁCH DANH MỤC BÀI VIẾT</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Tên danh mục </th>
                            <th>Danh mục cha</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $categories = $db->getList();
                        foreach ($categories as $category):
                            ?>
                            <tr>
                                <td>
                                    <?= $category['id'] ?>
                                </td>
                                <td class="category-name">
                                    <?= $category['name'] ?>
                                </td>
                                <td>
                                    <?= $category['parent_id'] ?>
                                </td>
                                <td>
                                    <form method="post">
                                        <a href="?act=editCateBlog&id=<?= $category['id'] ?>" class="btn btn-success p-2"><i
                                                class="mdi mdi-pencil-box-outline"></i></a>
                                        <input type="hidden" name="deleteCategoryId" value="<?= $category['id'] ?>">
                                        <button type="submit" name="delete" class="btn btn-danger p-2" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục bài viết này không?')"><i
                                                class="mdi mdi-delete"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['addBlogCate'])) {
    $errors = array();
    if (empty($_POST['cateName'])) {
        $errors[] = "Tên danh mục không được bỏ trống!";
    }

    if (empty($errors)) {
        $cateName = $_POST['cateName'];
        $parent_id = $_POST['parent'] ?? null;
        $user_id = $_SESSION['login']['id'];

        $existingCategory = $db->getByName($cateName);
        if ($existingCategory) {
            $errors = "Tên danh mục đã tồn tại!";
            echo '<script>document.getElementById("cateNameError").innerHTML = "' . $errors . '";</script>';
        } else {
            $addPro = $db->add($cateName, $parent_id, $user_id);
            // em làm tạm cái alert để hiển thị thành công ;-;
            if ($addPro) {
                $notification = "Danh mục đã được thêm thành công!";
                echo '<script>alert("' . $notification . '");</script>';
                echo '<script>document.getElementById("notification").innerHTML = "' . $notification . '";</script>';
                echo '<script>window.location.href = "http://127.0.0.1:5000/admin/?act=cateBlog";</script>';
            } else {
                $errors[] = "Đã xảy ra lỗi khi thêm danh mục!";
            }
        }
    } else {
        foreach ($errors as $error) {
            echo '<script>document.getElementById("cateNameError").innerHTML = "' . $error . '";</script>';
        }
    }
}
if (isset($_POST['delete']) && isset($_POST['deleteCategoryId'])) {
    $categoryIdToDelete = $_POST['deleteCategoryId'];
    $postsInCategory = $data->getPostsByCategoryId($categoryIdToDelete);

    if (!empty($postsInCategory)) {
        $notification = "Không thể xóa danh mục vì đã có bài viết thuộc danh mục này!";
    } else {
        $deleteResult = $db->delete($categoryIdToDelete);
        echo '<script>window.location.href = "http://127.0.0.1:5000/admin/?act=cateBlog";</script>';
    }
}

echo '<script>document.getElementById("notification").innerHTML = "' . $notification . '";</script>';
?>