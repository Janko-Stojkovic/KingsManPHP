
    <?php 

        $errors=[];

        $brandQuery = "SELECT * from brands";
        $brands = $conn->query($brandQuery)->fetchAll();

        $productsQuery = "SELECT products.id, products.productName, brands.brandName, products.brandId, products.price, products.image, products.imageHover, products.description, products.created_at, products.updated_at from products inner join brands on products.brandId = brands.id WHERE products.id = :idProduct";
        $stmt = $conn->prepare($productsQuery);
        $idProduct = $_GET['productId'];
        $stmt->execute([
            ":idProduct" => $idProduct
        ]);
        $product = $stmt->fetch();
       
        if(isset($_POST['btnSubmit'])){
            $productId = $_POST['productId'];
            $name = $_POST['productName'];
            $price = $_POST['price'];
            $brand = $_POST['brandId'];
            $description = $_POST['description'];


            if(!trim($name)){
               $errors['name'] = "Name field can`t be empty";
            }
            if(!trim($price)){
                $errors['price'] = "Price field can`t be empty";
            }
            if($price == 0){
                $errors['price'] = "Price can`t be 0";
            }
            if(!trim($description)){
                $errors['description'] = "Description field can`t be empty";
            }
            if($brand == 0){
                $errors['brandId']="You must choose brand";
            }
            if(count($errors)==0){

                if(isset($image) && !isset($imageHover)){
                    $updateProductQuery = "UPDATE products SET productName = :productName, brandId = :brandId, price = :price, image = :image, description = :description WHERE id=:productId";
                    $stmt = $conn->prepare($updateProductQuery);
                    $stmt -> bindParam(":productId", $productId);
                    $stmt -> bindParam(":productName", $name);
                    $stmt -> bindParam(":brandId", $brand);
                    $stmt -> bindParam(":price",$price);
                    $stmt -> bindParam(":image",$image);
                    $stmt -> bindParam(":description",$description);
                    $stmt->execute();
                }
                elseif(!isset($image) && isset($imageHover)){
                    $updateProductQuery = "UPDATE products SET productName = :productName, brandId = :brandId, price = :price, imageHover = :imageHover, description = :description WHERE id=:productId";
                    $stmt = $conn->prepare($updateProductQuery);
                    $stmt -> bindParam(":productId", $productId);
                    $stmt -> bindParam(":productName", $name);
                    $stmt -> bindParam(":brandId", $brand);
                    $stmt -> bindParam(":price",$price);
                    $stmt -> bindParam(":imageHover",$imageHover);
                    $stmt -> bindParam(":description",$description);
                    $stmt->execute();
                }
                elseif(isset($image) && isset($imageHover)){
                    $updateProductQuery = "UPDATE products SET productName = :productName, brandId = :brandId, price = :price, image = :image, imageHover = :imageHover, description = :description WHERE id=:productId";
                    $stmt = $conn->prepare($updateProductQuery);
                    $stmt -> bindParam(":productId", $productId);
                    $stmt -> bindParam(":productName", $name);
                    $stmt -> bindParam(":brandId", $brand);
                    $stmt -> bindParam(":price",$price);
                    $stmt -> bindParam(":image",$image);
                    $stmt -> bindParam(":imageHover",$imageHover);
                    $stmt -> bindParam(":description",$description);
                    $stmt->execute();
                }
                elseif(!isset($image) && !isset($imageHover)){
                    $updateProductQuery = "UPDATE products SET productName = :productName, brandId = :brandId, price = :price, description = :description WHERE id=:productId";
                    $stmt = $conn->prepare($updateProductQuery);
                    $stmt -> bindParam(":productId", $productId);
                    $stmt -> bindParam(":productName", $name);
                    $stmt -> bindParam(":brandId", $brand);
                    $stmt -> bindParam(":price",$price);
                    $stmt -> bindParam(":description",$description);
                    $stmt->execute();
                }
                $errors['success']="Product is successfully updated";
            }
        }
        

    ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">

        <section class="content">
        <h1>Edit product</h1>

        <form class="standard-form" action="<?= $_SERVER["REQUEST_URI"]?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="productId" value="<?= $product->id ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="productName" value="<?= $product->productName ?>"/>
            <?= error($errors,"productName","danger") ?>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?= $product->price ?>"/>
            <?= error($errors,"price","danger") ?>
        </div>
        <div class="mb-3">
            <label for="brandName" class="form-label">Brand Name</label>
            <select id="brandId" class="form-control" name="brandId" value="<?= $product->brandName ?>">
                <option value="0">Choose...</option>
                <?php foreach($brands as $b): ?>
                    <option <?php if($b->id == $product->brandId): ?> selected <?php endif; ?> value="<?= $b->id ?>"><?= $b->brandName ?></option>
                <?php endforeach; ?>
            </select>
            <?= error($errors,"brandId","danger") ?>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description"
                      value=""><?= $product->description ?></textarea>
                      <?= error($errors,"description","danger") ?>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image"/>
            <?= error($errors,"image","danger") ?>
        </div>
        <div class="mb-3">
            <label for="imageHover" class="form-label">imageHover</label>
            <input type="file" id="imageHover" name="imageHover"/>
            <?= error($errors,"imageHover","danger") ?>
        </div>
        <div class="container container-fluid">
            <div class="row">
                <img class="img img-fluid" style="max-width:33% !important;" src="assets/images/<?= $product->image ?>">
                <img class="img img-fluid" style="max-width:33% !important; margin-left:60px;" src="assets/images/<?= $product->imageHover ?>">
            </div>
        </div>
        <div class="mt-5">
            <button type="submit" name="btnSubmit" class="btn btn-primary">Edit</button>
            <?= error($errors,"success","success") ?>
        </div>
        </form>
    
        </section>
    </div>

</div>

    <script>
        const edit = false;
    </script>

<script>
    
     const table = "usersTable";
</script>

</body>
