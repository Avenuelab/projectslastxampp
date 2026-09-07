<?php
include_once('conn/connect.php');

if(isset($_POST['register']))
{
    $name=mysqli_escape_string($conn,$_POST['name']);
    $username=mysqli_escape_string($conn,$_POST['username']);
    $pass=md5($_POST['password']);

    $sql   ="INSERT INTO `tbl_user`(`name`, `username`, `password`) VALUES ('$name','$username','$pass')";
    $result=mysqli_query($conn,$sql);
    if($result){ 
    header('location:index.php');
    echo"<script>alert('New User Register Success');</script>";   
    }else{
        die(mysqli_error($conn)) ;
    }
   
}
?>