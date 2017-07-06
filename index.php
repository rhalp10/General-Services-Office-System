<?php
include('login_action.php'); // Includes Login Script
if(isset($_SESSION['login_user']))
{           
            $user=$_SESSION['login_user'];// passing the session user to new user variable
            $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $db = mysql_select_db("gso_data", $connection);// Selecting Database
            $query = mysql_query("SELECT * FROM `emp_accounts_record` WHERE `username`= '$user'", $connection); //SQL query to fetch information of registerd users and finds user match.
            $rows = mysql_fetch_assoc($query);
                if ($rows['accLevel'] == '0') //checking if acclevel is equal to 0
                {   
                    header("location: admin.php");// retain to admin level 
                }
                elseif ($rows['accLevel'] == '1')  //checking if acclevel is equal to 1
                {
                   
                    header("location: student.php"); // retain to student Level
                    
                } 
                elseif ($rows['accLevel'] == '2')  //checking if acclevel is equal to 2
                {
                     header("location: teacher.php"); // retain to teacher Level
                }
                else
                {

                }
    
            
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Index</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" method="post" role="form">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Username" id="username" name="username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" placeholder="password" id="password">Login</button>
           
        </div>
      </form>
    <div class="text-right">
            <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->
                
            </div>
        </div>
    </div>


  </body>
</html>
