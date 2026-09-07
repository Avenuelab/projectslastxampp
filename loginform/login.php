<?php
session_start();
include_once 'conn/config.php';
if (isset($_POST)) {
    $email=mysqli_escape_string($conn,$_POST['email']);
    $pword=mysqli_escape_string($conn,$_POST['password']);
    $password=md5($pword);
    $log_sql="SELECT * FROM users WHERE email = '$email'";
    $log_query=mysqli_query($conn,$log_sql);
    if ($log_query){
        $row=mysqli_fetch_array($log_query);{
            $mail=$row["email"];
            $pass=$row["password"];

            if ($email==$mail && $password==$pass) {
                echo "login succesfull";
                echo '<meta http-equiv="refresh" content="2;URL=welcome.php">';
                $_SESSION['login']=$email;
            } else {
                echo "login Error ";
                echo '<meta http-equiv="refresh" content="2;URL=index.php">';
            }
        }
    }
}