<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';

if(isset($_POST['ben']))
{ 
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $name=mysqli_real_escape_string($conn,$_POST['name_'.$id]);
    $descr=mysqli_real_escape_string($conn,$_POST['descr_'.$id]);


        $result=mysqli_query($conn,"UPDATE member_benefit SET name='$name',description='$descr' WHERE id=$id");   
    
        if($result)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_member_benefit.php">';
        }
        else 
        {
            echo 'Something went wrong'; 
        }
     
}//end of isset
if(isset($error)){ 

    foreach ($error as $error) { 
      echo '<div class="message">'.$error.'</div><br>';   
    }

} 