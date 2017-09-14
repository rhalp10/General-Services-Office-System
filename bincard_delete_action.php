<?php
    $ID = $_REQUEST['ID'];
    include('db.php');
    $result = mysqli_query($con,"DELETE FROM bincard_record WHERE ID = '$ID'");
    $resul1 = mysqli_query($con,"DELETE FROM bincard_issued_record WHERE bin_ID = '$ID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='bincard.php';
                                    </script>";

?>