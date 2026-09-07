<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');

$custid=$_SESSION['custid'];

//upload image
			extract($_POST);
			$error=array();
			$extension=array("jpeg","jpg","png","gif");
			foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
								

				$file_name=$_FILES["files"]["name"][$key];
				$file_tmp=$_FILES["files"]["tmp_name"][$key];
				$ext=pathinfo($file_name,PATHINFO_EXTENSION);
				
				
				$filename=basename($file_name,$ext);
				$newFileName=$custid.$filename.time().".".$ext;
				
				 $imgPath="../chattel";
				if(in_array($ext,$extension)) {
					if(!file_exists("../../chattel/".$file_name)) {
						move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../chattel/".$newFileName);
						
						$pSQL="UPDATE chattel SET photo='$imgPath/$newFileName'";
							 $update=mysqli_query($conn,$pSQL);
							 if(!$update){
								echo "There was an error ".$pSQL.mysqli_error(); 
							 }else{
								echo"Image uploaded successfully"; 
							 }
							 
					}else {
					array_push($error,"$file_name, ");
				}
			}
			}
			//end of image		  
		  

?>
