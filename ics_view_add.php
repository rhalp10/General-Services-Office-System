<?php 
include('db.php');
$icsID = $_REQUEST['icsID'];
if (isset($_POST['Submit'])) {
	$Descrp = $_POST['icsView_Desc'];
	$itemNo = $_POST['icsView_ItemNo'];
	$sql = "INSERT INTO invent_custodian_slip_descrp (icsID,Descrp,Invent_Item_No)";
	$sql.=" VALUES ('$icsID','$Descrp','$itemNo')";
	$res = mysql_query($sql);
	echo "<script>alert('Item Descrp Successfuly Add');
	                                     window.location='ics_view.php?icsID=$icsID';
	                                 </script>";
	
}
?>