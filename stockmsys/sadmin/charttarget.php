<?php
include_once('../_inc/connect.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Taraknishi Financial System</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="http://code.highcharttable.org/2.0.0/jquery.highchartTable.js"></script> 
  <script src="http://highcharttable.org/js/highcharts.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
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
		<script>
        function showUser(str) {
          if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
          } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("GET","test1.php?q="+str,true);
            xmlhttp.send();
          }
        }
        </script> 
 </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include_once '../temp/rightnav.php'?>
<?php include_once '../temp/sidemenu.php'?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">&nbsp;</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customer Report</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
 
                      <form>
                      <select name="month" onchange="showUser(this.value)">
                        <option value="">Select a Month:</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                        </select>
                      </form>
                      <br>
               </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			<div class="card">
              <div class="card-header">
			    </div><!-- /.card-header -->             
              <div class="card-body">
				<table class="table table-bordered table-striped" id="for_chart">
				 <thead>
				  <tr>
				  <th width="20%">Name</th>
				   <th width="40%">Target</th>
				   <th width="40%" >Targetmet</th>
				   <th width="40%" data-graph-skip="1">%age</th>
				  </tr>
				 </thead>
				 <tbody id="txtHint"> 
                     
				</tbody>
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
  $(function () {
    $('#for_chart').DataTable({
       "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
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