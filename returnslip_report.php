<?php
include('session.php');
include('db.php');
$sql = "SELECT *";
$sql.=" FROM property_return_slip_record";
$query=mysqli_query($con,$sql);
 $page = "Report";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>Property Return Slip</title>
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
          <h3 class="page-header"><i class="fa fa-clipboard"></i> PROPERTY RETURN SLIP</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>Property Return Slip</li>
          </ol>
        </div>
      </div>
              <!-- page start-->
              
          <div class="panel">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;"> 
                    <a class="btn btn-info pull-right" href="assets/FPDF/returnslip_general_print.php" target="_BLANK"><span class="icon_printer"></span> PRINT</a>
                        
                          </header>
                         
                    
                    <div >
      <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
          <thead>
            <tr>
              <th>Date Encoded</th>
              <th>LGU Name</th>
              <th>PurposeID</th>
              <th>Qty/Unit</th>
              <th>Description</th>
              <th>Name of Enduser </th>
              <th>ReceiveBy Name</th>
              <th>ReceiveBy Date</th>
              <th>Status</th>
              <th class="col-sm-1">Action</th>
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
              <th></th>
            </tr>
          </tfoot>
          <tbody>
          <?php 
           while( $row=mysqli_fetch_array($query) ) 
           { 

           $ID = $row['ID'];
          ?>
            <tr>
              <td><?php echo $row['DateAdded'];?></td>
              <td><?php echo $row['LGU_Name'];?></td>
              <td><?php 
              $purposeSQL ="SELECT *";
              $purposeSQL.="  FROM prs_purpose_dictionary";
              $purposeRes = mysqli_query($con,$purposeSQL);
              while($purposeVal=mysqli_fetch_array($purposeRes)) 
              {
                if ($row['PurposeID'] == $purposeVal['ID']) 
                {
                 echo $purposeVal['Purpose_Type'];
                }
                
              }
              ?></td>
              <td><?php echo $row['Qty']." ".$row['Unit'];?></td>
              <td><?php echo $row['Descrp'];?></td>
              <td><?php echo $row['Name_of_Enduser'];?></td>
              <td><?php echo $row['ReceiveBy_Name'];?></td>
              <td><?php echo $row['ReceiveBy_Date'];?></td>
              <td><?php echo $row['Status'];?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Action</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="returnslip_report_view.php?ID=<?php echo $ID; ?>">View</a></li>
                    <li><a href="assets/fpdf/returnslip_report.php?ID=<?php echo $ID?>" target="_BLANK">Print</a></li>
                    
                  </ul>
                </div>
                </td>
              </tr>
            </tr>

               <!-- Delete Modal  -->
              <div id="delete<?php echo $ID; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete Account Receipt</h4>
                    </div>
                    <div class="modal-body">
                    <center>
                    <h1>Are you sure ?</h1>
                      <a class="btn btn-success" href="return_slip_delete_action.php?prsID=<?php echo $ID; ?>">DELETE</a>
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



  <!-- Modal -->
<div id="AddPropSlip" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 1500px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        
              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <H1><center>PROPERTY RETURN SLIP<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                          <form class="form-horizontal " method="POST" action="returnslip_add_action.php"> <!--Form for the receipt -->
                          <br>
                           <div class="form-group">
                                <label class="col-sm-3 control-label">Name of Local Government Unit:</label>
                                    <div class="col-sm-7">
                                    <input type="text" name="prop_return_slip_lguName" class="form-control" name="prop_return_slip_nameLGU" required="" placeholder="Name of Local Government Unit">
                                    </div>
                            </div>
                           <div class="form-group">
                                <label class="col-sm-3 control-label">Purpose</label>
                                    <div class="col-sm-2">
    
                                    
                                     <select class="form-control" name="prop_return_slip_purpose" required="">
                                            <?php 
                                            $result=mysql_query("SELECT * FROM prs_purpose_dictionary");
                                          
                                            while($test = mysql_fetch_array($result))
                                            {
                                            ?>
                                              <option value="<?php echo $test['ID'];?>"><?php echo $test['Purpose_Type'];?></option> 
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
                                 <th class="col-sm-1"><i class="icon_datareport_alt"></i> Unit</th>
                                 <th class="col-sm-4"><i class="icon_chat_alt"></i> Description</th>
                                 <th class="col-sm-1"><i class="icon_easel_alt"></i> Serial Number</th>
                                 <th class="col-sm-1"><i class="icon_id-2"></i> Property No.</th>
                                 
                                 
                              </tr>
                              <tr>
                                <td><input type="text" name="prop_return_slip_qty" class="form-control" placeholder="Qty"   onkeyup="numberInputOnly(this);"></td>
                                <td><select  name="prop_return_slip_unit" class="form-control" required="" value="custodian_slip_unit">
                                  <option value="unit">Unit</option>
                                  <option value="pc">Pc.</option>
                                </select></td>
                                <td><input type="text" name="prop_return_slip_descrp" class="form-control" placeholder="Description"></td>
                                <td><input type="text" name="prop_return_slip_serialnum" class="form-control" placeholder="Serial Number"></td>
                                <td><input type="text" name="prop_return_slip_propno" class="form-control" placeholder="Property Number"></td>
                              </tr>
                           </tbody>
                          
                          

                        </table>
                         <table class="table table-striped table-advance table-hover ">
                           <tbody class="col-sm-12">
                                <tr>
                                 <th class="col-sm-1"><i class="icon_id"></i> PAR. No.</th>
                                 <th class="col-sm-1"><i class="icon_puzzle"></i> Name Of End-User</th>
                                 <th class="col-sm-1"><i class="icon_wallet_alt"></i> Unit Value</th>
                                 <th class="col-sm-1"><i class="icon_currency_alt" ></i> Total Value</th></tr>
                              <tr>
                                <td><input type="text" name="prop_return_slip_par" class="form-control" required="" placeholder="PAR. Number"></td>
                                <td><input type="text" name="prop_return_slip_NameOfEndUser" class="form-control" required="" placeholder="Name Of End-User"   onkeyup="letterInputOnly(this);"></td>
                                <td><input type="" name="prop_return_slip_UnitValue" class="form-control" required="" placeholder="Unit Value" onkeyup="numberInputOnly(this);"></td>
                                <td><input type="text" name="prop_return_slip_TotalValue" class="form-control" required="" placeholder="Total Value" onkeyup="numberInputOnly(this);"></td>
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
                                                    <input type="text"  class="form-control" placeholder="Name" name="prop_return_slip_receiveBy_Name" required=""  onkeyup="letterInputOnly(this);">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position" name="prop_return_slip_receiveBy_Position" required=""  onkeyup="letterInputOnly(this);">
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
                                                    <input type="text"  class="form-control" placeholder="Name" name="prop_return_slip_receiveFrom_Name" required=""  onkeyup="letterInputOnly(this);">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position" name="prop_return_slip_receiveFrom_Position" required=""  onkeyup="letterInputOnly(this);">
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
                                                    <input class="btn btn-success"  type="submit" name="Submit" value="Submit"> 
                                                     <input class="btn btn-danger"  type="submit" name="Cancel" value="Cancel"  data-dismiss="modal">
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <!-- container section end -->

<?php include ('footer.php');?>