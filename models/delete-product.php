<?php
if(isset($_GET['productId'])){
    try{
        $query = "DELETE FROM `products` WHERE `id`=:idProduct";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idProduct",$_GET['productId']);
        $stmt->execute();
        header("Location:".explode("&",$_SERVER["HTTP_REFERER"])[0]."&success=Uspesno brisanje proizvoda". $_GET['productId']);
    }
    catch(PDOException $ex){
        header("Location:".explode("&",$_SERVER["HTTP_REFERER"])[0]."&error=Doslo je do greske prilikom brisanja");
    }
}