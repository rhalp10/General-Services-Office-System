 <?php 
	
	if(isset($_POST['SubmitSet']))
	{
	$empID = $_REQUEST['empID'];
	include('db.php');
		
		$Par_Set_value = $_POST['acccard_view_add_par-Set'];
		$Qty_Set_value = $_POST['acccard_view_add_qty-Set'];
		$Unit_Set_value = $_POST['acccard_view_add_unit-Set'];
		$Descrp_Set_value = $_POST['acccard_view_add_descrp-Set'];
		$sn_Set_value = $_POST['acccard_view_add_sn-Set'];
		$PropNo_Set_value = $_POST['acccard_view_add_propno-Set'];
		$Amount_Set_value = $_POST['acccard_view_add_amount-Set'];
		$TransferTo_Set_value = $_POST['acccard_view_add_transferTo-Set'];
		$Remarks_Set_value = $_POST['acccard_view_add_remarks-Set'];
		$dateTurnOver_Set_value = $_POST['acccard_view_add_turnOver-Set'];
		/*
		if (empty($addDate_Set_value) || empty($Par_Set_value ) || empty($Qty_Set_value ) || empty($Unit_Set_value) || empty($Descrp_Set_value) ||)
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
	*/


			$sql ="INSERT INTO emp_accountability_card (ID, Emp_ID, ItemSetID, itemCode, ParNo, Qty, Unit, Descrp, SN, PropNo, Amount, TransferTo, Remarks, DateTurnOver)";
			/*
            $sql.=" VALUES ('$empID','$Par_Set_value','$Qty_Set_value','$Unit_Set_value','$Descrp_Set_value','$sn_Set_value','$PropNo_Set_value','$Amount_Set_value','$TransferTo_Set_value','$Remarks_Set_value','$dateTurnOver_Set_value')";
            */
            $sql.=" VALUES (NULL, '$empID', 'ItemSetID', 'itemCode', '$Par_Set_value', '$Qty_Set_value', '$Unit_Set_value', '$Descrp_Set_value', '$sn_Set_value', '$PropNo_Set_value', '$Amount_Set_value', '$TransferTo_Set_value', '$Remarks_Set_value', '$dateTurnOver_Set_value')";
            $result = mysqli_query($con,$sql);
            
            $sql1 = "SELECT * FROM";
            $sql1.=" emp_accountability_card";
            $result1 = mysqli_query($con,$sql1);
            while ($row= mysqli_fetch_array($result1))
            {
                $addID = $row['ID'];
            }
            $sql2 = "UPDATE  emp_accountability_card";
            $sql2.=" SET ItemSetID = 'SP-$addID',itemCode = 'SET SP-$addID' WHERE ID = '$addID'";
            $result2 = mysqli_query($con,$sql2);
            //display success message
            
            echo "<script>alert('Data added successfully');
                                            window.location='acccard_view.php?accID=$empID';
                                        </script>";
		
	}
	if (isset($_POST['SubmitPart'])) 
	{
		$accID = $_REQUEST['accID'];
		$empID = $_REQUEST['empID'];
		$set = $_REQUEST['set'];
		include('db.php');
		$Qty_Set_value = $_POST['acccard_view_add_qty-Set'];
		$Unit_Set_value = $_POST['acccard_view_add_unit-Set'];
		$Descrp_Set_value = $_POST['acccard_view_add_descrp-Set'];
		$sn_Set_value = $_POST['acccard_view_add_sn-Set'];
		$PropNo_Set_value = $_POST['acccard_view_add_propno-Set'];
		$Amount_Set_value = $_POST['acccard_view_add_amount-Set'];
		$TransferTo_Set_value = $_POST['acccard_view_add_transferTo-Set'];
		$Remarks_Set_value = $_POST['acccard_view_add_remarks-Set'];
		$dateTurnOver_Set_value = $_POST['acccard_view_add_turnOver-Set'];
		

			$sql ="INSERT INTO emp_accountability_card (ID, Emp_ID, ItemSetID, itemCode, Qty, Unit, Descrp, SN, PropNo, Amount, TransferTo, Remarks, DateTurnOver)";
			/*
            $sql.=" VALUES ('$empID','$Par_Set_value','$Qty_Set_value','$Unit_Set_value','$Descrp_Set_value','$sn_Set_value','$PropNo_Set_value','$Amount_Set_value','$TransferTo_Set_value','$Remarks_Set_value','$dateTurnOver_Set_value')";
            */
            $sql.=" VALUES (NULL, '$empID', 'ItemSetID', 'itemCode', '$Qty_Set_value', '$Unit_Set_value', '$Descrp_Set_value', '$sn_Set_value', '$PropNo_Set_value', '$Amount_Set_value', '$TransferTo_Set_value', '$Remarks_Set_value', '$dateTurnOver_Set_value')";
            $result = mysqli_query($con,$sql);
            
            $sql1 = "SELECT * FROM";
            $sql1.=" emp_accountability_card";
            $result1 = mysqli_query($con,$sql1);
            while ($row= mysqli_fetch_array($result1))
            {
                $addID = $row['ID'];
            }
            $sql2 = "UPDATE  emp_accountability_card";
            $sql2.=" SET ItemSetID = 'SP-$addID',itemCode = 'PART $set' WHERE ID = '$addID'";
            $result2 = mysqli_query($con,$sql2);
            //display success message
            
            echo "<script>alert('Data added successfully');
                                            window.location='acccard_view-detail.php?accID=$accID&empID=$empID';
                                        </script>";

	}
?>

