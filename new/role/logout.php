<?php
  session_start();
  session_destroy();
  unset($_SESSION['user']);
  header("location:../role/login.php");
  exit(0);

?>
