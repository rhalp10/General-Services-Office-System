<?php 
include('db.php');
$parID = $_REQUEST['ID'];
if (isset($_POST['Submit'])) {
	$edit_par = $_POST['edit_par'];
	$edit_qty = $_POST['edit_qty'];
	$edit_unit = $_POST['edit_unit'];
	$edit_descrp = $_POST['edit_descrp'];
	$edit_propNo = $_POST['edit_propNo'];
	$edit_RecByname = $_POST['edit_RecByname'];
	$edit_RecBypos = $_POST['edit_RecBypos'];
	$edit_RecBydate = $_POST['edit_RecBydate'];
	$edit_RecFrmname = $_POST['edit_RecFrmname'];
	$edit_RecFrmpos = $_POST['edit_RecFrmpos'];
	$edit_RecFrmdate = $_POST['edit_RecFrmdate'];

	$sql = "UPDATE property_accountability_receipt_record";
	$sql.=" SET Qty = '$edit_qty', Unit = '$edit_unit', Descrp = '$edit_descrp', PropNo = '$edit_propNo', ReceivedFrom_Name = '$edit_RecFrmname', ReceivedFrom_Position = '$edit_RecFrmpos', ReceivedFrom_Date = '$edit_RecFrmdate', ReceivedBy_Name = '$edit_RecByname', ReceivedBy_Position = '$edit_RecBypos', ReceivedBy_Date = '$edit_RecBydate', PAR = '$edit_par' WHERE ID = $parID";

	$result = mysql_query($sql);
	echo "<script>alert('Update info successfully');
                                        window.location='accreceipt.php';
                                    </script>";
}
?>