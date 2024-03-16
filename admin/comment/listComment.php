<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List comment</h4>
            <!-- <a href="?act=addPro"><button type="button" class="btn btn-outline-primary btn-fw">Add products</button></a> -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Content </th>
                        <th> ID product </th>
                        <th> ID user </th>
                        <th> Day created </th>
                        <th> Day updated </th>
                        <!-- <th> Status </th> -->
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                    // $comment = new comment();
                    // $listbinhluan= $comment->loadall_binhluan($idpro);
                        foreach ($listbinhluan as $binhluan) {
                            extract($binhluan);
                            echo "<tr>";
                            // Các cột hiển thị thông tin sản phẩm
                            echo "<td>{$binhluan['commentID']}</td>";
                            echo "<td>$content</td>";
                            echo "<td>$product_ID</td>";
                            echo "<td>$user_ID</td>";
                            echo "<td>$created</td>";
                            echo "<td>$updated</td>";
                            echo "<td style='text-align: center;'>
                                <a href='?act=deleteComment&id={$binhluan["commentID"]}'>
                                    <button type='button' class='btn btn-danger btn-fw' style='margin: 5px; min-width: 50px'>Remove</button>
                                </a>
                            </td>";
                        }
                    ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>