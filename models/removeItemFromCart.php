<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    unset($_SESSION['cartAdd'][$id]);

}
redirect("../index.php?page=cart");