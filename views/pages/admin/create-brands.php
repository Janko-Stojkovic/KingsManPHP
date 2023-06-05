<?php

        $errors = [];
        if(isset($_POST['btnSubmit'])){
            $brandName = $_POST['brandName'];
            $listed = isset($_POST['listed']) ? 1 : 0;
            $brandsQuery = "SELECT * from brands where brandName = :brandName";
            $stmt = $conn->prepare($brandsQuery);
            $stmt->execute([
                ":brandName"=>$brandName
            ]);
            $brandNameExists = $stmt->fetch();
            if($brandNameExists){
                $errors['brandName'] = "Brand name is already taken";
            }
            else if(!trim($brandName)){
                $errors['brandName'] = "Brand name field can`t be empty";
            }
            if(count($errors) == 0){
                $errors['success'] = "Brand is successfully added";
                $brandsInsertQuery = "INSERT INTO brands (brandName, listed) VALUES (:brandName, :listed)";
                $stmt = $conn->prepare($brandsInsertQuery);
                $stmt->execute([
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
        <h1>Add new brand</h1>

        <form id="categoryForm" action="index.php?page=create-brands" method="POST" class="standard-form">
            <div class="mb-3">
                <label for="name">Brand Name</label>
                <input class="form-control" type="text" name="brandName" id="brandName" placeholder="Name"/>
                <?= error($errors,"brandName","danger") ?>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="listed" id="listed"/>
                <label class="form-check-label" for="listed">Listed</label>
            </div>
            <div class="text-center">
                <input id="btnSubmit" name="btnSubmit" class="btn btn-primary" type="submit" value="Submit" />
                <?= error($errors,"success","success") ?>
            </div>
        </form>
    
        </section>
    </div>

</div>




</body>
