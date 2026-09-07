<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$admin_no = mysqli_escape_string($conn,$_POST['admin_no']);
 	$class = mysqli_escape_string($conn,$_POST['class']);
 	$att_details = mysqli_escape_string($conn,$_POST['att_details']);
 	$id= mysqli_escape_string($conn,$_POST['id']);

 	
 	$Att_sql= " UPDATE attendance SET   admin_no='$admin_no', class='$class', att_details='$att_details' WHERE id=$id";
 	$Att_Query=mysqli_query($conn,$Att_sql);

 	if ($Att_Query) {
 		$Message= "Record Updated successfully";
 		header("location:../dashboard/examples/attendance.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>