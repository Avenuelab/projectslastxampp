<?php 
include("../../includes/config.php");
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
<?php include('../../temp/header.php');?>
<style>
  body {
            background-color: #ffffff;
            padding: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .text {
          color: black;
          font-size: 20px;
        }
    </style>
<body class="dark-edition">
  <div class="wrapper ">
    <?php include('../../temp/sidebar.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('../../temp/navbar.php'); ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="card card-plain">
              <div class="form-container">
        <h2 class="text-center">Edit Subject and Class</h2>
        <form action="../../proc/editsubject.php" method="POST">
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
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="iframe-container d-none d-lg-block">
                      
                        
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('../../temp/footer.php'); ?>