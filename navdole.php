<?php 
$link="http://localhost/springmak/" ;
?>        
    <div class="col-md-3 left_col">
          <div class="left_col scroll-view ">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo $link?>index" class="site_title"></i> <span><?php echo $title; ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix ">
              <div class="sidebar-user-picture ">
                <img src="<?php echo $link?>admin/settings/upload/<?php echo htmlentities($_SESSION['user']['profile_picture']);?>" alt="..."  class="img-circle profile_img">
              </div>

              <div class="profile_info">
                  <div class="sidebar-user-details" >
                    <div class="user-name" style="color: white;"><?php echo htmlentities($_SESSION['user']['name']);  ?></div>
                    <div class="user-role" style="color: white;"><?php echo ucfirst(htmlentities($_SESSION['user']['role']));  ?></div>
                  </div>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu Sidebar ">
              <div class="menu_section">
                <ul class="nav side-menu nav-pills nav-sidebar flex-column">
                  <li class="nav-item"><a href="<?php echo $link?>home/index"><i class="fa fa-desktop"></i>Dashboard<span class="title"></span></a>
                  </li>
                  <li><a><i class="fa fa-user"></i> Client <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                  <li>
                    <a href="<?php echo $link?>home/member/all_member" class="nav-link "> <span class="title">View All
                        Client</span>
                    </a>
                  </li>
                  <li >
                    <a href="<?php echo $link?>home/member/add_member" class="nav-link "> <span
                        class="title">Add Client</span>
                    </a>
                  </li>
                  <li >
                    <a href="<?php echo $link?>home/member/member_kin" class="nav-link "> <span class="title">
                        Add Next Kin</span>
                    </a>
                  </li> 
                  <li >
                    <a href="<?php echo $link?>home/member/member_kin_view" class="nav-link "> <span class="title">
                        View Next Kin</span>
                    </a>
                  </li>                    
                    </ul>
                  </li>
                  <li><a><i class="fa fa-dollar"></i> Investment <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/investor" class="nav-link "> <span class="title">New Investor</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/retain_invest" class="nav-link "> <span
                            class="title">Add Retain Investor</span>
                        </a>
                      </li>
                      
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/renew_invest" class="nav-link "> <span
                            class="title">Add Renew Investor</span>
                        </a>
                      </li>
                          <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/topup_invest" class="nav-link "> <span
                            class="title">Add Topup Investor</span>
                        </a>
                      </li>                   
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/view_investor" class="nav-link "> <span
                            class="title">View All Investor</span>
                        </a>
                      </li> 
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/view_investor_active" class="nav-link "> <span
                            class="title">View Active Investor</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/view_investor_term" class="nav-link "> <span
                            class="title">View Terminated Investor</span>
                        </a>
                      </li>                                                                    
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/view_renew" class="nav-link "> <span
                            class="title">View Renew Investor</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/view_retain" class="nav-link "> <span
                            class="title">View Retain Investor</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/view_topup" class="nav-link "> <span
                            class="title">View Addition Investor</span>
                        </a>
                      </li>                                                                                                             
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/invest_status" class="nav-link "> <span
                            class="title">Pay Investor</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/invest_paid" class="nav-link "> <span
                            class="title">View Paid Investor</span>
                        </a>
                      </li>                      
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/invest/tracking_invest" class="nav-link "> <span
                            class="title">Track Investment</span>
                        </a>
                      </li>                      
                    </ul>
                  </li>
                  <?php 
                    $role= htmlentities($_SESSION['user']['role_id']); 
                    if($role=3){?>
                  <li><a><i class="fa fa-wallet"></i> Payments <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="nav-item">
                        <a href="<?php echo $link?>officer/payment/daily_pay_data_search" class="nav-link "> <span class="title">Search Payment By Date</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $link?>officer/payment/invest_daily_client" class="nav-link "> <span class="title">Daily Client Payment</span>
                        </a>
                      </li>                      
                      <li class="nav-item">
                        <a href="<?php echo $link?>officer/payment/invest_payment_status" class="nav-link "> <span
                            class="title">Pending Investor</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $link?>officer/payment/invest_paid" class="nav-link "> <span
                            class="title">View Paid Investor</span>
                        </a>
                      </li>                       
                      <li class="nav-item">
                        <a href="<?php echo $link?>officer/payment/invest_terminate" class="nav-link "> <span
                            class="title">Terminate Account</span>
                        </a>
                      </li> 
                      <li class="nav-item">
                        <a href="<?php echo $link?>officer/payment/invest_reinstate" class="nav-link "> <span
                            class="title">Restore Account</span>
                        </a>
                      </li>                                            
                    </ul>
                  </li>
                  <?php    }
                  ?>
                  <li><a><i class="fa fa-bank"></i> City<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                  <li class="nav-item">
                    <a href="<?php echo $link?>home/city/view_city" class="nav-link "> <span class="title">View Cities</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo $link?>home/city/add_city" class="nav-link "> <span
                        class="title">Add City</span>
                    </a>
                  </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> County <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li class="nav-item">
                        <a href="<?php echo $link?>home/county/view_county" class="nav-link "> <span class="title">View County</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo $link?>home/county/add_county" class="nav-link "> <span
                            class="title">Add County</span>
                        </a>
                      </li>
                    </ul>
                   </li> 
                                
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
               <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo $link?>role/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

         <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="<?php echo $link?>/role/home/users/editProfile" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $link?>admin/settings/upload/<?php echo htmlentities($_SESSION['user']['profile_picture']);?>" alt="">
                    <?php echo htmlentities($_SESSION['user']['name']);  ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?php echo $link?>admin/settings/passuser"> Profile</a>
                    <a class="dropdown-item"  href="<?php echo $link?>role/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>       