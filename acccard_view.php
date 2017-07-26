<?php
include('session.php');
$ID =$_REQUEST['accID'];
include('db.php');

$result = mysql_query("SELECT * FROM emp_pgc_record WHERE accID = '$ID'");
$test = mysql_fetch_array($result);
$rows = mysql_num_rows($result);
                $emp_pgc_record_accID=$test['accID'];
                $emp_pgc_record_fullname=$test['fullName'] ;
                $emp_pgc_record_office=$test['office'];
                $emp_pgc_record_designation=$test['designation'] ;

$sql = "SELECT *";
$sql.=" FROM emp_accountability_card WHERE Emp_ID = $ID";
$query = mysql_query($sql);      
             
          
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

    <title>PGC Account Card View</title>

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


    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
      <style type="text/css">
      .dataTables_filter{
        font-family: lato;
        
      }
      .dataTables_filter > label > input{
    
    padding: 5px 20px;
    margin: 8px 0;
    box-sizing: border-box;

      }
      </style>
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
                    <h3 class="page-header"><i class="fa fa-user-md"></i> PGC Accountability Card Management View</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="fa fa-clipboard"></i><a href="acccard.php">PGC Accountability Card Management</a></li>
                        <li><i class="fa fa-user-md"></i>PGC Accountability Card View Set</li>

                    </ol>
                </div>
            </div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-3">
                              <h4><?php echo  $emp_pgc_record_fullname; ?></h4>               
                              <h3><?php echo  $emp_pgc_record_office; ?></h3>
                              <h6><?php echo  $emp_pgc_record_designation; ?></h6>
                            </div>
                            <div class="col-lg-10 col-sm-09 follow-info">
                                
                                <h6>
                                     
                                     <span><i class="icon_calendar"></i><div id="datetime" style="margin-top: -13px; margin-left: 16px;"></div></span>

                                </h6>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#AddItem" ><span class="fa fa-plus-circle"></span> Add Item</a>
                            </div>

                             
                                        <a class="btn btn-info pull-right" href="assets/fpdf/acccard_person_report.php?accID=<?php echo $ID ?>" title="Print" target="_blank"><span class="icon_printer"></span> PRINT</a>
                          </div>
                    </div>

                </div>

              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">

                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#recent-activity">
                                          
                                          Accountability Card
                                      </a>
                                  </li>
                              </ul>

                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="recent-activity" class="tab-pane active">
                                      <div class="profile-activity">                                          
                                          <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading tab-bg-primary " style="padding:15px; height: 30px;">
                                    </header>
                                    <div class="panel-body">
                                     
                                      <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
                                         <thead>
                                           <tr>
                                           <th>PAR #</th>
                                           <th>QTY/UNIT</th>
                                           <th>DESCRIPTION</th>
                                           <th>SERIAL #</th>
                                            <th>PROP. #</th>
                                            <th>AMOUNT</th>
                                            <th>TRANSFER TO </th>
                                            <th>DATE TURN OVER</th>
                                            <th>REMARKS</th>
                                            <th>ACTION</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
