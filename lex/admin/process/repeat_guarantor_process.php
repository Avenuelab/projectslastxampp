<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
	
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';	
	
}else{
	if(!empty($_POST)){ 
		unset($_SESSION['custid']);
		unset($_SESSION['lnid']);
		unset($_SESSION['newLnid']);
		$lnid=mysqli_real_escape_string($conn,$_POST['lnid']);
		$custid=mysqli_real_escape_string($conn,$_POST['custid']);
		$name=mysqli_real_escape_string($conn,$_POST['name']);
		$occupation=mysqli_real_escape_string($conn,$_POST['occupation']);
		$phone=mysqli_real_escape_string($conn,$_POST['phone']);
		$pin=mysqli_real_escape_string($conn,$_POST['pin']);
		$natid=mysqli_real_escape_string($conn,$_POST['natid']);
		$residence=mysqli_real_escape_string($conn,$_POST['res']);
		$dob=mysqli_real_escape_string($conn,$_POST['dob']);
		$gender=mysqli_real_escape_string($conn,$_POST['gender']);
		$narration="Repeat Customer";
		$marital=mysqli_real_escape_string($conn,$_POST['marital']);
		$pobox=mysqli_real_escape_string($conn,$_POST['pobox']);
		$loc=mysqli_real_escape_string($conn,$_POST['loc']);
		$areadescription=mysqli_real_escape_string($conn,$_POST['res']);
		$memdob= date('Ymd',strtotime($dob));
		$memdt= date('Ymd');
		$imgId=mysqli_real_escape_string($conn,$_POST['imgId']);
		$img=mysqli_real_escape_string($conn,$_POST['img']);

	$gurantorid=strtoupper(substr($name,0,3).rand(0,10000));
	$_SESSION['gurantorid']=$gurantorid;
	//**********************************************************************
	$_SESSION['lnid']=$lnid;

	if(!empty($img)){

		$gSQL="INSERT INTO guarantor(guarantorid, regdate, name, gender, dob,phone,residence, occupation, idno, pin, narration, marital, pobox,locationid,mapaddress,customerid,loanid,picpath)
		VALUES('$gurantorid','$memdt','$name','$gender','$memdob','$phone','$residence','$occupation',$natid,'$pin','$narration','$marital','$pobox','$loc','$areadescription','$custid','$lnid','$img')";
			$query=mysqli_query($conn,$gSQL);
			if(!$query){
				echo "Error".mysqli_error($conn);
				echo '<meta http-equiv="refresh" content="2;URL=../guarantor">';
			}else{
						$sqlLN="UPDATE loan SET gstatus='A' WHERE loanid LIKE '".$lnid. "'";
						$lnQ=mysqli_query($conn,$sqlLN);

				echo '<h1 style="color: #0F0;">Account successfully Created. </h1>';
				echo '<meta http-equiv="refresh" content="2;URL=../loantoapprove">';
					
			}

		
	}elseif(!empty($imgId)){
		$gSQL="INSERT INTO guarantor(guarantorid, regdate, name, gender, dob,phone,residence, occupation, idno, pin, narration, marital, pobox,locationid,mapaddress,customerid,loanid,idpic)
		VALUES('$gurantorid','$memdt','$name','$gender','$memdob','$phone','$residence','$occupation',$natid,'$pin','$narration','$marital','$pobox','$loc','$areadescription','$custid','$lnid','$imgId')";
			$query=mysqli_query($conn,$gSQL);
			if(!$query){
				echo "Error".mysqli_error($conn);
				echo '<meta http-equiv="refresh" content="2;URL=../guarantor">';
			}else{
						$sqlLN="UPDATE loan SET gstatus='A' WHERE loanid LIKE '".$lnid. "'";
						$lnQ=mysqli_query($conn,$sqlLN);

				echo '<h1 style="color: #0F0;">Account successfully Created. </h1>';
				echo '<meta http-equiv="refresh" content="2;URL=../loantoapprove">';
					
			}

	}elseif(!empty($imgId) && !empty($img) ){

			$gSQL="INSERT INTO guarantor(guarantorid, regdate, name, gender, dob,phone,residence, occupation, idno, pin, narration, marital, pobox,locationid,mapaddress,customerid,loanid,idpic,picpath)
		VALUES('$gurantorid','$memdt','$name','$gender','$memdob','$phone','$residence','$occupation',$natid,'$pin','$narration','$marital','$pobox','$loc','$areadescription','$custid','$lnid','$imgId','$img')";
			$query=mysqli_query($conn,$gSQL);
			if(!$query){
				echo "Error".mysqli_error($conn);
				echo '<meta http-equiv="refresh" content="2;URL=../guarantor">';
			}else{
						$sqlLN="UPDATE loan SET gstatus='A' WHERE loanid LIKE '".$lnid. "'";
						$lnQ=mysqli_query($conn,$sqlLN);

				echo '<h1 style="color: #0F0;">Account successfully Created. </h1>';
				echo '<meta http-equiv="refresh" content="2;URL=../loantoapprove">';
					
			}
	}else{
		
	$gSQL="INSERT INTO guarantor(guarantorid, regdate, name, gender, dob,phone,residence, occupation, idno, pin, narration, marital, pobox,locationid,mapaddress,customerid,loanid)
		VALUES('$gurantorid','$memdt','$name','$gender','$memdob','$phone','$residence','$occupation',$natid,'$pin','$narration','$marital','$pobox','$loc','$areadescription','$custid','$lnid')";
	

	$RSg=mysqli_query($conn,$gSQL);

			  if(!$RSg){
				echo $gSQL." ". mysqli_error($conn);  
			 }else{
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
				   // echo "Sorry, file already exists.";
					unlink($newfilename);
					unlink($newfilenameID);
			if ((move_uploaded_file($_FILES["uploadid"]["tmp_name"],$newfilenameID))&& (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$newfilename))) {
						echo "New profile pic  ".$newfilenameID. " and  ".$newfilename."has been uploaded.";
					echo '<meta http-equiv="refresh" content="2;URL=../loantoapprove">';
					}
				}
				// Check file size
				if (($_FILES["uploadid"]["size"]) > 500000 ||($_FILES["fileToUpload"]["size"]) > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
					echo '<meta http-equiv="refresh" content="2;URL=../guarantor">';
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
					echo '<meta http-equiv="refresh" content="2;URL=../guarantor">';
				// if everything is ok, try to upload file
				} else {
				$sql="UPDATE guarantor SET picpath='$dbname',idpic='$dbnameid' WHERE guarantorid LIKE '".$new_id. "'";
			$query=mysqli_query($conn,$sql);
		if ((move_uploaded_file($_FILES["uploadid"]["tmp_name"],$newfilenameID))&&  (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$newfilename))) 		{
						$sqlLN="UPDATE loan SET gstatus='A' WHERE loanid LIKE '".$lnid. "'";
						$lnQ=mysqli_query($conn,$sqlLN);

				echo '<h1 style="color: #0F0;">Account successfully Created. </h1>';
			echo "The files ". basename( $_FILES["uploadid"]["name"]). " and ".basename( $_FILES["fileToUpload"]["name"])."has been uploaded.";
					echo '<meta http-equiv="refresh" content="2;URL=../loantoapprove">';
			
			} 
		}//check image
		}//upload ok
		}//start of img else
	}//if post
}
?>



