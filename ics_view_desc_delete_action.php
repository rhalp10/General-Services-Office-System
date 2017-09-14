<?php
    $ID = $_REQUEST['ID'];
    include('db.php');
    $sql1 = "SELECT *";
	$sql1.= " FROM invent_custodian_slip_descrp WHERE ID = '$ID'";
	$res = mysqli_query($con,$sql1);
	$row = mysqli_fetch_array($res);
	$icsID = $row['icsID'];
    $result = mysqli_query($con,"DELETE FROM invent_custodian_slip_descrp WHERE ID = '$ID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='ics_view.php?icsID=".$icsID."';
                                    </script>";

?>