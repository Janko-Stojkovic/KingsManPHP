<?php


        $errors=[];

        $brandQuery = "SELECT * from brands";
        $brands = $conn->query($brandQuery)->fetchAll();

        if(isset($_POST['btnSubmit'])){
            $productName = $_POST['productName'];
            $brandId = $_POST['brandId'];
            $price = $_POST['price'];
            $image = $_FILES['image'];
            $imageHover = $_FILES['imageHover'];
            $description = $_POST['description'];
            $productNameQuery = "SELECT * from products WHERE productName = :productName";
            $stmt = $conn->prepare($productNameQuery);
            $stmt->execute(
                [
                    ":productName" => $productName
                ]
            );
            $productNameTaken = $stmt->fetch();

            if($productNameTaken){
                $errors['productName'] = "Product name is already taken";
            }
            else if(!trim($productName)){
                $errors['productName'] = "Product name field can`t be empty";
            }
            if(!isset($brandId)){
                $errors['brandId'] = "You must select one of the brands";
            }
            if(!trim($price)){
                $errors['price'] = "Price field can`t be empty";
            }
            else if (!is_numeric($price)){
                $errors['price'] = "Price must be numeric";
            }
            if(!trim($description)){
                $errors['description'] = "Description field can`t be empty";
            }
            if(!isset($image)){
                $errors['image'] = "You must choose image to upload";
            }
            else if($image['size'] > 100000000){
                $errors['image'] = "Your image is larger than 100MB";
            }
            if(!isset($imageHover)){
                $errors['imageHover'] = "You must choose image to upload";
            }
            else if($imageHover['size'] > 100000000){
                $errors['imageHover'] = "Your image hover is larger than 100MB";
            }
            if(count($errors)==0){
                $errors['success']="You added product successfully";
                $productInsertQuery = "INSERT into products (productName, brandId, price, image, imageHover, description) values (:productName, :brandId, :price, :image, :imageHover, :description)";
                $stmt = $conn->prepare($productInsertQuery);
                $stmt->execute([
                    "productName"=> $productName,
                    "brandId"=> $brandId,
                    "price"=> $price,
                    "image"=> $image['name'],
                    "imageHover"=> $imageHover['name'],
                    "description"=> $description,
                ]);
            }
        }

    ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="content-wrapper">

        <section class="content">
        <h1>Add new product</h1>

        <form class="standard-form" action="index.php?page=create-products" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="productName" value=""/>
            <?= error($errors,"productName","danger") ?>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value=""/>
            <?= error($errors,"price","danger") ?>
        </div>
        <div class="mb-3">
            <label for="brandName" class="form-label">Brand Name</label>
            <select id="brandId" class="form-control" name="brandId">
                <option value="0">Choose...</option>
                <?php foreach($brands as $b): ?>
                    <option value="<?= $b->id ?>"><?= $b->brandName ?></option>
                <?php endforeach; ?>
            </select>
            <?= error($errors,"brandId","danger") ?>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description"
                      value=""></textarea>
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
        <div>
            <button type="btnSubmit" name="btnSubmit" class="btn btn-primary">Add</button>
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
