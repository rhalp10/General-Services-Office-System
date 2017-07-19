<?php 
$prsID = $_REQUEST['prsID'];
 include('db.php');
    $sql ="DELETE FROM";
    $sql.=" property_return_slip_record WHERE ID = '$prsID'";
    $result = mysql_query($sql);
    echo "<script>alert('Deleted successfully');
                                        window.location='returnslip.php';
                                    </script>";
?>