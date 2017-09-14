<?php 
include('db.php');
$icsID = $_REQUEST['icsID'];
$res1 = mysqli_query($con,"SELECT * FROM invent_custodian_slip_descrp where icsID = '$icsID' ");

if (isset($_POST['Submit'])) {
	$custodian_slip_qty = $_POST['custodian_slip_qty'];
	$custodian_slip_unit = $_POST['custodian_slip_unit'];
	$custodian_slip_descrp = $_POST['custodian_slip_descrp'];
	$custodian_slip_inventItemNo = $_POST['custodian_slip_inventItemNo'];
	$custodian_slip_EzLife = $_POST['custodian_slip_EzLife'];
	$ReceivedBy_Name = $_POST['ReceivedBy_Name'];
	$ReceivedBy_Pos = $_POST['ReceivedBy_Pos'];
	$ReceivedBy_Date = $_POST['ReceivedBy_Date'];
	$ReceivedFrom_Name = $_POST['ReceivedFrom_Name'];
	$ReceivedFrom_Pos = $_POST['ReceivedFrom_Pos'];
	$ReceivedFrom_Date = $_POST['ReceivedFrom_Date'];
	$custodian_slip_ICS = $_POST['custodian_slip_ICS'];
if (empty($custodian_slip_qty) || empty($custodian_slip_unit) || empty($custodian_slip_descrp) || empty($custodian_slip_inventItemNo) || empty($custodian_slip_EzLife) || empty($ReceivedBy_Name) || empty($ReceivedBy_Pos) || empty($ReceivedBy_Date) || empty($ReceivedFrom_Name) || empty($ReceivedFrom_Pos) || empty($ReceivedFrom_Date) || empty($custodian_slip_ICS)) 
{
	if (empty($custodian_slip_qty)) 
	{
		echo "<script>alert('Quantity is Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($custodian_slip_unit)) 
	{
		echo "<script>alert('Unit is Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($custodian_slip_descrp)) 
	{
		echo "<script>alert('Description is Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($custodian_slip_inventItemNo)) 
	{
		echo "<script>alert('Inventory Item Number is  Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($custodian_slip_EzLife)) 
	{
		echo "<script>alert('Ez Usefull life is Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($ReceivedBy_Name)) 
	{
		echo "<script>alert('ReceiveBy Name is Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($ReceivedBy_Pos)) 
	{
		echo "<script>alert('ReceiveBy Position is Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($ReceivedBy_Date)) 
	{
		echo "<script>alert('ReceiveBy Date is Empty';
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($ReceivedFrom_Name)) 
	{
		echo "<script>alert('ReceiveFrom Name is Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($ReceivedFrom_Pos)) 
	{
		echo "<script>alert('ReceiveFrom Position is Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($ReceivedFrom_Date)) 
	{
		echo "<script>alert('ReceiveFrom Date is Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}
	if (empty($custodian_slip_ICS)) {
		echo "<script>alert('ICS Empty');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
	}

}
else
{
	//Update Query
	$sql = "UPDATE invent_custodian_slip";
	$sql.=" SET Qty = '$custodian_slip_qty', Unit = '$custodian_slip_unit', Descrp = '$custodian_slip_descrp',Invent_Item_No = '$custodian_slip_inventItemNo',Ez_Useful_Life = '$custodian_slip_EzLife',ReceivedBy_Name = '$ReceivedBy_Name',ReceivedBy_Position = '$ReceivedBy_Pos',ReceiveBy_Date = '$ReceivedBy_Date',ReceivedFrom_Name = '$ReceivedFrom_Name',ReceivedFrom_Position = '$ReceivedFrom_Pos',ReceiveFrom_Date = '$ReceivedFrom_Date',ICS = '$custodian_slip_ICS' WHERE ID = '$icsID'";
	$res = mysqli_query($con,$sql);
	//MSG 
	echo "<script>alert('Update Successfully');
        window.location='ics_edit.php?icsID=$icsID';
        </script>";
}

}

?>