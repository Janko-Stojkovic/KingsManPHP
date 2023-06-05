<?php
$fajl = file(LOG_FAJL);
$productsPerPage = 20;
$totalProducts = count($fajl);
$totalPages = ceil($totalProducts / $productsPerPage);
$currentPage = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
$startProduct = ($currentPage - 1) * $productsPerPage;
$currentRecords = array_slice($fajl, $startProduct, $productsPerPage);
