<?php
    $icsID = $_REQUEST['icsID'];
    include('db.php');
    $result = mysqli_query($con,"DELETE FROM invent_custodian_slip WHERE ID = '$icsID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='ics.php';
                                    </script>";

?>