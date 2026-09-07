<?php

include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Parents Details</title>
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
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Guardian Details Form -->
    <div class="form-container">
        <h2 class="text-center">Add Parent Details</h2>
        <form action="proc/insertparent.php" method="POST" id="form2" class="form-horizontal">
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
            <button type="submit" class="btn btn-success btn-block">Add Guardian</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>