while ( $row=mysql_fetch_array($query)) 
{//FIRST WHILE FOR FETCHING ALL SET DATA



  if ("SET ".$row['ItemSetID'] == $row['itemCode'])//SET ITEMS
  {


     $accID = $row['ID'];
    ?>

          <tr>
          <td><font color="black"><?php echo $row['ParNo']?></font></td>
          <td><font color="black"><?php echo $row['Qty']." ".$row['Unit']?></font></td>
          <td><font color="black"><?php echo $row['Descrp']?></font></td>
          <td><font color="black"><?php echo $row['ParNo']?></font></td>
          <td><font color="black"><?php echo $row['SN']?></font></td>
          <?php 
          if($row['Amount'] == 0)
          {
            ?>
            <td><font color="black"></font></td>
            <?php
          }
          else
          {
            ?>
            <td><font color="black"><?php echo $row['Amount']?></font></td>
            <?php
          }
            ?>
            <td><font color="black"><?php echo $row['TransferTo']?></font></td>
            
           <?php 
          if($row['DateTurnOver'] == '0000-00-00')
          {
            ?>
            <td><font color="black"></font></td>
            <?php
          }
          else
          {
            ?>
            <td><font color="black"><?php echo $row['DateTurnOver']?></font></td>
            <?php
          }
          ?>
          <td><font color="black"><?php echo $row['Remarks']?></font></td>
          <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Action</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="acccard_view-detail.php?accID=<?php echo $accID; ?>&empID=<?php echo $ID;?>">View</a></li>
                    <li><a href="acccard_edit-detail.php?accID=<?php echo $accID; ?>&empID=<?php echo $emp_pgc_record_accID;?>">Edit</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a data-toggle="modal" data-target="#delete<?php echo $accID; ?>">Delete</a></li>
                  </ul>
                </div>
                </td>
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
                  <a class="btn btn-success" href="acccard_view_delete_action.php?accID=<?php echo $accID;?>&ID=<?php echo $ID; ?>">DELETE</a>
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

}// END FIRST WHILE

?>
                                        </tbody>
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
                                            <th></th>
                                          </tr>
                                        </tfoot>

                                      </table>
                                    </div>
                                </section>
                            </div>
                        </div>

                                      </div>

                                  </div>
                                
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->



<!-- Modal for Set Item-->
<div id="AddItem" class="modal fade " role="dialog">
  <div class="modal-dialog" style="width: 1300px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD SET</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
                        
                <section class="panel">
                        <header class="panel-heading">
                         Item Set Info:
                         </header>
                    <div class="panel-body">
                     <form action="acccard_view_add_par-set_action.php?empID=<?php echo $emp_pgc_record_accID;?>" method="post" name="form1">
                     <table class="table table-striped table-advance table-hover">
                         <thead>
                            <tr>
                              <td class="col-sm-1">PAR/ICS</td>
                              <td  class="col-sm-1">QTY</td>
                              <td  class="col-sm-1">UNIT</td>
                              <td  class="col-sm-1">DESCRIPTION</td>
                              <td  class="col-sm-1">SERIAL #</td>
                            </tr>
                            </thead>
                             <tbody>
                              <tr>
                              <td><input  class="form-control" type="" name="acccard_view_add_par-Set" value="" ></td>
                              <td><input  class="form-control" type="" name="acccard_view_add_qty-Set" value="" onkeyup="numberInputOnly(this);"></td>
                              <td><select  name="acccard_view_add_unit-Set" class="form-control" required="" value="custodian_slip_unit">
                                  <option value="unit">Unit</option>
                                  <option value="pc">Pc.</option>
                                </select></td>
                              <td><input  class="form-control" type="" name="acccard_view_add_descrp-Set" value="" ></td>
                              <td><input  class="form-control" type="" name="acccard_view_add_sn-Set" value="" ></td>
                              </tr>
                              </tbody>
                        </table>
                        <table class="table table-striped table-advance table-hover">
                          <thead>
                           
                            <tr>
                              <td  class="col-sm-1">PROP NO.</td>
                              <td  class="col-sm-1">AMOUNT</td>
                              <td  class="col-sm-1">TRANSFER TO</td>
                              <td  class="col-sm-1">REMARKS</td>
                              <td  class="col-sm-1">DATE TURN OVER</td>
                            </tr>
                            </tr>
                          </thead>
                          <tbody>
                            
                              <tr>
                              <td><input  class="form-control" type="" name="acccard_view_add_propno-Set" value=""></td>
                              <td><input  class="form-control" type="" name="acccard_view_add_amount-Set" value="" onkeyup="numberInputOnly(this);"></td>
                              <td><input  class="form-control" type="" name="acccard_view_add_transferTo-Set" value="" onkeyup="letterInputOnly(this);"></td>
                              <td><input  class="form-control" type="" name="acccard_view_add_remarks-Set" value="" ></td>
                              <td><input  class="form-control" type="date" name="acccard_view_add_turnOver-Set" value="" ></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="col-sm-offset-4">
                           <input class="btn btn-success col-sm-2" type="submit" name="SubmitSet" value="Submit"><span class="col-sm-1"></span><input class="btn btn-danger col-sm-2" type="button" name="Cancel" value="Cancel" data-dismiss="modal">
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
<!--End of Modal Set-->



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
    <!-- javascripts -->

    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" >  
      function numberInputOnly(elem) {
                var validChars = /[0-9]/;
                var strIn = elem.value;
                var strOut = '';
                for(var i=0; i < strIn.length; i++) {
                  strOut += (validChars.test(strIn.charAt(i)))? strIn.charAt(i) : '';
                }
                elem.value = strOut;
            }
            function letterInputOnly(elem) {
                var validChars = /[a-zA-ZñÑ]+/;
                var strIn = elem.value;
                var strOut = '';
                for(var i=0; i < strIn.length; i++) {
                  strOut += (validChars.test(strIn.charAt(i)))? strIn.charAt(i) : '';
                }
                elem.value = strOut;
            }
    //FOR DELETE FUNCTION RECORD
    function confirmDelete(issued_ID) 
	{
    
    		var r = confirm('Do you want to delete?');
    		if (r == true) 
		{
      		window.location='acccard_delete_action.php?accID='+issued_ID;
    		} 
		else 
		{
        		window.location='acccard_view.php?accID='+<?php echo $ID;?>;
    		}
	}
    </script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">

    $('#myData').dataTable();//responsive sorting of data with pagnation and search inputbox

    var datetime = null,
        date = null;

    var update = function () 
	{
      date = moment(new Date())
      datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
  	};

    $(document).ready(function(){
      datetime = $('#datetime')
      update();
      setInterval(update, 1000);
    });

    </script>


  </body>
</html>
