 <?php 
$ID =$_REQUEST['accID'];
include("db.php");
if (isset($_POST['ProfileEdit'])) 
{
	$profile_edit_name = $_POST['profile_edit_name'];
	$profile_edit_age = $_POST['profile_edit_age'];
	$profile_edit_gender = $_POST['profile_edit_gender'];
	$profile_edit_email = $_POST['profile_edit_email'];
	$profile_edit_position = $_POST['profile_edit_position'];
	$profile_edit_address = $_POST['profile_edit_address'];
	$profile_edit_mobile = $_POST['profile_edit_mobile'];

	if(empty($profile_edit_name) || empty($profile_edit_age) || empty($profile_edit_gender) || empty($profile_edit_email) || empty($profile_edit_position) || empty($profile_edit_address) || empty($profile_edit_mobile) )//this code will excute if 1 of them having 1 empty field and checking what field is empty and execute if statement where display msg error in specific field.
	{
		if(empty($profile_edit_name))//this code will execute if field of name is empty and display error msg
		{
			echo "<script>alert('Profile Name Field is Empty');
                                        window.location='profile.php';
                                    </script>";
		}
		
		if(empty($profile_edit_age))//this code will execute if field of age is empty and display error msg
		{
			echo "<script>alert('Age Field is Empty');
                                        window.location='profile.php';
                                    </script>";
		}
		if(empty($profile_edit_gender))//this code will execute if option of gender not choose and display error msg
		{
			echo "<script>alert('Choose your Gender');
                                        window.location='profile.php';
                                    </script>";
		}
		if(empty($profile_edit_email))//this code will execute if field of email is  empty and display error msg
		{
			echo "<script>alert('Email Field is Empty');
                                        window.location='profile.php';
                                    </script>";
		}
		if(empty($profile_edit_position))//this code will execute if field of positionn is empty and display error msg
		{
			echo "<script>alert('Position Field is Empty');
                                        window.location='profile.php';
                                    </script>";
		}
		if(empty($profile_edit_address))//this code wil execute if field of address is empty and display error msg
		{
			echo "<script>alert('Adress Field is Empty');
                                        window.location='profile.php';
                                    </script>";
		}
		if(empty($profile_edit_mobile))//this code will execute if field of mobile is empty and display error msg
		{
			echo "<script>alert('Mobile Number Field is Empty');
                                        window.location='profile.php';
                                    </script>";
		}
	}
	else{
		
			//Query for update profile information
			$sql = "UPDATE emp_accounts_record ";
			$sql.= " SET fullName ='$profile_edit_name' , Age='$profile_edit_age', Gender='$profile_edit_gender', Address='$profile_edit_address', Email='$profile_edit_email', Pos='$profile_edit_position', Mobile='$profile_edit_mobile' WHERE  accID ='$ID'";
			$result = mysql_query($sql);
			//display success update msg
			echo "<script>alert('Update info successfully');
                                        window.location='profile.php';
                                    </script>";
		
	}
}
?>