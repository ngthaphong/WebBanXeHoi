<?php
     ob_start();
     session_start();
    if(!isset($_SESSION['login']))
    {
        header("location:../giaodien/login.php");
    }
    require_once "../giaodien/header.php";
?>

<h1>Cửa hàng xe ABCXYZ</h1>

<img style="width:100%; height:75%; padding:20px 10px" src="https://www.bmw.vn/content/dam/bmw/common/all-models/3-series/sedan/2018/inspire/bmw-3series-3er-inspire-sp-xxl.jpg.asset.1566827078382.jpg" alt="">


<?php
    require_once "./footer.php";
?>