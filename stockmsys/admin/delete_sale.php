<?php
 include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');
?>
<?php
  $d_sale = find_by_id('sales',(int)$_GET['id']);
  if(!$d_sale){
    echo "Missing sale id.";
   echo '<meta http-equiv="refresh" content="2;URL=sales">';
  }
?>
<?php
  $delete_id = delete_by_id('sales',(int)$d_sale['id']);
  if($delete_id){
      echo "sale deleted.";
      echo '<meta http-equiv="refresh" content="2;URL=sales">';
  } else {
      echo "sale deletion failed.";
     echo '<meta http-equiv="refresh" content="2;URL=sales">';
  }
?>
