<?php
session_start();
include "models/utility.php";
include "models/functions.php";

if(isset($_GET["page"])){
    switch($_GET["page"]){
        case "login":
            include "config/connection.php";
            include "config/session.php";
            include "views/fixed/client/head.php";
            include "views/pages/client/login.php";
            break;
        case "register":
            include "config/connection.php";
            include "config/session.php";
            include "views/fixed/client/head.php";
            include "views/pages/client/register.php";
            break;
        case "home":
            include "views/fixed/client/head.php";
            include "views/fixed/client/nav.php";
            include "views/pages/client/home.php";
            include "views/fixed/client/footer.php";
            break;
        case "about":
            include "views/fixed/client/head.php";
            include "views/fixed/client/nav.php";
            include "views/pages/client/about.php";
            include "views/fixed/client/footer.php";
            break;
        case "contact":
            include "views/fixed/client/head.php";
            include "views/fixed/client/nav.php";
            include "views/pages/client/contact.php";
            include "views/fixed/client/footer.php";
            break;
        case "shop":
            include "views/fixed/client/head.php";
            include "views/fixed/client/nav.php";
            include "views/pages/client/shop.php";
            include "views/fixed/client/footer.php";
            break;
        case "cart":
            include "models/cart.php";
            include "views/fixed/client/head.php";
            include "views/fixed/client/nav.php";
            include "views/pages/client/cart.php";
            include "views/fixed/client/footer.php";
            break;
        case "admin":
        case "admin-dashboard":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "models/adminDashboard.php";
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/dashboard.php";
            break;
        case "admin-index-users":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "models/delete-user.php";
            include "models/adminUsers.php";
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/index-users.php";
            break;
        case "admin-index-products":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "models/delete-product.php";
            include "models/adminProducts.php";
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/index-products.php";
            break;
        case "admin-index-brands":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "models/delete-brand.php";
            include "models/adminBrands.php";
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/index-brands.php";
            break;
        case "admin-index-orders":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "models/adminOrders.php";
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/index-orders.php";
            break;
        case "admin-index-reports":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "models/delete-report.php";
            include "models/adminReports.php";
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/index-reports.php";
            break;
        case "admin-index-logs":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "models/adminLogs.php";
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/index-logs.php";
            break;
        case "create-users":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/create-users.php";
            break;
        case "create-products":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/create-products.php";
            break;
        case "create-brands":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/create-brands.php";
            break;
        case "details-order":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "models/details-order.php";
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/details-orders.php";
            break;
        case "edit-brands":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/edit-brands.php";
            break;
        case "edit-products":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/edit-products.php";
            break;
        case "edit-users":
            include "config/session.php";
            include "config/connection.php";
            authorize();
            include "views/fixed/admin/head.php";
            include "views/fixed/admin/nav.php";
            include "views/fixed/admin/sidebar.php";
            include "views/pages/admin/edit-users.php";
            break;
        default:
            include "views/fixed/client/head.php";
            include "views/fixed/client/nav.php";
            include "views/pages/client/home.php";
            break;
    }
}
else{
    include "views/fixed/client/head.php";
    include "views/fixed/client/nav.php";
    include "views/pages/client/home.php";
    include "views/fixed/client/footer.php";
}


?>
    </body>
</html>
