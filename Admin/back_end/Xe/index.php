<?php 
	ob_start();
    session_start();
	if(!isset($_SESSION['login']))
    {
        header("location:../../front_end/giaodien/login.php");
    }
	require_once ('../db/dbhelper.php');
	require_once "../../front_end/giaodien/header.php";

?>
	
	
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Xe</h2>
			</div>
			<div class="panel-body">
				<a href="add_update_car.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Xe</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Ảnh</th>
							<th>Tên Xe</th>
							<th  width="50px">Giá</th>
							<th>Thông số kỹ thuật</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>			
<?php
//Lay danh sach danh muc tu database
$sql          = 'select * from product';
$productList = executeResult($sql);

$index = 1;
foreach ($productList as $product) {
	echo '<tr>
				<td>'.($index++).'</td>
				<td style="vertical-align: middle;"><img style="width:300px; height:170px" src='.$product['picture'].'></td>
				<td>'.$product['name'].'</td>
				<td>'.$product['price'].'</td>
				<td>'.$product['content'].'</td>
				<td>
					<a href="add_update_car.php?id='.$product['id'].'"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteCar('.$product['id'].')">Xoá</button>
				</td>
			</tr>';
}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteCar(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá  này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('../Ajax_JS/ajax_car.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
<?php 
	require_once "../../front_end/giaodien/footer.php";
?>