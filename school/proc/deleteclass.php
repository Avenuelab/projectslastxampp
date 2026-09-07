<?php
include("../includes/config.php");
 
 if(isset($_GET)){


 	$id= mysqli_escape_string($conn,$_GET['id']);

 	
 	$Att_sql= " DELETE FROM class WHERE id=$id";
 	$Att_Query=mysqli_query($conn,$Att_sql);

 	if ($Att_Query) {
 		$Message= "Record deleted successfully";
 		header("location:../dashboard/examples/classdets.php?Message=".$Message);
 	}else{
 		echo "Record failed. Try again";
 	}




 } 
?>