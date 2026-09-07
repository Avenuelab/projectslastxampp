<?php

include("includes/config.php");
$s_sql= "SELECT * FROM subject";
$s_Query=mysqli_query($conn,$s_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject and Class Details</title>
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
    <div class="table-container">
        <h2 class="text-center">Subject and Class Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Class</th>
                    <th>Employee Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while ($s_row=mysqli_fetch_array($s_Query)) {
                        $name=$s_row["name"];
                        $class=$s_row["class"];
                        $emp_no=$s_row["emp_no"];
                        $id=$s_row["id"];
                    
                 ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $class; ?></td>
                    <td><?php echo $emp_no; ?></td>
                    <td>
                        <a href="editsubject.php?id=<?php echo $id ?>" class="btn btn-warning btn-action" >Edit</a>
                        <a href="proc/deletesubject.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                    </td>
                </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>