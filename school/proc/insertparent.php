<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$id_no = mysqli_escape_string($conn,$_POST['id_no']);
 	$name = mysqli_escape_string($conn,$_POST['name']);
 	$email = mysqli_escape_string($conn,$_POST['email']);
 	$phone_no = mysqli_escape_string($conn,$_POST['phone_no']);
 	$admin_no = mysqli_escape_string($conn,$_POST['admin_no']);

 	
 	$p_sql= "INSERT INTO parents ( id_no, name, email, phone_no, admin_no) VALUES ('$id_no','$name','$email', '$phone_no', '$admin_no')";
 	$p_Query=mysqli_query($conn,$p_sql);

 	if ($p_Query) {
 		$Message= "New record added successfully";
 		header("location:../dashboard/examples/studentdetails.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>