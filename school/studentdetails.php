<?php

include("includes/config.php");
$sp_sql= "SELECT st.name,st.address, p.admin_no, st.DoB, p.id_no, p.name, p.email, p.phone_no FROM parents p 
        JOIN student st on st.admin_no = p.admin_no ORDER BY st.name;";
$sp_Query=mysqli_query($conn,$sp_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student and Guardian Details</title>
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
    </style>
</head>
<body>

<div class="container">
    <div class="table-container">
        <h2 class="text-center">Student and Guardian Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Admission Number</th>
                    <th>Student Name</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Guardian ID</th>
                    <th>Guardian Name</th>
                    <th>Guardian Email</th>
                    <th>Guardian Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while ($sp_row=mysqli_fetch_array($sp_Query)) {
                        $st_name=$sp_row["name"];
                        $p_name=$sp_row["name"];
                        $admin_no=$sp_row["admin_no"];
                        $address=$sp_row["address"];
                        $DoB=$sp_row["DoB"];
                        $p_name=$sp_row["name"];
                        $email=$sp_row["email"];
                        $phone_no=$sp_row["phone_no"];
                        $id_no=$sp_row["id_no"];
                    
                 ?>
                <tr>
                    <td><?php echo $admin_no; ?></td>
                    <td><?php echo $st_name; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $DoB; ?></td>
                    <td><?php echo $id_no; ?></td>
                    <td><?php echo $p_name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phone_no; ?></td>
                </tr>
                <?php } ?> 
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