   <?php 
if ($page == 'Dashboard')
{
  ?>
   <li class="active">
  <?php
}
else
{
  ?>
 <li>
<?php
}
 ?>
      <a class="" href="admin.php">
          <i class="icon_house_alt"></i>
          <span>Dashboard</span>
      </a>
  </li>
 <?php 
if ($page == 'Account')
{
  ?>
   <li class="active">
  <?php
}
else
{
  ?>
 <li>
<?php
}
 ?>
      <a class="" href="account.php">
          <i class="icon_profile"></i>
          <span>Account</span>
      </a>
  </li>    
  <li class="sub-menu">

      <a href="javascript:;" class="">
          <i class="icon_desktop"></i>
          <span>Record</span>
          <span class="menu-arrow arrow_carrot-right"></span>
      </a>
      <ul class="sub">
          <li><a class="" href="acccard.php">PGC Account Card</a></li>
          <li><a class="" href="accreceipt.php">Accountability Receipt</a></li>
          <li><a class="" href="returnslip.php">Return Slip</a></li>
          <li><a class="" href="bincard.php"><span>Bincard</span></a></li>
          <li><a class="" href="ics.php">Custodian Slip</a></li>
      </ul>
  </li>
   <?php 
if ($page == 'Employee')
{
  ?>
   <li class="active">
  <?php
}
else
{
  ?>
 <li>
<?php
}
 ?>
      <a class="" href="emplist.php">
          <i class="icon_clipboard"></i>
          <span>Employee  List</span>
      </a>
  </li>
 <?php 
if ($page == 'Office')
{
  ?>
   <li class="active">
  <?php
}
else
{
  ?>
 <li>
<?php
}
 ?>
      <a class="" href="office.php">
          <i class="icon_building_alt"></i>
          <span>Office  List</span>
      </a>
  </li>
  <li class="sub-menu ">
      <a href="javascript:;" class="">
          <i class="icon_datareport"></i>
          <span>Report</span>
          <span class="menu-arrow arrow_carrot-right"></span>
      </a>
      <ul class="sub">                           
          <li><a class="" href="account_report.php">Account</a></li>
          <li><a class="" href="acccard_report.php">PGC Account Card</a></li>
          <li><a class="" href="accreceipt_report.php">Accountability Receipt</a></li>
          <li><a class="" href="returnslip_report.php">Return Slip</a></li>
          <li><a class="" href="bincard_report.php"><span>Bincard</span></a></li>
          <li><a class="" href="ics_report.php">Custodian Slip</a></li>
      </ul>
  </li>
  