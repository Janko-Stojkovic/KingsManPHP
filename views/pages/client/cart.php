<section class="cart h-100 h-custom" style="background-color: #d2c9ff;">
        <?php if(isset($_SESSION['cartAdd']) && count($_SESSION['cartAdd']) > 0): ?>
         
            <form action="models/cart.php" method="POST">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12">
                            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div class="col-lg-8">
                                            <div class="p-5">
                                                <div class="d-flex justify-content-between align-items-center mb-5">
                                                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>

                                                </div>
                                                <?php if(isset($_SESSION['cartAdd'])): ?>
                                                    <?php foreach($_SESSION['cartAdd'] as $item): ?>
                                                        <?php $total = $item['price']*$item['quantity'];
                                                            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                                                                $id = $_POST['id'];
                                                                unset($_SESSION['cartAdd'][$id]);
                                                            }

                                                        ?>
                                                        <div 
                                                            class="row product mb-4 d-flex justify-content-between align-items-center"
                                                            id="cart_item_<?= $item['id'] ?>">
                                                            <input type="hidden" name="productId" value="<?= $item['id'] ?>"/>

                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <img
                                                                    
                                                                    src="assets/images/<?= $item['image'] ?>"
                                                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                                <h6 class="text-muted"><?= $item['name'] ?></h6>
                                                                <h6 class="text-black mb-0"><?= $item['brandName'] ?></h6>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                                                                <input
                                                                    
                                                                    data-productid="<?= $item['id'] ?>"
                                                                    data-price="<?= $item['price'] ?>"
                                                                    id="item_product_<?= $item['id'] ?>" min="1"
                                                                    name="quantity" value="<?= $item['quantity'] ?>"
                                                                    type="number"
                                                                    class="form-control form-control-sm products"/>

                                                            </div>
                                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                                <h6 class="mb-0">$<?= $total ?></h6>
                                                            </div>
                                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                                <a href="#!"
                                                                
                                                                class="text-muted remove-from-cart" data-id="<?= $item['id'] ?>"><i class="fas fa-times"></i></a>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>

                                                <?php endif; ?>


                                                <div class="pt-5">
                                                    <h6 class="mb-0"><a href="index.php?page=shop" class="text-body"><i
                                                                class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 bg-grey">
                                            <div class="p-5">
                                                <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>

                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between mb-5">
                                                    <?php 
                                                        $totalPrice = 0;
                                                        foreach ($_SESSION['cartAdd'] as $item){
                                                            $totalPrice += $item['quantity'] * $item['price'];
                                                        }
                                                    ?>
                                                        
                                                   
                                                    <h5 class="text-uppercase">Total price: <strong
                                                            id="total">$ <?= $totalPrice ?></strong></h5>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="address" placeholder="You'r address"/>
                                                    <?php if($error): ?>
                                                    <div class="alert alert-danger">
                                                        <?= $error ?>
                                                    </div>
                                                <?php endif; ?>
                                                </div>
                                                <input type="submit" name="btnSubmit" class="btn btn-dark btn-block btn-lg"
                                                        data-mdb-ripple-color="dark" value="Confirm order"/>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <div class="row mb-4 d-flex justify-content-between align-items-center">
                <h1 class="text-center cartInfo">Your cart is empty</h1>
            </div>
        <?php endif; ?>
    </section>
