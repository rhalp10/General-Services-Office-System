<?php
    $ID = $_REQUEST['ID'];
    include('db.php');
    $sql1 = "SELECT *";
	$sql1.= " FROM invent_custodian_slip_descrp WHERE ID = '$ID'";
	$res = mysql_query($sql1);
	$row = mysql_fetch_array($res);
	$icsID = $row['icsID'];
    $result = mysql_query("DELETE FROM invent_custodian_slip_descrp WHERE ID = '$ID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='ics_view.php?icsID=".$icsID."';
                                    </script>";

?>