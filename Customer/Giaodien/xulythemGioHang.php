<?php
    session_start();
    require_once "../db/dbhelper.php";
    require_once "../db/car.class.php";

    if (isset($_GET['id'])) {
        $id      = $_GET['id'];
        $sql     = 'select * from product where id = '.$id;
        $product = executeSingleResult($sql);
        $name       = $product['name'];
        $price       = $product['price'];
        $picture   = $product['picture'];
        
        if(isset($_SESSION['cartItem']))
        {
            if(isset($_SESSION['cartItem'][$id]))
            {
                if($_SESSION['cartItem'][$id]['quantity'] <10)
                {
                    $_SESSION['cartItem'][$id]['quantity'] += 1;
                    $_SESSION['errorCartQuantity']  = "";
                }
                else
                {
                    $_SESSION['errorCartQuantity'] = 'Xe '.$product["name"].' đã vượt quá số lượng mua trong 1 lần';
                }
            }
            else
            {
                $_SESSION['cartItem'][$id]['id'] = $id;
                $_SESSION['cartItem'][$id]['name'] = $name;
                $_SESSION['cartItem'][$id]['price'] = $price;
                $_SESSION['cartItem'][$id]['picture'] = $picture;
                $_SESSION['cartItem'][$id]['quantity'] = 1;
            }
        }
        else
        {
            $_SESSION['cartItem'][$id]['id'] = $id;
            $_SESSION['cartItem'][$id]['name'] = $name;
            $_SESSION['cartItem'][$id]['price'] = $price;
            $_SESSION['cartItem'][$id]['picture'] = $picture;
            $_SESSION['cartItem'][$id]['quantity'] = 1;
        }
        $url = $_SESSION['url'];
        echo $url;
        header("Location:$url");
    }
?>