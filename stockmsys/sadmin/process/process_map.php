<?php
include('../../role/config.php');
include('../../role/admin/middleware.php'); 

include_once('../../_inc/connect.php');

if(!empty($_POST)){ 
//Member
	$areaname=mysqli_real_escape_string($conn,$_POST['areaname']);
	$road=mysqli_real_escape_string($conn,$_POST['road']);
	$lat=mysqli_real_escape_string($conn,$_POST['lat']);
	$long=mysqli_real_escape_string($conn,$_POST['long']);
	$areadescription=mysqli_real_escape_string($conn,$_POST['areadescription']);
	$custid=mysqli_real_escape_string($conn,$_POST['custid']);
//**********************************************************************

	
$mapSQL="INSERT INTO marker(name,address,lat,lng,type,customerid)
	VALUES('$areaname','$road','$lat','$long','$areadescription','$custid')";
			$RSmap=mysqli_query($conn,$mapSQL);
		  if(!$RSmap){
			echo $mapSQL." ". mysqli_error($conn);  
		 }else{
			echo '<meta http-equiv="refresh" content="2;URL=../newmember">';
			}

}
?>



