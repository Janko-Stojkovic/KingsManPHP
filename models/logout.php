<?php
session_start();
include "functions.php";
$_SESSION["user"] = NULL;
if($_SERVER["REQUEST_URI"] == "index.php?page=admin"){
    redirect("../index.php?page=home");
}
else{
    redirect("../index.php?page=home");
}