<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper">

        <section class="content">
        <h1>Users</h1>

        <a href="index.php?page=create-users" class="btn btn-primary mb-3">Add new user</a>

        <?php if(count($users) > 0): ?>
            <div class="table-responsive">
                <table id="usersTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="large-column">Created At</th>
                        <th class="large-column">Updated At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($currentRecords as $key=>$u): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $u->username ?></td>
                            <td><?= $u->email ?></td>
                            <td><?= $u->role_name ?></td>
                            <td><?= $u->created_at ?></td>
                            <td><?= $u->updated_at ? : 'N/A' ?></td>
                            <td><a href="index.php?page=edit-users&userId=<?= $u->id ?>"><i class="fas fa-edit"></i></a></td>
                            <td>
                                <a href="index.php?page=admin-index-users&userId=<?= $u->id ?>" class="delete_item btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination"> 
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a class="<?php if($currentPage == $i): ?>active<?php endif; ?>" href="index.php?page=admin-index-users&pageNum=<?= $i ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
            </div>
        <?php else: ?>
        <?php endif; ?>


        </section>
    </div>

</div>

<script>
     const table = "usersTable";
</script>

</body>



