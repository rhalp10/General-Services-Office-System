<?php

include('session.php');
include('db.php');
$sql = "SELECT *";
$sql.=" FROM emp_pgc_record";
$query=mysql_query($sql);
              
if ($login_level != '0' ) 
{
    if ($login_level == '3') {
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
    <title>PGC Account Card</title>
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
          <h3 class="page-header"><i class="fa fa-clipboard"></i> PGC Accountability Card Management</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>PGC Accountability Card Management</li>
          </ol>
        </div>
      </div>
          <div class="panel">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
                     <a class="btn btn-success pull-left" href="" data-toggle="modal" data-target="#AddNewPerson"><span class="fa fa-plus-circle"></span> Add New Person Record</a>
                     <a class="btn btn-info pull-right" href="assets/FPDF/acccard_general_report.php" target="_BLANK"><span class="icon_printer"></span> PRINT</a>
                     <!--
                     <a class="btn btn-info pull-right" href="" data-toggle="modal" data-target="#PrintMethod" ><span class="icon_printer"></span> PRINT</a> -->
                        
                          </header>
                         
                    
                    <div >
      <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Office</th>
              <th>Designation</th>
              <th>Note</th>
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
            </tr>
          </tfoot>
          <tbody>
          <?php 
           while( $row=mysql_fetch_array($query) ) 
           { 

           $accID = $row['accID'];
          ?>
            <tr>
              <td><?php echo $row['fullName'];?></td>
              <td><?php echo $row['office'];?></td>
              <td><?php echo $row['designation'];?></td>
              <td><?php echo $row['note'];?></td>
              <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary">Action</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="acccard_view.php?accID=<?php echo $accID; ?>">View</a></li>
                  <li><a href="assets/fpdf/acccard_person_report.php?accID=<?php echo $accID ?>" target="_BLANK">Print</a></li>
                  <li><a href="acccard_edit.php?accID=<?php echo $accID; ?>">Edit</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a data-toggle="modal" data-target="#delete<?php echo $accID; ?>">Delete</a></li>
                </ul>
              </div>
              </td>
            </tr>
            <!-- Delete Modal  -->
            <div id="delete<?php echo $accID; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Person Record</h4>
                  </div>
                  <div class="modal-body">
                  <center>
                  <h1>Are you sure ?</h1>
                    <a class="btn btn-success" href="acccard_delete_action.php?accID=<?php echo $accID; ?>">DELETE</a>
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




  <!-- UPDATEModal -->
<div id="myModal" class="modal fade " role="dialog">
  <div class="modal-dialog" style="width: 800px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        
      UPDATE

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




  <!-- Modal -->
<div id="AddNewPerson" class="modal fade " role="dialog">
  <div class="modal-dialog" style="width: 800px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD NEW PERSON</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
                         <header class="panel-heading">
                             <H1><center>PGC EMPLOYEE ACCOUNTABILITY CARD<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                <section class="panel">
                        <header class="panel-heading">
                         Client Info:
                         </header>
                    <div class="panel-body">
                     <form action="acccard_add_new_action.php" method="post" name="form1">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>NAME</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Name" name="pgc_emp_ac_name" maxlength="100" onkeyup="letterInputOnly(this);">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>DESIGNATION</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Designation" name="pgc_emp_ac_designation" maxlength="75" onkeyup="letterInputOnly(this);">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>OFFICE</b></label>
                            <div class="col-sm-10">
                            <?php 
                            $officeRes = mysql_query("SELECT * FROM office_dictionary");
                          
                            ?>
                              <select value="<?php echo $officeVal['officeCode'];?>" class="form-control" name="pgc_emp_ac_office">
                              <?php 
                                while ($officeVal = mysql_fetch_array($officeRes)) {
                                  ?>
                                <option value="<?php echo $officeVal['officeCode'];?>"><?php echo $officeVal['officeName'];?></option>
                                <?php 
                              }
                              ?>
                              </select>
                              
                            </div>
                        </div>
                        <br>  
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>NOTE</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Note" name="pgc_emp_ac_Note" maxlength="50">
                            </div>
                        </div><br><br><br>
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

  <!-- PRINT METHOD MODAL -->
<div id="PrintMethod" class="modal fade " role="dialog">
  <div class="modal-dialog" style="width: 800px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Print Method</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
                         <header class="panel-heading">
                             <H1><center>PGC EMPLOYEE ACCOUNTABILITY CARD<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                <section class="panel">
                        <header class="panel-heading">
                         Method Type:
                         </header>
                    <div class="panel-body">
                     <form action="acccard_printMethod_action.php" method="post" name="form1">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>DATE</b></label>
                            <div class="col-sm-5">
                                <input class="form-control"  type="month" name="PrintMonth_val" value="Print">
                            </div>
                            <input class="btn btn-info col-sm-4"  type="submit" name="PrintMonth" value="Print">
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>DESIGNATION</b></label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="PrintDesignation_val">
                            </div>

                            <input class="btn btn-info col-sm-4"  type="submit" name="PrintDesignation" value="Print">
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>OFFICE</b></label>
                            <div class="col-sm-5">
                            <select class="form-control"  type="text" name="PrintOffice_val" value="Print">
                              <option>Agency Employee</option>
                              <option>Emergency Employee</option>
                            </select>
                            </div>
                            <input class="btn btn-info col-sm-4"  type="submit" name="PrintOffice" value="Print">
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>NOTE</b></label>
                            
                            <div class="col-sm-5">
                            <select class="form-control"  type="text" name="PrintNote_val" value="Print">
                              <option>RETIRE</option>
                              <option>OTHER</option>
                            </select>
                            </div>
                                 <input class="btn btn-info col-sm-4"  type="submit" name="PrintNote" value="Print">
                        </div><br><br><br>

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