<?php
include("../includes/config.php");
 
 if(isset($_POST)){

 	$name = mysqli_escape_string($conn,$_POST['name']);
 	$class = mysqli_escape_string($conn,$_POST['class']);
 	$emp_no = mysqli_escape_string($conn,$_POST['emp_no']);
 	$id= mysqli_escape_string($conn,$_POST['id']);
 	
 	echo $s_sql= " UPDATE subject SET   name='$name', class='$class', emp_no='$emp_no' WHERE id=$id";
 	$s_Query=mysqli_query($conn,$s_sql);

 	if ($s_Query) {
 		echo "subject edited ";
        echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/subjectdets.php">';
     } else {
       echo 'Sorry failed to added!';
       echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/editsubject.php">';
     }

   } else{
     echo "$errors" ;
     echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/editsubject.php>';
   




 } 
?>