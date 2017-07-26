<?php
include('session.php');
include('db.php');
$sql = "SELECT *";
$sql.=" FROM property_accountability_receipt_record";
$query=mysql_query($sql);
              
          
if ($login_level != '0' ) 
{
    if ($login_level == '4') {
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

    <title>Property Account Receipt</title>

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
          <h3 class="page-header"><i class="fa fa-clipboard"></i>Property Accountability Receipt</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>Property Accountability Receipt</li>
          </ol>
        </div>
      </div>
          <div class="panel">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;"> 
                    <a class="btn btn-success pull-left" href="" data-toggle="modal" data-target="#AddAccReceipt" ><span class="fa fa-plus-circle"></span> Add Account Receipt</a>
                     <a class="btn btn-info pull-right" href="assets/FPDF/accreceipt_general_print.php" target="_BLANK"><span class="icon_printer"></span> PRINT</a>
                        <!-- 
                     <a class="btn btn-info pull-right" href="" data-toggle="modal" data-target="#PrintMethod" ><span class="icon_printer"></span> PRINT</a>
                        -->
                          </header>
                         
                    
                    <div >
      <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
          <thead>
            <tr>
              <th>Description</th>
              <th>Qty/Unit</th>
              <th>Property No</th>

              <th>ReceiveBy Name</th>
              <th>ReceiveBy Date</th>

              <th>ReceiveFrom Name</th>
              <th>ReceiveFrom Date</th>
              <th>ICS</th>
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

           $ID = $row['ID'];
          ?>
            <tr>

              <td><?php echo $row['Descrp'];?></td>
              <td><?php echo $row['Qty']." ".$row['Unit'];?></td>
              <td><?php echo $row['PropNo'];?></td>
              <td><?php echo $row['ReceivedBy_Name'];?></td>
              <td><?php echo $row['ReceivedBy_Date'];?></td>

              <td><?php echo $row['ReceivedFrom_Name'];?></td>
              <td><?php echo $row['ReceivedFrom_Date'];?></td>
              <td><?php echo $row['PAR'];?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Action</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="accreceipt_view.php?ID=<?php echo $ID; ?>">View</a></li>

                    <li><a href="assets/FPDF/accreceipt_print.php?ID=<?php echo $ID;?>" target="_BLANK">Print</a></li>
                    
                    <li><a href="accreceipt_edit.php?ID=<?php echo $ID; ?>">Edit</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a data-toggle="modal" data-target="#delete<?php echo $ID; ?>">Delete</a></li>
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
                      <a class="btn btn-success" href="accreceipt_delete_action.php?ID=<?php echo $ID; ?>">DELETE</a>
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





<!-- Modal -->
<div id="AddAccReceipt" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 1200px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Account Receipt </h4>
      </div>
      <div class="modal-body">

              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <H1><center>PROPERTY ACCOUNTABILITY RECEIPT<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                          <form class="form-horizontal " method="post" action="accreceipt_add_action.php"> <!--Form for the receipt -->
                           <div class="form-group pull-right">
                                
                                    <div class="col-sm-10">
                                        <input type="text"  class="form-control" placeholder="PAR No." name="prop_acc_receipt_ics_propno" required="">
                                    </div>
                            </div>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_clipboard"></i> Quantity</th>
                                 <th><i class="icon_datareport_alt"></i> Unit</th>
                                 <th><i class="icon_documents_alt"></i> Description</th>
                                 <th><i class="icon_drawer_alt"></i> Property No.</th>
                                 <th></th>
                                 
                              </tr>
                              <tr>
                                <td><input type="text" name="prop_acc_receipt_qty" class="form-control" required="" placeholder="Quantity"></td>
                                <td> <input type="text" name="prop_acc_receipt_unit" class="form-control" required="" placeholder="Unit"></td>
                                <td> <input type="" name="prop_acc_receipt_desc" class="form-control" required="" placeholder="Description"></td>
                                <td> <input type="text" name="prop_acc_receipt_propno" class="form-control" required="" placeholder="Property No"></td>
                              </tr>
                              <tr>
                                
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
                                                    <input type="text"  class="form-control" placeholder="Name" name="prop_acc_receipt_receivebyname" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position" name="prop_acc_receipt_receivebyposition" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-2">
                                                    <input type="date"  class="form-control" placeholder="date" name="prop_acc_receipt_receivebydate" required="">
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
                                                    <input type="text"  class="form-control" placeholder="Name" name="prop_acc_receipt_receivefromname" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Position</label>
                                                <div class="col-sm-7">
                                                    <input type="text"  class="form-control" placeholder="Position" name="prop_acc_receipt_receivefromposition" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-2">
                                                    <input type="date"  class="form-control" placeholder="date" name="prop_acc_receipt_receivefromdate" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-2">
                                                    <input class="btn btn-success "  type="submit" name="Submit" value="Submit"> 
                                                    <input class="btn btn-danger "  type="submit" name="Cancel" value="Cancel" data-dismiss="modal"> 
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

      
 /*OLD  DELETE FUNCTION RECORD
 function confirmDelete(id) {
    
    var r = confirm('Do you want to delete?');
    if (r == true) {
      window.location='acccard_delete_action.php?accID='+id;
    } else {
        window.location='acccard.php';
    }
}
*/

      
//FOR DELETE FUNCTION RECORD
function confirmDelete(id) {
    
    var r = confirm('Do you want to delete?');
    if (r == true) {
      window.location='accreceipt_delete_action.php?ID='+id;
    } else {
        window.location='account.php';
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
