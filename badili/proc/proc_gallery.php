<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';


if(isset($_POST['csr']))
{ 
  $img=mysqli_real_escape_string($conn,$_POST['id']);
   $id=strtok($img, ".");

    $folder = "../../images/gallery/csr/";
    $Thumb = "../../images/gallery/csr/thumb/";

            $deleteimage=$img; 
       
            unlink($folder.$deleteimage);
            unlink($Thumb.$deleteimage);
            
                echo "<h1> Image deleted</h1><br>";
                echo '<meta http-equiv="refresh" content="2;URL=../edit_gallery.php">';
 
}

if(isset($_POST['event']))
{ 
  $img=mysqli_real_escape_string($conn,$_POST['id']);
   $id=strtok($img, ".");

    $folder = "../../images/gallery/events/";
    $Thumb = "../../images/gallery/events/thumb/";

            $deleteimage=$img; 
       
            unlink($folder.$deleteimage);
            unlink($Thumb.$deleteimage);
            
                echo "<h1> Image deleted</h1><br>";
                echo '<meta http-equiv="refresh" content="2;URL=../edit_gallery">';
 
}


if(isset($_POST['agm']))
{ 
  $img=mysqli_real_escape_string($conn,$_POST['id']);
   $id=strtok($img, ".");

    $folder = "../../images/gallery/agm/";
    $Thumb = "../../images/gallery/agm/thumb/";

            $deleteimage=$img; 
       
            unlink($folder.$deleteimage);
            unlink($Thumb.$deleteimage);
           // move_uploaded_file($file,$target_file); 
            
                echo "<h1> Image deleted</h1><br>";
                echo '<meta http-equiv="refresh" content="2;URL=../edit_gallery">';
 
}

if(isset($_POST['washa']))
{ 
  $img=mysqli_real_escape_string($conn,$_POST['id']);
   $id=strtok($img, ".");

    $folder = "../../images/gallery/washa/";
    $Thumb = "../../images/gallery/washa/thumb/";

            $deleteimage=$img; 
       
            unlink($folder.$deleteimage);
            unlink($Thumb.$deleteimage);
           // move_uploaded_file($file,$target_file); 
            
                echo "<h1> Image deleted</h1><br>";
                echo '<meta http-equiv="refresh" content="2;URL=../edit_gallery">';
 
}
?>