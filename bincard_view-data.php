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


$bID = '1';
$columns = array( 
// datatable column index  => database column name
	0 => 'recpnt', 
	1 => 'issued_date',
	2 => 'bin_ID',
	3 => 'qty',
	4 => 'ID'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM bincard_issued_record WHERE bin_ID = $bID";
$query=mysqli_query($conn, $sql) or die("bincard_view-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT *";
$sql.=" FROM bincard_issued_record WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( recpnt LIKE '%".$requestData['search']['value']."%' ";    
	$sql.=" OR issued_date LIKE '%".$requestData['search']['value']."%' ";
}
$query=mysqli_query($conn, $sql) or die("bincard_view-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("bincard_view-data.php: get employees");

$data = array();

while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$issued_ID = $row['ID'];
	$value = "<div class='btn-group'><a class='btn btn-primary' href=''>Action</a><a class='btn btn-primary dropdown-toggle' data-toggle='dropdown' href=''><span class='caret'></span></a><ul class='dropdown-menu'><li></li><li><a  href='bincard_view_edit.php?ID=$issued_ID' >Edit</a></li><li></li><li class='divider'></li><li><a  onclick= 'confirmDelete($issued_ID)'>Delete</a></li></ul></div>";
	$nestedData=array(); 
	
	$nestedData[] = $row["issued_date"];
	$nestedData[] = 'DESCRPT';
	$nestedData[] = $row["recpnt"];
	$nestedData[] = $row["qty"];
	$nestedData[] = $row["qty"];
	$nestedData[] = $value;
	$data[] = $nestedData;


}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
