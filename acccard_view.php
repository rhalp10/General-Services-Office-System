<?php
include('session.php');


$ID =$_REQUEST['accID'];

$result = mysql_query("SELECT * FROM emp_pgc_record WHERE accID = '$ID'");
$test = mysql_fetch_array($result);
$rows = mysql_num_rows($result);
                $emp_pgc_record_accID=$test['accID'];
                $emp_pgc_record_fullname=$test['fullName'] ;
                $emp_pgc_record_office=$test['office'];
                $emp_pgc_record_designation=$test['designation'] ;
               
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/favicon.png">

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
                          <li><a class="" href="Custodian.php">Custodian Slip</a></li>
                      </ul>
                  </li>
                             
                  <li class="">
                      <a class="" href="emplist.php">
                          <i class="icon_clipboard"></i>
                          <span>Employee  List</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu ">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Report</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                   
                          <li><a class="" href="account_report.php">Account</a></li>
                          <li><a class="" href="acccard_report.php">PGC Account Card</a></li>
                          <li><a class="" href="accreceipt_report.php">Accountability Receipt</a></li>
                          <li><a class="" href="returnslip_report.php">Return Slip</a></li>
                          <li><a class="" href="bincard_report.php"><span>Bincard</span></a></li>
                          <li><a class="" href="Custodian_report.php">Custodian Slip</a></li>
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
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Profile View</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="icon_documents_alt"></i><a href="acccard.php">PGC Employee Accountability Card</a></li>
                        <li><i class="fa fa-user-md"></i><a href="acccard_view.php">PGC Employee Accountability Card View</a></li>
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
                            </div>
                            
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
                                  <li>
                                      <a href="" data-toggle="modal" data-target="#AddNewSet" class="btn-success">
                                          <i class="icon-user"></i>
                                          Add Set Item
                                      </a>
                                  </li>
                                  <li>
                                      <a href="" data-toggle="modal" data-target="#AddNewSingleItem" class="btn-success">
                                          <i class="icon-user"></i>
                                          Add Single Item
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
                                     
                                          <table class="table table-striped table-advance table-hover">
                                              <thead>
                                              <tr style="font-size: 12px;text-align: justify;">
                                                <th class="col-sm-1"> PAR/ICS NO</th>
                                                <th class="col-sm-1"> QTY</th>
                                                <th class="col-sm-1"> UNIT</th>
                                                <th class="col-sm-2"> DESCRIPTION</th>
                                                <th class="col-sm-1"> PROP NO.</th>
                                                <th class="col-sm-1"> AMOUNT</th>
                                                <th class="col-sm-1"> TRANSFER TO</th>
                                                <th class="col-sm-1"> DATE TURN OVER</th>
                                                <th class="col-sm-1"> REMARKS</th>
                                                <th class="col-sm-1"> ACTION</th>
                                                 
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <?php
                                              //Query for all accountability record
                                              $result = mysql_query("SELECT * FROM emp_accountability_card WHERE Emp_ID ='$ID' " ); //
                                              //Fetching all data
                                              while($test = mysql_fetch_array($result))
                                                  {
                                                    
                                                    
                                                  $SpartSetID = $test['ItemSetID'];
                                                  $SitemCode = $test['itemCode'];
                                                //-------------------------------------------------
                                                //SET IF STATEMENT
                                                //-------------------------------------------------   
                                                    if ("SET ".$test['ItemSetID'] == $test['itemCode'])//SET
                                                    {
                                                        
                                                      if ($test['DateTurnOver'] == '0000-00-00'  && $test['TransferTo'] == 'null' || $test['TransferTo'] == ' ' )
                                                      {
                                                        
                                                        echo "<tr>"; 
                                                        echo"<td><font color='black'>" .$test['ParNo']."</font></td>";
                                                        echo"<td><font color='black'>". $test['Qty']. "</font></td>";
                                                        echo"<td><font color='black'>" .$test['Unit']."</font></td>";
                                                        echo"<td><font color='black'>" .$test['Descrp']."</font></td>";
                                                        echo"<td><font color='black'>" .$test['PropNo']."</font></td>";
                                                        echo"<td><font color='black'>" .$test['Amount']."</font></td>";
                                                        if ($test['TransferTo'] == 'null'){
                                                        echo"<td><font color='black'></font></td>";
                                                        }
                                                        else{
                                                        echo"<td><font color='black'> ".$test['TransferTo']."</font></td>"; 
                                                        }
                                                        echo"<td></td>";
                                                        echo"<td><font color='black'>" .$test['DateTurnOver']."</font></td>";
                                                        ?>
                                                                                                  <td><div class="btn-group">
                                                                                                <a class="btn btn-primary" href="" >Action</a>
                                                                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="" title="Bootstrap 3 themes generator"><span class="caret"></span></a>
                                                                                                <ul class="dropdown-menu">
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Add Part</a></li>
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Edit Set</a></li>
                                                                                                  <li class="divider"></li>
                                                                                                  <li><a href="acccard_add.php?acc_card_recordID=<?php echo $test['ID']; ?>"  data-toggle="modal" data-target="#myModal">Delete Set</a></li>
                                                                                                </ul>
                                                                                          </div></td>
                                                                                                  <?php 
                                                                                                           
                                                              echo "</tr>";

                                                              //Query for all parts of sets
                                                              $itemSet = "PART ".$test['ItemSetID'];
                                                        $result1 = mysql_query("SELECT * FROM emp_accountability_card WHERE itemCode = '$itemSet'");
                                                        while($test1 = mysql_fetch_array($result1))//PARTS OF SET 
                                                          { //IF STATEMENT OF DATETURN OVER AND TRANSFER TO
                                                            if ($test1['DateTurnOver'] == '0000-00-00'  && $test1['TransferTo'] == 'null' || $test1['TransferTo'] == ' ' )
                                                            {
                                                              echo "<tr>"; 
                                                              echo"<td><font color='black'>" .$test['ParNo']."</font></td>";
                                                            echo"<td><font color='black'>". $test['Qty']. "</font></td>";
                                                            echo"<td><font color='black'>" .$test['Unit']."</font></td>";
                                                            echo"<td><font color='black'>" .$test['Descrp']."</font></td>";
                                                            echo"<td><font color='black'>" .$test['PropNo']."</font></td>";
                                                            echo"<td><font color='black'>" .$test['Amount']."</font></td>";
                                                              if ($test1['TransferTo'] == 'null'){
                                                              echo"<td><font color='black'></font></td>";
                                                              }
                                                              else{
                                                              echo"<td><font color='black'> ".$test1['TransferTo']."</font></td>";  
                                                              }
                                                              echo"<td></td>";
                                                              echo"<td><font color='black'>" .$test1['DateTurnOver']."</font></td>";
                                                              
                                                              ?>
                                                                                                  <td><div class="btn-group">
                                                                                                <a class="btn btn-primary" href="" >Action</a>
                                                                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="" title="Bootstrap 3 themes generator"><span class="caret"></span></a>
                                                                                                <ul class="dropdown-menu">
                                                                                                  
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Edit Part</a></li>
                                                                                                  <li class="divider"></li>
                                                                                                  <li><a href="acccard_add.php?acc_card_recordID=<?php echo $test['ID']; ?>"  data-toggle="modal" data-target="#myModal">Delete Part</a></li>
                                                                                                </ul>
                                                                                          </div></td>
                                                                              <?php 
                                                                        echo "</tr>";

                                                                                                           
                                                            }
                                                            else
                                                            {
                                                              echo "<tr>"; 
                                                              echo"<td><font color='red'>" .$test['ParNo']."</font></td>";
                                                            echo"<td><font color='red'>". $test['Qty']. "</font></td>";
                                                            echo"<td><font color='red'>" .$test['Unit']."</font></td>";
                                                            echo"<td><font color='red'>" .$test['Descrp']."</font></td>";
                                                            echo"<td><font color='red'>" .$test['PropNo']."</font></td>";
                                                            echo"<td><font color='red'>" .$test['Amount']."</font></td>";
                                                              if ($test1['TransferTo'] == 'null'){
                                                              echo"<td><font color='red'></font></td>";
                                                              }
                                                              else{
                                                              echo"<td><font color='red'> ".$test1['TransferTo']."</font></td>";  
                                                              }
                                                              echo"<td></td>";
                                                              echo"<td><font color='red'>" .$test1['DateTurnOver']."</font></td>";
                                                               ?>
                                                                                                  <td><div class="btn-group">
                                                                                                <a class="btn btn-primary" href="" >Action</a>
                                                                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="" title="Bootstrap 3 themes generator"><span class="caret"></span></a>
                                                                                                <ul class="dropdown-menu">
                                                                                                  
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Edit Part</a></li>
                                                                                                  <li class="divider"></li>
                                                                                                  <li><a href="acccard_add.php?acc_card_recordID=<?php echo $test['ID']; ?>"  data-toggle="modal" data-target="#myModal">Delete Part</a></li>
                                                                                                </ul>
                                                                                          </div></td>
                                                                              <?php 
                                                                        echo "</tr>";
                                                            }

                                                          
                                                          
                                                              } //end of else of secod while
                                                          }
                                                          else
                                                          {
                                                              echo "<tr>"; 
                                                              echo"<td><font color='red'>" .$test['ParNo']."</font></td>";
                                                            echo"<td><font color='red'>". $test['Qty']. "</font></td>";
                                                            echo"<td><font color='red'>" .$test['Unit']."</font></td>";
                                                            echo"<td><font color='red'>" .$test['Descrp']."</font></td>";
                                                            echo"<td><font color='red'>" .$test['PropNo']."</font></td>";
                                                            echo"<td><font color='red'>" .$test['Amount']."</font></td>";
                                                            if ($test['TransferTo'] == 'null'){
                                                            echo"<td><font color='red'></font></td>";
                                                            }
                                                            else{
                                                            echo"<td><font color='red'> ".$test['TransferTo']."</font></td>"; 
                                                            }
                                                            echo"<td></td>";
                                                            echo"<td><font color='red'>" .$test['DateTurnOver']."</font></td>";

                                                                                                  ?>
                                                                                                  <td><div class="btn-group">
                                                                                                <a class="btn btn-primary" href="" >Action</a>
                                                                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="" title="Bootstrap 3 themes generator"><span class="caret"></span></a>
                                                                                                <ul class="dropdown-menu">
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Add Part</a></li>
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Edit Set</a></li>
                                                                                                  <li class="divider"></li>
                                                                                                  <li><a href="acccard_add.php?acc_card_recordID=<?php echo $test['ID']; ?>"  data-toggle="modal" data-target="#myModal">Delete Set</a></li>
                                                                                                </ul>
                                                                                          </div></td>
                                                                                                  <?php 
                                                                  echo "</tr>";

                                                                   //Query for all parts of sets
                                                                  $itemSet = "PART ".$test['ItemSetID'];
                                                            $result1 = mysql_query("SELECT * FROM emp_accountability_card WHERE itemCode = '$itemSet'");
                                                            while($test1 = mysql_fetch_array($result1))//PARTS OF SET 
                                                              { //IF STATEMENT OF DATETURN OVER AND TRANSFER TO
                                                                if ($test1['DateTurnOver'] == '0000-00-00'  && $test1['TransferTo'] == 'null' || $test1['TransferTo'] == ' ' )
                                                                {
                                                                  echo "<tr>";
                                                                  echo"<td><font color='black'>" .$test['ParNo']."</font></td>";
                                                                  echo"<td><font color='black'>". $test['Qty']. "</font></td>";
                                                                  echo"<td><font color='black'>". $test['Unit']. "</font></td>";
                                                                  echo"<td><font color='black'>". $test['Descrp']. "</font></td>";
                                                                  echo"<td><font color='black'>". $test['PropNo']. "</font></td>";
                                                                  echo"<td><font color='black'>". $test['Amount']. "</font></td>";
                                                                  if ($test1['TransferTo'] == 'null'){
                                                                  echo"<td><font color='black'></font></td>";
                                                                  }
                                                                  else{
                                                                  echo"<td><font color='black'> ".$test1['TransferTo']."</font></td>";  
                                                                  }
                                                                  echo"<td></td>";
                                                                  echo"<td><font color='black'>" .$test1['DateTurnOver']."</font></td>";
                                                                   ?>
                                                                                                  <td><div class="btn-group">
                                                                                                <a class="btn btn-primary" href="" >Action</a>
                                                                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="" title="Bootstrap 3 themes generator"><span class="caret"></span></a>
                                                                                                <ul class="dropdown-menu">
                                                                                                  
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Edit Part</a></li>
                                                                                                  <li class="divider"></li>
                                                                                                  <li><a href="acccard_add.php?acc_card_recordID=<?php echo $test['ID']; ?>"  data-toggle="modal" data-target="#myModal">Delete Part</a></li>
                                                                                                </ul>
                                                                                          </div></td>
                                                                              <?php 
                                                                            echo "</tr>";
                                                                }
                                                                else
                                                                {
                                                                  echo "<tr>";
                                                                  echo"<td><font color='red'>" .$test['ParNo']."</font></td>";
                                                                  echo"<td><font color='red'>". $test['Qty']. "</font></td>";
                                                                  echo"<td><font color='red'>". $test['Unit']. "</font></td>";
                                                                  echo"<td><font color='red'>". $test['Descrp']. "</font></td>";
                                                                  echo"<td><font color='red'>". $test['PropNo']. "</font></td>";
                                                                  echo"<td><font color='red'>". $test['Amount']. "</font></td>";
                                                                  if ($test['TransferTo'] == 'null'){
                                                                  echo"<td><font color='black'></font></td>";
                                                                  }
                                                                  else{
                                                                  echo"<td><font color='red'> ".$test1['TransferTo']."</font></td>";  
                                                                  }
                                                                  echo"<td></td>";
                                                                  echo"<td><font color='red'>" .$test1['DateTurnOver']."</font></td>";
                                                                   ?>
                                                                                                  <td><div class="btn-group">
                                                                                                <a class="btn btn-primary" href="" >Action</a>
                                                                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="" title="Bootstrap 3 themes generator"><span class="caret"></span></a>
                                                                                                <ul class="dropdown-menu">
                                                                                                  
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Edit Part</a></li>
                                                                                                  <li class="divider"></li>
                                                                                                  <li><a href="acccard_add.php?acc_card_recordID=<?php echo $test['ID']; ?>"  data-toggle="modal" data-target="#myModal">Delete Part</a></li>
                                                                                                </ul>
                                                                                          </div></td>
                                                                              <?php 
                                                                            echo "</tr>";
                                                                }

                                                              
                                                              
                                                                  } //end of else of secod while
                                                          }
                                                        }  

                                                //-------------------------------------------------
                                                //SET IF STATEMENT END
                                                //------------------------------------------------- 

                                                //-------------------------------------------------
                                                //SINGLE PART/SET IF STATEMENT
                                                //-------------------------------------------------

                                                  if ("SPART ".$test['ItemSetID'] == $test['itemCode'])
                                                  {
                                                    
                                                    if ($test['DateTurnOver'] == '0000-00-00'  && $test['TransferTo'] == 'null' || $test['TransferTo'] == ' ' )
                                                    {
                                                    echo "<tr>"; 
                                                    echo"<td><font color='black'>" .$test['ParNo']."</font></td>";
                                                    echo"<td><font color='black'>". $test['Qty']. "</font></td>";
                                                    echo"<td><font color='black'>" .$test['Unit']."</font></td>";
                                                    echo"<td><font color='black'>" .$test['Descrp']."</font></td>";
                                                    echo"<td><font color='black'>" .$test['PropNo']."</font></td>";
                                                    echo"<td><font color='black'>" .$test['Amount']."</font></td>";
                                                    if ($test['TransferTo'] == 'null'){
                                                    echo"<td><font color='black'></font></td>";
                                                    }
                                                    else{
                                                    echo"<td><font color='black'> ".$test['TransferTo']."</font></td>"; 
                                                    }
                                                    echo"<td><font color='black'>" .$test['Remarks']."</font></td>";
                                                    echo"<td><font color='black'>" .$test['DateTurnOver']."</font></td>";
                                                    ?>
                                                                                                  <td><div class="btn-group">
                                                                                                <a class="btn btn-primary" href="" >Action</a>
                                                                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="" title="Bootstrap 3 themes generator"><span class="caret"></span></a>
                                                                                                <ul class="dropdown-menu">
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Add Part</a></li>
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Edit Set</a></li>
                                                                                                  <li class="divider"></li>
                                                                                                  <li><a href="acccard_add.php?acc_card_recordID=<?php echo $test['ID']; ?>"  data-toggle="modal" data-target="#myModal">Delete Set</a></li>
                                                                                                </ul>
                                                                                          </div></td>
                                                                                                  <?php 
                                                      echo "</tr>";
                                                        }
                                                        else
                                                        {
                                                      
                                                            echo "<tr>"; 
                                                            echo"<td><font color='red'>" .$test['ParNo']."</font></td>";
                                                            echo"<td><font color='red'>". $test['Qty']. "</font></td>";
                                                            echo"<td><font color='red'>". $test['Unit']. "</font></td>";
                                                            echo"<td><font color='red'>". $test['Descrp']. "</font></td>";
                                                            echo"<td><font color='red'>". $test['PropNo']. "</font></td>";
                                                            echo"<td><font color='red'>". $test['Amount']. "</font></td>";
                                                            if ($test['TransferTo'] == 'null'){
                                                            echo"<td><font color='black'></font></td>";
                                                            }
                                                            else{
                                                            echo"<td><font color='red'> ".$test['TransferTo']."</font></td>"; 
                                                            }
                                                            echo"<td></td>";
                                                            echo"<td><font color='red'>" .$test['DateTurnOver']."</font></td>";
                                                            ?>
                                                                                                  <td><div class="btn-group">
                                                                                                <a class="btn btn-primary" href="" >Action</a>
                                                                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="" title="Bootstrap 3 themes generator"><span class="caret"></span></a>
                                                                                                <ul class="dropdown-menu">
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Add Part</a></li>
                                                                                                  <li><a href="acccard_edit.php?acc_card_recordID=<?php echo $test['ID']; ?>" >Edit Set</a></li>
                                                                                                  <li class="divider"></li>
                                                                                                  <li><a href="acccard_add.php?acc_card_recordID=<?php echo $test['ID']; ?>"  data-toggle="modal" data-target="#myModal">Delete Set</a></li>
                                                                                                </ul>
                                                                                          </div></td>
                                                                                                  <?php 
                                                                      echo "</tr>";
                                                    }
                                                      }
                                                
                                                //-------------------------------------------------
                                                //SINGLE PART/SET IF STATEMENT END
                                                //------------------------------------------------- 

                                                  }// Parent While End
                                              ?>
                                           </tbody>

                                        </table>
                                        <a class="btn btn-info pull-right" href="" title="Print" name="submit"><span class="icon_printer"></span> PRINT</a>
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
<div id="AddNewSet" class="modal fade " role="dialog">
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
                     <form action="" method="post" name="form1">
                     <table class="table table-striped table-advance table-hover">
                         <thead>
                            <tr>
                              <td class="col-sm-1">PAR/ICS</td>
                              <td  class="col-sm-1">QTY</td>
                              <td  class="col-sm-1">UNIT</td>
                              <td  class="col-sm-1">DESCRIPTION</td>
                            </tr>
                            </thead>
                             <tbody>
                              <tr>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
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
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                            </tr>
                          </tbody>
                        </table>

                            
                    </form>
                    </div>
                </section>
            </div>

        </div>
     <div class="row">
          <div class="col-lg-12">
                        
                <section class="panel">
                        <header class="panel-heading">
                         Part Set Info:
                         </header>
                    <div class="panel-body">
                     <form action="" method="post" name="form1">
                        <table class="table table-striped table-advance table-hover">
                          <thead>
                           
                            <tr>
                              <td  class="col-sm-1">DESCRIPTION</td>
                              <td  class="col-sm-1">PROP NO.</td>
                              <td  class="col-sm-1">TRANSFER TO</td>
                              <td  class="col-sm-1">REMARKS</td>
                              <td  class="col-sm-1">DATE TURN OVER</td>
                            </tr>
                            </tr>
                          </thead>
                          <tbody>
                            
                              <tr>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                              <td><input type="" name="" value=""></td>
                            </tr>
                          </tbody>
                        </table>
                        
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
<!-- Modal FOR FOR SINGLE ITEM-->
<div id="AddNewSingleItem" class="modal fade " role="dialog">
  <div class="modal-dialog" style="width: 800px; height: 900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Single Item</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
                         
                <section class="panel">
                        <header class="panel-heading">
                         Item Info:
                         </header>
                    <div class="panel-body">
                     <form action="" method="post" name="form1">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>NAME</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Name" name="pgc_emp_ac_name">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>DESIGNATION</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Designation" name="pgc_emp_ac_designation">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><b>OFFICE</b></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" placeholder="Office" name="pgc_emp_ac_office">
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/moment.js"></script>
    <script type="text/javascript">
  
  var datetime = null,
        date = null;

  var update = function () {
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
