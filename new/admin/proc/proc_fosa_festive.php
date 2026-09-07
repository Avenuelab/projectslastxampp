<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';

    if(isset($_POST['festive']))
    { 
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $fosa=mysqli_real_escape_string($conn,$_POST['festive_'.$id]); 

         $sql="UPDATE fosa_festive SET description='$fosa' WHERE id=$id";
         $query=mysqli_query($conn,$sql);
         if ($query) {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_fosa.php">';             
         }else{
            echo "<h1>Something went wrong</h1>";
         }
    }
?>

