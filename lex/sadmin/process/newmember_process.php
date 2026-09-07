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
		$name=TRIM(mysqli_real_escape_string($conn,$_POST['name']));
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
		$memdob= date('Ymd',strtotime($dob));
		$roid=mysqli_real_escape_string($conn,$_POST['roid']);
		$memdt= date('Ymd');
		$pass="password";
		$password=md5($pass);
		$tel=substr($phone, 1);
		$pref=254;
		$phone=$pref.$tel;
	$custid=TRIM(strtoupper(substr($name,0,3).rand(0,10000)));
	$_SESSION['custid']=$custid;
	//**********************************************************************
	$checkSQL="SELECT * FROM customer WHERE phone='$phone'";
	//echo "$checkSQL";
	$checkQuery=mysqli_query($conn,$checkSQL);
	$rowcount=mysqli_num_rows($checkQuery);
	if($rowcount>0){
		echo '<h1 style="color: #0F0;">The customer already exists in the system</h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../newmember">';		
		
	}else{
		
		/* upload  User Image Image*/	
			
	$target_dir = "../../memberpic/";
	$newNameID='ID'.$custid;
	$newName=$custid;
	$tempID = explode(".", $_FILES["uploadid"]["name"]);
	$temp = explode(".", $_FILES["fileToUpload"]["name"]);

	$newfilenameID = $newNameID . '.' . end($tempID);
	$newfilename = $newName . '.' . end($temp);

	$dbname="../memberpic/" . $newName. '.' . end($temp);
	$dbnameid="../memberpic/" . $newNameID. '.' . end($temp);

	$target_fileID = $target_dir . basename($_FILES["uploadid"]["name"]);
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

	$tempID = explode(".",$target_fileID);
	$temp = explode(".",$target_file);

	$newfilenameID = $target_dir . $newNameID. '.' . end($tempID);
	$newfilename = $target_dir . $newName. '.' . end($temp);
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
	// Check file size
	if (($_FILES["uploadid"]["size"]) > 500000 ||($_FILES["fileToUpload"]["size"]) > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
		echo '<meta http-equiv="refresh" content="2;URL=newmember">';
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	//	echo '<meta http-equiv="refresh" content="2;URL=../newmember">';
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		echo '<meta http-equiv="refresh" content="2;URL=../newmember">';
	// if everything is ok, try to upload file
	} else {
			$sql=$memSQL="INSERT INTO customer(customerid, regdate, name,phone,occupation,gender, dob, residence,  idno, pin, narration, marital, pobox,accstatus,locationid,picpath,idpic,roid)VALUES('$custid',$memdt,'$name','$phone','$occupation','$gender','$memdob','$residence',$natid,'$pin','$narration','$marital','$pobox','Dormant','$loc','$dbname','$dbnameid','$roid')";
			
			$query=mysqli_query($conn,$sql);
			if(!$query){echo "Error ".$sql.mysqli_error($conn);}
		if ((move_uploaded_file($_FILES["uploadid"]["tmp_name"],$newfilenameID) && $query)&&  (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$newfilename) && $query)) {
			
			echo '<h1 style="color: #0F0;">Account successfully Created. </h1>';
			echo "The files ". basename( $_FILES["uploadid"]["name"]). " and ".basename( $_FILES["fileToUpload"]["name"])."has been uploaded.";
		echo '<meta http-equiv="refresh" content="2;URL=../editmember?edit_id=' .$custid. '">';
			
		} else {
			echo "Sorry, there was an error uploading your file.";
			echo '<meta http-equiv="refresh" content="2;URL=../newmember">';

		}
	}

}
		
	}else{
		echo '<h1 style="color: #00F;">There was a problem. Check your input</h1>';
		echo '<meta http-equiv="refresh" content="2;URL=../newmember">';
			
		
		
		}
}

?>



