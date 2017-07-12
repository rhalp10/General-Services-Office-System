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
              $Count = mysql_num_rows($query);
              $issuedCount = 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.pngs">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
    <h1>DATA TABLE</h1>
    
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
                <!-- Split button -->
<div class="btn-group">
  <button type="button" class="btn btn-danger">Action</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>

                </td>
              </tr>
              <?php 
              }

              ?>
      </tbody>
    </table>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <<script src="js/bootstrap.min.js"></script>
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
