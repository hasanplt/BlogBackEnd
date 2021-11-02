<?php 
include 'baglan.php';
if(empty($_SESSION['GİRİSBİLGİ'])){
    header("Location:login.php");
    exit;
}
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME,"Turkish");
?>