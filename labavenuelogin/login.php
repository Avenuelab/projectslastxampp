<?php
include_once("conn/connect.php");

$uname=$_POST['username'];
$pass=$_POST['password'];
$pass=md5($pass);

$logSQL="SELECT * FROM users";
$result=mysqli_query($conn,$logSQL);

if ($result) {
	

	$row=mysqli_fetch_array($result);


	$dbUname=$row['username'];
	$dbPassword=$row['password'];

	if ($uname==$dbUname && $pass==$dbPassword) {

		echo "Login Successful";

		header("Location: dashboard.php");
		
	}else{

		echo "Check your username or password and try again";

		header("Location: index.html");
	}


}else{

	echo "There was an error";
}

?>