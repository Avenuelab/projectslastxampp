<?php
	include_once('brand.php');
	$id = $_POST["id"];
	$result = Brand::deleteBrand($id);
	if ($result > 0)
	{
		echo "{\"ketqua\":\"yes\"}";
	}
	else {
		echo "{\"ketqua\":\"no\"}";
	}

?>