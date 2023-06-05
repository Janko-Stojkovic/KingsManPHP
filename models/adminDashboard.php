<?php
$ordersQuery = "SELECT * from orders";
$orders = $conn->query($ordersQuery)->fetchAll();

$totalEarningsQuery = "SELECT SUM(order_details.unitPrice * order_details.quantity) as totalEarnings
        FROM order_details";
$stmt = $conn->prepare($totalEarningsQuery);
$stmt->execute();
$totalEarnings = $stmt->fetch();

$usersQuery = "SELECT * from users where isDeleted = 0";
$users = $conn->query($usersQuery)->fetchAll();

$fajl = LOG_FAJL;
$data = file($fajl);

$access_count = [];
$total_access = 0;

foreach($data as $line) {
    list($page, $timestamp, $ip) = explode('__', $line);
    if (strtotime($timestamp) > strtotime('-24 hours')) {
        // Ako jeste, uvećavamo broj pristupa ovoj stranici
        if (!isset($access_count[$page])) {
            $access_count[$page] = 0;
        }
        $access_count[$page]++;
        $total_access++;
    }
}
$currentDate = date('Y-m-d');

$loginQuery = "SELECT COUNT(DISTINCT (user_id)) AS num_users FROM loginlogs WHERE DATE(login_time) = :currentDate";
$logins = $conn->prepare($loginQuery);
$logins->bindParam(':currentDate', $currentDate);
$logins->execute();

$result = $logins->fetch();
$num = $result->num_users;

$productsPerPage = 8;
$totalProducts = count($access_count);
$totalPages = ceil($totalProducts / $productsPerPage);
$currentPage = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
$startProduct = ($currentPage - 1) * $productsPerPage;
$currentRecords = array_slice($access_count, $startProduct, $productsPerPage);

$infoBoxes = [
    [
        "value" => count($orders),
        "text" => "Total orders",
        "colorClass" => "bg-info",
        "icon" => "fas fa-shopping-cart"
    ],
    [
        "value" => "$" . round($totalEarnings->totalEarnings, 2),
        "text" => "Total earnings",
        "colorClass" => "bg-success",
        "icon" => "fas fa-money-bill-wave"
    ],
    [
        "value" => count($users),
        "text" => "Number of users",
        "colorClass" => "bg-warning",
        "icon" => "fas fa-user-plus"
    ],
    [
        "value" => $num,
        "text" => "Number of Logins on this day",
        "colorClass" => "bg-danger",
        "icon" => "fas fa-chart-pie"
    ],


];
