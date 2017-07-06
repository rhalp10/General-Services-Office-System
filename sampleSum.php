<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>BINCARD</title>

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
<?php
include("db.php");




$itemIssued_res = mysql_query("SELECT sum(Issued) As val_Issued FROM bincard_record WHERE itemCode = 'SET SP-01'") ;
$itemIssued = mysql_fetch_assoc($itemIssued_res);//item issued summation 

$itemSetQuantity_res = mysql_query("SELECT Qty FROM bincard_record WHERE ItemSetID = 'SP-01'") ;
$itemSetQuantity = mysql_fetch_assoc($itemSetQuantity_res);//item sets

$itemBalance = $itemSetQuantity['Qty'] - $itemIssued['val_Issued'];
echo "Total item Issued:".$itemIssued['val_Issued']."<br>";
echo "Item Quantity:".$itemSetQuantity['Qty']."<br>";
echo "Item Balance: $itemBalance";


	

 ?>

 <table class="table table-striped table-advance table-hover">
 	<thead>
 		<tr>
 			<td>SET</td>
 			<td>BIN DATE</td>
 			<td>SUPPLIER</td>
 			<td>DESC</td>
 			<td>SERIAL NUM</td>
 			<td>RECIPIENT</td>
 			<td>QTY</td>
 			<td>issued</td>
 			<td>bal</td>
 		</tr>
 	</thead>
 	<tbody>

 		

 			<?php 
			$itemSetpart_res = mysql_query("SELECT * FROM bincard_record  WHERE itemCode =  'SET SP-01'");//All PartSet Display 
			 
			while ($itemSetpart = mysql_fetch_array($itemSetpart_res)) 
			{
			?>
			<tr>
			<td><?php echo $itemSetpart['ItemSetID'] ?></td>
 			<td><?php echo $itemSetpart['bin_Date'] ?></td>
 			<td><?php echo $itemSetpart['Supplier'] ?></td>
 			<td><?php echo $itemSetpart['Descrp'] ?></td>
 			<td><?php echo $itemSetpart['Serial_Num'] ?></td>
 			<td><?php echo $itemSetpart['Recpnt'] ?></td>
 			<td><?php echo $itemSetpart['Qty'] ?></td>
 			<td><?php echo $itemSetpart['Issued'] ?></td>
 			<td><?php echo $itemSetpart['Balance'] ?></td>
 			</tr>
 			<?php
 			}  
 			?>
 		<tr>
 			
 		</tr>
 	</tbody>
 </table>


 </body>