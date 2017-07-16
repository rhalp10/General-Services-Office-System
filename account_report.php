<?php
include('session.php');

include('db.php');
$totalresult = mysql_query("SELECT * FROM emp_accounts_record");
$totalAcc = mysql_num_rows($totalresult);
$adminresult = mysql_query("SELECT * FROM emp_accounts_record WHERE accLevel = 0");
$totaladmin = mysql_num_rows($adminresult);
$empresult = mysql_query("SELECT * FROM emp_accounts_record WHERE accLevel = 1 or accLevel = 2 or accLevel = 3");
$totalemp = mysql_num_rows($empresult);

$totalValue = 500;
$currentValue = 30;

$AdminPercentage=($totaladmin / $totalAcc) * 100; 
$EmployeePercentage=($totalemp / $totalAcc) * 100; 

$AdminPercentageJS="$AdminPercentage";
$js_outAdmin = json_encode($AdminPercentageJS);
$EmployeePercentageJS="$EmployeePercentage";
$js_outEmp = json_encode($EmployeePercentageJS);

$sql = "SELECT *";
$sql.=" FROM emp_accounts_record";
$query=mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>Account Management Report</title>

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

    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">

  <script src="js/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

    <style>
      canvas{
      }
    </style>
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
                          <li><a class="" href="ics.php">Custodian Slip</a></li>
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
					<h3 class="page-header"><i class="fa fa fa-clipboard"></i> ACCOUNT MANAGEMENT REPORT</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
						<li><i class="fa fa-clipboard"></i>Account Management Report</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="column">
                <div class="col-sm-3">
                  <canvas id="canvas" height="250" width="250"></canvas>
                    <div class="row">
                      <div class="col-sm-12">
                     <?php 
                      echo "Admin: <b>$totaladmin</b> &nbsp;";
                      echo "Employee: <b>$totalemp</b>&nbsp;";
                      echo "Total Registered Account: <b>$totalAcc</b>";
                     ?>
                     </div>
                    </div>
                </div>
              </div>
              
             <div class="column">
             <div class="col-sm-9">
             <table id="myData"  class="table table-bordered table-advance table-hover ">
                                <thead>
                                  <tr>
                                      <th class="col-sm-2"> Name</th>
                                      <th class="col-sm-1"> Age</th>
                                      <th class="col-sm-1"> Gender</th>
                                      <th class="col-sm-1"> Username</th>
                                      <th class="col-sm-3"> Email</th>
                                      <th class="col-sm-3"> Address</th>
                                      <th class="col-sm-1"> Mobile #</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                while( $row=mysql_fetch_array($query) ) { 
                                $accID = $row['accID'];
                                ?>
                                  <tr>
                                    <td><?php echo $row["fullName"];?></td>
                                    <td><?php echo $row["Age"];?></td>
                                    <td><?php echo $row["Gender"];?></td>
                                    <td><?php echo $row["username"];?></td>
                                    <td><?php echo $row["Email"];?></td>
                                    <td><?php echo $row["Address"];?></td>
                                    <td><?php echo $row["Mobile"];?></td>
                                    
                                  </tr>
                                  <?php 
                                  }
                                  ?>
                                </tbody>
                              </table>
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
                -->
            </div>
        </div>
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script>

    var adminPercent = <?php echo $js_outAdmin; ?>;
    var empPercent = <?php echo $js_outEmp; ?>;
    var adminParse = parseInt(adminPercent);
    var empParse = parseInt(empPercent);
    var a = adminParse;
    var b = empParse;
    var pieData = [
        {
          value: a,
          color:"#f33030"
        },
        {
          value : b,
          color : "#00a0df"
        }
      
      ];

  var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
  
  </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">

      $('#myData').dataTable();
    </script>

  </body>
</html>
