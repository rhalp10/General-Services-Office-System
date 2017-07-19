<?php 
$ID =$_REQUEST['accID'];
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gso_data";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */
 	 if (isset($_POST['Update']))
	{
	//declaring variable from metho post and get the name of each input from form data
	$bincard_update_date = $_POST['bincard_edit_date'];
	$bincard_update_supplier = $_POST['bincard_edit_supplier'];
	$bincard_update_descrp = $_POST['bincard_edit_descrp'];
	$bincard_update_qty = $_POST['bincard_edit_qty'];
		if (  empty($bincard_update_date)  || empty($bincard_update_supplier) || empty($bincard_update_descrp) || empty($bincard_update_qty)) 
		{
			if (empty($bincard_update_date)) {
				echo "<script>alert('Bindate is empty!');
                                        window.location='bincard_edit.php?ID=".$ID."';
                                    </script>";
			}
			
			if (empty($bincard_update_supplier)) 
			{
				echo "<script>alert('Supplier name is Empty!');
                                        window.location='bincard_edit.php?ID=".$ID."';
                                    </script>";
			}
			if (empty($bincard_update_descrp))
			{
				echo "<script>alert('Description is Empty!');
                                        window.location='bincard_edit.php?ID=".$ID."';
                                    </script>";
			}
			if (empty($bincard_update_qty)) 
			{
				echo "<script>alert('Quantity is Empty!');
                                        window.location='bincard_edit.php?ID=".$ID."';
                                    </script>";
			}
		}
		else
		{
			//query
			$reqIssued =$_REQUEST['Issued'];
			$reqBal = $bincard_update_qty - $_REQUEST['Balance'];

			$sql = "UPDATE bincard_record";
			$sql.=" SET bin_Date = '$bincard_update_date',Supplier = '$bincard_update_supplier',Descrp = '$bincard_update_descrp',Qty = '$bincard_update_qty', Issued = '$reqIssued', Balance = '$reqBal' WHERE  ID ='$ID'";
			$query=mysqli_query($conn, $sql);
			echo "<script>alert('Update info successfully');
                                        window.location='bincard.php';
                                    </script>";

		}

            header("location: bincard.php");
	}

?>