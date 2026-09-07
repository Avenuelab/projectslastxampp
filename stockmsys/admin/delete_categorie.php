<?php
 include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');
?>
<?php
  $categorie = find_by_id('categories',(int)$_GET['id']);
  if(!$categorie){
    echo "Missing Categorie id.";
     echo '<meta http-equiv="refresh" content="2;URL=cat">';
  }
?>
<?php
  $delete_id = delete_by_id('categories',(int)$categorie['id']);
  if($delete_id){
     echo "Categorie deleted.";
      echo '<meta http-equiv="refresh" content="2;URL=cat">';
  } else {
     echo "Categorie deletion failed.";
      echo '<meta http-equiv="refresh" content="2;URL=cat">';
  }
?>
