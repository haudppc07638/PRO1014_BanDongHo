<?php
// Lấy id sản phẩm cần edit
$id = $_GET['id'];  
// Lấy thông tin sản phẩm theo id
$data = new Products();
$row = $data->getById($id);
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
      <h2>Edit Product</h2>
    </div>

    <div class="card-body">
    
      <form method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label >Tên sản phẩm</label>
          <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"> 
        </div>

        <div class="form-group">
          <label>Giá sản phẩm</label>  
          <input type="number" class="form-control" name="price" value="<?php echo $row['price']; ?>">
        </div>

        <div class="form-group">
          <label>Hình ảnh</label>
          <input type="file" class="form-control" name="image">
          <img src="../images/<?php echo $row['image']; ?>" width="100">    
        </div>
        
        <div class="form-group">
          <label>Mô tả</label>
          <textarea class="form-control" name="description" rows="5"><?php echo $row['description']; ?></textarea>
        </div>

        <div class="">
                <label for="category_ID">Category:</label>
                <br>
                <select class="form-control" id="category_ID" name="category_ID" >
                <?php
                $dbCate = new Category();
                $rows = $dbCate->getList();
                foreach ($rows as $row) { ?>
                    <option value="<? echo $row['id'] ?>"><? echo $row['categoryName'] ?></option>
                <?php } ?>
                </select>
            </div>
        <div class="form-group">
          <label>Giảm giá</label>  
          <input type="number" class="form-control" name="discount" value="<?php echo $row['discount']; ?>"> 
        </div>

        <button class="btn btn-success" name="submit">Cập nhật</button>
        
      </form>

    </div>
  </div>

</div>
</body>
</html>