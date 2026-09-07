<?php
include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Exam Details</title>
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
        <h2 class="text-center">Insert Exam Details</h2>
        <form action="proc/insertexams.php" method="POST">
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>