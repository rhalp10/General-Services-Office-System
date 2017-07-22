<?php 
$ID = $_REQUEST['ID'];
include('db.php');
if (isset($_POST['Submit'])) {
	$edit_desc = $_POST['edit_desc'.$ID];
	$edit_itemNo = $_POST['edit_itemNo'.$ID];
	$sql = "UPDATE invent_custodian_slip_descrp";
	$sql.= " SET Descrp = '$edit_desc', Invent_Item_No = '$edit_itemNo' WHERE ID = '$ID'";
	$result = mysql_query($sql);
	$sql1 = "SELECT *";
	$sql1.= " FROM invent_custodian_slip_descrp WHERE ID = '$ID'";
	$res = mysql_query($sql1);
	$row = mysql_fetch_array($res);
	echo "<script>alert('Update');
                                        window.location='ics_edit.php?icsID=".$row['icsID']."';
                                    </script>";
}
?>