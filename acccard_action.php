<?php

if (isset($_POST['submit'])) {

			include('db.php');
			// Define acccard form submit variables 
			$pgc_emp_ac_name=$_POST['pgc_emp_ac_name'];
			$pgc_emp_ac_designation=$_POST['pgc_emp_ac_designation'];
			$pgc_emp_ac_office=$_POST['pgc_emp_ac_office'];
			$pgc_emp_ac_qty=$_POST['pgc_emp_ac_qty'];
			$pgc_emp_ac_unit=$_POST['pgc_emp_ac_unit'];
			$pgc_emp_ac_desc=$_POST['pgc_emp_ac_desc'];
			$pgc_emp_ac_propno=$_POST['pgc_emp_ac_propno'];
			$pgc_emp_ac_amount=$_POST['pgc_emp_ac_amount'];
			$pgc_emp_ac_dateturnover=$_POST['pgc_emp_ac_dateturnover'];
			$pgc_emp_ac_transferto=$_POST['pgc_emp_ac_transferto'];
			$pgc_emp_ac_remarks=$_POST['pgc_emp_ac_remarks'];
			 
                            $result = mysqli_query($con,"SELECT * FROM emp_pgc_record WHERE fullName LIKE '$pgc_emp_ac_name'");
                            $test = mysqli_fetch_array($result);
                            $fullName = $test['fullName'];
                            $accID = $test['accID'];

		if (empty($pgc_emp_ac_name) || empty($pgc_emp_ac_designation)  || empty($pgc_emp_ac_office) || empty($pgc_emp_ac_qty) || empty($pgc_emp_ac_unit)|| empty($pgc_emp_ac_desc)|| empty($pgc_emp_ac_propno)|| empty($pgc_emp_ac_amount)|| empty($pgc_emp_ac_dateturnover)|| empty($pgc_emp_ac_transferto)|| empty($pgc_emp_ac_remarks)) 
			{
				echo "<script>alert('Required To Fill!');
										window.location='acccard.php';
									</script>";
			
			}
		else if ($pgc_emp_acc_name = "$fullName") //if exist add acc card 
            {
             $result = mysqli_query($con,,"INSERT INTO emp_accountability_card (`ID`, `Emp_ID`, `Name`, `Office_Department`, `Designation`, `ParNo`, `Qty`, `Unit`, `Desc`, `PropNo`, `Amount`, `Remarks`, `Status`, `Date`) VALUES (NULL, '$accID', '$fullName', '$office_dep', '', '', '', '', '', '', '', '', '', '')");
            }
		else
		{

			// SQL query to fetch information of registerd users and finds user match.

			$result = mysqli_query($con,,"INSERT INTO emp_accountability_card (Emp_Name,Office_Department,Designation,ParNo,Qty,Unit,'Desc',PropNo,Amount,Remarks) 
            		VALUES ('$pgc_emp_ac_name','$pgc_emp_ac_designation','$pgc_emp_ac_office','$pgc_emp_ac_qty','$pgc_emp_ac_unit','$pgc_emp_ac_desc','$pgc_emp_ac_propno','$pgc_emp_ac_amount','$pgc_emp_ac_dateturnover','$pgc_emp_ac_transferto','$pgc_emp_ac_remarks')"); 

		}
}
?>




<?php 
                            
                          
                          //  else  //if account not exist create new accID before add acc card
                          //    {
                             //   $qry = "INSERT INTO emp_pgc_record (`accID`, `fullName`, `office`, `designation`) VALUES (NULL, '', '$pgc_acc_card_name', '$pgc_acc_card_office_dep');";
                            //    $Emp_ID = "SELECT accID FROM `emp_pgc_record` Where fullName = '$pgc_acc_card_name'";
                           //     $qry1 = "INSERT INTO emp_accountability_card (`ID`, `Emp_ID`, `Name`, `Office_Department`, `Designation`, `ParNo`, `Qty`, `Unit`, `Desc`, `PropNo`, `Amount`, `Remarks`, `Status`, `Date`) VALUES (NULL, '$accID', '$fullName', '$office_dep', '', '', '', '', '', '', '', '', '', '');";
                       //       }
                     //     }


                  //      ?>