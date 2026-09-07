<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$name = mysqli_escape_string($conn,$_POST['name']);
 	$class = mysqli_escape_string($conn,$_POST['class']);
 	$admin_no = mysqli_escape_string($conn,$_POST['admin_no']);
 	$sbj_id = mysqli_escape_string($conn,$_POST['sbj_id']);
 	$term_id = mysqli_escape_string($conn,$_POST['term_id']);
 	$openmark = mysqli_escape_string($conn,$_POST['openmark']);
 	$midterm = mysqli_escape_string($conn,$_POST['midterm']);
 	$cat1 = mysqli_escape_string($conn,$_POST['cat1']);
 	$cat2 = mysqli_escape_string($conn,$_POST['cat2']);

 	
 	$ex_sql= "INSERT INTO exam ( name, class, admin_no, sbj_id, term_id, openmark, midterm, cat1, cat2) VALUES (' $name', '$class', '$admin_no', '$sbj_id', '$term_id', '$openmark', '$midterm', '$cat1', '$cat2')";
 	$ex_Query=mysqli_query($conn,$ex_sql);

 	if ($ex_Query) {
 		$Message= "New record added successfully";
 		header("location:../dashboard/examples/examdets.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>