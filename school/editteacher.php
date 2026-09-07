<?php
include("includes/config.php");
if(isset($_GET)){
    $id_get=$_GET['id'];
    $tr_sql= "SELECT * FROM teacher WHERE emp_no='$id_get'";
    $tr_Query=mysqli_query($conn,$tr_sql);
    $tr_row=mysqli_fetch_array($tr_Query);
     $emp_no=$tr_row["emp_no"];
     $name=$tr_row["name"];
     $phone_no=$tr_row["phone_no"];
     $id=$tr_row["emp_no"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Teacher</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">
        <div class="form-container">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Teacher</h3>
                    </div><!-- /.box-header -->
                    <form role="form" action="proc/editteach.php" method="post" id="form1" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="alert-info">Teacher</p>
                                    <div class="form-group" id="emp_no">
                                        <div class="col-xs-3">
                                            <label for="emp_no" value="<?php echo $emp_no ?>">Employee number</label>
                                        </div>
                                        <div class="col-xs-9" id="emp_no">
                                            <input type="text" class="form-control" placeholder="Enter Employee Number" name="emp_no" id="emp_no" autocomplete="on" value="<?php echo $emp_no ?>" required >
                                        </div>
                                    </div>
                                    <div class="form-group" id="divGFullName">
                                        <div class="col-xs-3">
                                            <label for="name">Full Name</label>
                                        </div>
                                        <div class="col-xs-9" id="divGFullName1">
                                            <input type="text" class="form-control" placeholder="Enter full name" name="name" id="name" autocomplete="on" value="<?php echo $name ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" id="Phone">
                                                <div class="col-xs-5">
                                                    <label for="phone_no">Phone</label>
                                                </div>
                                                <div class="col-xs-6" id="Phone">
                                                    <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="07123456789" value="<?php echo $phone_no ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class="box-footer text-left">
                            <input type="hidden" name="do" value="add_student" />
                            <button style="width:150px;" type="submit" class="btn text-center btn-success" id="btnSubmit">Next</button><br>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- End of form section -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>