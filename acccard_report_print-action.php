<?php 
if (isset($_POST['PrintDate'])) {
	$date=$_POST['date'];
	echo "<script>window.location='assets/FPDF/acccard_person_report1.php?date=$date';
                                    </script>";
}
if (isset($_POST['PrintDesignation'])) {
	$designation=$_POST['designation'];
	echo "<script>window.location='assets/FPDF/acccard_person_report1.php?designation=$designation';
                                    </script>";
}
if (isset($_POST['PrintOffice'])) {
	$office=$_POST['office'];
	echo "<script>window.location='assets/FPDF/acccard_person_report1.php?office=$office';
                                    </script>";
}
if (isset($_POST['PrintNote'])) {
	$note=$_POST['note'];
	echo "<script>window.location='assets/FPDF/acccard_person_report1.php?note=$note';
                                    </script>";
}

?>