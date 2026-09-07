<?php

include("includes/config.php");
$tr_sql= "SELECT * FROM teacher";
$tr_Query=mysqli_query($conn,$tr_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Information</title>
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
        <h2 class="text-center">Teacher Information</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while ($tr_row=mysqli_fetch_array($tr_Query)) {
                        $emp_no=$tr_row["emp_no"];
                        $name=$tr_row["name"];
                        $phone_no=$tr_row["phone_no"];
                        $id=$tr_row["emp_no"];
                    
                 ?>
                <tr>
                    <td><?php echo $emp_no; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $phone_no; ?></td>
                    <td>
                        <a href="editteacher.php?id=<?php echo $id ?>" class="btn btn-warning btn-action" >Edit</a>
                        <a href="proc/deleteteach.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                    </td>
                </tr>
                <?php }?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>