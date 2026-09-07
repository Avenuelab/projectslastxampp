<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';


if(isset($_POST['update']))
{ 
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $welcome=mysqli_real_escape_string($conn,$_POST['welcome_'.$id]);
    $slogan=mysqli_real_escape_string($conn,$_POST['slogan_'.$id]);

    $folder = "../../images/slider/";
    $image_file=$_FILES['image_'.$id]['name'];
     $file = $_FILES['image_'.$id]['tmp_name'];
     $path = $folder . $image_file;  
     $target_file=$folder.basename($image_file);
     $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    if($file!='')
    {
    //Set image upload size 
        if ($_FILES["image_".$id]["size"] > 50000000) {
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
    echo $sql="SELECT* from gallery WHERE id=$id limit 1";   
    $res=mysqli_query($conn,$sql);
        if($row=mysqli_fetch_array($res)) 
        {
            $deleteimage=$row['pic']; 
        }
            unlink($folder.$deleteimage);
            move_uploaded_file($file,$target_file); 
            $result=mysqli_query($conn,"UPDATE gallery SET pic='$image_file',welcome='$welcome',big_ad='$slogan' WHERE id=$id"); 
        }
        else 
        {
            $result=mysqli_query($conn,"UPDATE gallery SET welcome='$welcome',big_ad='$slogan' WHERE id=$id");   
        } 
        if($result)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_index.php">';
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

if(isset($_POST['gal_update']))
{
    $gal_top_1=mysqli_real_escape_string($conn,$_POST['gal_top_1']);
    $gal_txt_1=mysqli_real_escape_string($conn,$_POST['gal_txt_1']);
    $gal_top_2=mysqli_real_escape_string($conn,$_POST['gal_top_2']);
    $gal_txt_2=mysqli_real_escape_string($conn,$_POST['gal_txt_2']);        
    $gal_top_3=mysqli_real_escape_string($conn,$_POST['gal_top_3']);
    $gal_txt_3=mysqli_real_escape_string($conn,$_POST['gal_txt_3']);    

    $sqlSticker="UPDATE home SET gal_1_top='$gal_top_1',gal_1_txt='$gal_txt_1',gal_2_top='$gal_top_2',gal_2_txt='$gal_txt_2',gal_3_top='$gal_top_3',gal_3_txt='$gal_txt_3' WHERE id=1";
    $querySticker=mysqli_query($conn,$sqlSticker);   
         
        if($querySticker)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_index.php">';
        }
        else 
        {
            echo 'Something went wrong'; 
        }
}
if(isset($_POST['product']))
{
    $product=mysqli_real_escape_string($conn,$_POST['prdmsg']);
    $ordinary=mysqli_real_escape_string($conn,$_POST['prdordinary']);
    $fanikisha=mysqli_real_escape_string($conn,$_POST['prdfanikisha']);    
    $group=mysqli_real_escape_string($conn,$_POST['prdgroup']);
    $junior=mysqli_real_escape_string($conn,$_POST['prdjunior']);
    $fixed=mysqli_real_escape_string($conn,$_POST['prdfixed']);
    $festive=mysqli_real_escape_string($conn,$_POST['prdfestive']);

    $sqlPrd="UPDATE home SET product='$product',ordinary_saving='$ordinary',fanikisha_saving='$fanikisha',group_saving='$group',junior_saving='$junior',fixed_saving='$fixed',festive_saving='$festive' WHERE id=1";
    $queryPrd=mysqli_query($conn,$sqlPrd);   
         
        if($queryPrd)
        {
            echo "<h1> Update was succesful</h1><br>";
            echo '<meta http-equiv="refresh" content="2;URL=../edit_index.php">';
        }
        else 
        {
            echo 'Something went wrong'; 
        }
}

?>