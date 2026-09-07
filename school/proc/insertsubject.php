<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$name = mysqli_escape_string($conn,$_POST['name']);
 	$class = mysqli_escape_string($conn,$_POST['class']);
 	$emp_no = mysqli_escape_string($conn,$_POST['emp_no']);

 	
 	$s_sql= "INSERT INTO subject ( name, class, emp_no) VALUES ('$name','$class','$emp_no')";
 	$s_Query=mysqli_query($conn,$s_sql);

 	if ($s_Query) {
 		$Message= "New record added successfully";
 		header("location:../dashboard/examples/subjectdets.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>