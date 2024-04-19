<?php
$db = new postBlog();
$blogs = $db->getList();
?>
<div class="row">
    <div class="col-lg-12 mb-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DANH SÁCH BÀI VIẾT</h4>
                <a href="?act=addBlog"><button type="button" class="btn btn-outline-primary btn-fw mb-3">Thêm bài
                        viết</button></a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Tiêu đề </th>
                            <th>Nội dung</th>
                            <th>Danh mục</th>
                            <th>Người tạo</th>
                            <th>Ngày tạo</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($blogs as $blog):
                            ?>
                            <tr>
                                <td>
                                    <?= $blog['id'] ?>
                                </td>
                                <td class="category-name">
                                    <?= $blog['title'] ?>
                                </td>
                                <td class="category-name">
                                    <?= $blog['content'] ?>
                                </td>
                                <td>
                                    <?php
                                    $blogcate_id = $blog['blogcate_id'];
                                    $blogcate_name = $db->getCategoryName($blogcate_id);
                                    echo $blogcate_name['name'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $user_id = $blog['user_id'];
                                    $username = $db->getNameUser($user_id);
                                    echo $username['userName'];
                                    ?>
                                </td>
                                <td>
                                    <?= date('d/m/Y', strtotime($blog['created_at'])) ?>
                                </td>
                                <td>
                                    <form method="post">
                                        <a href="?act=editBlog&id=<?= $blog['id'] ?>&idcate=<?= $blog['blogcate_id'] ?>"
                                            class="btn btn-success p-2"><i class="mdi mdi-pencil-box-outline"></i></a>
                                        <input type="hidden" name="deleteBlogId" value="<?= $blog['id'] ?>">
                                        <button type="submit" name="delete" class="btn btn-danger p-2" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')"> <i
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
if (isset($_POST['delete']) && isset($_POST['deleteBlogId'])) {
    $blogIdToDelete = $_POST['deleteBlogId'];
    $deleteResult = $db->delete($blogIdToDelete);

    if (!$deleteResult) {
        echo '<script>window.location.href = "http://127.0.0.1:5000/admin/?act=listBlog";</script>';
    } else {
        $notification = "Đã xảy ra lỗi khi xóa bài viết!";
    }
}
?>