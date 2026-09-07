<?php
session_start();
include_once('connection.php');

if (isset($_POST)) {

    $username =mysqli_escape_string($conn,$_POST['username']); //user supplied info
    $password = mysqli_escape_string($conn,$_POST["password"]); //user supplied password
    $pass= md5($password); //encrypted password

    $sql= "SELECT * FROM tbl_user WHERE username = '$username'";
    $query=mysqli_query($conn,$sql);
    if ($query) {
        $row=mysqli_fetch_array($query);{
            $uname =$row["username"];  // user registerd and accpted user name
           $pword=$row["password"]; // user accpted encrypted password

        if ($username==$uname && $pass == $pword) {
            echo "login successfull ";
            echo '<meta http-equiv="refresh" content="2;URL=../dashboard/examples/dashboard.php">';

            $_SESSION['login']=$uname;

            //var_dump($log_sess);
        }else{

            echo "login Error ";
           echo '<meta http-equiv="refresh" content="2;URL=../index.php">';
        }
        
    }
   
}    
}