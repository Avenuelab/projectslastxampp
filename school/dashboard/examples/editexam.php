<?php 
include("../../includes/config.php");
if(isset($_GET)){
    $id_get=$_GET['id'];
    $ex_sql= "SELECT * FROM exam WHERE id=$id_get";
    $ex_Query=mysqli_query($conn,$ex_sql);
    $ex_row=mysqli_fetch_array($ex_Query);
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
        <h2 class="text-center">Insert Exam Details</h2>
        <form action="../../proc/insertexams.php" method="POST">
            <div class="form-group">
                <label for="exam_name">Exam Name</label>
                <input type="text" class="form-control" id="exam_name" name="name" value="<?php echo $name ?>" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" class="form-control" id="class" name="class" value="<?php echo $class ?>" required>
            </div>
            <div class="form-group">
                <label for="admin_no">Student Admin Number</label>
                <input type="text" class="form-control" id="admin_no" name="admin_no" value="<?php echo $admin_no ?>" required>
            </div>
            <div class="form-group">
                <label for="subject_id">Subject ID</label>
                <input type="text" class="form-control" id="subject_id" name="sbj_id" value="<?php echo $sbj_id ?>" required>
            </div>
            <div class="form-group">
                <label for="term_id">Term ID</label>
                <input type="text" class="form-control" id="term_id" name="term_id" value="<?php echo $term_id ?>" required>
            </div>
            <div class="form-group">
                <label for="opening_marks">Opening Marks</label>
                <input type="number" class="form-control" id="opening_marks" name="openmark" value="<?php echo $openmark ?>" required>
            </div>
            <div class="form-group">
                <label for="midterm">Midterm Marks</label>
                <input type="number" class="form-control" id="midterm" name="midterm" value="<?php echo $midterm ?>" required>
            </div>
            <div class="form-group">
                <label for="cat1">CAT 1 Marks</label>
                <input type="number" class="form-control" id="cat1" name="cat1" value="<?php echo $cat1 ?>" required>
            </div>
            <div class="form-group">
                <label for="cat2">CAT 2 Marks</label>
                <input type="number" class="form-control" id="cat2" name="cat2" value="<?php echo $cat2 ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit Exam Details</button>
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