<?php
	include_once('order.php');
  	$list = Order::loadAll();
	echo json_encode($list);
?>