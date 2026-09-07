<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$admin_no = mysqli_escape_string($conn,$_POST['admin_no']);
 	$class = mysqli_escape_string($conn,$_POST['class']);
 	$att_details = mysqli_escape_string($conn,$_POST['att_details']);

 	
 	$Att_sql= "INSERT INTO attendance ( admin_no, class, att_details) VALUES ('$admin_no','$class','$att_details')";
 	$Att_Query=mysqli_query($conn,$Att_sql);

 	if ($Att_Query) {
 		$Message= "New record added successfully";
 		header("location:../dashboard/examples/attendance.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>
