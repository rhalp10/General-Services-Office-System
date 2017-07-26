<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) 
			{
				echo "<script>alert('Username or Password is empty !');
										window.location='index.php';
									</script>";
			
			}
		else
		{

			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			

			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysql_connect("localhost", "root", "");
			// Selecting Database
			$db = mysql_select_db("gso_data", $connection);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("SELECT * FROM `emp_accounts_record` WHERE `username` = '$username' AND `password` = '$password'", $connection);
			$rows = mysql_fetch_assoc($query);

			

				if ($rows['accLevel'] == '0') 
				{	

					$_SESSION['login_user']=$username; // Initializing Session
					header("location: admin.php"); //admin Level
				} 
				elseif ($rows['accLevel'] == '1') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: home.php"); // student Level
					
				} 
				elseif ($rows['accLevel'] == '2') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: home.php"); // teacher level

				} 
				elseif ($rows['accLevel'] == '3') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: home.php"); // teacher level

				} 
				elseif ($rows['accLevel'] == '4') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: home.php"); // teacher level

				} 
				else 
				{
					echo "<script>alert('Access Denied!	');
										window.location='index.php';
									</script>";
				}
			mysql_close($connection); // Closing Connection
		}
}
?>