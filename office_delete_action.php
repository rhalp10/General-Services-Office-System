<?php 


    $officeID =$_REQUEST['officeID'];
    include('db.php');
    $result = mysql_query("DELETE FROM office_dictionary WHERE ID = '$officeID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='office.php';
                                    </script>";
?>

