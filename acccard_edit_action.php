<?php 
    $accID = $_REQUEST['accID'];
    include("db.php");

    if (isset($_POST['Update']))
    {
    		$pgc_emp_ac_edit_name = $_POST['pgc_emp_ac_edit_name'];
    		$pgc_emp_ac_edit_office = $_POST['pgc_emp_ac_edit_office'];
    		$pgc_emp_ac_edit_designation =  $_POST['pgc_emp_ac_edit_designation'];
		if ( empty($pgc_emp_ac_edit_name) ||  empty($pgc_emp_ac_edit_office) ||  empty($pgc_emp_ac_edit_designation))
		{
				if (empty($pgc_emp_ac_edit_name)) {
					echo "<script>alert('Name is Empty!');
                                        window.location='acccard_add.php';
                                    </script>";
				}
				if (empty($pgc_emp_ac_edit_office)) {
					echo "<script>alert('Office is Empty!');
                                        window.location='acccard_add.php';
                                    </script>";
				}
				if (empty($pgc_emp_ac_edit_designation)) {
					echo "<script>alert('Designation is Empty!');
                                        window.location='acccard.php';
                                    </script>";				
								}


		}
		else
		{	
			$sql = "UPDATE  emp_pgc_record ";
			$sql.="SET  fullName =  '$pgc_emp_ac_edit_name',office =  '$pgc_emp_ac_edit_office',designation = '$pgc_emp_ac_edit_designation' WHERE  accID = '$accID'";

			$result = mysql_query($sql);
			echo "<script>alert('Update info successfully');
                                        window.location='acccard.php';
                                    </script>";

                                    
		}

    	  	
    }
  
?>