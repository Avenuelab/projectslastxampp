<?php
session_start();
include_once('conn/config.php');
    $log_session=$_SESSION['login'];
    if ($log_session) {
        echo "login Error"; 
        echo '<meta http-equiv="refresh" content="2;URL=index.php">';
           } else{
            $sql="SELECT * FROM users WHERE email='$log_session'";
            $query=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($query);
            $email=$row["email"];*/
           
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2 class="text-white text-center">Dashboard</h2>
        <a href="#home">Home</a>
        <a href="#profile">Profile</a>
        <a href="#settings">Settings</a>
        <a href="#logout">Logout</a>
    </div>

    <div class="content">
        <header class="d-flex justify-content-between align-items-center">
            <h1>Welcome to Your Dashboard</h1>
            <button class="btn btn-primary">Add New</button>
        </header>

        <div class="mt-4">
            <h2>Overview</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">150</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Sales This Month</h5>
                            <p class="card-text">$2,500</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <p class="card-text">25</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h2>Recent Activities</h2>
            <ul class="list-group">
                <li class="list-group-item">User John Doe registered</li>
                <li class="list-group-item">Order #12345 shipped</li>
                <li class="list-group-item">Product XYZ updated</li>
                <li class="list-group-item">User Jane Smith logged in</li>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
