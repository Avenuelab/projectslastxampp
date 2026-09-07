<?php
include("includes/config.php");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>
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
<body>
<section class="container">
<div class="container">
    <div class="form-container">
        <h2 class="text-center">Edit Class</h2>
        <form action="proc/editclass.php" method="POST">
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
</div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>