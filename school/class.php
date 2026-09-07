<?php
include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert class</title>
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

<div class="container">
    <div class="form-container">
        <h2 class="text-center">Insert Class</h2>
        <form action="proc/insert_class.php" method="POST">
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
                    <option value="">Select Attendance Status</option>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Late">Late</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Class</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>