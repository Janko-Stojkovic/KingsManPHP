<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    unset($_SESSION['cartAdd'][$id]);

}
if (isset($_POST['productId']) && isset($_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['cartAdd'][$productId])) {
        $_SESSION['cartAdd'][$productId]['quantity'] = $quantity;
    }

}
$error = "";
if(isset($_POST['btnSubmit'])){
    $total_price = 0;
    session_start();
    include "functions.php";
    include "../config/connection.php";
    foreach ($_SESSION['cartAdd'] as $id => $item) {
        $quantity = $item['quantity'];
        $price = $item['price'];
        $subtotal = $quantity * $price;
        $total_price += $subtotal;
    }
    $user_id = $_SESSION['user']->user_id;
    $address = $_POST['address'];

    if(!trim($address)){
        $error = "Address field can`t be empty";
        redirect("../index.php?page=cart&error=".$error);
    }
    else{

        $sql = "INSERT INTO orders (user_id, address, total)
                    VALUES (:user_id, :address, :total )";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':total', $total_price);
        $stmt->bindParam(':address', $address);


        $stmt->execute();

        $order_id = $conn->lastInsertId();

        $sql = "INSERT INTO order_details (order_id, product_name, quantity, unitPrice)
            VALUES (:order_id, :product_name, :quantity, :price)";

        $stmt = $conn->prepare($sql);

        foreach ($_SESSION['cartAdd'] as $id => $item) {
            $product_name = $item['name'];
            $quantity = $item['quantity'];
            $price = $item['price'];

            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':product_name', $product_name);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':price', $price);

            $stmt->execute();
        }
        unset($_SESSION['cartAdd']);
        redirect("../index.php?page=shop&success=Porudzbina uspesno izvrsena");
    }

}

