<?php 
$ID =$_REQUEST['accID'];
include("db.php");

if (isset($_POST['ProfileEdit'])) 
{
		$profile_edit_oldpass = $_POST['profile_edit_oldpass'];
		$profile_edit_password = $_POST['profile_edit_password'];
		$profile_edit_repassword = $_POST['profile_edit_repassword'];
	if (empty($profile_edit_oldpass)) 
	{
		
	}
	else
	{
		$res = mysqli_query($con,"SELECT * FROM emp_accounts_record WHERE accID = '$ID'");
		$test = mysqli_fetch_array($res);
		if ($profile_edit_oldpass == $test['password']) 
		{
			
			if ($profile_edit_password == $profile_edit_repassword) //if password and retypepassword match query execute
			{
				//Query for update profile information
				$sql = "UPDATE emp_accounts_record ";
				$sql.= " SET password = '$profile_edit_password' WHERE  accID ='$ID'";
				$result = mysqli_query($sql);
				//display success update msg
				echo "<script>alert('Update info successfully');
	                                        window.location='profile.php';
	                                    </script>";
			}
			else//if password not match display error msg
			{
				echo "<script>alert('Password Not Match');
	                                        window.location='profile.php';
	                                    </script>";
			}

		}
	}
}



?>