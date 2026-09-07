<?php
	include_once('product.php');
  $list = Product::loadAllProducts();
	echo json_encode($list); 
?>
