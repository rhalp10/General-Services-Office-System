<?php
    $accID = $_REQUEST['accID'];
    $ID = $_REQUEST['ID'];
    include('db.php');
    $sql ="DELETE FROM";
    $sql.=" emp_accountability_card WHERE ID = '$accID'";
    $result = mysqli_query($con,$sql);
    echo "<script>alert('Deleted successfully');
                                        window.location='acccard_view.php?accID=$ID';
                                    </script>";

?>