<?php
ob_start();
session_start();
require_once ('../db/dbhelper.php');
require_once ('../../front_end/giaodien/header.php');
$id = $price = $name = $picture = $content = $id_category = '';
if (!empty($_POST)) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$name = str_replace('"', '\\"', $name);
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if (isset($_POST['price'])) {
		$price = $_POST['price'];
		$price = str_replace('"', '\\"', $price);
	}
	if (isset($_POST['picture'])) {
		$picture = $_POST['picture'];
		$picture = str_replace('"', '\\"', $picture);
	}
	if (isset($_POST['content'])) {
		$content = $_POST['content'];
		$content = str_replace('"', '\\"', $content);
	}
	if (isset($_POST['id_category'])) {
		$id_category = $_POST['id_category'];
	}

	if (!empty($name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into product(name, picture, price, content, id_category, created_at, updated_at) values ("'.$name.'", "'.$picture.'", "'.$price.'", "'.$content.'", "'.$id_category.'", "'.$created_at.'", "'.$updated_at.'")';
		} else {
			$sql = 'update product set name = "'.$name.'", updated_at = "'.$updated_at.'", picture = "'.$picture.'", price = "'.$price.'", content = "'.$content.'", id_category = "'.$id_category.'" where id = '.$id;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select * from product where id = '.$id;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$name       = $product['name'];
		$price       = $product['price'];
		$picture   = $product['picture'];
		$id_category = $product['id_category'];
		$content     = $product['content'];
	}
}
?>


	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Thông Tin Xe</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên xe:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>" placeholder="Tên xe">
					</div>
					<div class="form-group">
					  <label for="price">Chọn loại xe:</label>
					  <select class="form-control" name="id_category" id="id_category">
					  	<option>-- Lựa chọn loại xe --</option>
<?php
$sql          = 'select * from category';
$categoryList = executeResult($sql);

foreach ($categoryList as $item) {
	if ($item['id'] == $id_category) {
		echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
	} else {
		echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
	}
}
?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="price">Giá Bán:</label>
					  <input required="true" type="number" class="form-control" id="price" name="price" value="<?=$price?>" placeholder="Giá xe">
					</div>
					<div class="form-group">
					  <label for="picture">Ảnh:</label>
					  <input required="true" type="text" class="form-control" id="picture" name="picture" value="<?=$picture?>" onchange="updatepicture()" placeholder="Đường link của ảnh">
					  <img src="<?=$picture?>" style="max-width: 200px" id="img_picture">
					</div>
					<div class="form-group">
					  <label for="content">Nội Dung:</label>
					  <textarea class="form-control" rows="5" name="content" id="content"><?=$content?></textarea>
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function updatepicture() {
			$('#img_picture').attr('src', $('#picture').val())
		}

		$(function() {
			//doi website load noi dung => xu ly phan js
			$('#content').summernote({
			  height: 350
			});
		})
	</script>

<?php
	require_once ('../../front_end/giaodien/footer.php');
?>