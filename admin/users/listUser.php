<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body" style="width: 1230px;">
            <div class="table-heading">
            <div class="container-fluid">
        <div class="card-header">
            <h2>List User</h2>
        </div>
    </head>
    </div>
                <!-- <a href="?act=addUser"><button type="button" class="btn btn-primary">Add</button></a> -->
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th> User Name </th>
                            <th> Password </th>
                            <th> Address </th>
                            <th> Email</th>
                            <th> FullName</th>
                            <th> Phone </th>
                            <th> Role </th>
                        
        
                        </tr>
                    </thead>
                    <?php
                    $dblist = new User();
                    $rows = $dblist->getList();
                    foreach ($rows as $row) { ?>
                        <tbody>
                            <tr>
                                <td>
                                    <? echo $row['userID'] ?>
                                </td>
                                <td>
                                    <? echo $row['userName'] ?>
                                </td>
                                <td>
                                    <? echo $row['password'] ?>
                                </td>
                                <td>
                                    <? echo $row['address'] ?>
                                </td>
                                <td>
                                    <? echo $row['email'] ?>
                                </td>
                                <td>
                                    <? echo $row['fullName'] ?>
                                </td>
                                <td>
                                    <? echo $row['phone'] ?>
                                </td>
                                <td>
                                    <? echo $row['role'] ?>
                                </td>
                                <td>
                                    <? echo $row['status'] ?>
                                </td>

                
                                <!-- <td class='delete'>
                                    
                                </td> -->
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>