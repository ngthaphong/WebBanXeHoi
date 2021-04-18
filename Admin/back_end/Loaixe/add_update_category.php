<?php
ob_start();
session_start();
require_once ('../db/dbhelper.php');
require_once ('../../front_end/giaodien/header.php');

$id = $name = '';
if (!empty($_POST)) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}

	if (!empty($name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into category(name, created_at, updated_at) values ("'.$name.'", "'.$created_at.'", "'.$updated_at.'")';
		} else {
			$sql = 'update category set name = "'.$name.'", updated_at = "'.$updated_at.'" where id = '.$id;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from category where id = '.$id;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$name = $category['name'];
	}
}
?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Loại Xe</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Loại Xe:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>" placeholder="Tên loại xe">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>

	<?php
	require_once ('../../front_end/giaodien/footer.php');
	?>