<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Edit Account</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="js/jquery-1.8.3.min.js">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>
  <script type="text/javascript">
      $(document).ready(function(){
        function display({
            $('#load').fadeIn("slow");
            display();
        })
      })
  </script>
  <body>
<?php
include("db.php");




$query = mysql_query("SELECT *  FROM emp_accountability_card") ;
$count = mysql_num_rows($query);
$per_page=5;
$total = ceil($count/$per_page);



	

 ?> <div class="text-center">
         <ul class="pagination">
             <?php 
             for ($i=1; $i<=$total ; $i++) { 
                 ?> 
                <li><a href="#"><?php echo $i;?></a></li>
                 <?php
             }
             ?>
         </ul>
       </div>
<div id="load" align="center"></div>

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
 </body>