<?php 

	ob_start();
	session_start();
	require_once "../db/dbhelper.php";
	require_once "../../front_end/giaodien/header.php";
	if(!isset($_SESSION['login']))
    {
        header("location:../../front_end/giaodien/login.php");
    }

	
?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Loại Xe</h2>
			</div>
			<div class="panel-body">
				<a href="add_update_category.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Loại Xe</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên Danh Mục</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>			
<?php
//Lay danh sach danh muc tu database
$sql          = 'select * from category';
$categoryList = executeResult($sql);

$index = 1;
foreach ($categoryList as $item) {
	echo '<tr>
				<td>'.($index++).'</td>
				<td>'.$item['name'].'</td>
				<td>
					<a href="add_update_category.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteCategory('.$item['id'].')">Xoá</button>
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
		function deleteCategory(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá loại xe này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('../Ajax_JS/ajax_category.php', {
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