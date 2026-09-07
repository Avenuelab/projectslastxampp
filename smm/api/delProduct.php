<?php
	include_once('product.php');
	$id = $_POST["id"];
	$result = Product::deleteProduct($id);
	if ($result > 0)
	{
		echo "{\"ketqua\":\"yes\"}";
	}
	else {
		echo "{\"ketqua\":\"no\"}";
	}

?>