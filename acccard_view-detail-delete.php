<?php
		$ID = $_REQUEST['ID'];
		$accID = $_REQUEST['accID'];
		$empID = $_REQUEST['empID'];
    include('db.php');
    $result = mysql_query("DELETE FROM emp_accountability_card WHERE ID = '$ID'");
    echo "<script>alert('Deleted successfully');
                                        window.location='acccard_view-detail.php?accID=$accID&empID=$empID';
                                    </script>";

?>