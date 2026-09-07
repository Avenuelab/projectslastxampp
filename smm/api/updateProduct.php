<?php
	include_once('product.php');
	$id = $_POST["id"];
  	$name = $_POST["name"];  	
  	$quantity = $_POST["quantity"];
  	$rate = $_POST["rate"];


	$result = Product::updateProduct($id, $name, $quantity, $rate);
	if ($result == 1)
	{
		echo "{\"ketqua\":\"yes\"}";
	}
	else {
		echo "{\"ketqua\":\"no\"}";
	}

?>