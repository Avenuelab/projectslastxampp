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
              <div class="">
    <div class="">
        <h2 class="text-center">Insert Exam Details</h2>
        <form action="../../proc/insertexams.php" method="POST">
            <div class="form-group">
                <label for="exam_name">Exam Name</label>
                <input type="text" class="form-control" id="exam_name" name="name" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" class="form-control" id="class" name="class" required>
            </div>
            <div class="form-group">
                <label for="admin_no">Student Admin Number</label>
                <input type="text" class="form-control" id="admin_no" name="admin_no" required>
            </div>
            <div class="form-group">
                <label for="subject_id">Subject ID</label>
                <input type="text" class="form-control" id="subject_id" name="sbj_id" required>
            </div>
            <div class="form-group">
                <label for="term_id">Term ID</label>
                <input type="text" class="form-control" id="term_id" name="term_id" required>
            </div>
            <div class="form-group">
                <label for="opening_marks">Opening Marks</label>
                <input type="number" class="form-control" id="opening_marks" name="openmark" required>
            </div>
            <div class="form-group">
                <label for="midterm">Midterm Marks</label>
                <input type="number" class="form-control" id="midterm" name="midterm" required>
            </div>
            <div class="form-group">
                <label for="cat1">CAT 1 Marks</label>
                <input type="number" class="form-control" id="cat1" name="cat1" required>
            </div>
            <div class="form-group">
                <label for="cat2">CAT 2 Marks</label>
                <input type="number" class="form-control" id="cat2" name="cat2" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit Exam Details</button>
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