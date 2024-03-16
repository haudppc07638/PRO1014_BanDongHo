<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List products</h4>
            <a href="?act=addprod"><button type="button" class="btn btn-outline-primary btn-fw">Add products</button></a>
            </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Name </th>
                        <th> Image </th>
                        <th> Price </th>
                        <!-- <th>Description</th> -->
                        <th> Category </th>
                        <th> Discount </th>
                        <th> Action </th>
                    </tr>
                </thead>
<tbody>
<?php

$dblist = new Products();
$rows = $dblist->getList();

foreach ($rows as $row) {
?>

<tr>
  <td><?php echo $row['productID']; ?></td>
  <td><?php echo $row['name']; ?></td>
  
  <td>
  <img src="../images/<?php echo $row['image']; ?>" alt="image-product" width="10px">
  </td>

  <td><?php echo $row['price']; ?></td>

  <td><?php echo $row['category_ID']; ?></td>
  
  <td><?php echo $row['discount']; ?></td>

  <td style="text-align: center;">
    <a href="#"><button type="button" class="btn btn-danger">Delete</button></a> <br> <br>
  <a href="?act=editpro&id=<? echo $row['productID']?>" ><button  type="button" class="btn btn-success">Edit</button ></a> </td>
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
