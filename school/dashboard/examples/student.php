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
                  <!-- Student Details Form -->
                  <div class="">
                      <h2 class="text-center">Add Student Details</h2>
                      <form action="../../proc/insertstudent.php" method="POST" id="form1" class="form-horizontal">
                          <div class="form-group">
                              <label for="admim_no">Admission Number</label>
                              <input type="text" class="form-control" placeholder="Enter admission number" name="admim_no" id="admim_no" required>
                          </div>
                          <div class="form-group">
                              <label for="name">Full Name</label>
                              <input type="text" class="form-control" placeholder="Enter full name" name="name" id="name" required>
                          </div>
                          <div class="form-group">
                              <label for="address">Address</label>
                              <input type="text" class="form-control" placeholder="Enter address" name="address" id="address" required>
                          </div>
                          <div class="form-group">
                              <label for="DoB">Date of Birth</label>
                              <input type="date" class="form-control" id="DoB" name="DoB" required>
                          </div>
                          <button type="submit" class="btn btn-primary btn-block">Add Student</button>
                      </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <?php include('../../temp/footer.php'); ?>