<?php
        $uname="root";
        $pass="";
        $servername="localhost";
        $dbname="school_db";
     
$conn=new mysqli($servername, $uname, $pass, $dbname)or trigger_error(mysqli_connect_error(),E_USER_ERROR)
?>