<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body" style="width: 1230px;">
            <div class="table-heading">
                <div class="container-fluid">
                    <div class="card-header">
                        <h2>Danh sách tài khoản</h2>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th> User Name </th>
                            <th> Address </th>
                            <th> Email</th>
                            <th> FullName</th>
                            <th> Phone </th>
                            <th> Role </th>
                            <th> Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dblist = new User();
                        $rows = $dblist->getList();
                        foreach ($rows as $row) :?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['userName'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['fullName'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['role'] ?></td>
                                <td>
                                    <button type="submit" class="btn btn-primary"><a href="?act=editUser&id=<?= $row['id']?>">Sửa</a></button>
                                    <?php if ($row['status'] == 1) : ?>
                                        <form action="?act=active&id=<?= $row['id']; ?>&status=0" method="post" style="display:inline;">
                                            <input type="hidden" name="id" value="">
                                            <input type="hidden" name="status" value="0">
                                            <button type="submit" name="action" value="enable" class="btn btn-success">Enable</button>
                                        </form>
                                    <?php else : ?>
                                        <form action="?act=active&id=<?= $row['id']; ?>&status=1" method="post" style="display:inline;">
                                            <input type="hidden" name="id" value="">
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" name="action" value="disable" class="btn btn-danger">Disable</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

