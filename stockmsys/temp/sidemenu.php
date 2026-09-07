<?php
$link="http://localhost/lex" ;
?>
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index" class="brand-link">
      <!--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
      <span class="brand-text font-weight-light">Inventory Management System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        </div>
         <div class="info">
          <a href="#" class="d-block">
        Welcome <?php echo htmlentities($_SESSION['user']['username'])."!";
        $role= htmlentities($_SESSION['user']['role_id']); ?>
      </a>
        </div>
      </div>
      <?php if($role==5){?>
        <nav class="mt-2">
          &nbsp;
        </nav>
      <?php }else if($role==0){?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
            <a href="<?php echo $link?>/admin/index" class="nav-link"active " >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/employee" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/editemp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/allemp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/empdele" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delete Employee</p>
                </a>
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/newmember" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/editmember" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/allmember" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Loans
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/newloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Loan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/rollover" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Rollover</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/loanrepeat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Repeat Loan</p>
                </a>
              </li>                              
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/pendingloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Loan</p>
                </a>
              </li>              <li class="nav-item">
                <a href="<?php echo $link?>/admin/loantoapprove" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Approval</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/loandetails" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Processing Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/approvedloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Loans</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/declined" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Declined Loans</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/complete" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Loans</p>
                </a>
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Guarantor
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/guarantor" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Guarantor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/editguarantor" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Guarantor</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/gview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guarantor Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shekel-sign"></i>
              <p>
                Payment Info
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/don/balanceview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paybill Balance</p>
                </a>
              </li> 
      
              <li class="nav-item">
                <a href="<?php echo $link?>/don/disburse" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Make Disburment B2C</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/don/b2cview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Disbursment All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/don/c2bview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Payment Recieved</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/customerreimburse" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reimbursement</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="<?php echo $link?>/don/reversec2b" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Make Reverse</p>
                </a>
              </li>       
              <li class="nav-item">
                <a href="<?php echo $link?>/don/viewreversed" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reversed Payments</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo $link?>/don/checkstatus" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Check payment status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/don/viewc2bstatus" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Payment Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/editdeposit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Bill REF</p>
                </a>
              </li>              
            </ul>
          </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>
               Collection Status
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/monthlydue" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Loan Due</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/lateloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Late Loan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/ontimeloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>On time Loan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/dailycollection" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Collection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/monthlycollection" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Collection</p>
                </a>
              </li>
              
            </ul>
          </li>                             
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               Report
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/rptcustomer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/rptarea" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Areas Visited</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/rptofficer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Officer Performance</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo $link?>/admin/chartdaily" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Loan Performace</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo $link?>/admin/chartmonthly" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Disbursment</p>
                </a>
              </li>
        
            </ul>
          </li>                      
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullseye"></i>
              <p>
                Monthly Target
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/target" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Disburment Target</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/targetview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Target</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Collection Target</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
               Statutory Cost
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/ratesettings" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adjust Rates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/vrate" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Products</p>
                </a>
              </li>
            </ul>
          </li>   
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
               SMS
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/sms/msg" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMS Sent</p>
                </a>
              </li>
            </ul>
          </li>       
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
              User Settings
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL ?>signup" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add user</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL . 'admin/users/userListadmin' ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL . 'admin/roles/roleList' ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Rights</p>
                </a>
              </li>
              
            </ul>
          </li>                  
        </ul>
      </nav>
        <!--admin--->
        <?php }elseif($role==1){?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo $link?>/admin/cat.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
          <a href="<?php echo $link?>/admin/product" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
          <a href="<?php echo $link?>/admin/sales" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Sales
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               Report
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/rptcustomer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/rptarea" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Areas Visited</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/rptofficer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Officer Performance</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo $link?>/admin/chartdaily" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Loan Performace</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo $link?>/admin/chartmonthly" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Disbursment</p>
                </a>
              </li>
        
            </ul>
          </li>                      
 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
              User Settings
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL ?>signup" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add user</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL . 'admin/users/userListadmin' ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL . 'admin/roles/roleList' ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Rights</p>
                </a>
              </li>
              
            </ul>
          </li>                  
        </ul>
      </nav>
      <!-- /.sidebar-menu Officer -->
        <?php }elseif($role==2){?>
          <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/home" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/employee" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/editemp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/allemp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/newmember" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/allmember" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Loans
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/newloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Loan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/rollover" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Rollover</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/loanrepeat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Repeat Loan</p>
                </a>
              </li>                           
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/pendingloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Loan</p>
                </a>
              </li>              <li class="nav-item">
                <a href="<?php echo $link?>/officer/loantoapprove" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Approval</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/loandetails" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Processing Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/approvedloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Loans</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/declined" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Declined Loans</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/complete" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Loans</p>
                </a>
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Guarantor
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/guarantor" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Guarantor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/gview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guarantor Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shekel-sign"></i>
              <p>
                Payment Info
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/don/b2cview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Disbursment All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/don/c2bview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Payment Recieved</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/don/checkstatus" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Check payment status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/don/viewc2bstatus" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Payment Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/admin/editdeposit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Bill REF</p>
                </a>
              </li>              
            </ul>
          </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>
               Collection Status
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/monthlydue" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Loan Due</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/lateloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Late Loan</p>
                </a>
              </li>
            </ul>
          </li>                             
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               Report
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/rptcustomer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/rptarea" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Areas Visited</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/rptofficer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Officer Performance</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo $link?>/officer/chartdaily" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Loan Performace</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo $link?>/officer/chartmonthly" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Disbursment</p>
                </a>
              </li>
        
            </ul>
          </li>                      
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullseye"></i>
              <p>
                Monthly Target
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/target" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Disburment Target</p>
                </a>
              </li            
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/targetview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Target</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/officer/vrate" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Products</p>
                </a>
            </ul>
          </li>
                
      
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
               SMS
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/sms/msg" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMS Sent</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu Director -->
        <?php }elseif($role==4){?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/director/adminhome" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/director/allemp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/director/allmember" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Loans
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
  
               <li class="nav-item">
                <a href="<?php echo $link?>/director/pendingloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Loan</p>
                </a>
              <li class="nav-item">
                <a href="<?php echo $link?>/director/loandetails" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Processing Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/director/approvedloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Loans</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/director/declined" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Declined Loans</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo $link?>/director/complete" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Loans</p>
                </a>
              </li>             
            </ul>
          </li>
                           
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               Report
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/director/rptcustomer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/director/rptarea" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Areas Visited</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/director/rptofficer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Officer Performance</p>
                </a>
              </li>
            </ul>
          </li> 
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullseye"></i>
              <p>
                Monthly Target
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/director/targetview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Target</p>
                </a>
              </li>
            </ul>
          </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/director/vrate" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Products</p>
                </a> 
              </li>         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->   
      <!-- /.sidebar-menu USER -->
        <?php }else{ ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/home" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/allemp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/newmember" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/allmember" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Loans
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/newloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Loan</p>
                </a>
              </li> 
                <li class="nav-item">
                <a href="<?php echo $link?>/employee/loanrepeat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Repeat Loan</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo $link?>/employee/pendingloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Loan</p>
                </a>
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/loandetails" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Processing Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/approvedloan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Loans</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/declined" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Declined Loans</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/complete" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Loans</p>
                </a>
              </li>             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Guarantor
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/guarantor" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Guarantor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/employee/gview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guarantor Details</p>
                </a>
              </li>
            </ul>
          </li>
                              
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               Sales Report
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $link?>/sales_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales by dates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/monthly_sales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $link?>/daily_sales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily sales</p>
                </a>
              </li>
            </ul>
          </li> 
          
          
            
                
        </ul>
      </nav>
      <!-- /.sidebar-menu -->       
        
        <?php } ?>
        
        
    </div>
    <!-- /.sidebar -->
  </aside>