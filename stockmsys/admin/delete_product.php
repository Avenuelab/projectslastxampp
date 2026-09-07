<?php
 include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');
?>
<?php
  $product = find_by_id('products',(int)$_GET['id']);
  if(!$product){
    echo "Missing Product id.";
     echo '<meta http-equiv="refresh" content="2;URL=prod">';
  }
?>
<?php
  $delete_id = delete_by_id('products',(int)$product['id']);
  if($delete_id){
      echo "Products deleted.";
      echo '<meta http-equiv="refresh" content="2;URL=prod">';
  } else {
      echo "Products deletion failed.";
      echo '<meta http-equiv="refresh" content="2;URL=prod">';
  }
?>
