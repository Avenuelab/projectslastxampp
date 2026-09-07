<?php
include_once('connection.php');

if(isset($_POST))
{
    $name =mysqli_escape_string($conn,$_POST['name']);
    $username =mysqli_escape_string($conn,$_POST['username']);
    $password = mysqli_escape_string($conn,$_POST['password']);
    $pass= md5($password);
    $L_sql="INSERT INTO tbl_user(`name`, `username`, `password`) VALUES ('$name','$username','$pass')";
    $L_query=mysqli_query($conn,$L_sql);
    if($L_query){ 
    header('location:index.php');
    echo"<script>alert('New User Register Success');</script>";   
    }else{
        die(mysqli_error($conn)) ;
    }
   
}
?>
