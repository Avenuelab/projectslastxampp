<?php
include_once 'conn/config.php';
if (isset($_POST)) {
	$firstname=mysqli_escape_string($conn,$_POST["fname"]);
	$lastname=mysqli_escape_string($conn,$_POST["lname"]);
	$email=mysqli_escape_string($conn,$_POST['email']);
	$pword=mysqli_escape_string($conn,$_POST['password']);
	$password=md5($pword);
	$log_sql="INSERT INTO users(`fname`, `lname`, `email`, `password`) VALUES ('$firstname','$lastname','$email','$password')";
	$log_query=mysqli_query($conn,$log_sql);
	if ($log_query) {
		echo "Register successfull ";
		echo '<meta http-equiv="refresh" content="2;URL=welcome.php">';
	}else{
        die(mysqli_error($conn)) ;
    }
}
?>
            