<?php
include('session.php');
include('db.php');
$sql = "SELECT *";
$sql.=" FROM invent_custodian_slip";
$query=mysqli_query($con,$sql);
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
    <title>Inventory Custodian Slip</title>
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
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
         <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-clipboard"></i> Inventory Custodian Slip Management</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>Inventory Custodian Slip Management</li>
          </ol>
        </div>
      </div>
          <div class="panel">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
                     <a class="btn btn-success pull-left" href="" data-toggle="modal" data-target="#AddNewICS"><span class="fa fa-plus-circle"></span> Add ICS Record</a>
                     <a class="btn btn-info pull-right" href="assets/fpdf/ics_general_print.php" target="_blank" title="Print" name="submit"><span class="icon_printer"></span> PRINT</a>
                        
                          </header>
                         
                    
                    <div >
      <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
          <thead>
            <tr>
              <th>Date Encode</th>
              <th>ICS#</th>
              <th>Receive By</th>
              <th>Position</th>
              <th>Date</th>
              <th>Description</th>
              <th>Action</th>
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
              <th></th>
            </tr>
          </tfoot>
          <tbody>
          <?php 
           while( $row=mysqli_fetch_array($query) ) 
           { 

           $icsID = $row['ID'];
          ?>
            <tr>
              <td><?php echo $row['DateAdded'];?></td>
              <td><?php echo $row['ICS'];?></td>
              <td><?php echo $row['ReceivedBy_Name'];?></td>  
              <td><?php echo $row['ReceivedBy_Position'];?></td>
              <td><?php echo $row['ReceiveBy_Date'];?></td>
              <td><?php echo $row['Descrp'];?></td>
              <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary">Action</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="ics_view.php?icsID=<?php echo $icsID; ?>">View</a></li>
                  <li><a href="ics_edit.php?icsID=<?php echo $icsID; ?>">Edit</a></li>
                  <li><a href="assets/fpdf/ics_print.php?icsID=<?php echo $icsID; ?>" target="_blank">Print</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a data-toggle="modal" data-target="#delete<?php echo $icsID; ?>">Delete</a></li>
                </ul>
              </div>
              </td>

            </tr>

                                   <!-- Delete Modal  -->
                                  <div id="delete<?php echo $icsID; ?>" class="modal fade" role="dialog">
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
                                          <a class="btn btn-success" href="ics_delete_action.php?icsID=<?php echo $icsID; ?>">DELETE</a>
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







  <!-- ADD FORM Modal -->
<div id="AddNewICS" class="modal fade " role="dialog">
  <div class="modal-dialog" style="width: 1000px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inventory Custodian Slip Form</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
                         <header class="panel-heading">
                             <H1><center>INVENTORY CUSTODIAN SLIP<br></center></H1>
                             
                          </header>
                <section class="panel">
                        <header class="panel-heading">
                         Client Info:
                         </header>
                    <div class="panel-body">
                     <form class="form-horizontal " method="post" action="ics_add_action.php"> 
                              <label class="col-sm-3 control-label pull-right"><strong><input type="text" name="custodian_slip_ICS" class="form-control" placeholder="ICS Number"></strong></label>
                              <br> <br> <br>
                            <table class="table table-striped table-advance table-hover ">  
                            <tr>
                                <th class="col-sm-1"><i class="icon_clipboard"></i> Quantity</th>
                                <th class="col-sm-1"><i class="icon_datareport_alt "></i> Unit</th>
                                <th class="col-sm-4"><i class="icon_chat_alt"></i> Description</th>
                                <th class="col-sm-2"><i class="icon_id"></i> Inventory Item No.</th>
                                <th class="col-sm-2"><i class="icon_hourglass"></i> Estimated Useful Life</th>
                              </tr>
                              <tr>
                                <td><input type="text" name="custodian_slip_qty" class="form-control"  required="" placeholder="Qty" onkeyup="numberInputOnly(this);"></td>
                                <td><select  name="custodian_slip_unit" class="form-control" required="" value="custodian_slip_unit">
                                  <option value="unit">Unit</option>
                                  <option value="pc">Pc.</option>
                                </select></td>
                                <td><input type="text" name="custodian_slip_descrp" class="form-control"  required="" placeholder="Description"></td>
                                <td><input type="text" name="custodian_slip_inventItemNo" class="form-control"  required="" placeholder="Inventory Item No." onkeyup="numberInputOnly(this);"></td>
                                <td><input type="text" name="custodian_slip_EzLife" class="form-control"  required="" placeholder="Estimated Useful Life" ></td>
                              </tr>
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
                                                    <input type="text"  class="form-control" placeholder="Name" name="custodian_slip_receiveBy_name"  required="" onkeyup="letterInputOnly(this);">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position" name="custodian_slip_receiveBy_position"  required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-3">
                                                    <input type="date"  class="form-control" placeholder="date" name="custodian_slip_receiveBy_date"  required="">
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
                                                    <input type="text"  class="form-control" placeholder="Name" name="custodian_slip_receiveFrom_name"  required="" onkeyup="letterInputOnly(this);">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position" name="custodian_slip_receiveFrom_position"  required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-3">
                                                    <input type="date"  class="form-control" placeholder="date" name="custodian_slip_receiveFrom_date" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-1">  
                                                    <input class="btn btn-success "  type="submit" name="Submit" value="Submit"> 

                                                </div><div class="col-sm-2">  
                                                    <input class="btn btn-danger "  type="submit" name="Cancel" value="Cancel" data-dismiss="modal"> 
                                                </div>
                                            </div>
                                            <div>
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


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php include ('footer.php');?>  