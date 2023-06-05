
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">

        <section class="content">
        <h1>Orders</h1>
        <?php if(count($orders) > 0): ?>
            <div class="table-responsive">
            <table id="ordersTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>User</th>
                    <th>Address</th>
                    <th>Total Price</th>
                    <th class="large-column">Created At</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($currentRecords as $key=>$o): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $o->id ?></td>
                        <td><?= $o->username ?></td>
                        <td><?= $o->address ?></td>
                        <td>$<?= $o->total ?></td>
                        <td><?= $o->created_at ?></td>
                        <td>
                            <a href="index.php?page=details-order&orderId=<?= $o->id ?>">
                                <i class="fas fa-receipt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="pagination"> 
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a class="<?php if($currentPage == $i): ?>active<?php endif; ?>" href="index.php?page=admin-index-orders&pageNum=<?= $i ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
        </div>
        <?php else: ?>
            <h2 class="d-flex justify-content-center mt-5">You have no orders</h2>
        <?php endif; ?>
        
        </section>
    </div>

</div>

<script>
     const table = "usersTable";
</script>

</body>
</html>


