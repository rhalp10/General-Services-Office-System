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

			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$con = mysqli_connect('localhost','root','','gso_data') or die("ERROR");
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($con,$username);
			$password = mysqli_real_escape_string($con,$password);
			

			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($con,"SELECT * FROM `emp_accounts_record` WHERE `username` = '$username' AND `password` = '$password'");
			$rows = mysqli_fetch_assoc($query);

			

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
			mysqli_close($con); // Closing Connection
		}
}
?>