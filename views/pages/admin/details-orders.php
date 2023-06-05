<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">

        <section class="content">
        <h1>Order details</h1>
        
            <div class="table-responsive">
                <table id="detailsTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th class="large-column">Price</th>
                        <th>Amount</th>
                        <th class="large-column">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orderDetails as $key=>$d): ?>
                        <?php $total = $d->unitPrice*$d->quantity ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $d->product_name ?></td>
                            
                            <td>$<?= $d->unitPrice ?></td>
                            <td>x<?= $d->quantity ?></td>
                            <td>$<?= $total ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            
        </div> 
        </section>
    </div>

</div>

<script>
     const table = "usersTable";
</script>

</body>


