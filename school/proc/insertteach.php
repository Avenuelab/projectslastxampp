<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$emp_no = mysqli_escape_string($conn,$_POST['emp_no']);
 	$name = mysqli_escape_string($conn,$_POST['name']);
 	$phone_no = mysqli_escape_string($conn,$_POST['phone_no']);

 	
 	$tr_sql= "INSERT INTO teacher ( emp_no, name, phone_no) VALUES ('$emp_no','$name','$phone_no')";
 	$tr_Query=mysqli_query($conn,$tr_sql);

 	if ($tr_Query) {
 		echo "subject edited ";
        echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/teachdets.php">';
     } else {
       echo 'Sorry failed to added!';
       echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/teacher.php">';
     }

   } else{
     echo "$errors" ;
     echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/teacher.php>';
   




 } 
?>