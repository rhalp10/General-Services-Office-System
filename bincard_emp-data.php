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


$columns = array( 
// datatable column index  => database column name
	0 => 'bin_Date', 
	1 => 'Supplier',
	2 => 'Descrp',
	3 => 'Qty',
	4 => 'Issued',
	5 => 'Balance',
	6 => 'InventCode'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM bincard_record";
$query=mysqli_query($conn, $sql) or die("bincard_emp-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT *";
$sql.=" FROM bincard_record WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( Supplier LIKE '%".$requestData['search']['value']."%' ";    
	$sql.=" OR Descrp LIKE '%".$requestData['search']['value']."%' ";
}
$query=mysqli_query($conn, $sql) or die("bincard_emp-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/Descrp  */	
$query=mysqli_query($conn, $sql) or die("bincard_emp-data.php: get employees");

$data = array();

while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$ID = $row['ID'];
	$InventCode = $row['InventCode'];

	$sql1 ="SELECT *";
	$sql1.=" FROM inventory_dictionary WHERE Invent_ID = '$InventCode'";
	$qr1 = mysqli_query($conn,$sql1)  or die("bincard_emp-data.php: get employees");
	$row1 = mysqli_fetch_array($qr1);
    
   
    if ($row1['Invent_ID'] == '3')
    { 
       $Inv =  $row1['AC_name(New)'];
    }
    else if($row1['Invent_ID'] == '23')
    { 
        $Inv = $row1['AC_Name(Old)'];
    }
    else if ($row1['AC_name(New)'] == 'Disaster Response & Rescue Equipment')
    { 
        $Inv = $row1['AC_Name(Old)']." (".$row1['AC_name(New)'].")";
    }
    else if ($row1['AC_name(New)'] == 'Construction in Progress- Infrastructure Assets')
    {
        $Inv = $row1['AC_Name(Old)']. " (".$row1['AC_name(New)'].")";
    }
    else
    { 
        $Inv =  $row1['AC_name(New)'];
    }    
                                          
	$value = "<div class='btn-group'><a class='btn btn-primary' href=''>Action</a><a class='btn btn-primary dropdown-toggle' data-toggle='dropdown' href=''><span class='caret'></span></a><ul class='dropdown-menu'><li></li><li><a href='bincard_edit.php?accID=$ID' >Edit</a></li><li><a href='bincard_add.php?ID=$ID' >Add</a></li><li class='divider'></li><li><a href='bincard_delete_action.php?ID=$ID'>Delete</a></li></ul></div>";
	$value1 = " $Inv";
	$nestedData=array(); 

	$nestedData[] = $row["bin_Date"];
	$nestedData[] = $Inv;
	$nestedData[] = $row["Supplier"];
	$nestedData[] = $row['Descrp'];
	$nestedData[] = $row["Qty"];
	$nestedData[] = $row["Issued"];
	$nestedData[] = $row["Balance"];
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
