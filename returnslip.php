<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>Property Return Slip</title>

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

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-clipboard"></i> PROPERTY RETURN SLIP</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>Property Return Slip</li>
          </ol>
        </div>
      </div>
              <!-- page start-->
              
              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <H1><center>PROPERTY RETURN SLIP<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                          <form class="form-horizontal " method="post" action="returnslip_add_action.php"> <!--Form for the receipt -->
                          <br>
                           <div class="form-group">
                                <label class="col-sm-3 control-label">Name of Local Government Unit:</label>
                                    <div class="col-sm-7">
                                    <input type="text" name="prop_return_slip_lguName" class="form-control" name="prop_return_slip_nameLGU" required="">
                                    </div>
                            </div>
                           <div class="form-group">
                                <label class="col-sm-3 control-label">Purpose</label>
                                    <div class="col-sm-2">
    
                                    
                                     <select class="form-control" name="prop_return_slip_purpose" required="">
                                            <?php 
                                            $result=mysql_query("SELECT Pupose_Type FROM prs_purpose_dictionary");
                                          
                                            while($test = mysql_fetch_array($result))
                                            {
                                            ?>
                                              <option value="<?php echo $test['Pupose_Type']?>"><?php echo $test['Pupose_Type']?></option> 
                                             <?php 
                                           }
                                             ?>
                                          </select>
                                    </div>
                                     
                            </div>
                          <table class="table table-striped table-advance table-hover ">
                           <tbody class="col-sm-12">
                              <tr >
                                 <th class="col-sm-1"><i class="icon_clipboard"></i> Quantity</th>
                                 <th class="col-sm-1"><i class="icon_profile"></i> Unit</th>
                                 <th class="col-sm-4"><i class="icon_lock_alt"></i> Description</th>
                                 <th class="col-sm-1"><i class="icon_mail_alt"></i> Serial Number</th>
                                 <th class="col-sm-1"><i class="icon_mail_alt"></i> Property No.</th>
                                 
                                 
                              </tr>
                              <tr>
                                <td><input type="text" name="prop_return_slip_qty" class="form-control"></td>
                                <td><input type="text" name="prop_return_slip_unit" class="form-control"></td>
                                <td><input type="text" name="prop_return_slip_descrp" class="form-control"></td>
                                <td><input type="text" name="prop_return_slip_serialnum" class="form-control"></td>
                                <td><input type="text" name="prop_return_slip_propno" class="form-control"></td>
                              </tr>
                           </tbody>
                          
                          

                        </table>
                         <table class="table table-striped table-advance table-hover ">
                           <tbody class="col-sm-12">
                                <tr>
                                 <th class="col-sm-1"><i class="icon_mail_alt"></i> M.R. No.</th>
                                 <th class="col-sm-1"><i class="icon_mail_alt"></i> Name Of End-User</th>
                                 <th class="col-sm-1"><i class="icon_mail_alt"></i> Unit Vaule</th>
                                 <th class="col-sm-1"><i class="icon_mail_alt"></i> Total Value</th></tr>
                              <tr>
                                <td><input type="text" name="prop_return_slip_mrno" class="form-control" required=""></td>
                                <td><input type="text" name="prop_return_slip_NameOfEndUser" class="form-control" required=""></td>
                                <td><input type="" name="prop_return_slip_UnitValue" class="form-control" required=""></td>
                                <td><input type="text" name="prop_return_slip_TotalValue" class="form-control" required=""></td>
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
                                                    <input type="text"  class="form-control" placeholder="Name" name="prop_return_slip_receiveBy_Name" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position" name="prop_return_slip_receiveBy_Position" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-2">
                                                    <input type="date"  class="form-control" placeholder="date" name="prop_return_slip_receiveBy_Date" required="">
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
                                                    <input type="text"  class="form-control" placeholder="Name" name="prop_return_slip_receiveFrom_Name" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position" name="prop_return_slip_receiveFrom_Position" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-2">
                                                    <input type="date"  class="form-control" placeholder="date" name="prop_return_slip_receiveFrom_Date" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-2">
                                                    <input class="btn btn-success "  type="submit" name="Submit" value="Submit"> 
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
      <div class="text-right">
            <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                    <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                -->
                x
            </div>
        </div>
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>
</html>
