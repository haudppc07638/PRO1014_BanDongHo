<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách sản phẩm</h4>
            <a href="?act=addprod"><button type="button" class="btn btn-outline-primary btn-fw">Addproducts</button></a>
            </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Tên </th>
                        <th> Hình ảnh </th>
                        <th> Giá </th>
                        <th> Giá cũ </th>
                        <th>Mô tả </th>
                        <th> Tên danh mục </th>
                        <th> Tác vụ </th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $dblist = new Products();
                    $rows = $dblist->getList();

                    foreach ($rows as $row) {
                        ?>

                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>

                            <td>
                                <?php
                                $imageNames = explode(';', $row['image']);
                                foreach ($imageNames as $imageName) {
                                    if (!empty($imageName)) {
                                        echo '<img src="../images/' . $imageName . '" alt="image-product" width="100px">';
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo number_format($row['price']) . ' vnd'; ?>
                            </td>
                            <td>
                                <?php echo number_format($row['oldPrice']) . ' vnd'; ?>
                            </td>
                            <td class="category-name">
                                <?php echo $row['description']; ?>
                            </td>
                            <td>
                                <?php
                                $category_ID = $row['category_id'];
                                $categoryName = $dblist->getCategoryNameById($category_ID);
                                echo $categoryName;
                                ?>
                            </td>


                            <td style="text-align: center;">
                                <a href="?act=deletepro&id=<?php echo $row['id']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this product?');">
                                    <button type="button" class="btn btn-danger p-2"><i class="mdi mdi-delete"></i></button>
                                </a>
                                <a href="?act=editpro&id=<?php echo $row['id'] ?>">
                                    <button type="button" class="btn btn-success p-2"><i class="mdi mdi-pencil-box-outline"></i></button>
                                </a>
                            </td>

                        </tr>

                        <?php
                    }
                    ?>

                </tbody>


            </table>
        </div>
    </div>
    </body>

    </html>