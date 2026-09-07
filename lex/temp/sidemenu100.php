<?php
include_once 'basend';

$link= base_url(TRUE)."finacial" ?>
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
          <a href="#" class="d-block">Welcome <?php echo htmlentities($_SESSION['user']['username']); ?>!</a>
        </div>
      </div>

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
                <a href="<?php echo $link?>/admin/adminhome" class="nav-link">
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
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 

 