<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';


if(isset($_POST['csr']))
{ 
  $img=mysqli_real_escape_string($conn,$_POST['id']);
   $id=strtok($img, ".");

    $folder = "../../images/gallery/csr/";
    $image_file=$_FILES['photo_'.$id]['name'];
    $file = $_FILES['photo_'.$id]['tmp_name'];
    $path = $folder . $image_file;  
    $target_file=$folder.basename($image_file);
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    if($file!='')
    {
    //Set image upload size 
        if ($_FILES["photo_".$id]["size"] > 50000000) {
       $error[] = 'Sorry, your image is too large. Upload less than 5MB in size.';
        }
        //Allow only JPG, JPEG, PNG & GIF 
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "JPG" ) 
        {
         $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
        }
    }//check image size
    if(!isset($error))
    {
    if($file!='')
    {

            $deleteimage=$img; 
       
            unlink($folder.$deleteimage);
            move_uploaded_file($file,$target_file); 
            
                echo "<h1> Update was succesful</h1><br>";
                echo '<meta http-equiv="refresh" content="2;URL=../edit_gallery.php">';
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
?>