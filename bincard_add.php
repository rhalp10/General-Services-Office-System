<?php
include('session.php');

$ID =$_REQUEST['ID'];
$result = mysql_query("SELECT * FROM emp_pgc_record WHERE accID = '$ID'");
$test = mysql_fetch_array($result);
$rows = mysql_num_rows($result);
                $emp_pgc_record_accID=$test['accID'];
                $emp_pgc_record_fullname=$test['fullName'] ;
                $emp_pgc_record_office=$test['office'];
                $emp_pgc_record_designation=$test['designation'] ;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>Bincard Add</title>

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
                      <a class="" href="accounts.php">
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
          <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-table"></i><a href="bincard.php">Bincard</a></li>
            <li><i class="fa fa-table"></i><a href="bincard.php">Add Bincard</a></li>
          </ol>
        </div>
      </div>
              <!-- page start-->
              
              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <H1><center>BINCARD<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                          <form class="form-horizontal " method="post" action="bincard_acc_action.php"> <!--Form for the receipt -->
                          <br>
                          <table class="table table-striped table-advance table-hover ">
                           <tbody class="col-sm-12">
                              <tr >
                                 <th class="col-sm-1"><i class="icon_calendar"></i> Date</th>
                                 <th class="col-sm-1"><i class="icon_profile"></i> Supplier</th>
                                 <th class="col-sm-4"><i class="icon_documents_alt"></i> Description</th>
                                 <th class="col-sm-1"><i class="icon_drawer_alt"></i> Serial Number</th>
                                 <th class="col-sm-1"><i class="icon_creditcard"></i> Recipient</th>
                                 
                                 
                              </tr>
                              <tr>
                                <td><input type="date" name="bincard_rec_date" class="form-control"></td>
                                <td><input type="text" name="bincard_rec_supplier" class="form-control"></td>
                                <td><input type="text" name="bincard_rec_desc" class="form-control"></td>
                                <td><input type="text" name="bincard_rec_sn" class="form-control"></td>
                                <td><input type="text" name="bincard_rec_recpnt" class="form-control"></td>
                              </tr>
                           </tbody>
                          
                          

                        </table>
                         <table class="table table-striped table-advance table-hover ">
                           <tbody class="col-sm-12">
                                <tr>
                                 <th class="col-sm-1"><i class="icon_clipboard"></i> Qty</th>
                                 <th class="col-sm-1"><i class="icon_document"></i> Issued</th>
                                 <th class="col-sm-1"><i class="icon_creditcard"></i> Bal</th>
                                 </tr>
                              <tr>
                                <td><input type="text" name="bincard_rec_qty" class="form-control"></td>
                                <td><input type="text" name="bincard_rec_issued" class="form-control"></td>
                                <td><input type="text" name="bincard_rec_bal" class="form-control"></td>
                                
                              </tr>
                           </tbody>
                          
                          

                        </table>
                        
                       <hr>
                          <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                       Receive By:
                                    </header>
                                    <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-2">
                                                    <input type="date"  class="form-control" placeholder="date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-2">
                                                    
                                                </div>
                                            </div>
                                           
                                          
                                       
                                    </div>
                                </section>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                       Receive From:
                                    </header>
                                    <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-2">
                                                    <input type="date"  class="form-control" placeholder="date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-2">
                                                     <a class="btn btn-success " href="" title="submit" name="submit"><span class="icon_check_alt"></span> SUBMIT</a>
                                                </div>
                                            </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                        </form><!--End of Form for the receipt -->
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


  </body>
</html>
