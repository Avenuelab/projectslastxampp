<?php
include("includes/config.php");
if(isset($_GET)){
    $id_get=$_GET['id'];
    $s_sql= "SELECT * FROM subject WHERE id=$id_get";
    $s_Query=mysqli_query($conn,$s_sql);
    $s_row=mysqli_fetch_array($s_Query);
     $name=$s_row["name"];
     $class=$s_row["class"];
     $emp_no=$s_row["emp_no"];
     $id=$s_row["id"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Subject and Class</title>
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
        <h2 class="text-center">Edit Subject and Class</h2>
        <form action="proc/editsubject.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="subject_name">Subject Name</label>
                <input type="text" class="form-control" id="subject_name" name="name" value="<?php echo $name ?>" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" class="form-control" id="class" name="class" value="<?php echo $class ?>" required>
            </div>
            <div class="form-group">
                <label for="emp_no">Employee Number</label>
                <input type="text" class="form-control" id="emp_no" name="emp_no" value="<?php echo $emp_no ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>