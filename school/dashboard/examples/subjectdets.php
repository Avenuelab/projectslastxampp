<?php
include("../../includes/config.php");
$s_sql= "SELECT * FROM subject";
$s_Query=mysqli_query($conn,$s_sql);
?>
<?php include('../../temp/header.php'); ?>
<body class="dark-edition">
  <div class="wrapper ">
  <?php include('../../temp/sidebar.php'); ?>
    <div class="main-panel">
      <?php include('../../temp/navbar.php'); ?>
      <div class="content">
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
                        <a href="../../proc/deletesubject.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                    </td>
                </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
      </div>
      <?php include('../../temp/footer.php'); ?>
      