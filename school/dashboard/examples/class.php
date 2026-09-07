<?php include("../../includes/config.php");
include('../../temp/header.php'); ?>
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
                <h4 class="card-title">Insert Class</h4>
                <section class="">
                    <div class="card-body">
                      <div class="">
                          <form action="../../proc/insert_class.php" method="POST">
                              <div class="form-group">
                                  <label for="class_name">Class Name</label>
                                  <input type="text" class="form-control" id="name" name="name" required>
                              </div>
                              <div class="form-group">
                                  <label for="emp_no">Employee Number</label>
                                  <input type="text" class="form-control" id="emp_no" name="emp_no" required>
                              </div>
                              <div class="form-group">
                                  <label for="admin_no">Student Admin Number</label>
                                  <input type="text" class="form-control" id="admin_no" name="admin_no" required>
                              </div>
                              <div class="form-group">
                                  <label for="attendance">Attendance Status</label>
                                  <select class="form-control" id="attendance" name="att_details" required>
                                      <option class="text" value="">Select Attendance Status</option>
                                      <option class="text" value="Present">Present</option>
                                      <option class="text" value="Absent">Absent</option>
                                      <option class="text" value="Late">Late</option>
                                  </select>
                              </div>
                              <button type="submit" class="btn btn-primary btn-block">Add Class</button>
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