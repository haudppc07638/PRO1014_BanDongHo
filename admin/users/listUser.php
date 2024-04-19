<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách người dùng</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> ID</th>
                                <th>Tên người dùng</th>
                                <th> Địa chỉ </th>
                                <th> Email</th>
                                <th> Họ và tên</th>
                                <th> SĐT </th>
                                <th> Quyền </th>
                                <th> Tác vụ </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dblist = new User();
                            $rows = $dblist->getList();
                            foreach ($rows as $row): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['userName'] ?></td>
                                    <td><?= $row['address'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['fullName'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><?= $row['role'] ?></td>
                                    <td>
                                        <button type="submit" class="btn btn-info p-2"><a
                                                href="?act=editUser&id=<?= $row['id'] ?>"><i
                                                    class="mdi mdi-pencil-box-outline"></i></a></button>
                                        <?php if ($row['status'] == 1): ?>
                                            <form action="?act=active&id=<?= $row['id']; ?>&status=0" method="post"
                                                style="display:inline;">
                                                <input type="hidden" name="id" value="">
                                                <input type="hidden" name="status" value="0">
                                                <button type="submit" name="action" value="enable"
                                                    class="btn btn-success p-2">Enable</button>
                                            </form>
                                        <?php else: ?>
                                            <form action="?act=active&id=<?= $row['id']; ?>&status=1" method="post"
                                                style="display:inline;">
                                                <input type="hidden" name="id" value="">
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit" name="action" value="disable"
                                                    class="btn btn-danger">Disable</button>
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
</div>