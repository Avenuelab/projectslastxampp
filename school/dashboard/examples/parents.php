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
              <div class="container">
                  <!-- Guardian Details Form -->
                  <div class="form-container">
                      <h2 class="text-center">Add Parent Details</h2>
                      <form action="../../proc/insertparent.php" method="POST" id="form2" class="form-horizontal">
                          <div class="form-group">
                              <label for="id_no">ID Number</label>
                              <input type="text" class="form-control" placeholder="Enter ID Number" name="id_no" id="id_no" required>
                          </div>
                          <div class="form-group">
                              <label for="guardian_name">Guardian Full Name</label>
                              <input type="text" class="form-control" placeholder="Enter full name" name="name" id="guardian_name" required>
                          </div>
                          <div class="form-group">
                              <label for="guardian_email">Email</label>
                              <input type="email" class="form-control" placeholder="Enter email address" name="email" id="guardian_email" required>
                          </div>
                          <div class="form-group">
                              <label for="phone_no">Phone Number</label>
                              <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="07123456789" required>
                          </div>
                          <div class="form-group">
                              <label for="student_admin_no">Student Admission Number</label>
                              <input type="text" class="form-control" placeholder="Enter Student Admission Number" name="admin_no" id="student_admin_no" required>
                          </div>
                          <button type="submit" class="btn btn-primary btn-block">Add Guardian</button>
                      </form>
                  </div>
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