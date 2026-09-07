  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">&nbsp;</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">&nbsp;</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  
                 <i class="fas fa-user"></i><?php echo htmlentities($_SESSION['user']['username']) ?> Profile
                </h3>
                
               </div>
            </div>
            <!-- Message End -->
          </a>
	<?php $role= htmlentities($_SESSION['user']['role_id']); if($role==1){?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo BASE_URL . 'admin/users/editProfile.php' ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                   <i class="fas fa-cog"></i> Settings
                </h3>
               </div>
            </div>
            <!-- Message End -->
          </a>
	<?php }else{ ?>
	          <div class="dropdown-divider"></div>
          <a href="<?php echo BASE_URL . 'admin/users/edituserProfile.php' ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                   <i class="fas fa-cog"></i> Settings
                </h3>
               </div>
            </div>
            <!-- Message End -->
          </a>
	<?php } ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo BASE_URL . 'logout' ?>" class="dropdown-item ">
		  <div class="media">
				<div class="media-body">
					<h3 class="dropdown-item-title">
					<i class="fa fa-lock fa-fw"></i> Logout
					</h3>
				</div>
		   </div>
		  </a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>Loan due today
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>New Loan
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i>New Customer
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  