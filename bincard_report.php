<?php
include('session.php');

include('db.php');
$sql = "SELECT *";
$sql.=" FROM bincard_record";
$query = mysql_query($sql);
 $page = "Report";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>BIN Card Report</title>
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
          <h3 class="page-header"><i class="fa fa-clipboard"></i> Bincard Management</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>Bincard Management</li>
          </ol>
        </div>
      </div>
          <div class="panel">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
                     
                     <a class="btn btn-info pull-right" href="assets/fpdf/bincard_report.php" target="_BLANK">Print Bincard</a>
                        
                          </header>
                         
                    
                    <div>
      <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
          <thead >
            <tr>
                <th>Date</th>
                <th>Supplier</th>
                <th>Description</th>
                <th>Qty</th>
               <th>Issued</th>
               <th>Balance</th>
              <th class="col-sm-1">Action</th>
            </tr>
          </thead>
          <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tfoot>
          <tbody>
            <?php 
            while( $row=mysql_fetch_array($query)) {  
              $ID = $row['ID'];
            ?>
            <tr>
              <td><?php echo  $row["bin_Date"];?></td>
              <td><?php echo  $row["Supplier"];?></td>
              <td><?php echo  $row["Descrp"];?></td>
              <td><?php echo  $row["Qty"];?></td>
              <td><?php echo  $row['Issued'];?></td>
              <td><?php echo  $row["Balance"];?></td>
              <td><a class="btn btn-primary" href="bincard_report_view.php?ID=<?php echo $ID; ?>">View</a>
                </td>
              </td>
            </tr>
            <?php 
            }
            ?>
          </tbody>
      </table>
    </div>

          
            </div>
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