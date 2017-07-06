
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/favicon.png">


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
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
         margin: 0mm;  /*this affects the margin in the printer settings */
        size: landscape; /*change orientation of page*/
        
    }

    @media print
  {
  .yourheader, .yourfooter {display:none;}
  }


</style>



<title>Sample code for print</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script><!--Only works on internet-->
<script scr="js/jspdf.min.js"></script><!--ofline version but i dont know why it didnt work ?-->
<script type="text/javascript"  >
function genPDF(){
var doc= new jsPDF();

doc.text(20,20,'TEST Message');
doc.addPage();
doc.text(20,20,'page2');
doc.save('text.pdf');
}

</script>

</head>
<body onload="window.print();">
<h1>PDF</h1>
<a href="javascript:genPDF();">Download</a>
<table class="table table-bordered" >
	<thead >
		<tr>
			<th>ACCOUNT CODE</th>
			<th>PAR NO</th>
			<th>QTY</th>
			<th>UNIT</th>
			<th>DESCRIPTION</th>
			<th colspan="2">AMOUNT	<br>UNIT COST | TOTAL			
			</th>
			<th>PROP.NO</th>
			<th>ACCOUNTABLE PERSON</th>
			<th>DESIGNATION OFFICE</th>
			<th>DATE RELEASE</th>
			<th>SUPPLIER</th>
			

		</tr>
		
	</thead>
	<tbody>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>

		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>

		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>
		<tr>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
			<td>a</td>
		</tr>

	</tbody>
</table>
</body>
</html>


