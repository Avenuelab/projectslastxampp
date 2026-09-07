<?php

  // if user is NOT logged in, redirect them to login page

  if (!isset($_SESSION['user'])) {
    header("location: " . BASE_URL . "logout");
  }
$username=$_SESSION['user']['username'];
  
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
  
        echo '<h1 style="color: #000;">You have no Rights to access this page. </h1>';
        echo '<meta http-equiv="refresh" content="2;URL=../../role/logout">';  
 exit(0); 
}

  // if user is logged in and this user is NOT an admin user, redirect them to landing page
  if (isset($_SESSION['user']['role_id'])>1 || is_null($_SESSION['user'])) {
    header("location: " . BASE_URL.'logout');
  }
  
?>