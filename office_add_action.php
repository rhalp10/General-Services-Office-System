<?php
include('db.php');
if (isset($_POST['Submit'])) {
	$office_add = $_POST['office_add'];
	$office_code = $_POST['office_code'];

	$qr = mysqli_query($con,"SELECT * FROM office_dictionary WHERE officeName LIKE '$office_add'");
	$row = mysqli_fetch_array($qr);
	if ($office_add == $row['officeName']) {
		echo "<script>alert('This Office is Already Exits!');
                                                window.location='office.php';
                                            </script>";
	}
	else
	{
		$sql = "INSERT INTO office_dictionary(officeName,officeCode)";
		$sql.="VALUES ('$office_add','$office_code')";
		$addRes = mysqli_query($con,$sql);
		echo "<script>alert('Add Successfully!');
                                                window.location='office.php';
                                            </script>";
	
	}
}
?>