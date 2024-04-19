<?php
// index.php (or the main file)
$idpro = isset($_GET['idpro']) ? $_GET['idpro'] : 0; // Lấy giá trị của id sản phẩm từ URL

$comment = new commentt();
$listbinhluan = $comment->loadall_binhluan($idpro);

// listComment.php
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách bình luận</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Nội dung </th>
                        <th> Tên sản phẩm </th>
                        <th> Tên người bình luận </th>
                        <th> Ngày bình luận </th>
                        <th> Tác vụ </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listbinhluan as $binhluan) { ?>
                        <tr>
                            <td><?php echo $binhluan['id']; ?></td>
                            <td><?php echo $binhluan['content']; ?></td>
                            <td><?php echo $comment->getProductNameByProductId($binhluan['product_id']); ?></td>
                            <td><?php echo $comment->getUserNameByUserId($binhluan['user_id']); ?></td>
                            <td><?php echo $binhluan['created_at']; ?></td>
                            <td style='text-align: center;'>
                                <a href='?act=deleteComment&id=<?php echo $binhluan["id"]; ?>'>
                                    <button type='button' class='btn btn-danger p-2'><i class="mdi mdi-delete"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
// comment.php
class commentt
{
    // Declare properties
    var $id = null;
    var $name = null;
    var $create = null;
    var $status = null;
    var $update = null;

    public function getByID($id)
    {
        $db = new connect();
        $query = "SELECT * FROM comment where id = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function insert_binhluan($content, $product_ID, $user_ID, $created, $updated)
    {
        $db = new connect();
        $query = "INSERT INTO comment(content, product_id, user_id, created_at, updated_at) VALUES ('$content','$product_ID', '$user_ID', '{$created}', '{$updated}')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function loadall_binhluan($idpro)
    {
        $db = new connect();
        $query = "SELECT * FROM comment WHERE 1";
        if ($idpro > 0)
            $query .= " AND product_id = '{$idpro}'";
        $listbl = $db->pdo_execute($query);
        return $listbl;
    }

    public function delete_binhluan($id)
    {
        $db = new connect();
        $query = "DELETE FROM comment WHERE id = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function count_comments($idpro)
    {
        $db = new connect();
        $query = "SELECT COUNT(*) AS total_comments FROM comment WHERE product_id = '{$idpro}'";
        $result = $db->pdo_query_one($query);
        return $result['total_comments'];
    }
    public function getProductNameByProductId($product_id)
{
    $db = new connect();
    $query = "SELECT name FROM products WHERE id = ?";
    $stmt = $db->pdo_get_connection()->prepare($query);
    $stmt->execute([$product_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['name'];
}

public function getUserNameByUserId($user_id)
{
    $db = new connect();
    $query = "SELECT userName FROM users WHERE id = ?";
    $stmt = $db->pdo_get_connection()->prepare($query);
    $stmt->execute([$user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['userName'];
}




}
?>