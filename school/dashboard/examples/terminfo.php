<?php
include("../../includes/config.php");
$t_sql= "SELECT * FROM term";
$t_Query=mysqli_query($conn,$t_sql);
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
        <h2 class="text-center">Term Information</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Term ID</th>
                    <th>Term Name</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while ($t_row=mysqli_fetch_array($t_Query)) {
                        $name=$t_row["name"];
                        $id=$t_row["id"];   
                 ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
      </div>
      <?php include('../../temp/footer.php'); ?>
      