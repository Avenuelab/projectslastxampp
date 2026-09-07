<?php
	include_once('category.php');
	$name = $_POST["name"];
  	$active = $_POST["active"];
  	$status = $_POST["status"];
	$result = Category::addCategory($name, $active, $status);
	if ($result == 1)
	{
		echo "{\"ketqua\":\"yes\"}";
	}
	else {
		echo "{\"ketqua\":\"no\"}";
	}

?>