<?php
    $connection = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("gso_data", $connection);
if(isset($_POST['Submit'])) 
{    


    $pgc_emp_ac_name = $_POST['pgc_emp_ac_name'];
    $pgc_emp_ac_office = $_POST['pgc_emp_ac_office'];
    $pgc_emp_ac_designation = $_POST['pgc_emp_ac_designation'];

    $pgc_emp_ac_Note = $_POST['pgc_emp_ac_Note'];
    
    $result = mysqli_query($con,"SELECT * FROM emp_pgc_record WHERE fullName ='$pgc_emp_ac_name'");
    $test = mysqli_fetch_array($result);
        if (empty($pgc_emp_ac_name) || empty($pgc_emp_ac_office) || empty($pgc_emp_ac_designation)) 
        {
             if(empty($pgc_emp_ac_name)) 
                {
                    echo "<script>alert('Name is Empty!');
                                                window.location='acccard.php';
                                            </script>";
                }
                
                if(empty($pgc_emp_ac_office)) 
                {
                    echo "<script>alert('Office is Empty!');
                                                window.location='acccard.php';
                                            </script>";
                }
                
                if(empty($pgc_emp_ac_designation)) 
                {
                    echo "<script>alert('Designation is Empty!');
                                                window.location='acccard.php';
                                            </script>";
                }

        }
       
        else if ($pgc_emp_ac_name == $test['fullName'] ) 
        {
            //display exits data message
            echo "<script>alert('Already Exits!');
                                        window.location='acccard.php';
                                    </script>";
        }
        else
        {
            $result = mysqli_query($con,"INSERT INTO emp_pgc_record (fullName,office,designation,note) VALUES ('$pgc_emp_ac_name','$pgc_emp_ac_office','$pgc_emp_ac_designation','$pgc_emp_ac_Note')");
            //display success message
            echo "<script>alert('Data added successfully');
                                            window.location='acccard.php';
                                        </script>";
        }
         

    }
        

?>