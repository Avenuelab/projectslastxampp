<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';

    if(isset($_POST['bosa']))
    { 
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $bosa=mysqli_real_escape_string($conn,$_POST['bosa_'.$id]); 

         $sql="UPDATE bosa_loan SET description='$bosa' WHERE id=$id";
         $query=mysqli_query($conn,$sql);
         if ($query) {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_bosa.php">';             
         }else{
            echo "<h1>Something went wrong</h1>";
         }
    }
?>

