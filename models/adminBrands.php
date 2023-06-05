<?php
    $brandQuery = "SELECT * from brands";
    $brands = $conn->query($brandQuery)->fetchAll();

    $resultPerPage = 4;
    $totalResult = count($brands);
    $totalPages = ceil($totalResult / $resultPerPage);
    $currentPage = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
    $startResult = ($currentPage - 1) * $resultPerPage;
    $currentRecords = array_slice($brands, $startResult, $resultPerPage);
