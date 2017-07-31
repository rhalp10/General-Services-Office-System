<?php
include('session.php');


$ID =$_REQUEST['accID'];

$result = mysql_query("SELECT * FROM emp_accounts_record WHERE accID = '$ID'");
$test = mysql_fetch_array($result);
$rows = mysql_num_rows($result);
                $emp_acc_record_accID=$test['accID'];
                $emp_acc_record_accLevel=$test['accLevel'];
                $emp_acc_record_username=$test['username'];
                $emp_acc_record_password=$test['password'];
                $emp_acc_record_fullname=$test['fullName'];
                $emp_acc_record_age=$test['Age'] ;
                $emp_acc_record_gender=$test['Gender'];
                $emp_acc_record_address=$test['Address'];
                $emp_acc_record_email=$test['Email'];
                $emp_acc_record_pos=$test['Pos'];
                $emp_acc_record_mobile=$test['Mobile'];
                $emp_acc_record_img=$test['image'];
 if ($login_level != '0') 
{
  header("location: index.php");
} 

$page = "Account";//this is for <li></li> active
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>Account Profile View</title>
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">GSO <span class="lite">Admin</span></a>
            <!--logo end-->

            
            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo $login_img; ?>">
                            </span>
                            <span class="username"><?php echo $login_session; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <?php  
                  if ($login_level == '0')
                  {
                      include('sidebar-menu_admin.php');
                  }
                  if ($login_level == '1')
                  {
                      include('sidebar-menu_emp.php');
                  }
                  elseif ($login_level == '2')
                  {
                      include('sidebar-menu_bin.php');
                  }
                  else if ($login_level == '3')
                  {
                      include('sidebar-menu_accountability.php');
                  }
                  else if ($login_level == '4')
                  {
                      include('sidebar-menu_icsprspar.php');
                  }
                  else
                  {
                    
                  }
                  ?>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Profile View</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="icon_documents_alt"></i><a href="account.php">Account Management</a></li>
                        <li><i class="fa fa-user-md"></i>Account Profile View</li>
                    </ol>
                </div>
            </div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-3">
                              <h4><?php echo  $emp_acc_record_fullname; ?></h4>
                              <div class="follow-ava">
                                  <img src="<?php  echo $emp_acc_record_img ?>" alt="">
                              </div>
               
                              <h3><?php echo  $emp_acc_record_pos; ?></h3>
                              <h6><?php
                              if ($emp_acc_record_accLevel == 0) {
                                echo "ADMIN ACCESS";
                              }
                              else if ($emp_acc_record_accLevel == 1) {
                                echo "EMPLOYEE ACCESS";
                              }
                              else if ($emp_acc_record_accLevel == 2) {
                                echo "ACCOUNTABILITY CARD ACCESS";
                              }

                              else if ($emp_acc_record_accLevel == 3) {
                                echo "BIN CARD ACCESS";
                              }
                              else
                              {
                                echo "NOT SPECIFIED";
                              }

                              ?></h6>
                            </div>
                            <div class="col-lg-10 col-sm-09 follow-info">
                                
                                <h6>
                                     
                                     <span><i class="icon_calendar"></i><div id="datetime" style="margin-top: -13px; margin-left: 16px;"></div></span>

                                </h6>
                            </div>
                            
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Account Profile View
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="recent-activity" class="tab-pane active">
                                      <div class="profile-activity">                                          
                                          <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                      <div class="bio-graph-heading">
                                               
                                      </div>
                                      <div class="panel-body bio-graph-info">
                                          <h1>Bio Graph</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>Username </span>: <?php echo $emp_acc_record_username; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Password </span>: <?php echo md5(sha1($emp_acc_record_password)); ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Full Name </span>: <?php echo $emp_acc_record_fullname; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Age </span>: <?php echo $emp_acc_record_age; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Position</span>: <?php echo $emp_acc_record_pos; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Email </span>:<?php echo $emp_acc_record_email; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Mobile </span>: <?php echo $emp_acc_record_mobile; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Address </span>: <?php echo $emp_acc_record_address; ?></p>
                                              </div>
                                              
                                          </div>
                                      </div>
                                    </section>
                            </div>
                        </div>

                                      </div>
                                  </div>
                                
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->







       <div class="text-center">
            <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->
               Rhalp Darren Cabrera & Omar Raouf Daud<br>
               Copyright 2017
            </div>
        </div>
  </section>
  <!-- container section end -->
  
<?php include ('footer.php');?>