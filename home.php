<?php
include('session.php');
/*
            if ($login_level == '0') //checking if acclevel is equal to 0
                {   
                    header("location: admin.php");// retain to admin level 
                }
                if ($login_level == '1')  //checking if acclevel is equal to 1
                {
                   
                    header("location: home.php"); // retain to simple employee Level
                    
                } 
                if ($login_level == '2')  //checking if acclevel is equal to 2
                {
                     header("location: home.php"); // retain to accountability Level
                }
                if ($login_level == '3')  //checking if acclevel is equal to 2
                {
                     header("location: home.php"); // retain to bincard Level
                }
                if ($login_level== '4')  //checking if acclevel is equal to 2
                {
                     header("location: home.php"); // retain to ics/prs/par Level
                }
                else
                {

                }
                */
                $page = "Dashboard";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('head.php');?>
    <title>ADMIN | Index</title>
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">GSO <span class="lite">Admin</span></a>
            <!--logo end-->


            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo $login_img; ?>">
                            </span>
                            <span class="username"><?php echo $login_session; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">   
                  <?php  
                  if ($login_level == '0')
                  {
                      include('sidebar-menu_admin.php');
                  }
                  if ($login_level == '1')
                  {
                      include('sidebar-menu_emp.php');
                  }
                  elseif ($login_level == '2')
                  {
                      include('sidebar-menu_bin.php');
                  }
                  else if ($login_level == '3')
                  {
                      include('sidebar-menu_accountability.php');
                  }
                  else if ($login_level == '4')
                  {
                      include('sidebar-menu_icsprspar.php');
                  }
                  else
                  {
                     
                  }
                  ?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

   
      <!--main content start-->

      <section id="main-content">

          <section class="wrapper">
         <section class="wrapper">
            <div class="col-sm-12" style="font-size: 25px; font-family: Lato;"><img src="img/logo.png" class="col-sm-2"><h1 class="col-sm-10" style="margin-left: -50px;"><center> PROVINCE GOVERNMENT OF CAVITE<br><h2>General Services Office</h2></center></h1>
            </div>
             <br>
             <br>
             <br>
             <br>
             <br>
             <br> 
         </section>
              <!-- page start-->
             
             
                <div class="panel-body">
              <div class="panel panel-default">

                <div class="panel-heading" style="font-size: 25px; font-family: Lato;">MISSION</div>
                <div class="panel-body"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To deliver prompt, effective amd eficient services in the field of procurement,supply,property, records, human resources,facility improvement and community services.</h3></div>
              </div>
              <br>
               <div class="panel panel-default ">
                <div class="panel-heading" style="font-size: 25px; font-family: Lato;">VISION</div>
                <div class="panel-body"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A Strong and dynamic government office tha is adept to modern technology in serving the needs of its clientele.</h3></div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <div class="text-center">
            <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->

               Rhalp Darren Cabrera & Omar Raouf Daud<br>
               Copyright 2017
            </div>
        </div>
  </section>
  <!-- container section end -->
<?php include ('footer.php');?>  