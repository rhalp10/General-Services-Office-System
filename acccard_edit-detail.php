 <?php
include('session.php');
$ID =$_REQUEST['accID'];
$eID = $_REQUEST['empID'];
$result = mysql_query("SELECT * FROM emp_accountability_card WHERE ID = '$ID'");
$test = mysql_fetch_array($result);
                $ParNo=$test['ParNo'];
                $Qty=$test['Qty'];
                $Unit=$test['Unit'];
                $Descrp=$test['Descrp'];
                $SN=$test['SN'];
                $PropNo=$test['PropNo'];
                $Amount=$test['Amount'];
                $TransferTo=$test['TransferTo'];
                $Remarks=$test['Remarks'];
                $DateTurnOver=$test['DateTurnOver'];
                             
          
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>Edit PGC Account Card</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
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
          <h3 class="page-header"><i class="fa fa fa-clipboard"></i>EDIT ITEM SET</h3>
          <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="icon_documents_alt"></i><a href="acccard.php">PGC Accountability Card Management</a></li>
                        <li><i class="fa fa-user-md"></i><a href="acccard_view.php?accID=<?php echo $eID?>">PGC Employee Accountability Card View Set</a></li>
                        <li><i class="fa fa-user-md"></i>PGC Employee Accountability Card Edit Set</li>

                    </ol>
        </div>
      </div>
              <!-- page start--> 
              <form  action="acccard_edit-detail_action.php?accID=<?php echo $ID;?>&empID=<?php echo $eID;?>" method="post" name="form1">
              <table class="table table-striped table-advance table-hover ">
                 <tr>
              <td><b>PAR</b></td>
                <td><input type="text" name="par"  class="form-control" required="" value="<?php echo "$ParNo";?>" ></td>
            </tr>
             <tr>
              <td><b>QTY</b></td>
                <td><input type="text" name="qty"  class="form-control" required="" value="<?php echo " $Qty";?>" onkeyup="numberInputOnly(this);"></td>
            </tr>
             <tr>
              <td><b>UNIT</b></td>
                <td><input type="text" name="unit"  class="form-control" required="" value="<?php echo " $Unit";?>" onkeyup="letterInputOnly(this);"></td>
            </tr>
             <tr>
              <td><b>DESCRIPTION</b></td>
                <td><input type="text" name="description"  class="form-control" required="" value="<?php echo "$Descrp";?>" ></td>
            </tr>
           <tr>
           <tr>
              <td><b>SERIAL#</b></td>
                <td><input type="text" name="serial"  class="form-control" value="<?php echo "$SN";?>""></td>

            </tr>
           <tr>
              <td><b>PROP#</b></td>
                <td><input type="text" name="propno"  class="form-control" value="<?php echo "$PropNo";?>" onkeyup="numberInputOnly(this);"></td>

            </tr>
           <tr>
              <td><b>AMOUNT</b></td>
                <td><input type="text" name="amount"  class="form-control" value="<?php echo "$Amount";?>" onkeyup="numberInputOnly(this);"></td>

            </tr>
           <tr>
              <td><b>TRANSFER TO</b></td>
                <td><input type="text" name="transferto"  class="form-control" value="<?php echo "$TransferTo";?>"></td>

            </tr>

           <tr>
              <td><b>DATE TURNOVER</b></td>
                <td><input type="text" name="dateturnover"  class="form-control" value="<?php echo "$DateTurnOver";?>" ></td>

            </tr>
           <tr>
              <td><b>REMARKS</b></td>
                <td><input type="text" name="remarks"  class="form-control" value="<?php echo "$Remarks";?>" ></td>

            </tr>
           <td><input class="btn btn-success "  type="submit" name="Update" value="Update"></td>
           <td></td>
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
    <!-- javascripts -->
    <script type="text/javascript">
      
 //NUMBER ONLY
  function numberInputOnly(elem) {
                var validChars = /[0-9]/;
                var strIn = elem.value;
                var strOut = '';
                for(var i=0; i < strIn.length; i++) {
                  strOut += (validChars.test(strIn.charAt(i)))? strIn.charAt(i) : '';
                }
                elem.value = strOut;
            }
  //LETTER ONLY
   function letterInputOnly(elem) {
                var validChars = /[a-zA-ZñÑ ./]+/;
                var strIn = elem.value;
                var strOut = '';
                for(var i=0; i < strIn.length; i++) {
                  strOut += (validChars.test(strIn.charAt(i)))? strIn.charAt(i) : '';
                }
                elem.value = strOut;
            }
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
  </body>
</html>