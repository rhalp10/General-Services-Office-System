<?php
include('session.php');
$ID = $_REQUEST['ID'];

$result = mysqli_query($con,"SELECT * FROM property_accountability_receipt_record WHERE ID = '$ID'");
$test = mysqli_fetch_array($result);
$rows = mysqli_num_rows($result);
  $Qty = $test['Qty'];
  $Unit = $test['Unit'];
  $Descrp = $test['Descrp'];
  $PropNo = $test['PropNo'];
  $ReceivedFrom_Name = $test['ReceivedFrom_Name'];
  $ReceivedFrom_Position = $test['ReceivedFrom_Position'];
  $ReceivedFrom_Date = $test['ReceivedFrom_Date'];
  $ReceivedBy_Name = $test['ReceivedBy_Name'];
  $ReceivedBy_Position = $test['ReceivedBy_Position'];
  $ReceivedBy_Date = $test['ReceivedBy_Date'];
  $PAR = $test['PAR'];
 $page = "Report";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>Property Accountability Receipt</title>
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

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-clipboard"></i> PROPERTY ACCOUNTABILITY RECEIPT</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i><a href="accreceipt_report.php">Property Accountability Receipt</a></li>
            <li><i class="fa fa-clipboard"></i>Property Accountability Receipt View</li>
          </ol>
        </div>
      </div>
              <!-- page start-->
              
              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                       <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;"> 
                     <a class="btn btn-info pull-right" href="assets/FPDF/accreceipt_print.php?ID=<?php echo $ID;?>" target="_BLANK"><span class="icon_printer"></span> PRINT</a>
                        <!-- 
                     <a class="btn btn-info pull-right" href="" data-toggle="modal" data-target="#PrintMethod" ><span class="icon_printer"></span> PRINT</a>
                        -->
                          </header>
                          <header class="panel-heading">
                             <H1><center>PROPERTY ACCOUNTABILITY RECEIPT<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                          <form class="form-horizontal " method="post" action="accreceipt_add_action.php"> <!--Form for the receipt -->
                           <div class="form-group pull-right" style="margin-right: 25px;">
                                    <div class="col-sm-12">
                                        <label class="control-label"><b>PAR:</b> <?php echo $PAR;?></label>
                                    </div>
                            </div>
                          <table class="table table-bordered table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_clipboard"></i> Quantity</th>
                                 <th><i class="icon_datareport_alt"></i> Unit</th>
                                 <th><i class="icon_documents_alt"></i> Description</th>
                                 <th><i class="icon_drawer_alt"></i> Property No.</th>
                                 
                                 
                              </tr>
                              <tr>
                                <td><label class="control-label"><?php echo $Qty;?></label></td>
                                <td><label class="control-label"><?php echo $Unit;?></label></td>
                                <td><label class="control-label"><?php echo $Descrp;?></label></td>
                                <td><label class="control-label"><?php echo $PropNo;?></label></td>
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
                                                    <td><label class="control-label"><?php echo $ReceivedBy_Name;?></label></td>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <td><label class="control-label"><?php echo $ReceivedBy_Position;?></label></td>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-2">
                                                    <td><label class="control-label"><?php echo $ReceivedBy_Date;?></label></td>
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
                                                    <td><label class="control-label"><?php echo $ReceivedFrom_Name;?></label></td>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <td><label class="control-label"><?php echo $ReceivedFrom_Position;?></label></td>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-2">
                                                    <td><label class="control-label"><?php echo $ReceivedFrom_Date;?></label></td>
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

<?php include ('footer.php');?>