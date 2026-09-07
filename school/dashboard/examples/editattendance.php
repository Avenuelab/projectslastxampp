<?php 
include("../../includes/config.php");
if(isset($_GET)){
    $id_get=$_GET['id'];
    $Att_sql= "SELECT * FROM attendance WHERE id=$id_get";
    $Att_Query=mysqli_query($conn,$Att_sql);
    $att_row=mysqli_fetch_array($Att_Query);
     $date=$att_row["date"];
     $admin_no=$att_row["admin_no"];
     $class=$att_row["class"];
     $att_details=$att_row["att_details"];
     $id=$att_row["id"];
}
 ?>
<?php include('../../temp/header.php');?>
<style>
  body {
            background-color: #ffffff;
            padding: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .text {
          color: black;
          font-size: 20px;
        }
    </style>
<body class="dark-edition">
  <div class="wrapper ">
    <?php include('../../temp/sidebar.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('../../temp/navbar.php'); ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="card card-plain">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add Attendance</h4>
                <section class="container">
                <div class="">
                    <div class="">
                        <h2 class="text-center">Insert Attendance Details</h2>
                        <form action="../../proc/edit_attendance_details.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" id="date" name="date" value="<?php echo $date ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="admin_no">Admin Number</label>
                                <input type="text" class="form-control" id="admin_no" name="admin_no" value="<?php echo $admin_no ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="class">Class</label>
                                <input type="text" class="form-control" id="class" name="class" value="<?php echo $class ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="attendance">Attendance</label>
                                <select class="form-control text" id="attendance" name="att_details" required>
                                    <option class="text" value="<?php echo $att_details ?>"><?php echo $att_details ?></option>
                                    <option class="text" value="">Select Attendance Status</option>
                                    <option class="text" value="Present">Present</option>
                                    <option class="text" value="Absent">Absent</option>
                                    <option class="text" value="Late">Late</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Edit Attendance Details</button>
                        </form>
                    </div>
                </div>
                </section>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="iframe-container d-none d-lg-block">
                      
                        
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('../../temp/footer.php'); ?>