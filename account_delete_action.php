<?php
    $ID = $_REQUEST['accID'];
    include('db.php');
    $sql ="DELETE FROM";
    $sql.=" emp_accounts_record WHERE accID = '$ID'";
    $result = mysql_query($sql);
    echo "<script>alert('Deleted successfully');
                                        window.location='account.php';
                                    </script>";

?>