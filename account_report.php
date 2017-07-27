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

 $page = "Report";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>Account Management Report</title>
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
					<h3 class="page-header"><i class="fa fa fa-clipboard"></i> ACCOUNT MANAGEMENT REPORT</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
						<li><i class="fa fa-clipboard"></i>Account Management Report</li>
					</ol>
          
                           <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
                     
                        <a class="btn btn-info pull-right" href="assets/fpdf/account_report.php" target="_blank" title="Print" name="submit"><span class="icon_printer"></span> PRINT</a>
                          
                          </header>
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
             <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
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
<?php include ('footer.php');?>