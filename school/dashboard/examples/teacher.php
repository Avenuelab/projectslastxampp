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
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Add Teacher</h3>
                                    </div><!-- /.box-header -->
                                    <form role="form" action="../../proc/insertteach.php" method="post" id="form1" class="form-horizontal">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" id="emp_no">
                                                        <div class="col-xs-3">
                                                            <label for="emp_no">Employee number</label>
                                                        </div>
                                                        <div class="col-xs-9" id="emp_no">
                                                            <input type="text" class="form-control" placeholder="Enter Employee Number" name="emp_no" id="emp_no" autocomplete="on" required >
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="divGFullName">
                                                        <div class="col-xs-3">
                                                            <label for="name">Full Name</label>
                                                        </div>
                                                        <div class="col-xs-9" id="divGFullName1">
                                                            <input type="text" class="form-control" placeholder="Enter full name" name="name" id="name" autocomplete="on" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group" id="Phone">
                                                                <div class="col-xs-5">
                                                                    <label for="phone_no">Phone</label>
                                                                </div>
                                                                <div class="col-xs-6" id="Phone">
                                                                    <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="07123456789" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                        </div>
                                        <div class="box-footer text-left">
                                            <input type="hidden" name="do" value="add_student" />
                                            <button style="width:150px;" type="submit" class="btn btn-primary btn-block" id="btnSubmit">Next</button><br>
                                        </div>
                                    </form>
                                </div><!-- /.box -->
                              </div>
          </div>
        </div>
      </div>
      <?php include('../../temp/footer.php'); ?>