<?php
include("../../includes/config.php");
$tr_sql= "SELECT * FROM teacher";
$tr_Query=mysqli_query($conn,$tr_sql);
?>
<?php include('../../temp/header.php'); ?>
<body class="dark-edition">
  <div class="wrapper ">
  <?php include('../../temp/sidebar.php'); ?>
    <div class="main-panel">
      <?php include('../../temp/navbar.php'); ?>
      <div class="content">
       <div class="container">
    <div class="table-container">
        <h2 class="text-center">Teacher Information</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while ($tr_row=mysqli_fetch_array($tr_Query)) {
                        $emp_no=$tr_row["emp_no"];
                        $name=$tr_row["name"];
                        $phone_no=$tr_row["phone_no"];
                        $id=$tr_row["emp_no"];
                    
                 ?>
                <tr>
                    <td><?php echo $emp_no; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $phone_no; ?></td>
                    <td>
                        <a href="editteacher.php?id=<?php echo $id ?>" class="btn btn-warning btn-action" >Edit</a>
                        <a href="../../proc/deleteteach.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                    </td>
                </tr>
                <?php }?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
      </div>
      <?php include('../../temp/footer.php'); ?>
      