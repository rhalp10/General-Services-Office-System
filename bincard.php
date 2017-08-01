 <?php
include('session.php');

include('db.php');
$sql = "SELECT *";
$sql.=" FROM bincard_record";
$query = mysql_query($sql);
if ($login_level != '0') 
{
    if ($login_level == '2') {
      # code...
    }
    else
    {
    header("location: index.php");
    }
}
$page = "Record";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>BIN Card</title>
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
          <h3 class="page-header"><i class="fa fa-clipboard"></i> Bincard Management</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-clipboard"></i>Bincard Management</li>
          </ol>
        </div>
      </div>
          <div class="panel">
          <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
                     <a class="btn btn-success pull-left" href="" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus-circle"></span> Add Bin Record</a>
                     <a class="btn btn-info pull-right" href="assets/fpdf/bincard_report.php" target="_BLANK">Print Bincard</a>
                        
                          </header>
                         
                    
                    <div>
      <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
          <thead >
            <tr>
                <th>Date Encoded</th>
                <th>Date Deliver</th>
                <th>Supplier</th>
                <th>P.O. NO./C.N. No.</th>
                <th>Description</th>
                <th>Qty</th>
               <th>Issued</th>
               <th>Balance</th>
              <th class="col-sm-2">Action</th>
            </tr>
          </thead>
          <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tfoot>
          <tbody>
            <?php 
            while( $row=mysql_fetch_array($query)) {  
              $ID = $row['ID'];
            ?>
            <tr>
              <td><?php echo  $row["DateAdded"];?></td>
              <td><?php echo  $row["bin_Date"];?></td>
              <td><?php echo  $row["Supplier"];?></td>
              <td><?php echo  $row["PoNo"];?></td>
              <td><?php echo  $row["Descrp"];?></td>
              <td><?php echo  $row["Qty"];?></td>
              <td><?php echo  $row['Issued'];?></td>
              <td><?php echo  $row["Balance"];?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Action</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="bincard_view.php?ID=<?php echo $ID; ?>">View</a></li>
                    <li><a href="bincard_edit.php?ID=<?php echo $ID; ?>">Edit</a></li>
                    <li role="separator" class="divider"></li>
                  <li><a data-toggle="modal" data-target="#delete<?php echo $ID; ?>">Delete</a></li>
                  </ul>
                </div>
                </td>
              </td>
            </tr>

             <!-- Delete Modal  -->
            <div id="delete<?php echo $ID; ?>" class="modal fade" role="dialog">
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
                    <a class="btn btn-success" href="bincard_delete_action.php?ID=<?php echo $ID; ?>">DELETE</a>
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
            $issuedSQL = "SELECT * FROM";
            $issuedSQL.=" bincard_issued_record WHERE bin_ID = '$ID'";
            $res1 = mysql_query($issuedSQL);
            $issued = 0;
            while ($row1 = mysql_fetch_array($res1))
            {
               $issued = $issued + $row1['qty'];
            }
            $balance = $row["Qty"]-$issued;
            $updateSQL="UPDATE bincard_record";
            $updateSQL.=" SET Balance = '$balance',Issued = '$issued ' WHERE ID = '$ID'";
            $updateRes = mysql_query($updateSQL);

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
        <h4 class="modal-title">Add New Bin</h4>
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
                     <form action="bincard_add_new_action.php" method="post" name="form1">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>DATE DELIVER</b></label>
                            <div class="col-sm-9">
                                <input type="date"  class="form-control" placeholder="Bin Date" name="bincard_record_date" required="">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>SUPPLIER</b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" placeholder="Supplier" name="bincard_record_supplier" required="">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>P.O. NO./C.N. No.</b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" placeholder="P.O. NO./C.N. No." name="bincard_record_pono" >
                            </div>
                        </div>
                        <br><br>
                            <div class="form-group">
                            <label class="col-sm-3 control-label"><b>DESCRIPTION</b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" placeholder="Description" name="bincard_record_description" required="">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>QUANTITY</b></label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" placeholder="Quantity" name="bincard_record_qty" required="" onkeyup="numberInputOnly(this);">
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
<?php include ('footer.php');?>