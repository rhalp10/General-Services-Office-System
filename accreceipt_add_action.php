<?php 

include ("db.php");
	if(isset($_POST['Submit'])) 
	{  
		$prop_acc_receipt_ics_propno = $_POST['prop_acc_receipt_ics_propno'];
		$prop_acc_receipt_qty = $_POST['prop_acc_receipt_qty'];
		$prop_acc_receipt_unit = $_POST['prop_acc_receipt_unit'];
		$prop_acc_receipt_desc = $_POST['prop_acc_receipt_desc'];
		$prop_acc_receipt_propno = $_POST['prop_acc_receipt_propno'];
		$prop_acc_receipt_receivebyname = $_POST['prop_acc_receipt_receivebyname'];
		$prop_acc_receipt_receivebyposition = $_POST['prop_acc_receipt_receivebyposition'];
		$prop_acc_receipt_receivebydate = $_POST['prop_acc_receipt_receivebydate'];
		$prop_acc_receipt_receivefromname = $_POST['prop_acc_receipt_receivefromname'];
		$prop_acc_receipt_receivefromposition = $_POST['prop_acc_receipt_receivefromposition'];
		$prop_acc_receipt_receivefromdate = $_POST['prop_acc_receipt_receivefromdate'];
		if (empty($prop_acc_receipt_ics_propno) || empty($prop_acc_receipt_qty) || empty($prop_acc_receipt_unit) || empty($prop_acc_receipt_desc) || empty($prop_acc_receipt_propno) || empty($prop_acc_receipt_receivebyname) || empty($prop_acc_receipt_receivebyposition) || empty($prop_acc_receipt_receivebydate) || empty($prop_acc_receipt_receivefromname) || empty($prop_acc_receipt_receivefromposition) || empty($prop_acc_receipt_receivefromdate)) 
		{
			if (empty($prop_acc_receipt_ics_propno)) 
			{
				echo "<script>alert('ICS/PROP# is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_qty))
			{
				echo "<script>alert('Quantity is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_unit))
			{
				echo "<script>alert('Unit is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_desc))
			{
				echo "<script>alert('Description is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_propno))
			{
				echo "<script>alert('Property # is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_receivebyname))
			{
				echo "<script>alert('Receive by Name is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_receivebyposition))
			{
				echo "<script>alert('Receive by Position is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_receivebydate))
			{
				echo "<script>alert('Receive by Date is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_receivefromname))
			{
				echo "<script>alert('Receive from Name is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_receivefromposition))
			{
				echo "<script>alert('Receive from Position is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
			if (empty($prop_acc_receipt_receivefromdate))
			{
				echo "<script>alert('Receive from Date is Empty!');
	                                        window.location='accreceipt.php
	                                    </script>";
			}
		}
		else
		{
			//query
			$result = mysql_query("INSERT INTO property_accountability_receipt_record(ICS,Qty,Unit,Descrp,PropNo,ReceivedFrom_Name,ReceivedFrom_Position,ReceivedFrom_Date,ReceivedBy_Name,ReceivedBy_Position,ReceivedBy_Date) VALUES ('$prop_acc_receipt_ics_propno','$prop_acc_receipt_qty','$prop_acc_receipt_unit','$prop_acc_receipt_desc','$prop_acc_receipt_propno','$prop_acc_receipt_receivefromname','$prop_acc_receipt_receivefromposition','$prop_acc_receipt_receivefromdate','$prop_acc_receipt_receivebyname','$prop_acc_receipt_receivebyposition','$prop_acc_receipt_receivebydate ')");
			//display success message
	        echo "<script>alert('Data added successfully');
	                                        window.location='accreceipt.php';
	                                    </script>";
		}
	}
		
?>