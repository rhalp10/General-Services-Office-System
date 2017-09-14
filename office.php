<?php
include('session.php');
include('db.php');
$sql = "SELECT *";
$sql.=" FROM office_dictionary";
$query=mysqli_query($con,$sql);
$page = "Office";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('head.php');?>

    <title>Office List</title>

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
                          <li><a class="" href="ics_report.php">Custodian Slip</a></li>
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
          <h3 class="page-header"><i class="fa fa fa-clipboard"></i>Office LIST</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>Office List</li>
          </ol>
        </div>
      </div>
              <!-- page start-->
              <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
                       <a class="btn btn-success pull-left" href="" data-toggle="modal" data-target="#addNewOffice"><span class="fa fa-plus-circle"></span>&nbsp;&nbsp;Add New Office</a>
                          
                          </header>
              <table id="myData"  class="table table-bordered table-advance table-hover ">
                                <thead>
                                  <tr>
                                      <th class="col-sm-8"> Office Name</th>
                                      <th class="col-sm-3"> Office Code</th>
                                      <th class="col-sm-1"> Action</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                while( $row=mysqli_fetch_array($query) ) { 
                                  $officeID = $row['ID'];
                                ?>
                                  <tr>
                                    <td><?php echo $row["officeName"];?></td>
                                    <td><?php echo $row["officeCode"];?></td>

                                    <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">Action</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a  data-toggle="modal" data-target="#edit<?php echo $officeID; ?>">Edit</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a data-toggle="modal" data-target="#delete<?php echo $officeID; ?>">Delete</a></li>
                                      </ul>
                                    </div>
                                    </td>
                                  </tr>

                                <!-- Edit Modal  -->
                                <div id="edit<?php echo $officeID = $row['ID']; ?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Office</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form  class="form-horizontal" method="post" role="form" action="office_edit_action.php?officeID=<?php echo $officeID; ?>">
                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="email">Office Name:</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="office" placeholder="<?php echo $row["officeName"];?>" name="officeName_edit" value="<?php echo $row["officeName"];?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="email">Office Code:</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="office" placeholder="<?php echo $row["officeCode"];?>" name="officeCode_edit" value="<?php echo $row["officeCode"];?>">
                                          </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                            <input class="btn btn-success col-md-offset-3 col-xs-3"  type="submit" name="Update" value="Update">
                                            <input type="button" class="btn btn-danger col-xs-3"  data-dismiss="modal" value="Cancel" style="margin-left: 10px;">
                                        <br>
                                        <br>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div><!-- End Edit Modal  -->
                                <!-- Delete Modal  -->
                                <div id="delete<?php echo $officeID = $row['ID']; ?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Office</h4>
                                      </div>
                                      <div class="modal-body">
                                      <center>
                                      <h1>Are you sure ?</h1>
                                        <a class="btn btn-success" href="office_delete_action.php?officeID=<?php echo $officeID; ?>">DELETE</a>
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

<!-- Add new officeModal -->
<div id="addNewOffice" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Office</h4>
      </div>
      <div class="modal-body">
       <form class="form" role="form" method="post" action="office_add_action.php">
  <div class="form-group">
    <label for="email">Office Name:</label>
    <input type="text" class="form-control" name="office_add">
  </div>
  <input type="submit" class="btn btn-success col-md-offset-3 col-xs-3" name="Submit"><input type="button" class="btn btn-danger col-xs-3"  data-dismiss="modal" value="Cancel">
                                        <br>
                                        <br>
  

</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div><!-- END new officeModal -->

 <?php 
include('footer.php');
 ?>