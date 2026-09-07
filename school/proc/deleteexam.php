<?php
include("../includes/config.php");
 
 if(isset($_GET)){


 	$id= mysqli_escape_string($conn,$_GET['id']);

 	
 	$ex_sql= " DELETE FROM exam WHERE id=$id";
 	$ex_Query=mysqli_query($conn,$ex_sql);

 	if ($ex_Query) {
 		$Message= "Record deleted successfully";
 		header("location:../dashboard/examples/examdets.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>