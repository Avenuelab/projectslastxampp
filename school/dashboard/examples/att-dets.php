<?php

include("../../includes/config.php");
$Att_sql= "SELECT * FROM attendance";
$Att_Query=mysqli_query($conn,$Att_sql);
?>
<?php include('../../temp/header.php'); ?>
<body class="dark-edition">
  <div class="wrapper ">
  <?php include('../../temp/sidebar.php'); ?>
    <div class="main-panel">
      <?php include('../../temp/navbar.php'); ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Attendance Details</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Date</th>
                              <th>Admin Number</th>
                              <th>Class</th>
                              <th>Attendance</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php   
                              while ($att_row=mysqli_fetch_array($Att_Query)) {
                                  $date=$att_row["date"];
                                  $admin_no=$att_row["admin_no"];
                                  $class=$att_row["class"];
                                  $att_details=$att_row["att_details"];
                                  $id=$att_row["id"];
                              
                           ?>

                          <tr>
                              <td><?php echo $date; ?> </td>
                              <td><?php echo $admin_no; ?></td>
                              <td><?php echo $class; ?></td>
                              <td><?php echo $att_details; ?></td>
                              <td>
                                  <a href="editattendance.php?id=<?php echo $id ?>" class="btn btn-warning btn-action" >Edit</a>
                                  <a href="../../proc/delete_attendance_details.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                              </td>
                          </tr>
                          <?php } ?> 
                          <!-- Add more rows as needed -->
                      </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('../../temp/footer.php'); ?>
      