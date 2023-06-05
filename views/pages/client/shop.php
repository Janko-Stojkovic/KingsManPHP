<?php

$brandsQuery = "SELECT * from brands";
$productsQuery = "SELECT p.id, p.productName, p.brandId, p.price, p.image, p.imageHover, p.description, b.brandName from products as p inner join brands as b on p.brandId = b.id ";

if(isset($_POST["brandIds"])){
    $productsQuery .= "WHERE p.brandId IN ('" . implode("', '",  $_POST["brandIds"]) . "')";
}

if(isset($_POST["keyword"]) && $_POST["keyword"]){
    $productsQuery .= "WHERE p.productName LIKE '%". $_POST["keyword"]."%' OR b.brandName LIKE '%". $_POST["keyword"] ."%'";

}



$products = $conn->query($productsQuery)->fetchAll();


$brands = $conn->query($brandsQuery)->fetchAll();



$productsPerPage = 8;
$totalProducts = count($products);
$totalPages = ceil($totalProducts / $productsPerPage);
$currentPage = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
$startProduct = ($currentPage - 1) * $productsPerPage;
$currentRecords = array_slice($products, $startProduct, $productsPerPage);


if(isset($_POST['action'])){

    $productId = $_POST['id'];
    $productName = $_POST['productName'];
    $user = $_SESSION['user']->id;
    $userName = $_SESSION['user']->username;
    $price = $_POST['price'];

    $brandName = $_POST['brandName'];

    $image = $_POST['image'];

    $quantity = 1;

    // stvaranje novog proizvoda u korpi
    if (!isset($_SESSION['cartAdd'])) {
        $_SESSION['cartAdd'] = array();
    }

    if (!isset($_SESSION['cartAdd'][$productId])) {
        $_SESSION['cartAdd'][$productId] = array(
            'id' => $productId,
            'name' => $productName,
            'brandName' => $brandName,
            'image' => $image,
            'price' => $price,
            'quantity' => 1,
        );
    }
    else {
        // ako proizvod već postoji u korpi, povećaj količinu za 1
        $_SESSION['cartAdd'][$productId]['quantity']++;

    }


}

?>
<section class="w3l-ecommerce-main-inn">
        <!--/mag-content-->
        <div class="ecomrhny-content-inf py-5">
            <div class="container py-lg-5">

                <!--/row1-->
                <div class="ecommerce-grids row">
                    <div class="ecommerce-left-hny col-lg-3">
                        <!--/ecommerce-left-hny-->
                        <aside>
                            <div class="sider-bar">
                                <div class="single-gd mb-5">
                                    <h4>Search <span>here</span></h4>
                                    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
                                        <div class="form-group">
                                            <input class="form-control" type="search" name="keyword"
                                                   placeholder="Search here...">
                                        </div>
                                        <div class="form-group ecom-ordering-select d-flex">
                                            <span class="fa fa-angle-down" aria-hidden="true"></span>
                                            <select name="sort" id="sort">
                                                <option value="default" selected>Sort By Price:</option>
                                                <option value="asc">Sort by Price: low to high</option>
                                                <option value="desc">Sort by Price: high to low</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h4>Product <span>Brands</span></h4>
                                            <ul class="list-group single" id="brands">
                                                <?php foreach($brands as $b): ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center w-100">
                                                        <input
                                                            id="inlineCheckbox-<?=$b->id?> brand"
                                                            type="checkbox" value="<?=$b->id?>" class="brands"
                                                            name="brandIds[]"/> <?=$b-> brandName ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-sm" id="search" type="submit"
                                                   value="Search"/>
                                        </div>

                                    </form>
                                </div>
                
                            </div>
                        </aside>
                        <!--//ecommerce-left-hny-->
                    </div>

                    <div class="ecommerce-right-hny col-lg-9">
                        <div class="row ecomhny-topbar">
                

                        </div>
                        <!-- /row-->
                        <div class="ecom-products-grids" id="products">
                        
                            <?php foreach($currentRecords as $p): ?>

                                <div class="col-xl-3 col-lg-4 col-md-4 col-6 product-incfhny mb-4">
                                    <div class="product-grid2 transmitv">
                                        <div class="product-image2">
                                            <img class="pic-1 img-fluid" src="assets/images/<?= $p->image ?>" alt="<?= $p->image ?>">
                                            <img class="pic-2 img-fluid" src="assets/images/<?= $p->imageHover ?>" alt="<?= $p->imageHover ?>">

                                            <div class="transmitv single-item">

                                            <?php if(isset($_SESSION["user"])): ?>
                                                    <button type="submit" name="btnSubmit" class="transmitv-cart ptransmitv-cart add-cart"
                                                            data-id="<?= $p->id ?>" data-name="<?= $p->productName ?>" data-brandName="<?= $p->brandName ?>" data-price="<?= $p->price ?>" data-image="<?= $p->image ?>">
                                                        Add to Cart
                                                    </button>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="product-content">

                                            <h3 class="title"><?= $p->brandName?>
                                            </h3>
                                            <p>
                                                <?= $p->productName ?>
                                            </p>

                                            <h3 class="price">$<?= $p->price ?></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="alert alert-success d-none" role="alert">
                            
                        </div>
                        <div class="pagination"> 
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a class="<?php if($currentPage == $i): ?>active<?php endif; ?>" href="index.php?page=shop&pageNum=<?= $i ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div> 
                        <!-- //row-->
                    </div>
                </div>
                <!--//row1-->
            </div>
        </div>
        <!--//mag-content-->
    </section>

<!--<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://kit.fontawesome.com/b246e96d93.js" crossorigin="anonymous"></script>-->

<script>
    // $(document).ready(function (){
    //
    //     $(".brands").click(function (){
    //         var action = 'data'
    //         var brand = get_filter_text('brand');
    //
    //         $.ajax({
    //             url:'index.php?page=shop',
    //             method:'POST',
    //
    //             data:{
    //                 action:action, brand:brand
    //             },
    //             success:function (data){
    //                 console.log(data)
    //                 // $("#products").html(response);
    //             }
    //         })
    //     });
    //     function get_filter_text(){
    //         var selectedBrands = []
    //         $('.brands:checked').each(function (){
    //             selectedBrands.push(parseInt($(this).val()));
    //         });
    //         return selectedBrands;
    //     }
    //     function showProduct(data){
    //         let html = "";
    //     }
        // function filterBrands(data){
        //         let selectedBrands = [];
        //         $('.brands:checked').each(function(el){
        //             selectedBrands.push(parseInt($(this).val()));
        //         });
        //         if(selectedBrands.length != 0){
        //             return data.filter(x => selectedBrands.includes(x.brand));
        //         }
        //         return data;
        //     }
    // })
</script>



 




