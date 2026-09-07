<?php
	include_once('brand.php');
  	$list = Brand::loadAll();
	echo json_encode($list);
?>
