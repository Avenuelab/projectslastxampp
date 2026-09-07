<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';

if(isset($_POST['saving']))
{ 
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $name=mysqli_real_escape_string($conn,$_POST['name_'.$id]);
    $feature=mysqli_real_escape_string($conn,$_POST['feature_'.$id]);
    $feature = str_ireplace(array("\r","\n",'\r','\n'),'', $feature);
    $req=mysqli_real_escape_string($conn,$_POST['req_'.$id]);
    $req = str_ireplace(array("\r","\n",'\r','\n'),'', $req);
    $descr=mysqli_real_escape_string($conn,$_POST['descr_'.$id]);

    $folder = "../../images/shop/";
    $image_file=$_FILES['image_'.$id]['name'];
    $file = $_FILES['image_'.$id]['tmp_name'];
    $path = $folder . $image_file;  
    $target_file=$folder.basename($image_file);
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    if($file!='')
    {
    //Set image upload size 
        if ($_FILES["image_".$id]["size"] > 5000000) {
       $error[] = 'Sorry, your image is too large. Upload less than 5MB in size.';
        }
        //Allow only JPG, JPEG, PNG & GIF 
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
        {
         $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
        }
    }//check image size
    if(!isset($error))
    {
    if($file!='')
    {
    $sql="SELECT * FROM saving WHERE id=$id limit 1";   
    $res=mysqli_query($conn,$sql);
        if($row=mysqli_fetch_array($res)) 
        {
            $deleteimage=$row['pic']; 
        }
            unlink($folder.$deleteimage);
            move_uploaded_file($file,$target_file);

            $sql="UPDATE saving SET name='$name',feature='$feature',requirement='$req',description='$descr',pic='$image_file' WHERE id=$id";
            $result=mysqli_query($conn,$sql); 
    }
    else 
    {
            $result=mysqli_query($conn,"UPDATE saving SET name='$name',feature='$feature',requirement='$req',description='$descr' WHERE id=$id");   
    } 
        if($result)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_saving.php">';
        }
        else 
        {
            echo 'Something went wrong'; 
        }
    }    
}//end of isset
if(isset($error)){ 

    foreach ($error as $error) { 
      echo '<div class="message">'.$error.'</div><br>';   
    }

} 