<?php
    $ID = $_REQUEST['accID'];
    include('db.php');
    $sql ="DELETE FROM";
    $sql.=" emp_accounts_record WHERE accID = '$ID'";
    $result = mysqli_query($con,$sql);
    echo "<script>alert('Deleted successfully');
                                        window.location='account.php';
                                    </script>";

?>