<?php
include('session.php');
$result = mysql_query("SELECT * FROM emp_accounts_record WHERE username  = '$login_session'");
$test = mysql_fetch_array($result);
$rows = mysql_num_rows($result);
                $Emp_ID=$test['accID'];
                $accLevel=$test['accLevel'];
                $username=$test['username'] ;
                $password= $test['password'] ;                  
                $email=$test['Email'] ;
                $fullname=$test['fullName'] ;
                $age=$test['Age'];
                $gender=$test['Gender'] ;
                $contact=$test['Mobile'] ;
                $address=$test['Address'] ;
                $position=$test['Pos'] ;
                $img_profile=$test['image'];
                if ($accLevel == '0') {
                    $Level = 'Admin';
                    
                }
                elseif ($accLevel = '1') {
                    $Level = 'Employee';
                    
                }

                elseif ($accLevel = '2') {
                    $Level = 'other';
                    
                }
                else {
                     
                }
include('db.php');
$sql = "SELECT *";
$sql.=" FROM emp_pgc_record";
$query=mysql_query($sql);

$sql1 = "SELECT *";
$sql1.=" FROM office_dictionary";
$query1=mysql_query($sql1);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>PGC Account Card</title>

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
                  <li class="">
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
                          <li><a class="" href="ics.php">Custodian Slip</a></li>
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
          <h3 class="page-header"><i class="fa fa fa-clipboard"></i> Accountability Card Report</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>Account Card Report</li>
          </ol>
        </div>
      </div>
          <div class="panel">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
                     
                     <a class="btn btn-info pull-right" href="" data-toggle="modal" data-target="#PrintMethod" ><span class="icon_printer"></span> PRINT</a>
                        
                          </header>
                    <div >
                      <table id="myData"  class="table table-striped table-advance table-hover ">
                                      <thead>
                                        <tr>
                                          <th>Name</th>
                                          <th>Office</th>
                                          <th>Designation</th>
                                          <th>Note</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
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
                                          

                                        </tr>
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
                                <input type="text"  class="form-control" placeholder="Office" name="pgc_emp_ac_office" maxlength="50" onkeyup="letterInputOnly(this);">
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
                             <H1><center>ACCOUNTABILITY CARD<br><h2 style="font-size: 30px; ">Print Method</h2></center></H1>
                             
                          </header>
                <section class="panel">
                        <header class="panel-heading">
                         Method Type:
                         </header>
                    <div class="panel-body">
                     <form action="acccard_report_print-action.php" method="post" name="form1">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>DATE</b></label>
                            <div class="col-sm-5">
                                <input class="form-control"  type="month" name="date" value="Print">
                            </div>
                            <input class="btn btn-info col-sm-4"  type="submit" name="PrintDate" value="Print">
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>DESIGNATION</b></label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="designation">
                            </div>

                            <input class="btn btn-info col-sm-4"  type="submit" name="PrintDesignation" value="Print">
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>OFFICE</b></label>
                            <div class="col-sm-5">
                            <select class="form-control"  type="text" name="office" value="Print">
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
                            <select class="form-control"  type="text" name="note" value="Print">
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





    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" >
    //  $(document).ready(function() {
    //    var dataTable = $('#employee-grid').DataTable( {
    //      "processing": true,
    //      "serverSide": true,
    //      "ajax":{
    //        url :"acccard_emp-data.php", // json datasource
    //        type: "post",  // method  , by default get
    //        error: function(){  // error handling
    //          $(".employee-grid-error").html("");
    //          $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
    //          $("#employee-grid_processing").css("display","none");
    //          
    //        }
    //      }
    //    } );
    //  } );

      
 //FOR DELETE FUNCTION RECORD
 function confirmDelete(id) {
    
    var r = confirm('Do you want to delete?');
    if (r == true) {
      window.location='acccard_delete_action.php?accID='+id;
    } else {
        window.location='acccard.php';
    }
}
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
                var validChars = /[a-zA-ZñÑ ]+/;
                var strIn = elem.value;
                var strOut = '';
                for(var i=0; i < strIn.length; i++) {
                  strOut += (validChars.test(strIn.charAt(i)))? strIn.charAt(i) : '';
                }
                elem.value = strOut;
            }

    </script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">

      $('#myData').dataTable();

    </script>

  </body>
</html>
