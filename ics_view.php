 <?php
include('session.php');

$icsID =$_REQUEST['icsID'];
$result = mysql_query("SELECT * FROM invent_custodian_slip WHERE ID = '$icsID'");
$test = mysql_fetch_array($result);
$ICS=$test['ICS'];
      $Qty=$test['Qty'];
      $Unit=$test['Unit'];
      $Descrp=$test['Descrp'];
      $Invent_Item_No=$test['Invent_Item_No'];
      $Ez_Useful_Life=$test['Ez_Useful_Life'];
      $ReceivedBy_Name=$test['ReceivedBy_Name'];
      $ReceivedBy_Position=$test['ReceivedBy_Position'];
      $ReceivedBy_Date=$test['ReceiveBy_Date'];
      $ReceivedFrom_Name=$test['ReceivedFrom_Name'];
      $ReceivedFrom_Position=$test['ReceivedFrom_Position'];
      $ReceivedFrom_Date=$test['ReceiveFrom_Date'];
                            
if ($login_level != '0' ) 
{
    if ($login_level == '4') {
      # code...
    }
    else
    {
    header("location: index.php");
    }
}
else
{

}
$page = "Record";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>ICS View</title>
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
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa fa-clipboard"></i>Inventory Custodian Slips VIEW</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i><a href="ics.php">Inventory Custodian Slip Management</a></li>
            <li><i class="fa fa-clipboard"></i>Inventory Custodian Slip View</li>

          </ol>
        </div>
      </div>
              <!-- page start--> 
              
        <div class="row">
          <div class="col-lg-12">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
          <a class="btn btn-success pull-left" href="" data-toggle="modal" data-target="#AddICSItem"><span class="fa fa-plus-circle"></span> Add ICS Item Detail</a>
          <a class="btn btn-info pull-right" href="assets/fpdf/ics_print.php?icsID=<?php echo $icsID; ?>" target="_blank"><span class="icon_printer"></span> PRINT</a>
           </header>
                         <header class="panel-heading">
                             <H1><center>INVENTORY CUSTODIAN SLIP<br></center></H1>
                             
                          </header>
                <section class="panel">

                        <header class="panel-heading">
                         Client Info:
                         </header>
                    <div class="panel-body">
                     <form class="form-horizontal " method="post" > 
                              <label class="col-sm-3 control-label pull-right"><strong>
                                <label class="control-label"><b>ICS:</b> <?php echo $ICS; ?>
                                </label></strong></label>
                              <br> <br> <br>
                            <table class="table table-bordered table-advance table-hover  dataTable">  
                            <tr>
                                <th class="col-sm-1"><i class="icon_clipboard"></i> Quantity</th>
                                <th class="col-sm-1"><i class="icon_datareport_alt "></i> Unit</th>
                                <th class="col-sm-4"><i class="icon_chat_alt"></i> Description</th>
                                <th class="col-sm-2"><i class="icon_id"></i> Inventory Item No.</th>
                                <th class="col-sm-2"><i class="icon_hourglass"></i> Estimated Useful Life</th>
                              </tr>
                              <tr>
                                <td>
                                 <label class="control-label"><?php echo $Qty; ?>
                                 </label></td>
                                <td>
                                <label class="control-label"><?php echo $Unit; ?>
                                </label></td>
                                <td>
                                <label class="control-label"><?php echo $Descrp; ?>
                                </label></td>
                                <td>
                                <label class="control-label"><?php echo $Invent_Item_No; ?>
                                </label></td>
                                <td>
                                <label class="control-label"><?php echo $Ez_Useful_Life; ?>
                                </label></td>
                              </tr>
                              <?php 
                              $res1 = mysql_query("SELECT * FROM invent_custodian_slip_descrp where icsID = '$icsID' ");

                              while ($row = mysql_fetch_array($res1))
                              {
                              ?>
                              <tr>
                                <td>
                                 <label class="control-label">
                                 </label></td>
                                <td>
                                <label class="control-label">
                                </label></td>
                                <td>
                                <label class="control-label"><?php echo $row['Descrp'];  ?>
                                </label></td>
                                <td>
                                <label class="control-label"><?php echo $row['Invent_Item_No']; ?>
                                </label></td>
                                <td>
                                <label class="control-label">
                                <a class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['ID']; ?>"> Delete</a>
                                </label></td>
                              </tr>

                                 <!-- Delete Modal  -->
                                <div id="delete<?php echo $row['ID']; ?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Account</h4>
                                      </div>
                                      <div class="modal-body">
                                      <center>
                                      <h1>Are you sure ?</h1>
                                        <a class="btn btn-success" href="ics_view_desc_delete_action.php?ID=<?php echo $row['ID']; ?>">DELETE</a>
                                        <a class="btn btn-danger"  data-dismiss="modal">CANCEL</a>
                                        </center>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div><!-- End Delete Modal  -->

                              <?php  
                               }
                              ?>
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
                                                <label class="control-label"><?php echo $ReceivedBy_Name; ?>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <label class="control-label"><?php echo $ReceivedBy_Position; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-3">
                                                    <label class="control-label"><?php echo $ReceivedBy_Date; ?></label>                                                </div>
                                            </div>
                                           
                                          
                                       
                                    </div>
                                </section>
                            </div>
                        </div>              <?php   
                        $result1 = mysql_query("SELECT * FROM organizationchart WHERE ID = '2'");
                        $test1 = mysql_fetch_array($result1);
                        $rFname = $test1['Name'];
                        $rFposition = $test1['Position'];
                        ?>
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
                                                    <td><label class="control-label"><?php echo $rFname;?></label></td>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <td><label class="control-label"><?php echo $rFposition;?></label></td>
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

                        </form>
                    </div>
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
                -->
            </div>
        </div>
  </section>


<!-- Add ICS Item Modal -->
<div id="AddICSItem" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 800px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Item Description</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="ics_view_add.php?icsID=<?php echo $icsID; ?>" >
          <table class="table table-striped table-advance table-hover ">  
            <tr>
              <th class="col-sm-6"><i class="icon_chat_alt"></i> Description</th>
              <th class="col-sm-6"><i class="icon_id"></i> Inventory Item No.</th>
            </tr>
            <tr>
              <td><input type="text" name="icsView_Desc" class="form-control"></td>
              <td><input type="text" name="icsView_ItemNo" class="form-control"></td>
              
            </tr>
          </table>
          <input class="btn btn-success"  type="Submit" name="Submit" value="Submit">
          <input class="btn btn-danger"  type="Button" name="Cancel" value="Cancel" data-dismiss="modal">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <!-- container section end -->
<?php include ('footer.php');?>  
    <script type="text/javascript">
      var dateControl = document.querySelector('input[type="date"]');
dateControl.value = '<?php echo "$bin_Date";?>';
    </script>
  