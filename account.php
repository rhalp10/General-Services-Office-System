  <?php
include('session.php');
include('db.php');
$sql = "SELECT *";
$sql.=" FROM emp_accounts_record";
$query=mysql_query($sql);
if ($login_level != '0') 
{
  header("location: index.php");
}

$page = "Account";//this is for <li></li> active
?>
<!DOCTYPE html>
<html lang="en">
 <head>

    <title>Account Management</title>
    <?php include ('head.php');?>
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
          <h3 class="page-header"><i class="fa fa-clipboard"></i> Account Management</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>Account Management</li>
          </ol>
        </div>
      </div>
              <!-- page start-->
              
              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                           <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
                       <a class="btn btn-success pull-left" href="" data-toggle="modal" data-target="#addNewUser"><span class="fa fa-plus-circle"></span> Add New Account</a>
                        <a class="btn btn-info pull-right" href="assets/fpdf/account_report.php" target="_blank" title="Print" name="submit"><span class="icon_printer"></span> PRINT</a>
                          
                          </header>
                         
                           <div >
                            <table id="myData"  class="table table-bordered table-advance table-hover ">
                                <thead>
                                  <tr>
                                      <th class="col-sm-2"> Name</th>
                                      <th class="col-sm-1"> Username</th>
                                      <th class="col-sm-3"> Email</th>
                                      <th class="col-sm-3"> Address</th>
                                      <th class="col-sm-1"> Mobile #</th>
                                      <th class="col-sm-2"> Action</th>
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
                                    <td><?php echo $row["username"];?></td>
                                    <td><?php echo $row["Email"];?></td>
                                    <td><?php echo $row["Address"];?></td>
                                    <td><?php echo $row["Mobile"];?></td>
                                    <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">Action</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="account_view.php?accID=<?php echo $accID; ?>">View</a></li>
                                        <li><a href="account_edit.php?accID=<?php echo $accID; ?>">Edit</a></li>
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
                                          <h4 class="modal-title">Delete Account</h4>
                                        </div>
                                        <div class="modal-body">
                                        <center>
                                        <h1>Are you sure ?</h1>
                                          <a class="btn btn-success" href="account_delete_action.php?accID=<?php echo $accID; ?>">DELETE</a>
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
                    <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                -->
                  
            </div>
        </div>
  </section>


 

<!-- Modal -->
<div id="addNewUser" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 900px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register New Account </h4>
      </div>
      <div class="modal-body">
        <form action="account_add_action.php" method="post" name="form1">
        <!--
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>PROFILE PIC</b></label>
                            <div class="col-sm-10">
                                <input type="file"  class="form-control" placeholder="Name" name="account_add_img" required="">
                            </div>
                        </div>
                        -->
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>USERNAME</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Username" name="account_add_username" required="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>PASSWORD</b></label>
                            <div class="col-sm-10">
                                <input type="password"  class="form-control" placeholder="Password" name="account_add_password" required="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>RE-PASSWORD</b></label>
                            <div class="col-sm-10">
                                <input type="password"  class="form-control" placeholder="Re-Type Password" name="account_add_repassword" required="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>FULL NAME</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Full Name" name="account_add_name" required="" onkeyup="letterInputOnly(this);">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>EMAIL</b></label>
                            <div class="col-sm-10">
                                <input type="email"  class="form-control" placeholder="Email" name="account_add_email" required="" >
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>ADDRESS</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Address" name="account_add_address" required="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>MOBILE #</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Mobile #" name="account_add_mobile" required="" onkeyup="numberInputOnly(this);">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>AGE</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Age" name="account_add_age" required="" onkeyup="numberInputOnly(this);">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>GENDER</b></label>
                            <div class="col-sm-10">
                                <select class="form-control" placeholder="Gender" name="account_add_gender" required="">
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>POSITION</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Position" name="account_add_position" required="" onkeyup="letterInputOnly(this);">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>LEVEL OF ACCESS</b></label>
                            <div class="col-sm-10">
                                <select   class="form-control" placeholder="Access Level" name="account_add_Level" required="">
                                  <option value="0">ADMIN</option>
                                  <option value="1">EMPLOYEE</option>
                                  <option value="2">BINCARD</option>
                                  <option value="3">ACCOUNTABILY CARD</option>
                                  <option value="4">ICS/PRS/PAR</option>
                                  </select>
                            </div>
                        </div><br>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">  
                                <input class="btn btn-success "  type="submit" name="Submit" value="Submit">
                                <a class="btn btn-danger"  data-dismiss="modal">CANCEL</a>

                            </div>
                            <br>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <!-- container section end -->
  
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
<?php include ('footer.php');?>