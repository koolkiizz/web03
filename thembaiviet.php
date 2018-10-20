<?php
$page_title = 'Edit user';
include "header.php";
?>
<?php
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$file = $_FILES['photo'];
	move_uploaded_file($file['tmp_name'], "uploads/".$file['name']);
	$sql = 'Insert into baiviet(name, photo) values("'.$name.'", "http://localhost/web03/uploads/'.$file['name'].'")';
	mysqli_query($conn, $sql);
}
?>
<form action="" method="POST" enctype="multipart/form-data">
	Tên bài viết <input name="name" class="form-control">
	Ảnh bài viết <input type="file" name="photo" class="form-control">
	<input type="submit" class="btn btn-primary" value="SUBMIT" name="submit">
</form>
<?php
include("footer.php");
?>