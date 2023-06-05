<?php
include "config.php";
zabeleziStranicu();
if (!defined('SERVER')) define('SERVER',"localhost");
if (!defined('DATABASE')) define('DATABASE',"shop");
if (!defined('USERNAME')) define('USERNAME', 'root');
if (!defined('PASSWORD')) define('PASSWORD', '');
try{

    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8",USERNAME,PASSWORD);
    
    $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $ex){
    echo $ex->getMessage();
}

function zabeleziStranicu(){
    $stranicaKojaJePosecena = $_SERVER['REQUEST_URI'];
    $datumVreme = date("d-m-Y\TH:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    $sadrzaj = $stranicaKojaJePosecena."__".$datumVreme."__".$ip."\n";
    $fajl = fopen(LOG_FAJL,"a");
    $upis = fwrite($fajl,$sadrzaj);
    if ($upis){
        fclose($fajl);
    }
}
