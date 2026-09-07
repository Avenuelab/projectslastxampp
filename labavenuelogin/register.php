<?php
include_once 'conn/connect.php';
$name=$_POST['name'];
$uname=$_POST['username'];
$pass=$_POST['password'];
$pass=md5($pass);


$InsertSQL="INSERT INTO users(name,username,password)VALUES('$name','$uname','$pass')";

$result=mysqli_query($conn,$InsertSQL);

if ($result) {
	echo "User Registered Successfully";
}else{
	echo "Registration Failed";
}


?>