<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';

if(isset($_POST['welcome_update']))
{ 
    //$id=mysqli_real_escape_string($conn,$_POST['id']);
    $welcome=mysqli_real_escape_string($conn,$_POST['welcome']);
    $welcome1=mysqli_real_escape_string($conn,$_POST['welcome1']);

    $folder = "../../images/about/";
    $image_file=$_FILES['welpic']['name'];
    $file = $_FILES['welpic']['tmp_name'];
    $path = $folder . $image_file;  
    $target_file=$folder.basename($image_file);
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    if($file!='')
    {
    //Set image upload size 
        if ($_FILES["welpic"]["size"] > 5000000) {
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
    $sql="SELECT * from washa WHERE id=1 limit 1";   
    $res=mysqli_query($conn,$sql);
        if($row=mysqli_fetch_array($res)) 
        {
            $deleteimage=$row['welpic']; 
        }
            unlink($folder.$deleteimage);
           echo  $sql="UPDATE washa SET welcome='$welcome',welcome1='$welcome1',welpic='$image_file' WHERE id=1 ";
            move_uploaded_file($file,$target_file); 
            $result=mysqli_query($conn,$sql); 
        }
        else 
        {
            $result=mysqli_query($conn,"UPDATE washa SET welcome='$welcome',welcome1='$welcome1' WHERE id=1 ");   
        } 
        if($result)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_washa.php">';
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