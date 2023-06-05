
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">

        <section class="content">
        <h1>Brands</h1>

        <a href="index.php?page=create-brands" class="btn btn-primary mb-3">Add new brand</a>
        <?php if(count($brands) > 0): ?>
            <div class="table-responsive">
        <table id="categoriesTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Listed</th>
                <th class="large-column">Created At</th>
                <th class="large-column">Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($currentRecords as $key=>$b): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $b->id ?></td>
                    <td><?= $b->brandName ?></td>
                    <td><?= $b->listed ?></td>
                    <td><?= $b->created_at ?></td>
                    <td><?= $b->updated_at ? : 'N/A'?></td>
                    <td><a href="index.php?page=edit-brands&brandId=<?= $b->id ?>"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="index.php?page=admin-index-brands&brandId=<?= $b->id ?>" class="delete_item btn btn-link" data-id= "<?= $b->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination"> 
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a class="<?php if($currentPage == $i): ?>active<?php endif; ?>" href="index.php?page=admin-index-brands&pageNum=<?= $i ?>"><?= $i ?></a>
                <?php endfor; ?>
        </div>
    </div>
        <?php else: ?>
        <?php endif; ?>
    
</div>
        </section>
    </div>

</div>

<script>
     const table = "usersTable";
</script>

</body>



