<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';

if(isset($_POST['mem']))
{ 
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $name=mysqli_real_escape_string($conn,$_POST['name_'.$id]);
    $feature=mysqli_real_escape_string($conn,$_POST['feature_'.$id]);
    $feature = str_ireplace(array("\r","\n",'\r','\n'),'', $feature);
    $req=mysqli_real_escape_string($conn,$_POST['req_'.$id]);
    $req = str_ireplace(array("\r","\n",'\r','\n'),'', $req);
    $descr=mysqli_real_escape_string($conn,$_POST['descr_'.$id]);


        $result=mysqli_query($conn,"UPDATE membership SET name='$name',feature='$feature',requirement='$req',description='$descr' WHERE id=$id");   
    
        if($result)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_member.php">';
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