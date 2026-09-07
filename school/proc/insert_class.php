<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$name = mysqli_escape_string($conn,$_POST['name']);
 	$emp_no = mysqli_escape_string($conn,$_POST['emp_no']);
 	$admin_no = mysqli_escape_string($conn,$_POST['admin_no']);
 	$att_details = mysqli_escape_string($conn,$_POST['att_details']);

 	
 	$cl_sql= "INSERT INTO class (name, admin_no, emp_no, att_details) VALUES ('$name','$emp_no','$admin_no','$att_details')";
 	$cl_Query=mysqli_query($conn,$cl_sql);

 	if ($cl_Query) {
 		$Message= "New record added successfully";
 		header("location:../dashboard/examples/class.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>