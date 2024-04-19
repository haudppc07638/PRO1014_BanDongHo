<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];

  $data = new Products();
  $row = $data->getById($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include_once ('../products/pro.php');
  include_once ("../includes/pdo.php");

  $db = new connect();
  $products = new Products();
  $id = $_POST['id'];
  $name = trim($_POST['name']);
  $price = trim($_POST['price']);
  $description = trim($_POST['description']);
  $category_ID = trim($_POST['category_ID']);

  $errors = [];
  $imageFiles = ['image', 'image2', 'image3'];
  $images = [];
  foreach ($imageFiles as $imageFile) {
    if (isset($_FILES[$imageFile]) && $_FILES[$imageFile]['error'] == 0) {
      if (!isImageValid($_FILES[$imageFile]['name'])) {
        $errors[] = "Hình ảnh chỉ được sử dụng định dạng PNG và JPEG.";
      } else {
        $images[$imageFile] = $_FILES[$imageFile]['name'];
      }
    }
  }
  if (empty($name) || empty($price) || empty($description) || empty($category_ID)) {
    $errors[] = "Vui lòng điền đầy đủ thông tin.";
  }

  // Kiểm tra định dạng giá
  if (!is_numeric($price) || $price <= 0) {
    $errors[] = "Giá phải là một số dương.";
  }

  // Kiểm tra xem tên sản phẩm đã thay đổi hay chưa
  $oldProductName = $products->getProductNameById($id); // Lấy tên sản phẩm hiện tại từ cơ sở dữ liệu
  if ($oldProductName != $name) { // Nếu tên sản phẩm đã thay đổi
    // Kiểm tra xem tên sản phẩm mới đã tồn tại trong cơ sở dữ liệu hay chưa
    if ($products->checkProductNameExists($name, $db)) {
      $errors[] = "Tên sản phẩm đã tồn tại.";
    }
  }

  if (count($errors) == 0) {
    $uploadedImages = [];
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
    foreach ($images as $imageTmp => $imageName) {
      $target = $upload_dir . basename($imageName);
      move_uploaded_file($_FILES[$imageTmp]['tmp_name'], $target);
      $uploadedImages[] = $imageName;
    }

    $imagesStr = implode(";", $uploadedImages);

    $success = $products->update($id, $name, $price, $imagesStr, $description, $category_ID);

    if ($success) {
      echo "Cập nhật sản phẩm thành công.";
    } else {
      echo "";
    }
  } else {
    foreach ($errors as $error) {
      echo $error . "<br/>";
    }
  }
  die();
}

function isImageValid($filename)
{
  $allowedExtensions = ['jpg', 'jpeg', 'png'];
  $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
  return in_array($extension, $allowedExtensions);
}
?>
<style>
  .form-row {
    display: flex;
    flex-wrap: wrap;
  }

  .form-group {
    margin-right: 10px;
    /* Khoảng cách giữa các hình ảnh */
    flex: auto;
    /* Đảm bảo các hình ảnh có kích thước bằng nhau */
  }
</style>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h2>Sửa sản phẩm</h2>
    </div>

    <div class="card-body">
      <form id="updateProductForm" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
          <label>Tên sản phẩm</label>
          <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
        </div>

        <div class="form-group">
          <label>Giá</label>
          <input type="number" class="form-control" name="price" value="<?php echo $row['price']; ?>">
        </div>

<div class="form-row">

          <div class="col-md-4">
            <div class="form-group">
              <label for="image">Hình ảnh 1</label>
              <input type="file" class="form-control" name="image" id="image">
              <div class="form-group">
                <img id="uploadedImage" src="/images/<?php echo $row['image']; ?>"
                  style="max-width: 100%; max-height: 300px;">
              </div>
              <div class="error" id="imageError"></div>
            </div>
          </div>
         

            <div class="col-md-4">
              <div class="form-group">
                <label for="image2">Hình ảnh 2</label>
                <input type="file" class="form-control" name="image2" id="image2">
                <div class="form-group">
                  <img id="uploadedImage2" src="/images/<?php echo $row['image2']; ?>"
                    style="max-width: 100%; max-height: 300px;">
                </div>
                <div class="error" id="image2Error"></div>
              </div>
            </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="image3">Hình ảnh 3</label>
                  <input type="file" class="form-control" name="image3" id="image3">
                  <div class="form-group">
                    <img id="uploadedImage3" src="../images/<?php echo $row['image3']; ?>"
                      style="max-width: 100%; max-height: 300px;">
                  </div>
                  <div class="error" id="image3Error"></div>
                </div>
              </div>
</div>

              <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="description" rows="5"><?php echo $row['description']; ?></textarea>
              </div>

              <div class="">
                <label for="category_ID">Danh mục</label>
                <br>
                <select class="form-control" id="category_ID" name="category_ID" value="0">
                  <?php
                  include_once ('../categories/category.php');
                  include_once ("../includes/pdo.php");
                  $db = new connect();
                  $dbCate = new category();

                  $rows = $dbCate->getList();
                  foreach ($rows as $row) { ?>
                    <option value="<?php echo $row['id']; ?>">
                      <?php echo $row['categoryName']; ?>
                    </option>
                  <?php } ?>
                </select>
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
    // Hiển thị ảnh trước khi upload
    $('#image, #image2, #image3').change(function () {
      var input = this;
      var imageId = '#uploadedImage' + input.id.replace('image', '');
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $(imageId).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    });

    // Sử dụng sự kiện 'submit' cho form thay vì 'click' cho nút
    $('#updateProductForm').submit(function (e) {
      e.preventDefault(); // Ngăn chặn hành động submit mặc định của form

      // Tạo FormData từ form này
      var formData = new FormData(this);

      // Gửi dữ liệu qua AJAX
      $.ajax({
        url: 'products/editpro.php',
        type: 'POST',
        data: formData,
        contentType: false, // Đặt contentType và processData là false để gửi dữ liệu file
        processData: false,
        success: function (response) {
          // Xử lý phản hồi từ server
          $('#msg').html(response); // Hiển thị phản hồi từ server
        },
        error: function (xhr, status, error) {
          console.error(error); // Log lỗi nếu AJAX không thành công
        }
      });
    });
  });
</script>