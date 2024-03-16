<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Product</h4>
        </div>
        <form method="post"  enctype="multipart/form-data">
            <div class="">
                <label for="name">Name:</label>
                <br>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm " >
            </div>
            <div class="">
                <label for="price">Price:</label>
                <br>
                <input type="number" class="form-control" id="price" name="price" placeholder="Giá ">
            </div>
            <div class="">
                <label for="image">Image:</label>
                <br>
                <input type="file" class="form-control" id="image" name="image" >
            </div>
            <div class="">
                <label for="description">Description:</label>
                <br>
                <textarea class="form-control" id="description" name="description" rows="4" ></textarea>
            </div>
            <div class="">
                <label for="category_ID">Category:</label>
                <br>
                <select class="form-control" id="category_ID" name="category_ID" >
                <?php
                $dbCate = new Category();
                $rows = $dbCate->getList();
                foreach ($rows as $row) { ?>
                    <option value="<? echo $row['categoryID'] ?>"><? echo $row['categoryName'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="">
                <label for="discount">Discount:</label>
                <br>
                <input type="number" class="form-control" id="discount" name="discount" >
            </div>
            <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
        </form>
        </form>
    </div>
</body>
</html>


