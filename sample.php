<?php
include('session.php');


//$ID =$_REQUEST['accID'];
$ID = '2';
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
 <table class="table table-striped table-advance table-hover">
 <thead>
 	<th>SET</th>
 	<th>PAR/ICS NO</th>
 	<th>QTY</th>
 	<th>UNIT</th>
 	<th>DESCRIPTION</th>
 	<th>PROP NO.</th>
 	<th>AMOUNT</th>
 	<th>TRANSFER TO</th>
 	<th>REMARKS</th>
 	<th>DATE TURN OVER</th>
 	<th>ACTION</th>
 </thead>
    <tbody>
<?php
include("db.php");
//Query for all accountability record
$result = mysql_query("SELECT * FROM emp_accountability_card  " ); //WHERE Emp_ID ='$ID'
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
<!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>

</body>
</html>