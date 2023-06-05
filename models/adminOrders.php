<?php
$ordersQuery = "SELECT o.id, o.user_id, o.address, o.total, o.created_at, o.updated_at, u.username as username from orders as o inner join users as u on  o.user_id=u.id";
$orders = $conn->query($ordersQuery)->fetchAll();

$resultPerPage = 4;
$totalResult = count($orders);
$totalPages = ceil($totalResult / $resultPerPage);
$currentPage = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
$startResult = ($currentPage - 1) * $resultPerPage;
$currentRecords = array_slice($orders, $startResult, $resultPerPage);
