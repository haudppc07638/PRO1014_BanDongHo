<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dele = new commentt();
    $dele->delete_binhluan($id);
    echo "<script>document.location='?act=listComment';</script>";
}
?>
<?php class commentt
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