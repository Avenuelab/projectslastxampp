<?php
	include_once('product.php');
	$id = $_GET["id"];
	$list = Product::loadProductsById($id);
	echo json_encode($list);
?>
