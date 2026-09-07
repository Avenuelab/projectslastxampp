<?php
	include_once('brand.php');
	$id = $_POST["id"];
  	$name = $_POST["name"];
  	$active = $_POST["active"];
  	$status = $_POST["status"];
	$result = Brand::updateBrand($id, $name, $active, $status);
	if ($result == 1)
	{
		echo "{\"ketqua\":\"yes\"}";
	}
	else {
		echo "{\"ketqua\":\"no\"}";
	}

?>