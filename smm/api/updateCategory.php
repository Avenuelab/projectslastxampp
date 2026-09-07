<?php
	include_once('category.php');
	$id = $_POST["id"];
  	$name = $_POST["name"];
  	$active = $_POST["active"];
  	$status = $_POST["status"];
	$result = Category::updateCategory($id, $name, $active, $status);
	if ($result == 1)
	{
		echo "{\"ketqua\":\"yes\"}";
	}
	else {
		echo "{\"ketqua\":\"no\"}";
	}

?>