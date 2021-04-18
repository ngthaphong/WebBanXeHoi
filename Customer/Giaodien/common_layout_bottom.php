<?php
	require_once "../db/dbhelper.php";
	if(isset($_SESSION['errorCartQuantity']))
	{
		$_SESSION['errorCartQuantity'] = "";
	}
?>


<div class="header-para" style="float:right">
			<label style="font-size: 40px; text-align: center; color: red;">Dòng xe</label>
			<hr/>
			<?php
			//Lay danh sach danh muc tu database
			$sql          = 'select * from category';
			$categoryList = executeResult($sql);
			foreach ($categoryList as $item) {
				echo '<div class="list-categories">
					<div class="first-list" style="text-align:center;">
						<div class="div_2"><a href="./Xetheoloai.php?id='.$item['id'].'">'. strtolower($item['name']).'</a></div>
						<div class="clear"></div>
					</div>
				</div>';
			}
			?>
	</div>
		<div class="clear"></div>
		<div class="footer-bottom">
			<div class="copy">
				<p>Design by <label style="color:red">Nguyễn Hoàng Phúc</label></p>
			</div>
		</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--slider-->
<!-- <script src="../thuvien/js/jquery.min.js"></script> -->
<script src="../thuvien/js/script.js" type="text/javascript"></script>
<script src="../thuvien/js/superfish.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>