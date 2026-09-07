<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';


if(isset($_POST['doc']))
{ 
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $oldfile=mysqli_real_escape_string($conn,$_POST['oldfile_'.$id]);

    $folder="../../dwn_load/";
    $image_file=$_FILES['upload_'.$id]['name'];
    $file = $_FILES['upload_'.$id]['tmp_name'];
    $path = $folder . $image_file;  
    $target_file=$folder.basename($image_file);
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


    if($file!='')
    {
    //Set File upload size 
        if ($_FILES['upload_'.$id]["size"] > 10000000) {
       $error[] = 'Sorry, your image is too large. Upload less than 1MB in size.';
        }
        //Allow only JPG, JPEG, PNG & GIF 
        if($imageFileType != "pdf" ) 
        {
         $error[] = 'Sorry, only pdf files are allowed';   
        }
    }//check image size
    if(!isset($error))
    {
    if($file!='')
    {

          $deletefile=$oldfile; 
       
           unlink($folder.$deletefile);
            move_uploaded_file($file,$target_file); 
            
                echo "<h1> Update was succesful</h1><br>";
               // echo '<meta http-equiv="refresh" content="2;URL=../edit_download.php">';
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