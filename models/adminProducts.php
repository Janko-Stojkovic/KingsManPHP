<?php
$productsQuery = "SELECT products.id, products.productName, brands.brandName, products.price, products.image, products.imageHover, products.description, products.created_at, products.updated_at from products inner join brands on products.brandId = brands.id ORDER BY products.id";
$products = $conn->query($productsQuery)->fetchAll();

$productsPerPage = 4;
$totalProducts = count($products);
$totalPages = ceil($totalProducts / $productsPerPage);
$currentPage = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
$startProduct = ($currentPage - 1) * $productsPerPage;
$currentRecords = array_slice($products, $startProduct, $productsPerPage);

