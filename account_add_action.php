<?php 
include("db.php");
if(isset($_POST['Submit']))
 { 
    if ($_POST['account_add_gender'] == 'Male') 
    {
        $account_add_img = "img/emp_profile/maletmp.png";
    }
    else
    {
        $account_add_img = "img/emp_profile/femaletmp.png";
    }
    $account_add_accLevel = $_POST['account_add_Level'];
 	$account_add_username = $_POST['account_add_username'];
    $account_add_name = $_POST['account_add_name'];
 	$account_add_password = $_POST['account_add_password'];
 	$account_add_repassword = $_POST['account_add_repassword'];
 	$account_add_email = $_POST['account_add_email'];
    $account_add_address = $_POST['account_add_address'];
 	$account_add_age = $_POST['account_add_age'];
    $account_add_gender = $_POST['account_add_gender'];
    $account_add_mobile = $_POST['account_add_mobile'];
 	$account_add_position = $_POST['account_add_position'];

    $chkPost = mysql_real_escape_string($_POST['account_add_username']);
    $chkRes = mysql_query("SELECT username FROM emp_accounts_record WHERE username = '$chkPost'");
    $chkUser = mysql_fetch_array($chkRes);

 	if (empty($account_add_img) ||empty($account_add_name)||empty($account_add_password)||empty($account_add_repassword)||empty($account_add_email)||empty($account_add_mobile)||empty($account_add_position)||empty($account_add_age)||empty($account_add_gender)||empty($account_add_username)) 
 	{
 		
     		if (empty($account_add_img)) {
     			
                echo "<script>alert('Pleaes Choose Some Image!');
                                            window.location='account.php';
                                        </script>";
            }
            if (empty($account_add_name)) {
     			
                echo "<script>alert('Name is Empty!');
                                            window.location='account.php';
                                        </script>";
            }
            if (empty($account_add_username)) {
                
                echo "<script>alert('Username is Empty!');
                                            window.location='account.php';
                                        </script>";
            }
            if (empty($account_add_password)) {
     			
                echo "<script>alert('Password is Empty!');
                                            window.location='account.php';
                                        </script>";
            }
            if (empty($account_add_repassword)) {
     			
                echo "<script>alert('Repassword is Empty!');
                                            window.location='account.php';
                                        </script>";
            }
            if (empty($account_add_email)) {
     			
                echo "<script>alert('Email is Empty!');
                                            window.location='account.php';
                                        </script>";
            }
            if (empty($account_add_mobile)) {
     			
                echo "<script>alert('Mobile Number is Empty!');
                                            window.location='account.php';
                                        </script>";
            }
            if (empty($account_add_age)) {
                
                echo "<script>alert('Mobile Number is Empty!');
                                            window.location='account.php';
                                        </script>";
            }
            if (empty($account_add_gender)) {
                
                echo "<script>alert('Mobile Number is Empty!');
                                            window.location='account.php';
                                        </script>";
            }
            if (empty($account_add_position)) {
     			
                echo "<script>alert('Position is Empty!');
                                            window.location='account.php';
                                        </script>";
            }
 		}
        else if ($account_add_username != $chkUser['username'])
        {

            if ($account_add_password == $account_add_repassword) 
            {
                $sql = "INSERT INTO emp_accounts_record (accLevel, username, password, fullName, Age, Gender, Address, Email, Pos, Mobile, image) ";
                $sql.= "VALUES ('$account_add_accLevel','$account_add_username','$account_add_password','$account_add_name','$account_add_age','$account_add_gender','$account_add_address','$account_add_email','$account_add_position','$account_add_mobile','$account_add_img')";
                $result = mysql_query($sql); 
                echo "<script>alert('Register Successfully!');
                                                window.location='account.php';
                                            </script>";
            }
            else
            {
                 echo "<script>alert('Password not match!');
                                                window.location='account.php';
                                            </script>";
            }
            
        }
        else// if user exits
        {

             echo "<script>alert('This Username Already Taken!');
                                                window.location='account.php';
                                            </script>";
        }
     
}
?>