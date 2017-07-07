<?php
include('session.php');

$ID =$_REQUEST['accID'];
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
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Add New PGC Account Card</title>

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
         
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
            <li><i class="fa fa-bars"></i><a href="acccard.php">PGC Employee Accountability Card</a></li>
            <li><i class="fa fa-folder"></i><a href="acccard_add.php">PGC Employee Accountability Card Add Data</a></li>
          </ol>
        </div>
      </div>
 
    <form action="acccard_add_action.php?ID=<?php echo $ID ?>" method="post" name="form1">
     


        <div class="row">
        <div class="col-lg-12" >
        <section class="panel">
         <header class="panel-heading">
                             <H1><center>PGC EMPLOYEE ACCOUNTABILITY CARD<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                          <br><br>
        <header class="panel-heading">
                         Info:<div class="panel-heading pull-right"><strong>NOTE: Type &lt;br&gt; for new line </strong></div>
                         </header>

        <table class="table table-striped table-advance table-hover ">
            

            <tr> 
                <td><b>PAR NO#</b></td>
                <td><input type="text" name="pgc_emp_ac_parno"  class="form-control" required ></td>
            </tr>
             <tr>
              <td><b>QUANTITY</b></td>
                <td><input type="text" name="pgc_emp_ac_qty"  class="form-control" required></td>
            </tr>
             <tr>
              <td><b>UNIT</b></td>
                <td><input type="text" name="pgc_emp_ac_unit"  class="form-control" required ></td>
            </tr>
             <tr>
              <td><b>DESCRIPTION</b></td>
                <td><textarea type="text" name="pgc_emp_ac_descrp"  class="form-control"  required></textarea></td>
            </tr>
            <tr>
              <td><b>SERIAL NO#</b></td>
                <td><input type="text" name="pgc_emp_ac_sn"  class="form-control"  class="form-control" required></td>
            </tr>
             <tr>
              <td><b>PROP/ NO#</b></td>
                <td><input type="text" name="pgc_emp_ac_propno"  class="form-control"  class="form-control" required></td>
            </tr>

             <tr>
              <td><b>AMOUNT</b></td>
                <td><input type="text" name="pgc_emp_ac_amount"  class="form-control"  class="form-control" required></td>
            </tr>

             <tr>
              <td><b>TRANSFER TO</b></td>
                <td><input type="text" name="pgc_emp_ac_transferto"  class="form-control" ></td>
            </tr>

             <tr>
              <td><b>REMARKS</b></td>
                <td><input type="text" name="pgc_emp_ac_remarks"  class="form-control" ></td>
            </tr>

             <tr>
              <td ><b>DATE TURN OVER</b></td>
                <td><input type="date" name="pgc_emp_ac_dateturnover"  class="form-control" ></td>
            </tr>
        </table>
        <div style="padding: 15px;">
         <input class="btn btn-success "  type="submit" name="Submit" value="Submit">
         </div>
        </form>
        </section>
        </div>
        </div>  


       

</section></section>
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
