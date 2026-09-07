<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 

include_once('../_inc/connect.php');

$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
  
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
    echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
  
}else{
//setting header to json
//header('Content-Type: application/json');

$sql="SELECT IFNULL(SUM(disburse),0)Loan,IFNULL(SUM(servicecharge),0)transfee,monthname(appdate)Day FROM loan WHERE disburment= 'y' GROUP by appdate ORDER BY month(appdate) ASC";
//echo $sql;
//execute query
$result=mysqli_query($conn,$sql);
$rowCount=mysqli_num_rows($result);
$sqlPay="SELECT DATE(TransTime)day,IFNULL(SUM(TransAmount),0)LoanPayment FROM mobile_payments GROUP by Date(TransTime) ORDER BY Month(TransTime) ASC";
$payQuery=mysqli_query($conn,$sqlPay);
//loop through the returned data
$data1 = array();
$my_arr = array();


 while($row=mysqli_fetch_assoc($result)) {
                    
  $data1[] = $row;
   
}

$data2= array();
 while($rowPay=mysqli_fetch_assoc($payQuery)) {
                   
  $data2[] = $rowPay;
   
}

   for ($i=0; $i <$rowCount ; $i++) { 

         $my_arr[]=array_unique(array_merge($data2[$i],$data1[$i]), SORT_REGULAR);
                   
       

            
    }


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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
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
<body class="hold-transition sidebar-mini">
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include_once '../temp/rightnav.php'?>
<?php include_once '../temp/sidemenu.php'?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <!-- /.card -->
      <div class="card">
              <div class="card-header">
        <h3 class="card-title">Daily Income Report</h3>
          </div><!-- /.card-header -->             
              <div class="card-body">
        <table id="my-table" class="table table-bordered table-striped">
         <thead>
<tr>
          <th>Date</th>
          <th>Collection</th>
          <th>Disbursed</th>
          <th data-graph-type="area">Transaction Fee</th>
          <th data-graph-skip="1">Month</th>
          </tr>
         </thead>
         <tbody>
                <?php 
                      foreach($my_arr as $row) {
                          echo"<tr>";
                          foreach ($row as $cell) {
                              echo "<td>" . $cell . "</td>";
                          }
                          echo  "</tr>";
                      }


                ?>
                     
        </tbody>
            <tfoot>
             <th></th>
             <th></th> 
             <th></th> 
             <th></th> 
              
            </tfoot>            
          </table>
        </table>    
          </div>
              <!-- /.card-body -->            
      
            </div>
      <div class="card">
              <div class="card-header">
          </div><!-- /.card-header -->             
              <div class="card-body">
             <div id="chart_area" >

             </div>
             <br />
             <div align="center">
            <button type="button" name="view_chart" id="view_chart" class="btn btn-info btn-lg">View Data in Chart</button>
             </div>
          </div>
              <!-- /.card-body -->
            </div>           

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
	<?php include_once '../temp/footer.php'?>
 
</div>
<!-- REQUIRED SCRIPTS -->

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
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
 $('.input-daterange input').each(function() {
  $(this).datepicker('clearDates');
}); 
// Set up your table
 $('#my-table').DataTable({
     paging: false,
      "searching": true,
       "info": false,
       "responsive": true,
         dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "aaSorting": [[ 0, "asc" ]],

        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
             // computing column Total the complete result 
                
             var disbursed = api
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
             var Collection = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
             var transfee = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );               


             var nf = new Intl.NumberFormat();
             
            // Update footer by showing the total with the reference of the column index 
            $( api.column( 0 ).footer() ).html('Total');
            $( api.column( 1 ).footer() ).html(nf.format(disbursed));
            $( api.column( 2 ).footer() ).html(nf.format(Collection));
            $( api.column( 3 ).footer() ).html(nf.format(transfee));
 
        }
   });


$(document).ready(function(){
  
 $('#chart_area').dialog({
  autoOpen: false,
  width:1200,
  minHeight:"auto"

 });

 $('#view_chart').click(function(){
  $('#my-table').data('graph-container', '#chart_area');
  $('#my-table').data('graph-type', 'column');
  $('#chart_area').dialog('open');
  $('#my-table').highchartTable();
 });

});
</script>
<?php } ?>