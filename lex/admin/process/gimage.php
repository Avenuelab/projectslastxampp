<?php	
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('../../_inc/connect.php');
	// upload  User Image Image
		$imSQL="SELECT guarantorid FROM guarantor ORDER BY id DESC limit 1";
		$im_rs=mysqli_query($conn,$imSQL);
		$im_row=mysqli_fetch_assoc($im_rs);
		$new_id=$im_row['guarantorid'];
			
				$target_dir = "../../guarantorpic/";
				$newNameID="ID".$new_id;
				$newName=$new_id;
				$tempID = explode(".", $_FILES["uploadid"]["name"]);
				$temp = explode(".", $_FILES["fileToUpload"]["name"]);
				
				$newfilenameID = $newNameID . '.' . end($tempID);
				$newfilename = $newName . '.' . end($temp);
				
				$target_fileID = $target_dir . basename($_FILES["uploadid"]["name"]);
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				
				$tempID = explode(".",$target_fileID);
				$temp = explode(".",$target_file);
				
				$newfilenameID = $target_dir . $newNameID. '.' . end($tempID);
				$newfilename = $target_dir . $newName. '.' . end($temp);
				
				$dbname="../guarantorpic/" . $newName. '.' . end($temp);
				$dbnameid="../guarantorpic/" . $newNameID. '.' . end($temp);
				
				$_SESSION['newfilenameID']=$newfilenameID;
				$_SESSION['newfilename']=$newfilename;
				
				$uploadOk = 1;
				$imageFileTypeID = pathinfo($target_fileID,PATHINFO_EXTENSION);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$checkID = getimagesize($_FILES["uploadid"]["tmp_name"]);
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				
					if($checkID!== false || $check!== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				// Check if file already exists
				if (file_exists($newfilenameID) || file_exists($newfilename)) {
				    echo "Sorry, file already exists.";
					unlink($newfilename);
					unlink($newfilenameID);
			if ((move_uploaded_file($_FILES["uploadid"]["tmp_name"],$newfilenameID))&& (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$newfilename))) {
						echo "New profile pic  ".$newfilenameID. " and  ".$newfilename."has been uploaded.";
					$sqlLN="UPDATE loan SET gstatus='A' WHERE loanid LIKE '".$lnid. "'";
						$lnQ=mysqli_query($conn,$sqlLN);
						
					//echo '<meta http-equiv="refresh" content="2;URL=../loantoapprove">';
					}
				}
				// Check file size
				if (($_FILES["uploadid"]["size"]) > 500000 ||($_FILES["fileToUpload"]["size"]) > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
					
					//echo '<meta http-equiv="refresh" content="2;URL=../guarantor">';
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
					
					//echo '<meta http-equiv="refresh" content="2;URL=../guarantor">';
				// if everything is ok, try to upload file
				} else {
				$sql="UPDATE guarantor SET picpath='$dbname',idpic='$dbnameid' WHERE guarantorid LIKE '".$new_id. "'";
			$query=mysqli_query($conn,$sql);
		if ((move_uploaded_file($_FILES["uploadid"]["tmp_name"],$newfilenameID))&&  (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$newfilename))) 		{
					echo	$sqlLN="UPDATE loan SET gstatus='A' WHERE loanid LIKE '".$lnid. "'";
						$lnQ=mysqli_query($conn,$sqlLN);

				echo '<h1 style="color: #0F0;">Account successfully Created. </h1>';
			echo "The files ". basename( $_FILES["uploadid"]["name"]). " and ".basename( $_FILES["fileToUpload"]["name"])."has been uploaded.";
					echo '<h1 style="color: #0F0;">Account successfully Created. </h1>';
				//	echo '<meta http-equiv="refresh" content="2;URL=../loantoapprove">';
			
			} 
		
		}//upload ok
	
		
?>