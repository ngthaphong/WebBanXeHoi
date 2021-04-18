<?php
	require_once "./common_layout_top.php";
	require_once "../db/dbhelper.php";

    

    if (isset($_GET['id'])) {
        $id       = $_GET['id'];
        $sql      = 'select * from category where id = '.$id;
        $category = executeSingleResult($sql);
        if ($category != null) {
            $name = $category['name'];
        }
    }

    $sql1   =  'select * from product where id_category =' .$id;
    $productList = executeResult($sql1);
    $index  = 1;

    if($productList == null)
    {
        echo '<div style="font-size:30px"><p >Không có xe thuộc dòng '.$name.'</p></div>';
    }
    else
    {
        echo '<div style="font-size:30px"><p >Các xe thuộc dòng '.$name.' hiện có</p></div>';
    }

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'Xetheoloai.php?id='.$id;
    $_SESSION['url'] = "http://$host$uri/$extra";
?>

<div class="header_bottom_right_images">
        <div class="content-wrapper">		  
            <div class="content-top">
                    <!-- List xe -->
                    <?php
                    
                  
                    foreach ($productList as $item) {
                        echo '
                        <div class="text">
                            <div class="grid_1_of_3 images_1_of_3">
                                <div class="grid_1">
                                    <a href="single.html"><img src="'.$item['picture'].'" title="continue reading" alt=""></a>
                                        <div class="grid_desc">
                                            <div class="price" style="height: 19px;">
                                                    <span class="reducedfrom">'.$item['price']." đ".'</span>
                                                </div>
                                                <div class="cart-button">
                                                <br />
                                                <div class="cart">
                                                    <a href="xulyThemGioHang.php?id='.$item["id"].'"><img src="../thuvien/images/cart.png" alt=""/></a>
                                                </div>
                                                <a class="button" href="chitiet.php?id='.$item['id'].'"><span>Chi tiết</span></a>
                                            <div class="clear"></div>
                                        </div>
                                    </div><div class="clear"></div>
                                </div>
                            </div>
                        </div>';
                    $index++;
                    }
                    ?>
            </div>
    </div>
</div>

<?php
    require_once "./common_layout_bottom.php";
?>    