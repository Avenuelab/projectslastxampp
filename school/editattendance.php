<?php
include("includes/config.php");
if(isset($_GET)){
    $id_get=$_GET['id'];
    echo $Att_sql= "SELECT * FROM attendance WHERE id=$id_get";
    $Att_Query=mysqli_query($conn,$Att_sql);
    $att_row=mysqli_fetch_array($Att_Query);
     $date=$att_row["date"];
     $admin_no=$att_row["admin_no"];
     $class=$att_row["class"];
     $att_details=$att_row["att_details"];
     $id=$att_row["id"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Attendance Details</title>
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
        <h2 class="text-center">Insert Attendance Details</h2>
        <form action="proc/edit_attendance_details.php" method="POST">
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
                <select class="form-control" id="attendance" name="att_details" required>
                    <option value="<?php echo $att_details ?>"><?php echo $att_details ?></option>
                    <option value="">Select Attendance Status</option>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Late">Late</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Edit Attendance Details</button>
        </form>
    </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>