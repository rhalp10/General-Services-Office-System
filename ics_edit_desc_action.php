<?php 
$ID = $_REQUEST['ID'];
$icsID = $_REQUEST['icsID'];
include('db.php');
if (isset($_POST['Submit'])) {
	$edit_desc = $_POST['edit_desc'.$ID];
	$edit_itemNo = $_POST['edit_itemNo'.$ID];
	$sql = "UPDATE invent_custodian_slip_descrp";
	$sql.= " SET Descrp = '$edit_desc', Invent_Item_No = '$edit_itemNo' WHERE ID = '$ID'";
	$result = mysql_query($sql);
	echo "<script>alert('Update info successfully');
                                        window.location='ics_edit.php?icsID=$icsID';
                                    </script>";
}
?>