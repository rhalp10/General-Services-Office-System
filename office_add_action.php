<?php
include('db.php');
if (isset($_POST['Submit'])) {
	$office_add = $_POST['office_add'];

	$qr = mysql_query("SELECT * FROM office_dictionary WHERE officeName LIKE '$office_add'");
	$row = mysql_fetch_array($qr);
	if ($office_add == $row['officeName']) {
		echo "<script>alert('This Office is Already Exits!');
                                                window.location='office.php';
                                            </script>";
	}
	else
	{
		$sql = "INSERT INTO office_dictionary(officeName)";
		$sql.="VALUES ('$office_add')";
		$addRes = mysql_query($sql);
		echo "<script>alert('Add Successfully!');
                                                window.location='office.php';
                                            </script>";
	
	}
}
?>