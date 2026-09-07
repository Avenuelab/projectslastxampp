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
                <div class="form-container">
                    <h2 class="text-center">Insert Subject and Class</h2>
                    <form action="../../proc/insertsubject.php" method="POST">
                        <div class="form-group">
                            <label for="subject_name">Subject Name</label>
                            <input type="text" class="form-control" id="subject_name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="class">Class</label>
                            <input type="text" class="form-control" id="class" name="class" required>
                        </div>
                        <div class="form-group">
                            <label for="emp_no">Employee Number</label>
                            <input type="text" class="form-control" id="emp_no" name="emp_no" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('../../temp/footer.php'); ?>