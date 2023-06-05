<?php
$reportsQuery = "SELECT * from contacts";
$reports = $conn->query($reportsQuery)->fetchAll();

$productsPerPage = 4;
$totalProducts = count($reports);
$totalPages = ceil($totalProducts / $productsPerPage);
$currentPage = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
$startProduct = ($currentPage - 1) * $productsPerPage;
$currentRecords = array_slice($reports, $startProduct, $productsPerPage);