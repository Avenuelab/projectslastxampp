<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');

$id=mysqli_real_escape_string($conn,$_POST['val']);


$sql="UPDATE products SET approve=1 WHERE id=$id ";
mysqli_query($conn,$sql);

echo " Product approved";
echo '<meta http-equiv="refresh" content="2;URL=prod.php">';
?>