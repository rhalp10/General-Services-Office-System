<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gso_data";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$ID = $_REQUEST['accID'];
$columns = array( 
// datatable column index  => database column name
	0 =>'Descrp', 
	1 => 'TransferTo',
	2 => 'Remarks',
	3 => 'Emp_ID',
	4 => 'PropNo',
	5 => 'Qty',
	6 => 'Unit',
	7 => 'SN',
	8 => 'PropNo',
	9 => 'Amount',
	10 => 'DateTurnOver'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM emp_accountability_card WHERE Emp_ID = $ID";
$query=mysqli_query($conn, $sql) or die("acccard_emp-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT *";
$sql.=" FROM emp_accountability_card WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( Descrp LIKE '%".$requestData['search']['value']."%' ";    
	$sql.=" OR TransferTo LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR Remarks LIKE '%".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("acccard_emp-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("acccard_emp-data.php: get employees");

$data = array();

while( $row=mysqli_fetch_array($query) ) 
{  // preparing an array
	$accID = $row['Emp_ID'];
	$value = "<div class='btn-group'><a class='btn btn-primary' href=''>Action</a><a class='btn btn-primary dropdown-toggle' data-toggle='dropdown' href=''><span class='caret'></span></a><ul class='dropdown-menu'><li><a href='acccard_view.php?accID=$accID' >View</a></li><li><a  href='acccard_edit.php?accID=$accID' >Edit</a></li><li class='divider'></li><li><a onclick= 'confirmDelete($accID)'>Delete</a></li></ul></div>";
	$nestedData=array(); 
	if ("SET ".$row['ItemSetID'] == $row['itemCode'])//SET
	    {
	    	if ($row['DateTurnOver'] == '0000-00-00'  && $row['TransferTo'] == 'null' || $row['TransferTo'] == ' ' )
        	{
				$nestedData[] = $row['PropNo'];
				if ($row['Qty'] == 0) {
					$nestedData[] = "";
				}
				else
				{	
					$nestedData[] = $row['Qty']." ".$row['Unit'];
				}
				$nestedData[] = $row["Descrp"];
				$nestedData[] = $row["SN"];
				$nestedData[] = $row["PropNo"];
				if ($row["Amount"] == 0) 
				{
					$nestedData[] = "";
				}
				else
				{
					$nestedData[] = $row["Amount"];
				}
				if ($row['TransferTo'] == 'null') 
				{
					$nestedData[] = "";
				}
				else
				{
					$nestedData[] = $row["TransferTo"];
				}
				if ($row['DateTurnOver'] == '0000-00-00') 
				{	
					$nestedData[] = "";
				}
				else
				{
					$nestedData[] = $row["DateTurnOver"];
				}
				$nestedData[] = $row["Remarks"];
				$nestedData[] = $value;
				$data[] = $nestedData;
				//below this data[] i dont how to display this ! using json parser ?
				$itemSet = "PART ".$row['ItemSetID']; // variable for parts
				$sql1 = "SELECT *";
				$sql1.=" FROM emp_accountability_card WHERE itemCode = '$itemSet'";
				$query1=mysqli_query($conn, $sql1) or die("acccard_emp-data.php: get employees");
				$data1 = array();
				while ($row1=mysqli_fetch_array($query1) ) 
				{
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "BUTTON";
					$data1[] = $nestedData1;
				}

				
			}
			else
			{//display with red color font if having transferTo or DateturnOver
				$nestedData[] = $row['PropNo'];
				if ($row['Qty'] == 0) {
					$nestedData[] = "";
				}
				else
				{	
					$nestedData[] = "<font color ='red'>".$row['Qty']." ".$row['Unit']."</font>";
				}
				$nestedData[] = "<font color ='red'>".$row["Descrp"]."</font>";
				$nestedData[] = "<font color ='red'>".$row["SN"]."</font>";
				$nestedData[] = "<font color ='red'>".$row["PropNo"]."</font>";
				if ($row["Amount"] == 0) 
				{
					$nestedData[] = "";
				}
				else
				{
					$nestedData[] = "<font color ='red'>".$row["Amount"]."</font>";
				}
				if ($row['TransferTo'] == 'null') 
				{
					$nestedData[] = "";
				}
				else
				{
					$nestedData[] = "<font color ='red'>".$row["TransferTo"]."</font>";
				}
				if ($row['DateTurnOver'] == '0000-00-00') 
				{	
					$nestedData[] = "";
				}
				else
				{
					$nestedData[] = "<font color ='red'>".$row["DateTurnOver"]."</font>";
				}
				$nestedData[] = "<font color ='red'>".$row["Remarks"]."</font>";
				$nestedData[] = $value;
				$data[] = $nestedData;
				//below this data[] i dont how to display this ! using json parser ?
				$itemSet = "PART ".$row['ItemSetID']; // variable for parts
				$sql1 = "SELECT *";
				$sql1.=" FROM emp_accountability_card WHERE itemCode = '$itemSet'";
				$query1=mysqli_query($conn, $sql1) or die("acccard_emp-data.php: get employees");
				$data1 = array();
				while ($row1=mysqli_fetch_array($query1) ) 
				{
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "WAA";
					$nestedData1[] = "BUTTON";
					$data1[] = $nestedData1;
				}
				
			}
		}
	else
	{
		//color red
		
	}


}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);
echo json_encode($json_data);  // send data as json format
