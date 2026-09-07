<?php
 include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');
?>
<?php
  $product = find_by_id('expenses',(int)$_GET['id']);
  if(!$product){
    echo "Missing Expense id.";
     echo '<meta http-equiv="refresh" content="2;URL=expense">';
  }
?>
<?php
  $delete_id = delete_by_id('expenses',(int)$expense['id']);
  if($delete_id){
      echo "expenses deleted.";
      echo '<meta http-equiv="refresh" content="2;URL=expense">';
  } else {
      echo "Expenses deletion failed.";
      echo '<meta http-equiv="refresh" content="2;URL=expense">';
  }
?>
