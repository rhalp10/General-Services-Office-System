<?php
    $ID = $_REQUEST['ID'];
    $issuedID = $_REQUEST['issuedID'];
    include('db.php');
    $result = mysql_query("DELETE FROM bincard_issued_record WHERE ID = '$issuedID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='bincard_view.php?ID=$ID';
                                    </script>";

?>