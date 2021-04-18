<?php
	ob_start();
	session_start();
	require_once "../db/dbhelper.php";
	$tongsoluongiohang = 0
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Free Cars-Online Website Template | Home :: w3layouts</title>
<link href="../thuvien/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>   
<link href="../vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
<script src="../vnpay_php/assets/jquery-1.11.3.min.js"></script>
<!-- CSS only -->

</head>
<body>
<div class="header-bg">
	<div class="wrap"> 
		<div class="h-bg">
			<div class="total">
				<div class="header">
					<div class="box_header_user_menu" style="float:right">
						<?php
							if(!isset($_SESSION['loginuser']))
							{
								echo '<ul class="user_menu">
											<li class="act first">
												<a href="./dangnhap.php">
													<div class="button-t">
														<div class="button-t"><span>Đăng nhập</span>
													</div>
												</a>
											</li>

											<li class="act">
												<a href="./dangky.php">
													<div class="button-t">
														<div class="button-t"><span>Đăng ký</span>
													</div>
												</a>
											</li>
										</ul>';
							}
							else
							{
								echo '<ul class="user_menu">
											<li class="act first">
													<div class="button-t">
														<div class="button-t"><span>Xin chào: '.$_SESSION['loginuser'].'</span>
													</div>
											</li>

											<li class="act">
												<a href="./dangxuat.php">
													<div class="button-t">
														<div class="button-t"><span>Đăng xuất</span>
													</div>
												</a>
											</li>
										</ul>';
							}
						?>
						
					</div>
					<div class="header-right">
					</div><div class="clear"></div> 
					<div class="header-bot">
						<div class="logo">
							<a href="index.html"><img src="images/logo.png" alt=""/></a>
						</div>
						<div class="search">
						    <input type="text" class="textbox" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
						    <button class="gray-button"><span>Search</span></button>
				       </div>
					<div class="clear"></div> 
				</div>		
		</div>	
		<div class="menu"> 	
			<div class="top-nav"> 
					<ul>
						<li class="active"><a href="./trangchu.php">Trang chủ</a></li>
						<?php
							if(isset($_SESSION['cartItem']))
							{
								foreach($_SESSION['cartItem'] as $item)
								{
									$tongsoluongiohang += $item['quantity'];
								}			
							}
						?>
						<li><a href="./Giohang.php">Giỏ hàng(<?=$tongsoluongiohang?>)</a></li>
					</ul>
					<div class="clear"></div> 
				</div>
		</div>
		<div class="banner-top">
			<div class="header-bottom">