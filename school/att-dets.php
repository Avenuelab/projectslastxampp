<?php

include("includes/config.php");
$Att_sql= "SELECT * FROM attendance";
$Att_Query=mysqli_query($conn,$Att_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px;
        }
        .table-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-action {
            width: 80px;
        }
    </style>
</head>
<body>
<section class="container">
<div class="container">
    <div class="table-container">
        <h2 class="text-center">Attendance Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Admin Number</th>
                    <th>Class</th>
                    <th>Attendance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while ($att_row=mysqli_fetch_array($Att_Query)) {
                        $date=$att_row["date"];
                        $admin_no=$att_row["admin_no"];
                        $class=$att_row["class"];
                        $att_details=$att_row["att_details"];
                        $id=$att_row["id"];
                    
                 ?>

                <tr>
                    <td><?php echo $date; ?> </td>
                    <td><?php echo $admin_no; ?></td>
                    <td><?php echo $class; ?></td>
                    <td><?php echo $att_details; ?></td>
                    <td>
                        <a href="editattendance.php?id=<?php echo $id ?>" class="btn btn-warning btn-action" >Edit</a>
                        <a href="proc/delete_attendance_details.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                    </td>
                </tr>
                <?php } ?> 
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
</section>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>