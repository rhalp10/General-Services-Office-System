<?php
include('session.php');
$result = mysql_query("SELECT * FROM emp_accounts_record WHERE username  = '$login_session'");
$test = mysql_fetch_array($result);
$rows = mysql_num_rows($result);
                $Emp_ID=$test['accID'];
                $accLevel=$test['accLevel'];
                $username=$test['username'] ;
                $password= $test['password'] ;                  
                $email=$test['Email'] ;
                $fullname=$test['fullName'] ;
                $age=$test['Age'];
                $gender=$test['Gender'] ;
                $contact=$test['Mobile'] ;
                $address=$test['Address'] ;
                $position=$test['Pos'] ;
                $img_profile=$test['image'];
                if ($accLevel == '0') {
                    $Level = 'Admin';
                    
                }
                elseif ($accLevel = '1') {
                    $Level = 'Employee';
                    
                }

                elseif ($accLevel = '2') {
                    $Level = 'other';
                    
                }
                else {
                     
                }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>Profile</title>

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

  <body onload="UpdateTime()">
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
                  <li class="active">
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
                          <li><a class="" href="ics.php">Custodian Slip</a></li>
                      </ul>
                  </li>
                             
                  <li class="">
                      <a class="" href="emplist.php">
                          <i class="icon_clipboard"></i>
                          <span>Employee  List</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="" href="office.php">
                          <i class="icon_building_alt"></i>
                          <span>Office  List</span>
                      </a>
                  </li>
                  <li class="sub-menu ">
                      <a href="javascript:;" class="">
                          <i class="icon_datareport"></i>
                          <span>Report</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                           
                          <li><a class="" href="account_report.php">Account</a></li>
                          <li><a class="" href="acccard_report.php">PGC Account Card</a></li>
                          <li><a class="" href="accreceipt_report.php">Accountability Receipt</a></li>
                          <li><a class="" href="returnslip_report.php">Return Slip</a></li>
                          <li><a class="" href="bincard_report.php"><span>Bincard</span></a></li>
                          <li><a class="" href="ics_report.php">Custodian Slip</a></li>
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
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="fa fa-user-md"></i>Profile</li>
                    </ol>
                </div>
            </div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-3">
                              <h4><?php echo $fullname; ?></h4>               
                              <div class="follow-ava">
                                  <img src="img/avatar-mini2.jpg" alt="">
                              </div>
                              <h6><?php echo $position; ?></h6>
                            </div>
                            <div class="col-lg-10 col-sm-09 follow-info">
                                
                                <h6>
                                     <span><i class="icon_pin_alt"></i><?php echo $address; ?> </span><br>
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
                                  
                                  <li>
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  
                                  <div id="profile" class="tab-pane active">
                                    <section class="panel">
                                      <div class="bio-graph-heading">
                                               
                                      </div>
                                      <div class="panel-body bio-graph-info">
                                          <h1>Bio Graph</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>Full Name </span>: <?php echo $fullname; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Age </span>: <?php echo $age; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Position</span>: <?php echo $position; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Email </span>:<?php echo $email; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Mobile </span>: <?php echo $contact; ?></p>
                                              </div>
                                              
                                          </div>
                                      </div>
                                    </section>
                                      <section>
                                          <div class="row">                                              
                                          </div>
                                      </section>
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                              <form class="form-horizontal" role="form" action="profile_edit_action.php?accID=<?php echo "$Emp_ID";?>" method="post">                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Full Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="f-name" placeholder=" " name="profile_edit_name" required="" value="<?php echo "$fullname";?>"> 
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Old Password</label>
                                                      <div class="col-lg-5">
                                                          <input type="password" class="form-control" id="b-day" placeholder=" " name="profile_edit_password" required="" value="<?php echo $password ?>" disabled>
                                                      </div>
                                                           <label class="col-lg-1"><a type="button" data-toggle="modal" data-target="#passEdit">Change</a></label>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Age</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="occupation" placeholder=" " name="profile_edit_age" required="" value="<?php echo "$age";?>">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Gender</label>
                                                      <div class="col-lg-6">
                                                          
                                                          <select type="text" class="form-control" id="gender" placeholder=" " name="profile_edit_gender" required="" value="<?php echo "$gender"; ?>">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email</label>
                                                      <div class="col-lg-6">
                                                          <input type="email" class="form-control" id="email" placeholder=" " name="profile_edit_email" required="" value="<?php echo "$email"; ?>">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Position</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="occupation" placeholder=" " name="profile_edit_position" required="" value="<?php echo "$position"; ?>">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Address</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="occupation" placeholder=" " name="profile_edit_address" required="" value="<?php echo "$address"; ?>">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Mobile #</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="mobile" placeholder=" " name="profile_edit_mobile" required="" value="<?php echo "$contact"; ?>">
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                         <input class="btn btn-success"  type="submit" name="ProfileEdit" value="Update">
                                                          <button href="profile.php" type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </section>
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






  
<!-- Modal -->
<div id="passEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" action="profile_pass_edit_action.php?accID=<?php echo "$Emp_ID";?>" method="post">
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">Old Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" class="form-control" id="password" placeholder="Type your old Password" name="profile_edit_oldpass" required="" value="">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">New Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" class="form-control" id="password" placeholder="Type Your New Password" name="profile_edit_password" required="" value="">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">Confirm Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" class="form-control" id="password" placeholder="Confirm Your Password" name="profile_edit_repassword" required="" value="">
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                         <input class="btn btn-primary"  type="submit" name="ProfileEdit" value="Update">
                                                          <button href="profile.php" type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                                  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery knob -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <!--custome script for all page-->
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