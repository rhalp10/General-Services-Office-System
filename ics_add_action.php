
<?php
include ("db.php");
if(isset($_POST['Submit'])) 
	{  
		$custodian_slip_ICS = $_POST['custodian_slip_ICS'];
		$custodian_slip_qty = $_POST['custodian_slip_qty'];
		$custodian_slip_unit = $_POST['custodian_slip_unit'];
		$custodian_slip_descrp = $_POST['custodian_slip_descrp'];
		$custodian_slip_inventItemNo = $_POST['custodian_slip_inventItemNo'];
		$custodian_slip_EzLife = $_POST['custodian_slip_EzLife'];
		$custodian_slip_receiveBy_name = $_POST['custodian_slip_receiveBy_name'];
		$custodian_slip_receiveBy_position = $_POST['custodian_slip_receiveBy_position'];
		$custodian_slip_receiveBy_date = $_POST['custodian_slip_receiveBy_date'];
		$custodian_slip_receiveFrom_name = $_POST['custodian_slip_receiveFrom_name'];
		$custodian_slip_receiveFrom_position = $_POST['custodian_slip_receiveFrom_position'];
		$custodian_slip_receiveFrom_date = $_POST['custodian_slip_receiveFrom_date'];
		
		

		if (empty($custodian_slip_ICS) ||empty($custodian_slip_qty) || empty($custodian_slip_unit) || empty($custodian_slip_descrp) || empty($custodian_slip_inventItemNo) || empty($custodian_slip_EzLife) || empty($custodian_slip_receiveBy_name) || empty($custodian_slip_receiveBy_position) || empty($custodian_slip_receiveBy_date) || empty($custodian_slip_receiveFrom_name) || empty($custodian_slip_receiveFrom_position) || empty($custodian_slip_receiveFrom_date)) 
		{
			
			if (empty($custodian_slip_ICS)) 
			{
	            echo "<script>alert('ICS is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_qty)) 
			{
	            echo "<script>alert('Quantity is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_unit)) 
			{
	            echo "<script>alert('Unit is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_descrp)) 
			{
	            echo "<script>alert('Description is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_inventItemNo)) 
			{
	            echo "<script>alert('Inventory ID Number is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_EzLife)) 
			{
	            echo "<script>alert('Ez Wonderfull life is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_receiveBy_name)) 
			{
	            echo "<script>alert('Receive by Name is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_receiveBy_position)) 
			{
	            echo "<script>alert('Receive by Position is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_receiveBy_date)) 
			{
	            echo "<script>alert('Receive by Date is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_receiveFrom_name)) 
			{
	            echo "<script>alert('Receive from Name is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_receiveFrom_position)) 
			{
	            echo "<script>alert('Receive from Position is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
			if (empty($custodian_slip_receiveFrom_date)) 
			{
	            echo "<script>alert('Receive from Date is Empty!');
	                                        window.location='ics.php
	                                    </script>";
			}
		}
		else
		{
			//query
			$date = convert_uuencode((GETDATE());
			$sql = "INSERT INTO invent_custodian_slip(ICS,Qty,Unit,Descrp,Invent_Item_No,Ez_Useful_Life,ReceivedBy_Name,ReceivedBy_Position,ReceiveBy_Date,ReceivedFrom_Name,ReceivedFrom_Position,ReceiveFrom_Date,DateAdded)"; 

			$sql.= "VALUES ('$custodian_slip_ICS','$custodian_slip_qty','$custodian_slip_unit','$custodian_slip_descrp','$custodian_slip_inventItemNo','$custodian_slip_EzLife','$custodian_slip_receiveBy_name','$custodian_slip_receiveBy_position','$custodian_slip_receiveBy_date','$custodian_slip_receiveFrom_name','$custodian_slip_receiveFrom_position','$custodian_slip_receiveFrom_date',$date";
			$res = mysql_query($sql);
			//display success messages
	        echo "<script>alert('Data added successfully');
	                                        window.location='ics.php';
	                                    </script>";
		}

	}

?>
		