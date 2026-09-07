<?php
	include_once('category.php');
  	$list = Category::loadAll();
	echo json_encode($list);
?>
