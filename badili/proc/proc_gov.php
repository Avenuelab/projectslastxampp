<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';

if(isset($_POST['bog']))
{ 
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $name=mysqli_real_escape_string($conn,$_POST['name_'.$id]);
    $title=mysqli_real_escape_string($conn,$_POST['title_'.$id]); 
    $folder = "../../images/team/";
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
    $sql="SELECT * FROM bod WHERE id=$id limit 1";   
    $res=mysqli_query($conn,$sql);
        if($row=mysqli_fetch_array($res)) 
        {
            $deleteimage=$row['pic']; 
        }
            unlink($folder.$deleteimage);
            move_uploaded_file($file,$target_file);
           
            $sql="UPDATE bod SET pic='$image_file',name='$name',title='$title' WHERE id=$id";
            $result=mysqli_query($conn,$sql); 
        }
        else 
        {
            $result=mysqli_query($conn,"UPDATE bod SET name='$name',title='$title' WHERE id=$id");   
        } 
        if($result)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_governance.php">';
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

if(isset($_POST['sup']))
{ 
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $name=mysqli_real_escape_string($conn,$_POST['name_'.$id]);
    $title=mysqli_real_escape_string($conn,$_POST['title_'.$id]); 
    $folder = "../../images/team/";
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
    $sql="SELECT * FROM supcom WHERE id=$id limit 1";   
    $res=mysqli_query($conn,$sql);
        if($row=mysqli_fetch_array($res)) 
        {
            $deleteimage=$row['pic']; 
        }
            unlink($folder.$deleteimage);
            move_uploaded_file($file,$target_file);
           
            $sql="UPDATE supcom SET sup='$image_file',name='$name',title='$title' WHERE id=$id";
            $result=mysqli_query($conn,$sql); 
        }
        else 
        {
            $result=mysqli_query($conn,"UPDATE supcom SET name='$name',title='$title' WHERE id=$id");   
        } 
        if($result)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_governance.php">';
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

if(isset($_POST['mgt']))
{ 
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $name=mysqli_real_escape_string($conn,$_POST['name_'.$id]);
    $title=mysqli_real_escape_string($conn,$_POST['title_'.$id]); 
    $folder = "../../images/team/";
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
    $sql="SELECT * FROM mgt WHERE id=$id limit 1";   
    $res=mysqli_query($conn,$sql);
        if($row=mysqli_fetch_array($res)) 
        {
            $deleteimage=$row['pic']; 
        }
            unlink($folder.$deleteimage);
            move_uploaded_file($file,$target_file);
           
            $sql="UPDATE mgt SET pic='$image_file',name='$name',title='$title' WHERE id=$id";
            $result=mysqli_query($conn,$sql); 
        }
        else 
        {
            $result=mysqli_query($conn,"UPDATE mgt SET name='$name',title='$title' WHERE id=$id");   
        } 
        if($result)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_governance.php">';
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