<?php
include("../includes/config.php");
 
 if(isset($_GET)){


 	$id= mysqli_escape_string($conn,$_GET['id']);

 	
 	$tr_sql= " DELETE FROM teacher WHERE emp_no='$id'";
 	$tr_Query=mysqli_query($conn,$tr_sql);

 	if ($tr_Query) {
 		echo "term deleted ";
        echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/teachdets.php">';
     } else {
       echo 'Sorry failed to added!';
       echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/editteacher.php">';
     }

   } else{
     echo "$errors" ;
     echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/editteacher.php>';
   




 } 
?>