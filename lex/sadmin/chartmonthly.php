<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 

include_once('../_inc/connect.php');
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>2){
  
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
    echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
  
}else{
?>
  <!DOCTYPE html>
  <html>
   <head>
    <title>Engaged Credit | Taraknishi Financial System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="../js/jquery.highchartTable.js"></script> 
    <script src="../js/highcharts.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/buttons.bootstrap4.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Datatable CSS -->
  <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
  <!-- Datatable CSS -->
  <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
  <link href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
  <link href='https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>

    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
   <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

  <?php include_once '../temp/rightnav.php'?>
  <?php include_once '../temp/sidemenu.php'?>
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
      <div class="card-body">
        
         <div class="card card-secondary">
          <div class="card-header">
          
          </div>
          <!-- /.card-header -->
          <div class="card-body ">
               <table id="for_chart" class="table table-bordered table-striped">
                 <thead>
                    <tr>
                      <th>Month</th>
                      <th>Disbursed</th>
                      <th>Collection</th>
                      <th>Transaction Fee</th>
                      <th data-graph-skip="1">Total Funds</th>
                      <th data-graph-skip="1">Profit</th>
                      <th data-graph-skip="1">Index</th>                          
                  </tr>
                  </thead>
                  <tbody>
              <?php
              $sumTotal=0;
        $sql="SELECT month(appdate)no,monthname(appdate)month,SUM(disburse)disbursed,SUM(servicecharge)transfee,SUM(amtdeduct)lnincome 
                    FROM loan WHERE disburment= 'y' GROUP by month(appdate)";
              $Query=mysqli_query($conn,$sql);
              if(!$Query){
                  echo "Error due to: ".mysqli_error($conn);
                  exit;
              }
              while($row=mysqli_fetch_assoc($Query)) {
                $mnth=$row['month'];
                $sqlPay="SELECT month(TransTime)no,monthname(TransTime)month,SUM(TransAmount)paid 
                        FROM mobile_payments WHERE monthname(TransTime)='$mnth' GROUP by month(TransTime)";
                 $payQuery=mysqli_query($conn,$sqlPay);
              if(!$payQuery){
                  echo "Error due to: ".mysqli_error($conn);
                  exit;
              }else{

                $rowPay=mysqli_fetch_assoc($payQuery);
              }

                 ?>
                  <tr>
                      <td><?php echo $row['month']?></td>
                      <td><?php echo number_format($row['disbursed'])?></td>
            <td><?php echo number_format($rowPay['paid'])?></td>
            <td><?php echo number_format($row['transfee'])?></td>
            <td><?php echo number_format($row['transfee']+$row['lnincome']+$row['disbursed'])?></td>
            <td><?php echo number_format($row['transfee']+$row['lnincome'])?></td>
                      <td><?php echo $row['no']?></td>            
                 </tr>
              <?php }?>
             </tbody>
            </table>

          </div>
          <!-- /.card-body -->
        </div>
        
       
      <!-- /.card-body -->
        <div class="card">
          <div class="card-header">
          </div><!-- /.card-header -->             
          <div class="card-body">
               <div id="chart_area" >

               </div>
               <br />

          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  <?php include_once '../temp/footer.php'?>
        
        
  </div>
  <!-- ./wrapper -->
  <!-- Datatable JS -->
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script> 
  <script>
  $(document).ready(function(){
     $('#for_chart').DataTable({
      "paging": true,
      "aaSorting": [[ 6, "asc" ]]
     });
  });
  </script>

  <script>
  $(document).ready(function(){
    
  
    $('#for_chart').data('graph-container', '#chart_area');
    $('#for_chart').data('graph-type', 'line');
   
    $('#for_chart').highchartTable();
   });

  ;
  </script>
  </body>
  </html>
<?php } ?>