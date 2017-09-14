<?php
    $ID =$_REQUEST['ID'];
    include('db.php');
if(isset($_POST['Submit'])) {    
   
    $pgc_emp_ac_parno = $_POST['pgc_emp_ac_parno'];
    $pgc_emp_ac_qty=$_POST['pgc_emp_ac_qty'];
    $pgc_emp_ac_unit=$_POST['pgc_emp_ac_unit'];
    $pgc_emp_ac_descrp=$_POST['pgc_emp_ac_descrp'];
    $pgc_emp_ac_sn=$_POST['pgc_emp_ac_sn'];
    $pgc_emp_ac_propno=$_POST['pgc_emp_ac_propno'];
    $pgc_emp_ac_amount=$_POST['pgc_emp_ac_amount'];
    $pgc_emp_ac_dateturnover=$_POST['pgc_emp_ac_dateturnover'];
    $pgc_emp_ac_transferto=$_POST['pgc_emp_ac_transferto'];
    $pgc_emp_ac_remarks=$_POST['pgc_emp_ac_remarks'];
    $Emp_ID = $ID;

    // checking empty fields
    if( empty($pgc_emp_ac_parno)|| empty($pgc_emp_ac_qty)|| empty($pgc_emp_ac_unit)|| empty($pgc_emp_ac_descrp)|| empty($pgc_emp_ac_sn)|| empty($pgc_emp_ac_propno)|| empty($pgc_emp_ac_amount)) 
    {                
        
        if(empty($pgc_emp_ac_parno)) 
        {
            echo "<script>alert('ParNo is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
         if(empty($pgc_emp_ac_qty)) 
         {
            echo "<script>alert('Quantity is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
        
         if(empty($pgc_emp_ac_unit)) 
         {
            echo "<script>alert('Unit is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
        
         if(empty($pgc_emp_ac_descrp)) 
         {
            echo "<script>alert('Description is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
        if(empty($pgc_emp_ac_sn)) 
         {
            echo "<script>alert('Serial is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
         if(empty($pgc_emp_ac_propno)) 
         {
            echo "<script>alert('Property No is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
         if(empty($pgc_emp_ac_amount)) 
         {
            echo "<script>alert('Amount is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
         
       
    } 
    else 
    { 
        // if all the fields are filled (not empty)             
        //insert data to database
        if (empty($pgc_emp_ac_dateturnover) || empty($pgc_emp_ac_transferto)) 
        {
            $result = mysqli_query($con,"INSERT INTO emp_accountability_card(Emp_ID,ParNo,Qty,Unit,Descrp,SN,PropNo,Amount,TransferTo,Remarks,DateTurnOver) 
            VALUES('$Emp_ID','$pgc_emp_ac_parno','$pgc_emp_ac_qty','$pgc_emp_ac_unit','$pgc_emp_ac_descrp','$pgc_emp_ac_sn','$pgc_emp_ac_propno','$pgc_emp_ac_amount','null','$pgc_emp_ac_remarks','0000-00-00')");
        }
        else
        {
             $result = mysqli_query($con,"INSERT INTO emp_accountability_card(Emp_ID,ParNo,Qty,Unit,Descrp,PropNo,Amount,TransferTo,Remarks,DateTurnOver) 
            VALUES('$Emp_ID','$pgc_emp_ac_parno','$pgc_emp_ac_qty','$pgc_emp_ac_unit','$pgc_emp_ac_descrp','$pgc_emp_ac_sn','$pgc_emp_ac_propno','$pgc_emp_ac_amount','$pgc_emp_ac_transferto','$pgc_emp_ac_remarks','$pgc_emp_ac_dateturnover')");
        }
       
        
        //display success message
        echo "<script>alert('Data added successfully');
                                        window.location='acccard.php';
                                    </script>";
    }
}

?>