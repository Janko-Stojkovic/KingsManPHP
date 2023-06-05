<?php
    $usersQuery = "SELECT u.id, u.username, u.email, u.password, r.role_name, u.created_at, u.updated_at from users as u inner join roles as r on u.role_id = r.id where u.isDeleted = 0";
    $users = $conn->query($usersQuery)->fetchAll();
    $resultPerPage = 4;
    $totalResult = count($users);
    $totalPages = ceil($totalResult / $resultPerPage);
    $currentPage = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
    $startResult = ($currentPage - 1) * $resultPerPage;
    $currentRecords = array_slice($users, $startResult, $resultPerPage);