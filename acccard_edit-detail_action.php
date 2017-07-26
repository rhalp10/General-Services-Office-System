<?php 

include('db.php');


$accID = $_REQUEST ['accID'];
$empID = $_REQUEST ['empID'];
if (isset($_POST['Update'])) {

	$par = $_POST['par'];
	$qty = $_POST['qty'];
	$unit = $_POST['unit'];
	$description = $_POST['description'];
	$serial = $_POST['serial'];
	$propno = $_POST['propno'];
	$amount = $_POST['amount'];
	$transferto = $_POST['transferto'];
	$remarks = $_POST['remarks'];
	$dateturnover = $_POST['dateturnover'];
$sql = "UPDATE emp_accountability_card";
$sql.=" SET ParNo = '$par', Qty = '$qty', Unit = '$unit',Descrp = '$description',SN = '$serial', PropNo = '$propno', Amount= '$amount', TransferTo = '$transferto',Remarks = '$remarks', DateTurnOver = '$dateturnover' WHERE ID = '$accID'";
$res = mysql_query($sql);
    echo "<script>alert('Update successfully');
                                        window.location='acccard_view.php?accID=$empID';
                                    </script>";
}

?>