	<?php
$accID =$_REQUEST['accID']; 
include("db.php");
if (isset($_POST['Update'])) 
{

	$account_emp_update_name = $_POST['account_emp_edit_name'];
	$account_emp_update_age = $_POST['account_emp_edit_age'];
	$account_emp_update_gender = $_POST['account_emp_edit_gender'];
	$account_emp_update_address = $_POST['account_emp_edit_address'];
	$account_emp_update_email = $_POST['account_emp_edit_email'];
	$account_emp_update_address = $_POST['account_emp_edit_address'];
	$account_emp_update_pos = $_POST['account_emp_edit_pos'];
	$account_emp_update_mobile = $_POST['account_emp_edit_mobile'];

	$sql = "SELECT * FROM";
	$sql.=" emp_accounts_record WHERE accID = '$accID'";
	$result = mysqli_query($con,$sql);
	$val = mysqli_fetch_array($result);
	
	 
	 	
	 		$sql1 = "UPDATE emp_accounts_record";
			$sql1.= " SET fullName = '$account_emp_update_name',Age = '$account_emp_update_age',Gender = '$account_emp_update_gender',Address = '$account_emp_update_address', Email = '$account_emp_update_email', Pos = '$account_emp_update_pos', Mobile = '$account_emp_update_mobile' WHERE accID = '$accID'";
			$result1 = mysqli_query($con,$sql1);
			echo "<script>alert('Update info successfully');
                                        window.location='account.php';
                                    </script>";

	 			
	
	
}
?>