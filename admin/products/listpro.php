<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List products</h4>
            <a href="?act=addprod"><button type="button" class="btn btn-outline-primary btn-fw">Addproducts</button></a>
            </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Tên </th>
                        <th> Hình ảnh </th>
                        <th> Giá </th>
                         <th>Mô tả </th> 
                        <th> Danh mục  </th>
                        <th> Hành động </th>
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
                                <?php echo $row['price']; ?>
                            </td>
                            <td>
                                <?php echo $row['description']; ?>
                            </td>
                            <td>
                                <?php echo $row['category_id']; ?>
                            </td>

                           
                            <td style="text-align: center;">
                                <a href="?act=deletepro&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                                <br><br>
                                <a href="?act=editpro&id=<?php echo $row['id'] ?>">
                                    <button type="button" class="btn btn-success">Edit</button>
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