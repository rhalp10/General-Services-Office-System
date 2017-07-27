 <?php
include('session.php');
$ID = $_REQUEST['ID'];
include ('db.php');
              $sql = "SELECT *";
              $sql.=" FROM bincard_issued_record WHERE bin_ID = $ID";
              $query = mysql_query($sql);
              $sql1 = "SELECT *";
              $sql1.=" FROM bincard_record WHERE ID = $ID";
              $query1 = mysql_query($sql1);
              $row1=mysql_fetch_array($query1);
              $balance = $row1['Qty'];
              $totalQty = $row1['Qty'];
              $balanceUpdate =  $row1['Qty'];
              $Count = mysql_num_rows($query);
              $issuedCount = 0;
              $issuedUpdate = 0;
 $page = "Report";
              ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>BIN Card Issued</title>
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
            <li><i class="fa fa-clipboard"></i><a href="bincard_report.php">Bincard Report</a></li>
            <li><i class="fa fa-clipboard"></i>Issued Item</a></li>
          </ol>
        </div>
      </div>
          <div class="panel">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
         
                      <a class="btn btn-info pull-right" href="assets/fpdf/bincard_view_report.php?ID=<?php echo $ID;?>" target="_blank">Print Bincard</a>
                        
                          </header>
                         
                    
                    <div>
      <table class="table table-striped table-bordered table-hover" id="myData">
      <thead>
        <tr>
          <th>Date</th>
          <th>Description</th>
          <th>Recipient</th>
          <th>Qty</th>
          <th>Balance</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        
      </tfoot>
      <tbody>
        
         <?php 
              

              while( $row=mysql_fetch_array($query)) 
              {

                $issuedCount = $issuedCount+1; 
                $balance = $balance - $row["qty"];
                $issued_ID = $row['ID'];
              ?>
              <tr>
                <td><?php echo $row['issued_date'];?></td>
                <td><?php echo $row1["Descrp"];?></td>
                <td><?php echo $row["recpnt"];?></td>
                <td><?php echo $row["qty"];?></td>
                <td><?php echo $balance ;?></td>
                
              </tr>
              <?php 

              //$issuedUpdate = $issuedUpdate+$row['qty']; 
             // $balanceUpdate = $balanceUpdate - $issuedUpdate;
              //$sqlUpdate = "UPDATE  bincard_record";
              //$sqlUpdate = " SET  Issued =  '$issuedUpdate', Balance = ' $balanceUpdate' WHERE  ID = '$ID'";
              //$updateRes = mysql_query($sqlUpdate);
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




  <!-- Modal -->
<div id="myModal" class="modal fade " role="dialog">
  <div class="modal-dialog" style="width: 800px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Issued Item</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
                         <header class="panel-heading">
                             <H1><center>BINCARD<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                <section class="panel">
                        <header class="panel-heading">
                         Client Info:
                         </header>
                    <div class="panel-body">
                     <form action="bincard_view_add_new_action.php?ID=<?php echo $ID ?>" method="post" name="form1">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>DATE</b></label>
                            <div class="col-sm-10">
                                <input type="date"  class="form-control" placeholder="Bin Date" name="binitem_issued_date" required="">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>RECIPIENT</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Supplier" name="binitem_issued_recpnt" required="">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>QUANTITY</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Quantity" name="binitem_issued_qty" required="">
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                
                    <input class="btn btn-success "  type="submit" name="Submit" value="Submit"> 
                            </div>
                        </div>
                    </form>
                    </div>
                </section>
            </div>

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php include ('footer.php');?>