<?php
include('session.php');


$ID =$_REQUEST['accID'];

$result = mysql_query("SELECT * FROM emp_accounts_record WHERE accID = '$ID'");
$test = mysql_fetch_array($result);
                $name = $test['accID'];
                $account_val_fullname = $test['fullName'];
                $account_val_username = $test['username'];
                $account_val_pass = $test['password'];
                $account_val_age = $test['Age'];
                $account_val_gender = $test['Gender'];
                $account_val_address = $test['Address'];
                $account_val_pos = $test['Pos'];
                $account_val_mobile = $test['Mobile'];
                $account_val_email = $test['Email'];
                
if ($login_level != '0') 
{
  header("location: index.php");
}
             
$page = "Account";//this is for <li></li> active  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>Edit Account</title>
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
          <h3 class="page-header"><i class="fa fa fa-bars"></i>EDIT</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i><a href="account.php">Account Management</a> </li>
            <li><i class="fa fa-lock"></i>Account Edit</li>
          </ol>
        </div>
      </div>
      


              <!-- page start--> 
              <form  action="account_edit_action.php?accID=<?php echo "$ID";?>" method="post" name="form1">
              <table class="table table-striped table-advance table-hover ">
              <tr>
              <td><b>NAME</b></td>
                <td><input type="text" name="account_emp_edit_name"  class="form-control" required="" value="<?php echo "$account_val_fullname";?>" onkeyup="letterInputOnly(this);"></td>
              </tr>
              <td><b>AGE</b></td>
                <td><input type="text" name="account_emp_edit_age"  class="form-control" required="" value="<?php echo "$account_val_age";?>" onkeyup="numberInputOnly(this);"></td>
              </tr>
             <tr>
             <td><b>GENDER</b></td>
                <td>
                <select value="<?php echo "$account_val_gender";?>"  name="account_emp_edit_gender" class= "form-control">
                  <option value="<?php echo "$account_val_gender";?>">Male</option>
                  <option value="<?php echo "$account_val_gender";?>">Female</option>
                </select>
                </td>
              </tr>
              <td><b>ADDRESS</b></td>
                <td><input type="text" name="account_emp_edit_address"  class="form-control" required="" value="<?php echo "$account_val_address";?>"></td>
              </tr>
              <td><b>USERNAME</b></td>
                <td><LABEL><?php echo "$account_val_username";?></LABEL></td>
            </tr>
             <tr>
              <td><b>OLD PASSWORD</b></td>
                <td><label ><a type="button" data-toggle="modal" data-target="#passEdit">Change Password</a></label>
</td>
            </tr>
            
            <td><b>EMAIL</b></td>
                <td><input type="email" name="account_emp_edit_email"  class="form-control" required="" value="<?php echo "$account_val_email";?>"></td>
              </tr>
            </tr>
            <td><b>POSITION</b></td>
                <td><input type="text" name="account_emp_edit_pos"  class="form-control" required="" value="<?php echo "$account_val_pos";?>" onkeyup="letterInputOnly(this);" maxlength="25" ></td>
              </tr>
              </tr>
            <td><b>MOBILE</b></td>
                <td><input type="text" name="account_emp_edit_mobile"  class="form-control" required="" value="<?php echo "$account_val_mobile";?>" maxlength="10" onkeyup="numberInputOnly(this);"></td>
              </tr>
           <tr>
           <td><input class="btn btn-success"  type="submit" name="Update" value="Update"> <a class="btn btn-danger"  href="account.php" name="Cancel" value="Cancel">Cancel</a></td>
           </tr> 
              </table>
              </form>
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
  <!-- Modal -->
<div id="passEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" action="account_pass_edit_action.php?accID=<?php echo "$ID";?>" method="post">
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">Old Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" class="form-control" id="password" placeholder="Type your old Password" name="profile_edit_oldpass" required="" value="">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">New Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" class="form-control" id="password" placeholder="Type Your New Password" name="profile_edit_password" required="" value="">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">Confirm Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" class="form-control" id="password" placeholder="Confirm Your Password" name="profile_edit_repassword" required="" value="">
                                                      </div>
                                                  </div>
                                                   <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                         <input class="btn btn-success"  type="submit" name="AccountEdit" value="Update">
                                                          <button href="profile.php" type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                                  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 
<?php include ('footer.php');?>