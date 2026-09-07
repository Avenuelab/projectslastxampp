<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$admin_no = mysqli_escape_string($conn,$_POST['admin_no']);
 	$name = mysqli_escape_string($conn,$_POST['name']);
 	$address = mysqli_escape_string($conn,$_POST['address']);
 	$DoB = mysqli_escape_string($conn,$_POST['DoB']);

 	
 	$sp_sql= "INSERT INTO student ( admin_no, name, address, DoB) VALUES ('$admin_no','$name','$address', '$DoB')";
 	$sp_Query=mysqli_query($conn,$sp_sql);

 	if ($sp_Query) {
 		$Message= "New record added successfully";
 		header("location:../dashboard/examples/parents.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>