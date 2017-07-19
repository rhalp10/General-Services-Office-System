<?php 
	$accID = $_REQUEST['accID'];

	if(isset($_POST['SubmitSet']))
	{
		
		$addDate_Set_value = $_POST['acccard_view_add_addDate-Set'];
		$Par_Set_value = $_POST['acccard_view_add_par-Set'];
		$Qty_Set_value = $_POST['acccard_view_add_qty-Set'];
		$Unit_Set_value = $_POST['acccard_view_add_unit-Set'];
		$Descrp_Set_value = $_POST['acccard_view_add_descrp-Set'];
		$PropNo_Set_value = $_POST['acccard_view_add_propno-Set'];
		$Amount_Set_value = $_POST['acccard_view_add_amount-Set'];
		$TransferTo_Set_value = $_POST['acccard_view_add_transferTo-Set'];
		$Remarks_Set_value = $_POST['acccard_view_add_remarks-Set'];
		$TurnOverTo_Set_value = $_POST['acccard_view_add_turnOver-Set'];
		
		if (empty($addDate_Set_value) || empty($Par_Set_value ) || empty($Qty_Set_value ) || empty($Unit_Set_value) || empty($Descrp_Set_value))
		{
			if(empty($Par_Set_value ))
			{
			echo "<script>alert('Par # is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}
			if(empty($Qty_Set_value ))
			{
			echo "<script>alert('Quantity Set is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}
			if(empty($Unit_Set_value ))
			{
			echo "<script>alert('Unit Set is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}
			if(empty($Descrp_Set_value ))
			{
			echo "<script>alert('Description Set is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}
			if(empty($PropNo_Set_value ))
			{
			echo "<script>alert('Property Number Set is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}
			if(empty($Amount_Set_value ))
			{
			echo "<script>alert('Amount Set is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}

			
		}
	

		$sql = 'INSERT INTO TABLE (COLUMN NAMES)';
		$sql.=' VALUES ('$addDate_Set_value','$Par_Set_value','$Qty_Set_value','$Unit_Set_value','$Descrp_Set_value','$PropNo_Set_value','$Amount_Set_value','$TransferTo_Set_value','$Remarks_Set_value','$TurnOverTo_Set_value')';
		$result = mysql_query($sql);
		$query = mysql_fetch_array($result);
		
		
	}
	
?>


<?php 

if(isset($_POST['SubmitPart']))
	{
		$Descrp_part_value = $_POST['acccard_view_add_descrp-part'];
		$Serial_part_value = $_POST['acccard_view_add_sn-part'];
		$PropNo_part_value = $_POST['acccard_view_add_propno-part'];
		$Amount_part_value = $_POST['acccard_view_add_amount-part'];
		$TransferTo_part_value = $_POST['acccard_view_add_transferTo-part'];
		$Remarks_part_value = $_POST['acccard_view_add_remarks-part'];
		$TurnOverTo_part_value = $_POST['acccard_view_add_turnOver-part'];
		if(empty($Descrp_part_value) || $Serial_part_value || $PropNo_part_value || $Amount_part_value || $TransferTo_part_value || $Remarks_part_value || $TurnOverTo_part_value)
		{
			if(empty($Descrp_part_value))
			{
			echo "<script>alert('Descriptopn of part is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}
			if(empty($Serial_part_value))
			{
			echo "<script>alert('Serial NUmber is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}
			if(empty($PropNo_part_value))
			{
			echo "<script>alert('Property Number is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}
			if(empty($Amount_part_value))
			{
			echo "<script>alert('Amount of part is Empty!');
                                                window.location='acccard_view.php?accID=$accID';
                                            </script>";
			}
		}
		$sql = 'INSERT INTO TABLE (COLUMN NAMES)';
		$sql.=' VALUES ('$addDate_Set_value','$Par_Set_value','$Qty_Set_value','$Unit_Set_value','$Descrp_Set_value','$PropNo_Set_value','$Amount_Set_value','$TransferTo_Set_value','$Remarks_Set_value','$TurnOverTo_Set_value')';
		$result = mysql_query($sql);
		$query = mysql_fetch_array($result);

	}
?>



