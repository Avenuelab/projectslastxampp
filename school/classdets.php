<?php

include("includes/config.php");
$cl_sql= "SELECT * FROM class";
$cl_Query=mysqli_query($conn,$cl_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
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

<div class="container">
    <div class="table-container">
        <h2 class="text-center">Attendance Records</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Employee Number</th>
                    <th>Student Admin Number</th>
                    <th>Attendance Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while ($cl_row=mysqli_fetch_array($cl_Query)) {
                        $name=$cl_row["name"];
                        $emp_no=$cl_row["emp_no"];
                        $admin_no=$cl_row["admin_no"];
                        $att_details=$cl_row["att_details"];
                        $id=$cl_row["id"];
                    
                 ?>

                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $emp_no; ?></td>
                    <td><?php echo $admin_no; ?></td>
                    <td><?php echo $att_details; ?></td>
                    <td>
                        <a href="editclass.php?id=<?php echo $id ?>" class="btn btn-warning btn-action" >Edit</a>
                        <a href="proc/deleteclass.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                    </td>
                </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>

<script>
    function editAttendance(className, empNo, adminNo, attendance) {
        // Logic to edit the attendance details
        alert('Edit function for:\nClass: ' + className + '\nEmployee No: ' + empNo + '\nAdmin No: ' + adminNo + '\nAttendance: ' + attendance);
    }

    function deleteAttendance(adminNo) {
        // Logic to delete the attendance entry
        if (confirm('Are you sure you want to delete attendance for Admin No ' + adminNo + '?')) {
            alert('Deleted attendance for Admin No: ' + adminNo);
            // Add logic to remove the attendance from the database
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>