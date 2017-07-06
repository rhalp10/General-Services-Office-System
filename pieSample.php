
<?php 

include('session.php');

$totalresult = mysql_query("SELECT * FROM emp_accounts_record");
$totalAcc = mysql_num_rows($totalresult);
$adminresult = mysql_query("SELECT * FROM emp_accounts_record WHERE accLevel = 0");
$totaladmin = mysql_num_rows($adminresult);
$empresult = mysql_query("SELECT * FROM emp_accounts_record WHERE accLevel = 1 or accLevel = 2 or accLevel = 3");
$totalemp = mysql_num_rows($empresult);

$totalValue = 500;
$currentValue = 30;

$AdminPercentage=($totaladmin / $totalAcc) * 100; 
$EmployeePercentage=($totalemp / $totalAcc) * 100; 


$AdminPercentageJS="$AdminPercentage";
$js_outAdmin = json_encode($AdminPercentageJS);
$EmployeePercentageJS="$EmployeePercentage";
$js_outEmp = json_encode($EmployeePercentageJS);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>BIN Card</title>

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

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<script src="js/Chart.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

		
		
		<style>
			canvas{
			}
		</style>
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

<html>
	
	<body>
		<canvas id="canvas" height="500" width="500"></canvas>
		<?php
		echo "Admin: <b>$totaladmin</b> &nbsp;";
		echo "Employee: <b>$totalemp</b>&nbsp;";
		echo "Total Registered Account: <b>$totalAcc</b>";
		  ?>


	<script>

    var adminPercent = <?php echo $js_outAdmin; ?>;
    var empPercent = <?php echo $js_outEmp; ?>;
    var adminParse = parseInt(adminPercent);
    var empParse = parseInt(empPercent);
    var a = adminParse;
    var b = empParse;
		var pieData = [
				{
					value: a,
					color:"#f33030"
				},
				{
					value : b,
					color : "#00a0df"
				}
			
			];

	var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
	
	</script>
	</body>
</html>
