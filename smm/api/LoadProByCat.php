<?php
	include_once('product.php');
	$id = $_GET["catid"];
	$list = Product::loadProductsByCatId($id);
	echo json_encode($list);
?>
