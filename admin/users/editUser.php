<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <br><br><br>
            <h3 class="card-title">Cập Nhật Thông Tin</h3>
            <form class="forms-sample" method="post">
                <div class="form-group">
                    <label for="name">Tên Tài Khoản</label>
                    <input type="text" class="form-control" placeholder="Name" name="Username" value="<?php echo $row_up['username']?>">
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="text" class="form-control" placeholder="Name" name="Password" value="<?php echo $row_up['password']?>">
                </div>
                <div class="form-group">
                    <label for="note">FullName</label>
                    <input type="text" class="form-control" placeholder="Note" name="FullName" value="<?php echo $row_up['fullName']?>">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" placeholder="Name" name="Email" value="<?php echo $row_up['email']?>">
                </div>
                <div class="form-group">
                    <label for="name">Permissions</label>
                    <input type="text" class="form-control" placeholder="Name" name="Permissions" value="<?php echo $row_up['role']?>">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" placeholder="Name" name="Address" value="<?php echo $row_up['address']?>">
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" placeholder="Name" name="Phone" value="<?php echo $row_up['phone']?>">
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="editUser">Submit</button>
            </form>
        </div>
    </div>
</div>

