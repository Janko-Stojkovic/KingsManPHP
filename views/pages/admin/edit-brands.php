
    <?php 


        $errors = [];
        
        $brandsQuery = "SELECT * from brands where id = :id";
        $stmt = $conn->prepare($brandsQuery);
        $idBrand = $_GET['brandId'];
        $stmt->execute([
            ":id"=>$idBrand
        ]);
        $brand = $stmt->fetch();
        
        if(isset($_POST['btnSubmit'])){
            $brandId = $_POST['brandId'];
            $brandName = $_POST['brandName'];
            $listed = isset($_POST['listed']) ? 1 : 0;
            if(!trim($brandName)){
                $errors['brandName'] = "Brand name field can`t be empty";
            }
            if(count($errors) == 0){
                $errors['success'] = "Brand is successfully updated";
                $brandsUpdateQuery = "UPDATE brands SET brandName = :brandName, listed = :listed WHERE id = :id";
                $stmt = $conn->prepare($brandsUpdateQuery);
                $stmt->execute([
                    ":id"=>$brandId,
                    ":brandName"=> $brandName,
                    ":listed"=> $listed
                ]);
            }
        }

    ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">

        <section class="content">
        <h1>Edit brand</h1>

        <form id="categoryForm" action="<?= $_SERVER["REQUEST_URI"]?>" method="POST" class="standard-form">
        <input type="hidden" name="brandId" value="<?= $brand->id ?>">

            <div class="mb-3">
                <label for="name">Brand Name</label>
                <input class="form-control" type="text" name="brandName" id="brandName" value="<?= $brand->brandName ?>" placeholder="Name"/>
                <?= error($errors,"brandName","danger") ?>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" <?php if($brand->listed):?> checked <?php endif; ?> type="checkbox" name="listed" id="listed"/>
                <label class="form-check-label" for="listed">Listed</label>
            </div>
            <div class="text-center">
                <button type="submit" name="btnSubmit" class="btn btn-primary">Edit</button>
                <?= error($errors,"success","success") ?>
            </div>
        </form>
    
        </section>
    </div>

</div>
</body>
