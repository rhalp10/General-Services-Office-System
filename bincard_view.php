 <?php
include('session.php');
$ID = $_REQUEST['ID'];
include ('db.php');
              $sql = "SELECT *";
              $sql.=" FROM bincard_issued_record WHERE bin_ID = $ID";
              $query = mysql_query($sql);
              $sql1 = "SELECT *";
              $sql1.=" FROM bincard_record WHERE ID = $ID";
              $query1 = mysql_query($sql1);
              $row1=mysql_fetch_array($query1);
              $balance = $row1['Qty'];
              $totalQty = $row1['Qty'];
              $balanceUpdate =  $row1['Qty'];
              $Count = mysql_num_rows($query);
              $issuedCount = 0;
              $issuedUpdate = 0;                            
          
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>BIN Card Issued</title>

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
          <h3 class="page-header"><i class="fa fa-clipboard"></i> Bincard Management</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i><a href="bincard.php">Bincard Management</a></li>
            <li><i class="fa fa-clipboard"></i>Issued Item</a></li>
          </ol>
        </div>
      </div>
          <div class="panel">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
          <?php 
          if ($totalQty == $Count) {
            # code...
          }
          else
          {

          ?>
                     <a class="btn btn-success pull-left" href="" data-toggle="modal" data-target="#myModal">Issue Bin Record</a>
          <?php 
          }

              echo "<label >$Count</label>";
          ?>
                     <a class="btn btn-info pull-right" href="assets/fpdf/bincard_view_report.php?ID=<?php echo $ID;?>" target="_blank">Print Bincard</a>
                        
                          </header>
                         
                    
                    <div>
      <table class="table table-striped table-bordered table-hover" id="myData">
      <thead>
        <tr>
          <th>Date</th>
          <th>Description</th>
          <th>Recipient</th>
          <th>Qty</th>
          <th>Balance</th>
          <th class="col-sm-2">Action</th>
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
              

              while( $row=mysql_fetch_array($query)) 
              {

                $issuedCount = $issuedCount+1; 
                $balance = $balance - $row["qty"];
                $issued_ID = $row['ID'];
              ?>
              <tr>
                <td><?php echo $row['issued_date'];?></td>
                <td><?php echo $row1["Descrp"];?></td>
                <td><?php echo $row["recpnt"];?></td>
                <td><?php echo $row["qty"];?></td>
                <td><?php echo $balance ;?></td>
                <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Action</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="bincard_view_edit-issued-data.php?issuedID=<?php echo "$issued_ID";?>&binID=<?php echo $ID?>">Edit</a></li>
                    <li role="separator" class="divider"></li>
                    <!--<li><a onclick="confirmDelete(<?php echo $issued_ID; ?>)">Delete</a></li> -->
                    <li><a data-toggle="modal" data-target="#delete<?php echo $issued_ID; ?>">Delete</a></li>
                  </ul>
                </div>
                </td>
              </tr>



             <!-- Delete Modal  -->
            <div id="delete<?php echo $issued_ID; ?>" class="modal fade" role="dialog">
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
                    <a class="btn btn-success" href="bincard_view_delete_action.php?issuedID=<?php echo $issued_ID; ?>&ID=<?php echo $ID;?>">DELETE</a>
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

              //$issuedUpdate = $issuedUpdate+$row['qty']; 
             // $balanceUpdate = $balanceUpdate - $issuedUpdate;
              //$sqlUpdate = "UPDATE  bincard_record";
              //$sqlUpdate = " SET  Issued =  '$issuedUpdate', Balance = ' $balanceUpdate' WHERE  ID = '$ID'";
              //$updateRes = mysql_query($sqlUpdate);
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




  <!-- Modal -->
<div id="myModal" class="modal fade " role="dialog">
  <div class="modal-dialog" style="width: 800px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Issued Item</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
                         <header class="panel-heading">
                             <H1><center>BINCARD<br><h2 style="font-size: 30px; ">PROVINCE OF CAVITE</h2></center></H1>
                             
                          </header>
                <section class="panel">
                        <header class="panel-heading">
                         Client Info:
                         </header>
                    <div class="panel-body">
                     <form action="bincard_view_add_new_action.php?ID=<?php echo $ID ?>" method="post" name="form1">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>DATE</b></label>
                            <div class="col-sm-10">
                                <input type="date"  class="form-control" placeholder="Bin Date" name="binitem_issued_date" required="">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>RECIPIENT</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Supplier" name="binitem_issued_recpnt" required="">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>QUANTITY</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Quantity" name="binitem_issued_qty" required="">
                            </div>
                        </div>
                        <br><br><br>
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

    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" >
/*     $(document).ready(function() {
        var dataTable = $('#employee-grid').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"bincard_view-data.php?binID=<?php echo $ID ?>", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
      } );
*/
    //FOR DELETE FUNCTION RECORD
    function confirmDelete(issued_ID) {
        
        var r = confirm('Do you want to delete?');
        if (r == true) {
          window.location='bincard_view_delete_action.php?issuedID='+issued_ID+'&ID='+<?php echo $ID;?>;
        } else {
            window.location='bincard_view.php?ID='+<?php echo $ID;?>;
        }
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

      $('#myData').dataTable();//responsive sorting of data with pagnation and search inputbox
    </script>


  </body>
</html>
