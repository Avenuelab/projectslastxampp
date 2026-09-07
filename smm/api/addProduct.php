<?php
	include_once('product.php');
	$name = $_POST["name"];
  	$image = $_POST["image"];
  	$brand_id = $_POST["brand_id"];
  	$cat_id = $_POST["cat_id"];
  	$quantity = $_POST["quantity"];
  	$rate = $_POST["rate"];
  	$active = $_POST["active"];
  	$status = $_POST["status"];
  	
	$result = Product::addProduct($name, $image, $brand_id, $cat_id, $quantity, $rate, $active, $status);
	if ($result == 1)
	{
		echo "{\"ketqua\":\"yes\"}";
	}
	else {
		echo "{\"ketqua\":\"no\"}";
	}

?>