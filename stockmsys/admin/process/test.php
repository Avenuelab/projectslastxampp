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
		$narration=mysqli_real_escape_string($conn,$_POST['narration']);
		$marital=mysqli_real_escape_string($conn,$_POST['marital']);
		$pobox=mysqli_real_escape_string($conn,$_POST['pobox']);
		$loc=mysqli_real_escape_string($conn,$_POST['loc']);
		$areadescription=mysqli_real_escape_string($conn,$_POST['res']);
		$memdob= date('Ymd',strtotime($dob));
		$memdt= date('Ymd');

	$gurantorid=strtoupper(substr($name,0,3).rand(0,10000));
	$_SESSION['gurantorid']=$gurantorid;
	//**********************************************************************
	$_SESSION['lnid']=$lnid;
		
	$gSQL="INSERT INTO guarantor(guarantorid, regdate, name, gender, dob,phone,residence, occupation, idno, pin, narration, marital, pobox,locationid,mapaddress,customerid,loanid)
		VALUES('$gurantorid','$memdt','$name','$gender','$memdob','$phone','$residence','$occupation',$natid,'$pin','$narration','$marital','$pobox','$loc','$areadescription','$custid','$lnid')";

	$RSg=mysqli_query($conn,$gSQL);

			  if(!$RSg){
				echo $gSQL." ". mysqli_error($conn);  
			 }else{
                echo '<h1 style="color: #FF0;">Processing images to upload</h1>';
        		echo '<meta http-equiv="refresh" content="3;URL=gimage">';			     
			     
			 }
	
	}//if post
}
?>



