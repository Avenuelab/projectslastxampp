<?php

include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student and Guardian Details</title>
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
    <!-- Student Details Form -->
    <div class="form-container">
        <h2 class="text-center">Add Student Details</h2>
        <form action="proc/insertstudent.php" method="POST" id="form1" class="form-horizontal">
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
            <button type="submit" class="btn btn-success btn-block">Add Student</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>