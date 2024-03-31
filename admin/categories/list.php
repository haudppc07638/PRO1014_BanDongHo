<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách danh mục </h4>
            <a href="?act=addcate"><button type="button" class="btn btn-outline-primary btn-fw">Thêm 
                 danh mục </button></a>
            </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Tên </th>
                        <th> Hình Ảnh </th>
                        <th>Hành động </th>
                    </tr>
                </thead>
                <tbody>
                <tbody>

                    <?php
                    $dblist = new category();
                    $db = new connect();
                    $rows = $dblist->getList($db);
                    foreach ($rows as $row) { ?>
                        <tr>
                            <td>
                                <?php echo $row['id'] ?>
                            </td>
                            <td>
                                <?php echo $row['categoryName'] ?>
                            </td>
                            <td>
                                <img src="../uploads/<?php echo $row['image']; ?>" alt="image-product" width="500px">
                            </td>

                            <td styleact="text-align: center;">
                                <a href="?act=deletecate&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this category?');">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                                <a href="?act=editcate&name=<?php echo  $row['categoryName'] ?>&description=<?php echo $row['description']?>&image=<?php echo $row['image'] ?>&id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                            </td>
                        </tr>


                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
if (isset($_GET['message'])) {
    echo '<p style="color: green;">' . htmlspecialchars(urldecode($_GET['message'])) . '</p>';
}
if (isset($_GET['error'])) {
    echo '<p style="color: red;">' . htmlspecialchars(urldecode($_GET['error'])) . '</p>';
}
?>
