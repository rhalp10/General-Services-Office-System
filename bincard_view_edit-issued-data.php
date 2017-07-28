<?php
include('session.php');

$issuedID =$_REQUEST['issuedID'];
$binID = $_REQUEST['binID'];
$result = mysql_query("SELECT * FROM bincard_issued_record WHERE ID = '$issuedID'");
$test = mysql_fetch_array($result);
      $recpnt=$test['recpnt'];
      $qty=$test['qty'];
      $issued_date=$test['issued_date'];

$sql1 = "SELECT *";
$sql1.=" FROM bincard_record WHERE ID = ".$test['bin_ID'];
$res1 = mysql_query($sql1);
$test1 = mysql_fetch_array($res1);
	$descrp = $test1['Descrp'];
                            
if ($login_level != '0' ) 
{
    if ($login_level == '2') {
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
    <title>Bincard Edit</title>
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
            <li><i class="fa fa-clipboard"></i><a href="bincard.php">Bincard Management</a></li>
            <li><i class="fa fa-clipboard"></i><a href="bincard_view.php?ID=<?php echo $binID?>">Issued Item</a></li>

            <li><i class="fa fa-clipboard"></i>Issued Item Edit</li>
          </ol>
        </div>
      </div>
              <!-- page start--> 
              <form  action="bincard_edit_action.php?accID=<?php echo "$accID";?>" method="post" name="form1">
              <table class="table table-striped table-advance table-hover ">
                 <tr>
              <td><b>ISSUED DATE</b></td>
                <td><input type="date" name="bincard_edit_date"  class="form-control"  value="<?php echo "$issued_date";?> "></td>
            </tr>

             <tr>
              <td><b>DESCRIPTION</b></td>
                <td><input type="text" name="bincard_edit_descrp"  class="form-control" required="" value="<?php echo "$descrp";?>" disabled></td>
            </tr>

             <tr>
              <td><b>RECIPIENT</b></td>
                <td><input type="text" name="bincard_edit_descrp"  class="form-control" required="" value="<?php echo "$recpnt";?>" onkeyup="letterInputOnly(this);"></td>
            </tr>
            <tr>
              <td><b>QUANTITY</b></td>
                <td><input type="text" name="bincard_edit_qty"  class="form-control" required="" value="<?php echo "$qty";?>" onkeyup="numberInputOnly(this);"></td>
            </tr>
            <tr>
           <tr>
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
<script type="text/javascript">
      var dateControl = document.querySelector('input[type="date"]');
dateControl.value = '<?php echo "$issued_date";?>';
    </script>