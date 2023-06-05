<?php
if(isset($_GET['reportId'])){
    try{
        $query = "DELETE FROM `contacts` WHERE `id`=:idProduct";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idProduct",$_GET['reportId']);
        $stmt->execute();
        header("Location:".explode("&",$_SERVER["HTTP_REFERER"])[0]."&success=Uspesno brisanje reporta". $_GET['reportId']);
    }
    catch(PDOException $ex){
        header("Location:".explode("&",$_SERVER["HTTP_REFERER"])[0]."&error=Doslo je do greske prilikom brisanja");
    }
}