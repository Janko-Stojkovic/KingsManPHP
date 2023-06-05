<?php
authorize();
$ordersDetailsQuery = "SELECT * from order_details where order_id=:id";
$stmt = $conn->prepare($ordersDetailsQuery);
$idOrder = $_GET['orderId'];
$stmt->bindParam(":id", $idOrder);
$stmt->execute();
$orderDetails = $stmt->fetchAll();
