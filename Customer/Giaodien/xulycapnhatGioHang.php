<?php
    session_start();
    require_once "../db/dbhelper.php";
    require_once "../db/car.class.php";

    if (isset($_GET['id']) && isset($_GET['quantity'])) {
        $id      = $_GET['id'];
        $quantity = $_GET['quantity'];
        if(isset($_SESSION['cartItem'][$id]))
        {
            $_SESSION['cartItem'][$id]['quantity'] = $quantity;
        }
        
        // header("Refresh:0, url=Giohang.php");
    }
?>