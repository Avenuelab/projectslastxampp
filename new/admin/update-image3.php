<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
include_once '../_inc/connect.php';
$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
  $productname=$_POST['productName'];
  $productimage3=$_FILES["productimage3"]["name"];
//$dir="productimages";
//unlink($dir.'/'.$pimage);


  move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$pid/".$_FILES["productimage3"]["name"]);
  $sql=mysqli_query($conn,"update  products set productImage3='$productimage3' where id='$pid' ");
$_SESSION['msg']="Product Image Updated Successfully !!";

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/favicon.ico" type="image/ico" />

    <title>Prormcoh</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
     <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
  $.ajax({
  type: "POST",
  url: "get_subcat.php",
  data:'cat_id='+val,
  success: function(data){
    $("#subcategory").html(data);
  }
  });
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script> 
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../admin/index.php" class="site_title"><i class="fa fa-paw"></i> <span>Prormcoh</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
              <?php include_once 'tmp/nav.html'?>
            <!-- /sidebar menu -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
                    

                    <div class="clearfix"></div>

                    <div class="row">
                         <div class="module">
              <div class="module-head">
                <h3>Insert Product</h3>
              </div>
              <div class="content">

                  <?php if(isset($_POST['submit']))
{?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                  </div>
<?php } ?>



                  <br />

      <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<?php 

$query=mysqli_query($conn,"select productName,productImage3 from products where id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  


?>


<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text"    name="productName"  readonly value="<?php echo htmlentities($row['productName']);?>" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Current Product Image2</label>
<div class="controls">
<img src="productimages/<?php echo htmlentities($row['productImage3']);?>" width="200" height="100"> 
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">New Product Image1</label>
<div class="controls">
<input type="file" name="productimage3" id="productimage3" value="" class="span8 tip" required>
</div>
</div>


<?php } ?>

  <div class="control-group">
                      <div class="controls">
                        <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>


  
            
            
          </div>
 
 
                    </div>
                </div>
              </div>
            
      
        <!-- /page content -->

        <!-- footer content -->
      <footer>
        <div class="pull-right">
          Copyright Lab Avenue
        </div>
        <div class="clearfix"></div>
      </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
    $(document).ready(function() {
      $('.datatable-1').dataTable();
      $('.dataTables_paginate').addClass("btn-group datatable-pagination");
      $('.dataTables_paginate > a').wrapInner('<span />');
      $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
      $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
  </script>
  </body>
</html>
</body>
<?php  ?>
