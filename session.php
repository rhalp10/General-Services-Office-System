<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','gso_data') or die("ERROR");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($con,"SELECT username,accLevel,image FROM emp_accounts_record WHERE username = '$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
$login_level = $row['accLevel'];
$login_img = $row['image'];
 if(!isset($login_session)){
 mysqli_close($con); // Closing Connection
 header('Location: index.php'); //Redirecting To Home Page
}
?>