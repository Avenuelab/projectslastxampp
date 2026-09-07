<?php
include("../includes/config.php");
 
 if(isset($_GET)){


 	$id= mysqli_escape_string($conn,$_GET['id']);

 	
 	$t_sql= " DELETE FROM term WHERE id=$id";
 	$t_Query=mysqli_query($conn,$t_sql);

 	if ($Att_Query) {
 		echo "term deleted ";
        echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/terminfo.php">';
     } else {
       echo 'Sorry failed to added!';
       echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/editterm.php">';
     }

   } else{
     echo "$errors" ;
     echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/editterm.php>';
   




 } 
?>