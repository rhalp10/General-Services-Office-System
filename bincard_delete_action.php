<?php
    $ID = $_REQUEST['ID'];
    include('db.php');
    $result = mysql_query("DELETE FROM bincard_record WHERE ID = '$ID'");
    $resul1 = mysql_query("DELETE FROM bincard_issued_record WHERE bin_ID = '$ID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='bincard.php';
                                    </script>";

?>