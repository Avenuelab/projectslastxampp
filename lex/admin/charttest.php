<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 

include_once('../_inc/connect.php');

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Taraknishi Financial System</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="http://code.highcharttable.org/2.0.0/jquery.highchartTable.js"></script> 
  <script src="http://highcharttable.org/js/highcharts.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
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
					<th data-graph-skip="1">Month</th>
              </tr>
            </thead>
            <tbody>
            </tbody>

        </table>

				</div>
              <!-- /.card-body -->
            </div>
			
       </div>
        <!-- /.card-body -->
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
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,	   
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'charttestdata.php'
      },
      'columns': [
         { data: 'monthDate' },
         { data: 'paid' },		 
         { data: 'disbursed' },
         { data: 'transfee' },
         { data: 'month' }
      ],
	          dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
   });
});
</script>

<script>
$(document).ready(function(){
  
 $('#chart_area').dialog({
  autoOpen: false,
  width: 1000,
  height:500
 });

 $('#view_chart').click(function(){
  $('#for_chart').data('graph-container', '#chart_area');
  $('#for_chart').data('graph-type', 'column');
  $('#chart_area').dialog('open');
  $('#for_chart').highchartTable();
 });

});
</script>
</body>

</html>
