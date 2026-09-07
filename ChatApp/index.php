<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=index.php">
<title>Stock Control Management System</title>
<script language="javascript">
    window.location.href = "loginform/index.php"
</script>
</head>
<body>
Go to <a href="roles/index.php"></a>
</body>
</html>
