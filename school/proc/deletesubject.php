<?php
include("../includes/config.php");
 
 if(isset($_GET)){


 	$id= mysqli_escape_string($conn,$_GET['id']);

 	
 	$ex_sql= " DELETE FROM subject WHERE id=$id";
 	$ex_Query=mysqli_query($conn,$ex_sql);

 	if ($ex_Query) {
 		$Message= "Record deleted successfully";
 		header("location:../dashboard/examples/subjectdets.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>