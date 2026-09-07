<?php
	include_once('brand.php');
	$name = $_POST["name"];
  	$active = $_POST["active"];
  	$status = $_POST["status"];
	$result = Brand::addBrand($name, $active, $status);
	if ($result == 1)
	{
		echo "{\"ketqua\":\"yes\"}";
	}
	else {
		echo "{\"ketqua\":\"no\"}";
	}

?>