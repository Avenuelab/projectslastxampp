<?php 
include("../../includes/config.php");
if(isset($_GET)){
    $id_get=$_GET['id'];
    $cl_sql= "SELECT * FROM class WHERE id=$id_get";
    $cl_Query=mysqli_query($conn,$cl_sql);
    $cl_row=mysqli_fetch_array($cl_Query);
     $name=$cl_row["name"];
     $emp_no=$cl_row["emp_no"];
     $admin_no=$cl_row["admin_no"];
     $att_details=$cl_row["att_details"];
     $id=$cl_row["id"];
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
              <div class="form-container">
        <h2 class="text-center">Edit Class</h2>
        <form action="../../proc/editclass.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="date">Class</label>
                <input type="text" class="form-control" id="date" name="name" value="<?php echo $name ?>" required>
            </div>
            <div class="form-group">
                <label for="class">Teacher</label>
                <input type="text" class="form-control" id="class" name="emp_no" value="<?php echo $emp_no ?>" required>
            </div>
            <div class="form-group">
                <label for="admin_no">Admin Number</label>
                <input type="text" class="form-control" id="admin_no" name="admin_no" value="<?php echo $admin_no ?>" required>
            </div>
            
            
            <div class="form-group">
                <label for="attendance">Attendance</label>
                <select class="form-control" id="attendance" name="att_details" required>
                    <option value="<?php echo $att_details ?>"><?php echo $att_details ?></option>
                    <option value="">Select Attendance Status</option>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Late">Late</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Edit Class</button>
        </form>
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