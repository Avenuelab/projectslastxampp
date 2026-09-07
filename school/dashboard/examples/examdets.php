<?php
include("../../includes/config.php");
$ex_sql= "SELECT * FROM exam";
$ex_Query=mysqli_query($conn,$ex_sql);
?>
<?php include('../../temp/header.php'); ?>
<body class="dark-edition">
  <div class="wrapper ">
  <?php include('../../temp/sidebar.php'); ?>
    <div class="main-panel">
      <?php include('../../temp/navbar.php'); ?>
      <div class="content">
        <div class="container">
    <div class="table-container">
        <h2 class="text-center">Exam Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Class</th>
                    <th>Student Admin Number</th>
                    <th>Subject ID</th>
                    <th>Term ID</th>
                    <th>Opening Marks</th>
                    <th>Midterm Marks</th>
                    <th>CAT 1 Marks</th>
                    <th>CAT 2 Marks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while ($ex_row=mysqli_fetch_array($ex_Query)) {
                        $name=$ex_row["name"];
                        $class=$ex_row["class"];
                        $admin_no=$ex_row["admin_no"];
                        $sbj_id=$ex_row["sbj_id"];
                        $term_id=$ex_row["term_id"];
                        $openmark=$ex_row["openmark"];
                        $midterm=$ex_row["midterm"];
                        $cat1=$ex_row["cat1"];
                        $cat2=$ex_row["cat2"];
                        $id=$ex_row["id"];
                    
                 ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $class; ?></td>
                    <td><?php echo $admin_no; ?></td>
                    <td><?php echo $sbj_id; ?></td>
                    <td><?php echo $term_id; ?></td>
                    <td><?php echo $openmark; ?></td>
                    <td><?php echo $midterm; ?></td>
                    <td><?php echo $cat1; ?></td>
                    <td><?php echo $cat2; ?></td>
                    <td>
                        <a href="editexam.php?id=<?php echo $id ?>" class="btn btn-warning btn-action" >Edit</a>
                        <a href="../../proc/deleteexam.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" >Delete</a>
                    </td>
                </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
      </div>
      <?php include('../../temp/footer.php'); ?>
      