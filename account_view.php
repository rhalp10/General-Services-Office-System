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
               
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>Account Profile View</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
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
                                <img alt="" src="img/avatar-mini2.jpg">
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
                  <li class="">
                      <a class="" href="admin.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="" href="account.php">
                          <i class="icon_profile"></i>
                          <span>Account</span>
                      </a>
                  </li>    
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Record</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                         <li><a class="" href="acccard.php">PGC Account Card</a></li>
                          <li><a class="" href="accreceipt.php">Accountability Receipt</a></li>
                          <li><a class="" href="returnslip.php">Return Slip</a></li>
                          <li><a class="" href="bincard.php"><span>Bincard</span></a></li>
                          <li><a class="" href="Custodian.php">Custodian Slip</a></li>
                      </ul>
                  </li>
                             
                  <li class="">
                      <a class="" href="emplist.php">
                          <i class="icon_clipboard"></i>
                          <span>Employee  List</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu ">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Report</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                   
                          <li><a class="" href="account_report.php">Account</a></li>
                          <li><a class="" href="acccard_report.php">PGC Account Card</a></li>
                          <li><a class="" href="accreceipt_report.php">Accountability Receipt</a></li>
                          <li><a class="" href="returnslip_report.php">Return Slip</a></li>
                          <li><a class="" href="bincard_report.php"><span>Bincard</span></a></li>
                          <li><a class="" href="Custodian_report.php">Custodian Slip</a></li>
                      </ul>
                  </li>
                  
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
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/moment.js"></script>
    <script type="text/javascript">
  
  var datetime = null,
        date = null;

  var update = function () {
      date = moment(new Date())
      datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
  };

  $(document).ready(function(){
      datetime = $('#datetime')
      update();
      setInterval(update, 1000);
  });

</script>


  </body>
</html>
