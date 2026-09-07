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

 	
 	$ex_sql= " UPDATE exam SET   name='$name', class='$class', admin_no='$admin_no', sbj_id='$sbj_id', term_id='$term_id', openmark='$openmark', midterm='$midterm', cat1='$cat1', cat2='$cat2' WHERE id=$id";
 	$ex_Query=mysqli_query($conn,$ex_sql);

 	if ($ex_Query) {
 		$Message= "Record Updated successfully";
 		header("location:../dashboard/examples/attendance.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>