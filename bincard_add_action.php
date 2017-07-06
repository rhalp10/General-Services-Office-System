<?php
    $ID =$_REQUEST['ID'];
    include ("db.php");
if(isset($_POST['Submit'])) {    
   
    $bincard_rec_date = $_POST['bincard_rec_date'];
    $bincard_rec_supplier = $_POST['bincard_rec_supplier'];
    $bincard_rec_desc = $_POST['bincard_rec_desc'];
    $bincard_rec_sn = $_POST['bincard_rec_sn'];
    $bincard_rec_recpnt = $_POST['bincard_rec_recpnt'];
    $bincard_rec_qty = $_POST['bincard_rec_qty'];
    $bincard_rec_issued = $_POST['bincard_rec_issued'];
    $bincard_rec_bal = $_POST['bincard_rec_bal'];
    $Emp_ID = $ID;

    // checking empty fields
    if( empty($$bincard_rec_date )|| empty($bincard_rec_supplier )|| empty($bincard_rec_desc )|| empty($bincard_rec_sn )|| empty($bincard_rec_recpnt)|| empty($bincard_rec_qty )|| empty($bincard_rec_issued)|| empty($bincard_rec_bal)) 
    {                
        
        if(empty($bincard_rec_date)) 
        {
            echo "<script>alert('Date is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
         if(empty($bincard_rec_supplier)) 
         {
            echo "<script>alert('Supplier is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
        
         if(empty$bincard_rec_desc)) 
         {
            echo "<script>alert('Description is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
        
         if(empty($bincard_rec_sn)) 
         {
            echo "<script>alert('Serial Number is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
        if(empty($bincard_rec_recpnt)) 
         {
            echo "<script>alert('Recipient is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
         if(empty($bincard_rec_qty)) 
         {
            echo "<script>alert('Quantity No is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
         if(empty($bincard_rec_issued)) 
         {
            echo "<script>alert('Issued is Empty!');
                                        window.location='acccard_add.php?accID=".$Emp_ID."';
                                    </script>";
        }
         if(empty($bincard_rec_bal)) 
         {
            echo "<script>alert('Balance is Empty!');
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
            $result = mysql_query("INSERT INTO emp_accountability_card(Emp_ID,ParNo,Qty,Unit,Descrp,SN,PropNo,Amount,TransferTo,Remarks,DateTurnOver) 
            VALUES('$Emp_ID','$pgc_emp_ac_parno','$pgc_emp_ac_qty','$pgc_emp_ac_unit','$pgc_emp_ac_descrp','$pgc_emp_ac_sn','$pgc_emp_ac_propno','$pgc_emp_ac_amount','null','$pgc_emp_ac_remarks','0000-00-00')");
        }
        else
        {
             $result = mysql_query("INSERT INTO emp_accountability_card(Emp_ID,ParNo,Qty,Unit,Descrp,PropNo,Amount,TransferTo,Remarks,DateTurnOver) 
            VALUES('$Emp_ID','$pgc_emp_ac_parno','$pgc_emp_ac_qty','$pgc_emp_ac_unit','$pgc_emp_ac_descrp','$pgc_emp_ac_sn','$pgc_emp_ac_propno','$pgc_emp_ac_amount','$pgc_emp_ac_transferto','$pgc_emp_ac_remarks','$pgc_emp_ac_dateturnover')");
        }
       
        
        //display success message
        echo "<script>alert('Data added successfully');
                                        window.location='acccard.php';
                                    </script>";
    }
}
?>