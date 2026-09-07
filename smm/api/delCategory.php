<?php
	include_once('category.php');
	$id = $_POST["id"];
	$result = Category::deleteCategory($id);
	if ($result > 0)
	{
		echo "{\"ketqua\":\"yes\"}";
	}
	else {
		echo "{\"ketqua\":\"no\"}";
	}

?>