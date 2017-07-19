<?php
if (isset($_POST['PrintMonth'])) {
	header("location: assets/fpdf/acccard_report.php?date=".$_POST['PrintMonth_val']."&designation=null&office=null&note=null");
}
else if (isset($_POST['PrintDesignation']))
{
	header("location: assets/fpdf/acccard_report.php?date=2017-7&designation");
}
else if (isset($_POST['PrintOffice'])) 
{
	header("location: assets/fpdf/acccard_report.php?date=2017-7&designation");
}
else if (isset($_POST['PrintNote'])) 
{
	header("location: assets/fpdf/acccard_report.php?date=null&designation=null&");
}
else
{
	 header("location: acccard.php");
}
?>