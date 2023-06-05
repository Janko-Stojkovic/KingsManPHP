<?php
if(isset($_GET['brandId'])){
    try{
        $query = "DELETE FROM `brands` WHERE `id`=:idProduct";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idProduct",$_GET['brandId']);
        $stmt->execute();
        header("Location:".explode("&",$_SERVER["HTTP_REFERER"])[0]."&success=Uspesno brisanje brenda". $_GET['brandId']);
    }
    catch(PDOException $ex){
        header("Location:".explode("&",$_SERVER["HTTP_REFERER"])[0]."&error=Doslo je do greske prilikom brisanja");
    }
}