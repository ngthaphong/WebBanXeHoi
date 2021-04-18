<style>
    #backHome:hover
    {
        color: #fff;
        background-color: #31b0d5;
        border-color: #269abc;
    }

    #backHome
    {
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    #addCart:hover
    {
        color: #fff;
        background-color: #449d44;
        border-color: #398439;
    }

    #addCart
    {
        color: #fff; 
        background-color: #5cb85c; 
        border-color: #4cae4c;
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>
<?php
	require_once "./common_layout_top.php";
	require_once "../db/dbhelper.php";
    $id      = $_GET['id'];
	$sql     = 'select * from product where id = '.$id;
	$product = executeSingleResult($sql);

	$name       = $product['name'];
    $price       = $product['price'];
    $picture   = $product['picture'];
    $id_category = $product['id_category'];
    $content     = $product['content'];

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'chitiet.php?id='.$id;
    $_SESSION['url'] = "http://$host$uri/$extra";
?>

<div class="header_bottom_right_images">
                    <?php
                        if(isset($_SESSION['errorCartQuantity']))
                        {
                            if($_SESSION['errorCartQuantity'])
                            {
                                echo '<div class="alert alert-warning">';
                                echo $_SESSION['errorCartQuantity'];
                                echo '</div>';
                            }
                            
                        }		
                    ?>
				 	<div class="about_wrapper"><h1><?=$name?></h1>
					</div>
				    <div class="about-group">
		  			<div class="about-top">	
						<div class="grid images_3_of_1">
							<img src="<?=$picture?>">
						</div>
						<div class="grid span_2_of_3">
							<h3><?=$price?> VNĐ</h3>
							<p><?=$content?></p>
						</div><div class="clear"></div> 
					</div>
                    <div style="text-align:right">
                        <a id="backHome" href="./trangchu.php">Quay lại</a>
                        <a id="addCart" href="xulythemGioHang.php?id=<?=$id?>" >Thêm giỏ hàng</a>
                    </div>
		</div>
    </div>
<?php
    require_once "./common_layout_bottom.php";
?>    	