<?php
include("../../includes/config.php");
$cl_sql= "SELECT * FROM class";
$cl_Query=mysqli_query($conn,$cl_sql);
?>
<?php include('../../temp/header.php'); ?>
<body class="dark-edition">
  <div class="wrapper ">
  <?php include('../../temp/sidebar.php'); ?>
    <div class="main-panel">
      <?php include('../../temp/navbar.php'); ?>
      <div class="content">
        <div class="table-container">
          <h2 class="text-center">Attendance Records</h2>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Class Name</th>
                      <th>Employee Number</th>
                      <th>Student Admin Number</th>
                      <th>Attendance Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php   
                      while ($cl_row=mysqli_fetch_array($cl_Query)) {
                          $name=$cl_row["name"];
                          $emp_no=$cl_row["emp_no"];
                          $admin_no=$cl_row["admin_no"];
                          $att_details=$cl_row["att_details"];
                          $id=$cl_row["id"];
                      
                   ?>

                  <tr>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $emp_no; ?></td>
                      <td><?php echo $admin_no; ?></td>
                      <td><?php echo $att_details; ?></td>
                      <td>
                          <a href="editclass.php?id=<?php echo $id ?>" class="btn btn-warning btn-action" >Edit</a>
                          <a href="../../proc/deleteclass.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                      </td>
                  </tr>
                  <?php } ?>
                  <!-- Add more rows as needed -->
              </tbody>
          </table>
        </div>
      </div>
      <?php include('../../temp/footer.php'); ?>
      