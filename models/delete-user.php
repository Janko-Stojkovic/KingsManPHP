<?php
if(isset($_GET['userId'])){
    try{

        $query = "UPDATE users SET isDeleted = 1 WHERE `id`=:idProduct";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":idProduct",$_GET['userId']);
            $stmt->execute();
            header("Location:".explode("&",$_SERVER["HTTP_REFERER"])[0]."&success=Uspesno brisanje korisnika". $_GET['userId']);
        }
        catch(PDOException $ex){
            header("Location:".explode("&",$_SERVER["HTTP_REFERER"])[0]."&error=Doslo je do greske prilikom brisanja korisnika". $_GET['userId']);
        }
    }