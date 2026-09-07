<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 

include_once('../_inc/connect.php');
ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$role= htmlentities($_SESSION['user']['role_id']); 
if($role>1){
  
        echo '<h1 style="color: #FF0;">You have no Rights to access this page. </h1>';
    echo '<meta http-equiv="refresh" content="2;URL=../role/logout">';  
  
}else{
//target Month
$tSQL="SELECT SUM(t.target)target FROM target t WHERE monthname(t.tdate)=monthname(CURDATE()) AND year(t.tdate)=year(CURDATE())";
$tQuery = mysqli_query($conn,$tSQL);
$target =mysqli_fetch_array($tQuery);
$target = $target['target'];

//target
$ySQL="SELECT SUM(target)ytarget FROM target t WHERE  year(t.tdate)=year(CURDATE()) ";
$yQuery = mysqli_query($conn,$ySQL);
$ytarget =mysqli_fetch_array($yQuery);
$ytarget = $ytarget['ytarget'];

//Last Month target
$tlastSQL="SELECT SUM(t.target)target FROM target t WHERE monthname(t.tdate)=monthname(CURRENT_DATE -INTERVAL 1 MONTH) AND year(t.tdate)=year(CURDATE())  ";
$tlastQuery = mysqli_query($conn,$tlastSQL);
$targetLast =mysqli_fetch_array($tlastQuery);
$targetLast = $targetLast['target'];


//Processing fee Charge
$feeSQL="SELECT SUM(servicecharge)processingfee FROM loan WHERE monthname(appdate)=monthname(CURRENT_DATE -INTERVAL 1 MONTH)";
$feeQuery = mysqli_query($conn,$feeSQL);
$fRow =mysqli_fetch_array($feeQuery);
$fee = $fRow['processingfee'];

//Count Number of Customers
$SQLcnt="SELECT count(customerid)customer FROM customer";
$cntQuery= mysqli_query($conn,$SQLcnt)or mysqli_error($conn); 
$cnt = mysqli_fetch_assoc($cntQuery);
$customer=$cnt['customer'];


//Display Last Month by Loan
$lstSQL="SELECT SUM(loantotal)AllLoan,SUM(disburse)disburse FROM loan WHERE  monthname(appdate)=monthname(CURRENT_DATE - INTERVAL 1 MONTH) AND loanstatus='y' AND year(appdate)=year(CURDATE())";

$lstQuery = mysqli_query($conn,$lstSQL);
$lstRow =mysqli_fetch_array($lstQuery);
$lstLoan = $lstRow['disburse'];
$expLoan = $lstRow['AllLoan'];
mysqli_free_result($lstQuery);



//Display current Month by Loan

$cSQL="SELECT SUM(l.disburse)AllLoan FROM loan l LEFT JOIN employee e ON e.empid=l.empid WHERE monthname(appdate)=monthname(CURRENT_DATE) AND year(appdate)=year(CURDATE()) AND e.empid<>'M001' AND l.loanstatus='y'";
$cQuery = mysqli_query($conn,$cSQL);
$cRow =mysqli_fetch_array($cQuery);
$cLoan = $cRow['AllLoan'];
mysqli_free_result($cQuery);

//Display Loan total
$mixSQL="SELECT SUM((loantotal))AllLoan,count(loanid)LoanNo FROM  loan WHERE disburment ='y'";
$query = mysqli_query($conn,$mixSQL);
$_row =mysqli_fetch_array($query);
$sumLoan = $_row['AllLoan'];
$NoLoan = $_row['LoanNo'];
mysqli_free_result($query);
  
//Display Loan Payment
$sqlln="SELECT SUM(TransAmount)collection FROM mobile_payments WHERE BillRefNumber <>'float' OR BillRefNumber <>'Float' ";
$queryln = mysqli_query($conn,$sqlln);
$rowln =mysqli_fetch_array($queryln);
$lnpay= $rowln['collection']; 
$bal=$sumLoan-$lnpay;
mysqli_free_result($queryln);

//AND year(appdate)=year(CURDATE())

//Display Daily  Loan
$dSQL="SELECT SUM(TransactionAmount + 0)dailyln FROM b2c_api_response WHERE DATE(TransactionCompletedDateTime)=CURRENT_DATE AND YEAR(TransactionCompletedDateTime)=DATE(CURDATE())";
$dQuery = mysqli_query($conn,$dSQL);
$dRow =mysqli_fetch_array($dQuery);
$dLoan = $dRow['dailyln'];
mysqli_free_result($dQuery);

//Display Daily Pay
$dcSQL="SELECT SUM(TransAmount + 0)dcollection FROM mobile_payments WHERE DATE(TransTime)=CURRENT_DATE";
$dcQuery = mysqli_query($conn,$dcSQL);
$mrow=mysqli_fetch_array($dcQuery);
$cdaily= $mrow['dcollection'];  
$dcbal=$dLoan-$cdaily;
mysqli_free_result($dcQuery);

//Display Monthly Pay
$mSQL="SELECT SUM(TransAmount + 0)collection FROM mobile_payments WHERE monthname(validated_time)=monthname(CURRENT_DATE) AND year(validated_time)=year(CURRENT_DATE)";
$mQuery = mysqli_query($conn,$mSQL);
$mrow=mysqli_fetch_array($mQuery);
$mlnpay= $mrow['collection']; 
$mbal=$cLoan-$mlnpay;
mysqli_free_result($mQuery);

//count loan due today

$lndueSQL="SELECT COUNT(b2bID)cntdue FROM b2c_api_response WHERE DATE_FORMAT(TransactionCompletedDateTime,'%Y-%m-%d')=CURRENT_DATE";
$lndue_query=mysqli_query($conn,$lndueSQL);
$lnduerow=mysqli_fetch_array($lndue_query);
//$todatLoan=$lnduerow['cntdue'];

//New loans
$notSQL="SELECT COUNT(loanid)newln FROM loan WHERE monthname(appdate)=monthname(CURRENT_DATE)AND year(appdate)=year(CURDATE())";
$notquery = mysqli_query($conn,$notSQL);
$not_row =mysqli_fetch_array($notquery);

//default

$default=$sumLoan-($lnpay);

//AND year(appdate)=year(CURDATE())
//Count NEW Customers
$SQLcnt="SELECT count(customerid)newcust FROM customer WHERE monthname(regdate)=monthname(CURRENT_DATE) AND  year(regdate)=year(CURRENT_DATE) ";
$newQuery= mysqli_query($conn,$SQLcnt)or mysqli_error($conn); 
$cntNew = mysqli_fetch_assoc($newQuery);
$newCustomer=$cntNew['newcust'];
 $notification=$lnduerow['cntdue']+ $not_row['newln']+$cntNew['newcust'];
  $_SESSION['notif']=$notification;

 // working days
 
 function number_of_working_days($from, $to) {
    $workingDays = [1,2,3,4,5,6]; # date format = N (1 = Monday, ...)
    $holidayDays = ['*-12-25','*-12-26', '*-01-01', '*-05-01','*-06-01','*-10-10','*-12-12']; # variable and fixed holidays

    $from = new DateTime($from);
    $to = new DateTime($to);
    $to->modify('+1 day');
    $interval = new DateInterval('P1D');
    $periods = new DatePeriod($from, $interval, $to);

    $days = 0;
    foreach ($periods as $period) {
        if (!in_array($period->format('N'), $workingDays)) continue;
        if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
        if (in_array($period->format('*-m-d'), $holidayDays)) continue;
        $days++;
    }
    return $days;
}
$to= date('Y-m-t');

$from=date('Y-m-01');

$nday= number_of_working_days($from, $to ); 

?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>Engaged Credit|Taraknishi Financial System</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
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
      <div class="container-fluid"> 
         <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-lime elevation-1"><i class="fas fa-cog"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Loan Count</span>
                <span class="info-box-number">
                  <?php echo $NoLoan?>
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gradient-indigo elevation-1"><i class="fas fa-users"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Customers</span>
                <span class="info-box-number"><?php echo $customer?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
  
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
  
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Loan Book</span>
                <span class="info-box-number"><?php echo number_format($sumLoan)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Amount Collected</span>
                <span class="info-box-number"><?php echo number_format($lnpay)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    <!--info box 2-->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dice"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Total Default Amount</span>
                <span class="info-box-number">
                    
                  <?php
                    
                    echo number_format($default)
                    ?>
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-balance-scale"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Last Month Target</span>
                <span class="info-box-number"><?php echo number_format($targetLast)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
  
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
  
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-transparent elevation-1"><i class="fas fa-bookmark"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Target Met Last Month</span>
                <span class="info-box-number"><?php
          $buf=0;
          if($targetLast==0){
          echo $buf;
          }else{
            echo number_format(($lstLoan/$targetLast),2)*100;
          }
        ?>
                <small>%</small>
                </span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-arrow-circle-right"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Last Month Disbursement</span>
                <span class="info-box-number"><?php echo number_format($lstLoan)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div> 
    <!--info box 3-->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-eye"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">New Customers</span>
                <span class="info-box-number">
                  <?php echo number_format($newCustomer)?>
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-black elevation-1"><i class="fas fa-bullseye"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Current Target</span>
                <span class="info-box-number"><?php echo number_format($target)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
  
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
  
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Target Met this Month</span>
                <span class="info-box-number"><?php
          $buf=0;
          if($target==0){
          echo $buf;
          }else{
            echo number_format(($cLoan/$target),2)*100;
          }
        ?>
                <small>%</small>
                </span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-wave"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Current Month Loan</span>
                <span class="info-box-number"><?php echo number_format($cLoan)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>        
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Performance: 1 Jan , <?php echo date('Y') ?> - 31 Dec, <?php echo date('Y') ?></strong>
                    </p>

                    <div class="position-relative mb-4">
                      <!-- Sales Chart Canvas -->
                      <canvas id="areaChart" style="height: 150px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion <?php echo date('M Y') ?></strong>
                    </p>

                    <div class="progress-group">
                      Monthly Disbursement
                      <span class="float-right"><b><?php echo number_format($cLoan)?></b>/ <?php echo number_format($target)?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: <?php 
                        if ($target==0) {
                          echo "0";
                        }else{
                          echo number_format(($cLoan/$target),2)*100;
                        }
                        
                        ?>%"><?php 
                        if ($target==0) {
                          echo "0";
                        }else{
                          echo number_format(($cLoan/$target),2)*100;
                        }
                        
                        ?>%
                      </div>
                      </div>
                    </div>
                    <!-- /.progress-sms
                   <div class="progress-group" id="completeloan">
          Complete loans
                    </div> -->  
 
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Monthly Collection
                      <span class="float-right"><b><?php echo number_format($mlnpay)?></b>/ <?php echo number_format($expLoan)?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: <?php 
                        if ($expLoan==0) {
                          echo "0";
                        }else{                         
                                echo number_format(($mlnpay/$expLoan),2)*100;
                        }        
                                ?>%"><?php 
                                
                        if ($expLoan==0) {
                          echo "0";
                        }else{                                 
                                echo number_format(($mlnpay/$expLoan),2)*100;
                        }        
                                ?>%</div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Daily Loan Achieved
                      <span class="float-right"><b><?php echo number_format($dLoan)?></b>/ <?php echo number_format(($target/$nday))?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: <?php 
                        if ($target==0) {
                          echo "0";
                        }else{                        
                          echo number_format(($dLoan/($target/$nday)),2)*100;
                        }
                        ?>%">
                        <?php 
                        if ($target==0) {
                          echo "0";
                        }else{                        
                        echo number_format(($dLoan/($target/$nday)),2)*100;
                          }
                        ?>%</div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Daily Collection
                      <span class="float-right"><b><?php echo number_format($cdaily)?></b>/ <?php 
                      
                        if ($expLoan==0 ||$cdaily==0 ) {
                          echo "0";
                        }else{                       
                      echo number_format($expLoan/$nday);
                        }
                      
                      ?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: <?php 
                        if ($expLoan==0) {
                          echo "0";
                        }else{                       
                      
                        echo number_format(($cdaily/($expLoan/$nday)),2)*100;
                        }
                        ?>%"><?php 
                        if ($expLoan==0) {
                          echo "0";
                        }else{                       
                        
                        echo number_format(($cdaily/($expLoan/$nday)),2)*100;
                        }
                        ?>%</div>
                      </div>
                    </div>
                    <!-- /.progress-group --> 

                    <div class="progress-group">
                      Daily Default
                      <span class="float-right"><b><?php echo number_format($default/$nday)?></b>/ <?php echo number_format($sumLoan/$nday)?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width: <?php echo number_format((($default/$nday)/($sumLoan/$nday)),2)*100?>%"><?php echo number_format((($default/$nday)/($sumLoan/$nday)),2)*100?>%</div>
                      </div>
                    </div>
                    <!-- /.progress-group -->   
                    <div class="progress-group">
                      Total Default
                      <span class="float-right"><b><?php echo number_format($default)?></b>/ <?php echo number_format($sumLoan)?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-gradient-danger" style="width: <?php echo number_format(($default/($sumLoan)),2)*100?>%"><?php echo number_format(($default/($sumLoan)),2)*100?>%</div>
                      </div>
                    </div>
                    <!-- /.progress-group --> 
            <?php 
            $b2cfindSQL="SELECT * FROM b2c_api_response ORDER BY b2bID DESC LIMIT 1";
            //B2CUtilityAccountAvailableFunds
            //B2CWorkingAccountAvailableFunds
            $fundQuery=mysqli_query($conn,$b2cfindSQL) OR mysqli_error($conn);
            $fundRow=mysqli_fetch_array($fundQuery);
            ?>
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">B2C Utility Available Funds</span>
                <span class="info-box-number"><?php echo number_format($fundRow['B2CUtilityAccountAvailableFunds'])?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <?php 
            $c2bfindSQL="SELECT * FROM mobile_payments ORDER BY transLoID DESC LIMIT 1";
           
            $c2bQuery=mysqli_query($conn,$c2bfindSQL) OR mysqli_error($conn);
            $c2bFundRow=mysqli_fetch_array($c2bQuery);
            ?>            
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">C2B Account Funds</span>
                <span class="info-box-number"><?php echo number_format($c2bFundRow['OrgAccountBalance'])?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
                  </div>
                  <!-- /.col -->            
                </div>
                <!-- /.row -->            
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- TABLE: LATEST ORDERS -->
          <div class="card scroll-smooth">
            <div class="card-header border-transparent">
              <h3 class="card-title">Loan Per RO</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table m-0">
                  <thead>
                    <tr>
                        <th>Loan Officer</th>
                        <th>To collect</th>
                        <th>Collected</th>
                        <th>Last Loan</th>
                        <th>Late amt</th>
                        <th>Default amt</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
        <?php
          $sql="SELECT d.empid, d.name,d.loan,d.disburse,c.collected,l.cur_loan,ls.lstloan,(d.loan-c.collected-l.cur_loan-ls.lstloan)diff,(d.loan-c.collected-l.cur_loan)balance FROM rocollect c LEFT JOIN rodisburse d ON c.empid=d.empid LEFT JOIN currloan l ON l.empid=c.empid LEFT JOIN lstMonth ls ON ls.empid=c.empid WHERE  c.membertype<>'admin' AND c.empstatus='Active'";
                $Query=mysqli_query($conn,$sql);
                if(!$Query){
                    echo "Error due to: ".mysqli_error($conn);
                    exit;
                }
                while($row=mysqli_fetch_assoc($Query)) { 
                  $bal= $row['diff'];
                  if($bal<0){
                      $bal=0;
                  }else{
                      $bal=$bal;
                  }?>
                    <tr>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo  number_format($row['loan'])?></td>
                        <td><?php echo number_format($row['collected'])?></td>
                        <td><?php echo number_format($row['cur_loan'])?></td>
                        <td><?php echo number_format($row['balance']) ?></td>
                        <td><?php echo number_format($bal) ?></td>
                        <td ><a class="btn btn-sm btn-info" href="roloan?edit_id=<?php echo $row['empid']; ?>"
                        style="display:block;width:100%;">
                      Details</a></td>
                   </tr>                  
               <?php  } ?>
                        
                    </tbody>
                </table>
            </div>
          </div> 
        </div>
      </div>

        <div class="col-md-4">
   
           <?php 
            $performSQL="SELECT e.empid,e.name, SUM(l.disburse)loans FROM 
            loan l LEFT JOIN employee e ON e.empid=l.empid WHERE monthname(appdate)=monthname(CURRENT_DATE) AND  year(appdate)=year(CURRENT_DATE) AND e.membertype<>'admin' AND l.loanstatus='y' GROUP by l.empid";
            $pQuery = mysqli_query($conn,$performSQL); 
            while($rowperf =mysqli_fetch_array($pQuery)){
               $targetSQL="SELECT * FROM target WHERE empid='".$rowperf['empid']."' AND monthname(tdate)=monthname(CURDATE()) AND year(tdate)=year(CURDATE())";
                $tarQuery=mysqli_query($conn,$targetSQL); 
                if(!$tarQuery){
                    exit;
                }else{
                    $tarRow=mysqli_fetch_array($tarQuery);
                    $ln=$rowperf['loans'];
                    $tar=$tarRow['target'];
                    if($tar==0){
                        $q=0;
                    }else{
                        $q=$ln/$tar;
                    }
                    if($q>0.7){
        
                      $class='progress-bar bg-success';
                    }elseif($q>0.5){
        
                      $class='progress-bar bg-warning';
                    }else{
        
                       $class='progress-bar bg-danger';
                    }                    
                }
            
             ?>
            <div class="progress-group"> 
                <a href="rocustomer?edit_id=<?php echo $tarRow['empid']; ?>" > 
                      <?php echo $rowperf['name'] ?>
                        <span class="float-right">
                            <b><?php echo number_format($ln)?></b>
                            / <?php echo number_format($tar)?>
                        </span>
                <div class="progress progress-sm">
                    <div class="<?php echo $class ?>" style="width:
                    <?php echo number_format(($q),2)*100?>%">
                    <?php echo number_format(($q),2)*100?>%
                    </div>
                </div>
                </a>
            </div>
       
        <?php }
        //NEw Customer
          error_reporting(0);
          $newSQL="SELECT e.name,e.empid,COUNT(l.custid)cust,monthname(l.appdate)month,year(l.appdate)year FROM loan l JOIN employee e ON l.empid=e.empid 
          GROUP BY custid HAVING month=monthname(CURRENT_DATE) AND year=year(CURDATE())  AND cust=1 ";
          $newQuery=mysqli_query($conn,$newSQL);
        if(!$newQuery){
            echo "Error".mysqli_error($conn);
        }else{
            $cnt=0; 
            
            $Arr_lst=array();
            while($newRow=mysqli_fetch_array($newQuery)){
            
                 $lst=$newRow[1];
                
                 $Arr_lst[]=$lst;
            }
            mysqli_free_result($newQuery);
        }
            $newQuery=mysqli_query($conn,$newSQL);
            $cnt=array_count_values($Arr_lst);
            $Arr_name=array();
            $Arr_id=array();
            while($row=mysqli_fetch_array($newQuery)){
            
                $lsName=$row[0];
                
                $Arr_name[]=$lsName;
                $Arr_id[]=$row[1];
            
            
            }
            
            $arrName=$Arr_name;
            $arrID=$Arr_id;
            $uniName=array_values(array_unique($arrName));
            $uniID=array_values(array_unique($arrID));
            $arr_cnt=sizeof($uniID);

            ?>
             <div class="card scroll-smooth">
                <div class="card-header border-transparent">
                  <h3 class="card-title">New Loans</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
    
                <div class="table-responsive">
                 <table class="table m-0">
                  <thead>
                   <tr>
                    <th>Loan Officer</th>
                    <th>No. of Loans</th>
                  </tr>
                </thead>                      
                <tbody>
                  <?php  for($i=0;$i<=$arr_cnt;$i++){ $id=$uniID[$i]; ?>
                    <tr>
                      <td><?php   echo $uniName[$i] ?></td>
                      <td> <?php   echo $cnt[$id] ?></td>
                    </tr>
                     <?php }  ?> 
                  </tbody>
                </table>
                </div>
                </div>
            </div>
        
        </div>
        
        
    <!--/.container-fluid-->    
    </div>
    </section>
  <!-- /.content-wrapper -->
</div>


  <!-- Main Footer -->
  <?php include_once '../temp/footer.php'?>
 

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
   
   <!-- Flot -->
    <script>

$(document).ready(function(){
$.ajax({
  url : "chart.php",
  type : "GET",
  success : function(data){
    console.log(data);

    var Month = [];
    var Loan= [];
    var LoanPayment = [];

    for(var i in data) {
      Month.push(data[i].Month);
      Loan.push(data[i].Loan);
      LoanPayment.push(data[i].Payment);
    }

    var chartdata = {
      labels: Month,
      datasets: [
        {
          label: "Loan",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(255, 0, 0, 0)",
          borderColor: "rgba(255,99,71)",
          pointHoverBackgroundColor: "rgba(139, 0, 0, 0)",
          pointHoverBorderColor: "rgba(128, 0, 0,0)",
          data: Loan
        },
        {
          label: "LoanPayment",
          fill: false,
          lineTension: 0.1,
          lineWidth: 2,
          symbol: "circle",
          backgroundColor: "rgba(29, 202, 255, 0.75)",
          borderColor: "rgba(29, 202, 255, 1)",
          pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
          pointHoverBorderColor: "rgba(29, 202, 255, 1)",
          data: LoanPayment
        }
      ]
    };
    var ctx = $("#areaChart");

    var LineGraph = new Chart(ctx, {
      type: 'line',
      data: chartdata
    });
  },
  error : function(data) {

  }
});
});
$(function () {
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })

  })
</script>
 <!-- /Flot -->
 <script>
$(document).ready(function(){
   
    $('#completeloan').load("completeloan");

});
</script>
</body>
</html>
<?php } ?>