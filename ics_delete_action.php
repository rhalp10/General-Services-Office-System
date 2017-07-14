<?php
    $icsID = $_REQUEST['icsID'];
    include('db.php');
    $result = mysql_query("DELETE FROM invent_custodian_slip WHERE ID = '$icsID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='ics.php';
                                    </script>";

?>