<?php
    $ID = $_REQUEST['ID'];
    include('db.php');
    $sql ="DELETE FROM";
    $sql.=" property_accountability_receipt_record WHERE ID = '$ID'";
    $result = mysqli_query($con,$sql);
    echo "<script>alert('Deleted successfully');
                                        window.location='accreceipt.php';
                                    </script>";

?>