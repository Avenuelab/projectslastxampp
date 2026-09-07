<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 
include_once '../../_inc/connect.php';

//welcome,welcome1,welpic,vision,mission,obj,val1,val2,val3,val4,val5,val6,memcount,member,procount,project,awardcount,award,satisfycount,satisfy,valpic
if(isset($_POST['washa_update']))
{ 

    $vision=mysqli_real_escape_string($conn,$_POST['vision']);
    $mission=mysqli_real_escape_string($conn,$_POST['mission']);    
    $obj=mysqli_real_escape_string($conn,$_POST['obj']);
    $val1=mysqli_real_escape_string($conn,$_POST['val1']);
    $val2=mysqli_real_escape_string($conn,$_POST['val2']);
    $val3=mysqli_real_escape_string($conn,$_POST['val3']);
    $val4=mysqli_real_escape_string($conn,$_POST['val4']);
    $val5=mysqli_real_escape_string($conn,$_POST['val5']);
    $val6=mysqli_real_escape_string($conn,$_POST['val6']);
    $memcount=mysqli_real_escape_string($conn,$_POST['memcount']);
    $member=mysqli_real_escape_string($conn,$_POST['member']);
    $procount=mysqli_real_escape_string($conn,$_POST['procount']);
    $project=mysqli_real_escape_string($conn,$_POST['project']);
    $awardcount=mysqli_real_escape_string($conn,$_POST['awardcount']);
    $award=mysqli_real_escape_string($conn,$_POST['award']);
    $satisfycount=mysqli_real_escape_string($conn,$_POST['satisfycount']);
    $satisfy=mysqli_real_escape_string($conn,$_POST['satisfy']);

  
    $folder = "../../images/about/";
    $image_file=$_FILES['valpic']['name'];
    $file = $_FILES['valpic']['tmp_name'];
    $path = $folder . $image_file;  
    $target_file=$folder.basename($image_file);
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    if($file!='')
    {
    //Set image upload size 
        if ($_FILES["valpic"]["size"] > 5000000) {
            $error[] = 'Sorry, your image is too large. Upload less than 5MB in size.';
        }
            //Allow only JPG, JPEG, PNG & GIF 
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
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
            $deleteimage=$row['valpic']; 
        }
            unlink($folder.$deleteimage);
           echo  $sql="UPDATE washa SET vision='$vision',mission='$mission',objective='$obj',value1='$val1',value2='$val2',value3='$val3',value4='$val4',value5='$val5',value6='$val6',valpic='$image_file',member='$member',memcount='$memcount',project='$project',procount='$procount',award='$award',awardcount='$awardcount',satisfy='$satisfy',satisfycount='$satisfycount' WHERE id=1 ";
            move_uploaded_file($file,$target_file); 
            $result=mysqli_query($conn,$sql); 
        }
        else 
        {
            $result=mysqli_query($conn,"UPDATE washa SET vision='$vision',mission='$mission',objective='$obj',value1='$val1',value2='$val2',value3='$val3',value4='$val4',value5='$val5',value6='$val6',member='$member',memcount='$memcount',project='$project',procount='$procount',award='$award',awardcount='$awardcount',satisfy='$satisfy',satisfycount='$satisfycount' WHERE id=1 ");   
        } 
        if($result)
        {
            echo "<h1> Update was succesful</h1><br>";
            //echo '<meta http-equiv="refresh" content="2;URL=../edit_index.php">';
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