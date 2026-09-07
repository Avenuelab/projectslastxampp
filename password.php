<?php
if (isset($_POST['changePassword'])) {

  //Change Password
  $error = 0;
  if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
    $old_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['old_password']))));
  } else {
    $error = 1;
    $err = "Old Password Cannot Be Empty";
  }
  if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
    $new_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['new_password']))));
  } else {
    $error = 1;
    $err = "New Password Cannot Be Empty";
  }
  if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
    $confirm_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['confirm_password']))));
  } else {
    $error = 1;
    $err = "Confirmation Password Cannot Be Empty";
  }

  if (!$error) {
    $admin_id = $_SESSION['admin_id'];
    $sql = "SELECT * FROM rpos_admin   WHERE admin_id = '$admin_id'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_assoc($res);
      if ($old_password != $row['admin_password']) {
        $err =  "Please Enter Correct Old Password";
      } elseif ($new_password != $confirm_password) {
        $err = "Confirmation Password Does Not Match";
      } else {

        $new_password  = sha1(md5($_POST['new_password']));
        //Insert Captured information to a database table
        $query = "UPDATE rpos_admin SET  admin_password =? WHERE admin_id =?";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc = $stmt->bind_param('ss', $new_password, $admin_id);
        $stmt->execute();

        //declare a varible which will be passed to alert function
        if ($stmt) {
          $success = "Password Changed" && header("refresh:1; url=dashboard.php");
        } else {
          $err = "Please Try Again Or Try Later";
        }
      }
    }
  }
}
require_once('partials/_head.php');
?>