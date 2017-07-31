<?php
include('session.php');
$ID =$_REQUEST['accID'];

$result = mysql_query("SELECT * FROM emp_pgc_record WHERE accID = '$ID'");
$test = mysql_fetch_array($result);
                $emp_pgc_record_accID=$test['accID'];
                $emp_pgc_record_fullname=$test['fullName'];
                $emp_pgc_record_office=$test['office'];
                $emp_pgc_record_designation=$test['designation'];
                $emp_pgc_record_note=$test['note'];
                             
          
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
    <title>Edit PGC Account Card</title>
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
          <h3 class="page-header"><i class="fa fa fa-bars"></i>EDIT</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i><a href="acccard.php">PGC Accountability Card Management</a></li>
            <li><i class="fa fa-clipboard"></i>PGC Accountability Card Edit</li>
          </ol>
        </div>
      </div>
              <!-- page start--> 
              <form  action="acccard_edit_action.php?accID=<?php echo "$ID";?>" method="post" name="form1">
              <table class="table table-striped table-advance table-hover ">
                 <tr>
              <td><b>NAME</b></td>
                <td><input type="text" name="pgc_emp_ac_edit_name"  class="form-control" required="" value="<?php echo "$emp_pgc_record_fullname";?>" onkeyup="letterInputOnly(this);"></td>
            </tr>
             <tr>
              <td><b>OFFICE</b></td>
                <td><input type="text" name="pgc_emp_ac_edit_office"  class="form-control" required="" value="<?php echo " $emp_pgc_record_office";?>" onkeyup="letterInputOnly(this);"></td>
            </tr>
             <tr>
              <td><b>DESIGNATION</b></td>
                <td><input type="text" name="pgc_emp_ac_edit_designation"  class="form-control" required="" value="<?php echo "$emp_pgc_record_designation";?>" onkeyup="letterInputOnly(this);"></td>
            </tr>
           <tr>
           <tr>
              <td><b>NOTE</b></td>
                <td><input type="text" name="pgc_emp_ac_edit_note"  class="form-control" value="<?php echo "$emp_pgc_record_note";?>" onkeyup="letterInputOnly(this);"></td>

            </tr>
           <td><input class="btn btn-success "  type="submit" name="Update" value="Update"></td>
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
 
<?php include ('footer.php');?>