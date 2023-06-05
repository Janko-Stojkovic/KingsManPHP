<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">

        <section class="content">
        <h1>Products</h1>

        <a href="index.php?page=create-products" class="btn btn-primary mb-3">Add new product</a>
        
        <?php if(count($products) > 0): ?>
            <div class="table-responsive">
                <table id="foodTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th class="large-column">Created At</th>
                        <th class="large-column">Updated At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    <?php foreach($currentRecords as $key=>$product): ?>
                        
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $product->id ?></td>
                            <td><?= $product->productName ?></td>
                            <td>
                                <div class="food-image">
                                    <img class="img-fluid rounded-circle" src="assets/images/<?= $product->image ?>" alt="<?= $product->productName ?>"/>
                                </div>
                            </td>
                            <td><?= $product->brandName ?></td>
                            <td>$<?= $product->price ?></td>
                            <td><?= $product->created_at ?></td>
                            <td><?= $product->updated_at ? : 'N/A' ?></td>
                            <td><a href="index.php?page=edit-products&productId=<?= $product->id ?>"><i class="fas fa-edit"></i></a></td>
                            <td>
                                <a href="index.php?page=admin-index-products&productId=<?= $product->id ?>" class="btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <div class="pagination"> 
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a class="<?php if($currentPage == $i): ?>active<?php endif; ?>" href="index.php?page=admin-index-products&pageNum=<?= $i ?>"><?= $i ?></a>
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
</html>


