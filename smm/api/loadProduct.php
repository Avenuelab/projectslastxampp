<?php
	include_once('product.php');
  	$list = Product::loadAll();
	echo json_encode($list);
?>
