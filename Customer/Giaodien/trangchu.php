<?php
	require_once "./common_layout_top.php";
	require_once "../db/dbhelper.php";
	$host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'trangchu.php';
    $_SESSION['url'] = "http://$host$uri/$extra";
?>
		<div class="header_bottom_right_images">
					<div id="slideshow">
							<ul class="slides">
						    	<li><a href="details.html"><canvas ></canvas><img src="../thuvien/images/banner4.jpg" alt="Marsa Alam underawter close up" ></a></li>
						        <li><a href="details.html"><canvas></canvas><img src="../thuvien/images/banner2.jpg" alt="Turrimetta Beach - Dawn" ></a></li>
						        <li><a href="details.html"><canvas></canvas><img src="../thuvien/images/banner3.jpg" alt="Power Station" ></a></li>
						        <li><a href="details.html"><canvas></canvas><img src="../thuvien/images/banner1.jpg" alt="Colors of Nature" ></a></li>
						    </ul>
						    <span class="arrow previous"></span>
						    <span class="arrow next"></span>
				  	</div>
		  			<div class="content-wrapper">		  
						<div class="content-top">
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
								<!-- List xe -->
								<?php
								$sql          = 'select * from product';
								$productList = executeResult($sql);
								$index  = 1;
								foreach ($productList as $item) {
									echo '
									<div class="text">
										<div class="grid_1_of_3 images_1_of_3">
											<div class="grid_1">
												<a href="single.html"><img src="'.$item['picture'].'" title="continue reading" alt=""></a>
												<div style="text-align:center; color:red; height:32px"><span>'.$item['name'].'</span></div>
													<div class="grid_desc">
														<div class="price" style="height: 19px;">
																<span class="reducedfrom">'.$item['price']." đ".'</span>
															</div>
															<div class="cart-button">
															<br />
															<div class="cart">
																<a href="xulythemGioHang.php?id='.$item['id'].'"><img src="../thuvien/images/cart.png" alt=""/></a>
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
    	
            