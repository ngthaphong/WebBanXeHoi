<?php
    session_start();
    require_once "../db/dbhelper.php";
    require_once "../db/car.class.php";

    if (isset($_GET['id'])) {
        $id      = $_GET['id'];
        if(isset($_SESSION['cartItem'][$id]))
        {
            unset($_SESSION['cartItem'][$id]) ;
        }
        header("Refresh:0, url=Giohang.php");
    }
?>