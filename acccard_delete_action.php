<?php 


    $accID =$_REQUEST['accID'];
    include('db.php');
    $result = mysql_query("DELETE FROM emp_pgc_record WHERE accID = '$accID'");
    $result = mysql_query("DELETE FROM emp_accountability_card WHERE Emp_ID = '$accID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='acccard.php';
                                    </script>";
?>

