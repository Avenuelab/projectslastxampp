<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';

    if(isset($_POST['instant']))
    { 
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $fosa=mysqli_real_escape_string($conn,$_POST['instant_'.$id]); 
        $special=mysqli_real_escape_string($conn,$_POST['special_'.$id]); 

        $sql="UPDATE fosa_instant SET description='$fosa',special='$special' WHERE id=$id";
         $query=mysqli_query($conn,$sql);
         if ($query) {
            echo "<h1> Update was succesful</h1><br>";
           echo '<meta http-equiv="refresh" content="2;URL=../edit_bosa.php">';             
         }else{
            echo "<h1>Something went wrong</h1>";
         }
    }
?>

