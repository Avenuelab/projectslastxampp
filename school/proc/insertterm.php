<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$name = mysqli_escape_string($conn,$_POST['name']);
 	

 	
 	$t_sql= "INSERT INTO term ( name ) VALUES ('$name')";
 	$t_Query=mysqli_query($conn,$t_sql);

 	if ($t_Query) {
 		echo "term added ";
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