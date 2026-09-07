<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$name = mysqli_escape_string($conn,$_POST['name']);
 	$emp_no = mysqli_escape_string($conn,$_POST['emp_no']);
 	$admin_no = mysqli_escape_string($conn,$_POST['admin_no']);
 	$att_details = mysqli_escape_string($conn,$_POST['att_details']);
 	$id= mysqli_escape_string($conn,$_POST['id']);
 	
 	$cl_sql= " UPDATE class SET   name='$name', emp_no='$emp_no', admin_no='$admin_no', att_details='$att_details' WHERE id=$id";
 	$cl_Query=mysqli_query($conn,$cl_sql);

 	if ($cl_Query) {
 		$Message= "Record Updated successfully";
 		header("location:../dashboard/examples/attendance.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>