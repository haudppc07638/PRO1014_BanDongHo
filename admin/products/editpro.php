<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];

  $data = new Products();
  $row = $data->getById($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo "1";
  die();
}
?>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h2>Sửa sản phẩm </h2>
    </div>

    <div class="card-body">

      <form id="updateProductForm" enctype="multipart/form-data" method="POST">

        <div class="form-group">
          <label>Tên sản phẩm</label>
          <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
        </div>

        <div class="form-group">
          <label>Giá </label>
          <input type="number" class="form-control" name="price" value="<?php echo $row['price']; ?>">
        </div>

        <div class="form-group">
          <label>Hình ảnh</label>
          <input type="file" class="form-control" name="image">
          <?php
          $mangs = explode(";", $row['image']);
          foreach ($mangs as $mang) {
            echo "<img src='../images/$mang' width='100'>";
          }
          ?>
        </div>

        <div class="form-group">
          <label>Mô tả</label>
          <textarea class="form-control" name="description" rows="5"><?php echo $row['description']; ?></textarea>
        </div>

        <div class="">
          <label for="category_ID">Danh mục :</label>
          <br>
          <select class="form-control" id="category_ID" name="category_ID">
            <?php
            $dbCate = new Category();
            $db = new connect();
            $rows = $dbCate->getList($db);
            foreach ($rows as $row1) { ?>
              <option value="<?php echo $row1['id'] ?>">
                <?php echo $row1['categoryName'] ?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Giảm giá</label>
          <input type="number" class="form-control" name="discount" value="<?php echo $row['discount']; ?>">
        </div>
        <div id="msg"></div>
        <button class="btn btn-success" name="submit">Cập nhật</button>

      </form>

    </div>
  </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    $('#updateProductForm').click(function (e) {
      e.preventDefault(); // Ngăn chặn hành động mặc định của nút submit

      // Lấy dữ liệu từ form
      var formData = new FormData($('#updateProductForm')[0]);

      $.ajax({
        url: 'products/editpro.php', // Đường dẫn đến script xử lý form
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          // Xử lý phản hồi từ server nếu cần
          $('#msg').html(response); // Hiển thị phản hồi từ server trong #msg
        },
        error: function (xhr, status, error) {
          console.log(error);
        }
      });
    });
  });
</script>
</body>

</html>