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
	//Member
		$custid=mysqli_real_escape_string($conn,$_POST['custid']);
		$name=mysqli_real_escape_string($conn,$_POST['name']);
		$occupation=mysqli_real_escape_string($conn,$_POST['occupation']);
		$phone=mysqli_real_escape_string($conn,$_POST['phone']);
		$pin=mysqli_real_escape_string($conn,$_POST['pin']);
		$natid=mysqli_real_escape_string($conn,$_POST['natid']);
		$residence=mysqli_real_escape_string($conn,$_POST['res']);
		$dob=mysqli_real_escape_string($conn,$_POST['dob']);
		$gender=mysqli_real_escape_string($conn,$_POST['gender']);
		$narration=mysqli_real_escape_string($conn,$_POST['narration']);
		$marital=mysqli_real_escape_string($conn,$_POST['marital']);
		$pobox=mysqli_real_escape_string($conn,$_POST['pobox']);
		$loc=mysqli_real_escape_string($conn,$_POST['loc']);
		$roid=mysqli_real_escape_string($conn,$_POST['roid']);
		$memdob= date('Ymd',strtotime($dob));
		$ppic = $_FILES["fileToUpload"]; 
		$idpic = $_FILES["uploadid"]; 
		
	//**********************************************************************

				$target_dir = "../../memberpic/";
	
				$newNameID="ID".$custid;
				$newName=$custid;
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
				
				$dbname="../memberpic/" . $newName. '.' . end($temp);
				$dbnameid="../memberpic/" . $newNameID. '.' . end($temp);
				
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
						echo '<meta http-equiv="refresh" content="2;URL=../editmember">';
					}
				}
				// Check file size
				if (($_FILES["uploadid"]["size"]) > 500000 ||($_FILES["fileToUpload"]["size"]) > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
					echo '<meta http-equiv="refresh" content="2;URL=../editmember">';
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
					$memSQL="UPDATE customer SET customerid='$custid', name='$name', gender='$gender', dob='$memdob', residence='$residence', occupation='$occupation', phone='$phone', idno=$natid, pin='$pin', narration='$narration', marital='$marital', pobox='$pobox', locationid='$residence',roid='$roid' WHERE customerid ='".$custid. "'";			
						
								$query=mysqli_query($conn,$memSQL);				
								
				echo '<meta http-equiv="refresh" content="2;URL=../editmember">';
				// if everything is ok, try to upload file
				} else {
$memSQL="UPDATE customer SET customerid='$custid', name='$name', gender='$gender', dob='$memdob', residence='$residence', occupation='$occupation', phone='$phone', idno=$natid, pin='$pin', narration='$narration', marital='$marital', pobox='$pobox',picpath='$dbname',idpic='$dbnameid', locationid='$residence',roid='$roid' WHERE customerid ='".$custid. "'";			
	
			$query=mysqli_query($conn,$memSQL);
		if ((move_uploaded_file($_FILES["uploadid"]["tmp_name"],$newfilenameID))&&  (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$newfilename))) {
			
				echo '<h1 style="color: #0F0;">Account successfully Created. </h1>';
			echo "The files ". basename( $_FILES["uploadid"]["name"]). " and ".basename( $_FILES["fileToUpload"]["name"])."has been uploaded.";
				echo '<meta http-equiv="refresh" content="2;URL=../editmember">';
			
			} 
		}
	}//END IF SUBMITS
}//end of role