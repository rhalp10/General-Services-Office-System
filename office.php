 <?php
include('session.php');
include('db.php');
$sql = "SELECT *";
$sql.=" FROM office_dictionary";
$query=mysql_query($sql);
if ($login_level != '0') 
{
  header("location: index.php");
}
$page = "Office";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>Office List</title>

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
					<h3 class="page-header"><i class="fa fa fa-clipboard"></i>Office LIST</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
						<li><i class="fa fa-clipboard"></i>Office List</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <header class="panel-heading tab-bg-primary " style="padding:15px; height: 70px;">
                       <a class="btn btn-success pull-left" href="" data-toggle="modal" data-target="#addNewOffice"><span class="fa fa-plus-circle"></span>&nbsp;&nbsp;Add New Office</a>
                          
                          </header>
              <table id="myData"  class="table table-bordered table-advance table-hover ">
                                <thead>
                                  <tr>
                                      <th class="col-sm-8"> Office Name</th>
                                      <th class="col-sm-3"> Office Code</th>
                                      <th class="col-sm-1"> Action</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                while( $row=mysql_fetch_array($query) ) { 
                                  $officeID = $row['ID'];
                                ?>
                                  <tr>
                                    <td><?php echo $row["officeName"];?></td>
                                    <td><?php echo $row["officeCode"];?></td>

                                    <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">Action</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a  data-toggle="modal" data-target="#edit<?php echo $officeID; ?>">Edit</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a data-toggle="modal" data-target="#delete<?php echo $officeID; ?>">Delete</a></li>
                                      </ul>
                                    </div>
                                    </td>
                                  </tr>

                                <!-- Edit Modal  -->
                                <div id="edit<?php echo $officeID = $row['ID']; ?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Office</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form  class="form-horizontal" method="post" role="form" action="office_edit_action.php?officeID=<?php echo $officeID; ?>">
                                        <div class="form-group">
                                          <label class="control-label" for="email">Office Name:</label>
                                          <div>
                                            <input type="text" class="form-control" id="office" placeholder="<?php echo $row["officeName"];?>" name="officeName_edit" value="<?php echo $row["officeName"];?>">
                                          <label class="control-label" for="email">Office Code:</label>
                                          <div >
                                            <input type="text" class="form-control" id="office" placeholder="<?php echo $row["officeName"];?>" name="officeCode_edit" value="<?php echo $row["officeCode"];?>">
                                          </div>
                                        </div>
                                        <br>
                                        <br>
                                            <input class="btn btn-success col-md-offset-3 col-xs-3"  type="submit" name="Update" value="Update">
                                            <input type="button" class="btn btn-danger col-xs-3"  data-dismiss="modal" value="Cancel" style="margin-left: 10px;">
                                        <br>
                                        <br>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div><!-- End Edit Modal  -->
                                <!-- Delete Modal  -->
                                <div id="delete<?php echo $officeID = $row['ID']; ?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Office</h4>
                                      </div>
                                      <div class="modal-body">
                                      <center>
                                      <h1>Are you sure ?</h1>
                                        <a class="btn btn-success" href="office_delete_action.php?officeID=<?php echo $officeID; ?>">DELETE</a>
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

<!-- Add new officeModal -->
<div id="addNewOffice" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Office</h4>
      </div>
      <div class="modal-body">
       <form class="form" role="form" method="post" action="office_add_action.php">
  <div class="form-group">
    <label for="email">Office Name:</label>
    <input type="text" class="form-control" name="office_add">
    <label for="email">Office Code:</label>
    <input type="text" class="form-control" name="office_code">
  </div>
  <input type="submit" class="btn btn-success col-md-offset-3 col-xs-3" name="Submit"><input type="button" class="btn btn-danger col-xs-3"  data-dismiss="modal" value="Cancel">
  

</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div><!-- END new officeModal -->

  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">

    //OLD DELETE FUNCTION RECORD 
   // function confirmDelete(id) {
        
   //     var r = confirm('Do you want to delete?');
  //      if (r == true) {
  //        window.location='office_delete_action.php?officeID='+id;
  //      } else {
 //           window.location='office.php';
 //       }
  //  }
      $('#myData').dataTable();
    </script>

  </body>
</html>
