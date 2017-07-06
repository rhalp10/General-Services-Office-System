<?php
   include('db.php');
if(isset($_POST['Submit'])) 
{    

    $prop_return_slip_lguName = $_POST['prop_return_slip_lguName'];
    $prop_return_slip_qty = $_POST['prop_return_slip_qty'];
    $prop_return_slip_purpose = $_POST['prop_return_slip_purpose'];
    $prop_return_slip_unit = $_POST['prop_return_slip_unit'];
    $prop_return_slip_descrp = $_POST['prop_return_slip_descrp'];
    $prop_return_slip_serialnum = $_POST['prop_return_slip_serialnum'];
    $prop_return_slip_propno = $_POST['prop_return_slip_propno'];
    $prop_return_slip_mrno = $_POST['prop_return_slip_mrno'];
    $prop_return_slip_NameOfEndUser = $_POST['prop_return_slip_NameOfEndUser'];
    $prop_return_slip_UnitValue = $_POST['prop_return_slip_UnitValue'];
    $prop_return_slip_TotalValue = $_POST['prop_return_slip_TotalValue'];
    $prop_return_slip_receiveBy_Name = $_POST['prop_return_slip_receiveBy_Name'];
    $prop_return_slip_receiveBy_Position = $_POST['prop_return_slip_receiveBy_Position'];
    $prop_return_slip_receiveBy_Date = $_POST['prop_return_slip_receiveBy_Date'];
    $prop_return_slip_receiveFrom_Name = $_POST['prop_return_slip_receiveFrom_Name'];
    $prop_return_slip_receiveFrom_Position = $_POST['prop_return_slip_receiveFrom_Position'];
    $prop_return_slip_receiveFrom_Date = $_POST['prop_return_slip_receiveFrom_Date'];

    if ( empty($prop_return_slip_lguName) || empty($prop_return_slip_qty) || empty($prop_return_slip_purpose) ||  empty($prop_return_slip_unit) ||  empty($prop_return_slip_descrp) ||  empty($prop_return_slip_serialnum) ||  empty($prop_return_slip_propno) ||  empty($prop_return_slip_mrno) ||  empty($prop_return_slip_NameOfEndUser) ||  empty($prop_return_slip_UnitValue) ||  empty($prop_return_slip_TotalValue))
        {
            if(empty($prop_return_slip_lguName)) 
            {
                echo "<script>alert('LGU Name is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
            if(empty($prop_return_slip_qty)) 
            {
                echo "<script>alert('Quantity is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
            
            if(empty($prop_return_slip_purpose)) 
            {
                echo "<script>alert('Please Choose a Purpose!');
                                            window.location='returnslip.php';
                                        </script>";
            }
            if(empty($prop_return_slip_unit)) 
            {
                echo "<script>alert('Unit is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
            if(empty($prop_return_slip_descrp)) 
            {
                echo "<script>alert('Description is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
             if(empty($prop_return_slip_serialnum)) 
            {
                echo "<script>alert('Serial Number is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
       
            if(empty($prop_return_slip_propno)) 
            {
                echo "<script>alert('Proper Number is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
       
            if(empty($prop_return_slip_mrno)) 
            {
                echo "<script>alert('Mr no is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
       
            if(empty($prop_return_slip_NameOfEndUser)) 
            {
                echo "<script>alert('Name Of End User is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
       
            if(empty($prop_return_slip_UnitValue)) 
            {
                echo "<script>alert('Unit Value is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
       
            if(empty($prop_return_slip_TotalValue)) 
            {
                echo "<script>alert('Total Value is Empty!');
                                            window.location='returnslip.php';
                                        </script>";
            }
       
       
        }
        else
        {
             $result = mysql_query("INSERT INTO  property_return_slip_record(LGU_Name,PurposeID,Qty,Unit,Descrp,Serial_Num,Prop_Number,MrNo,Name_Of_Enduser,Unit_Value,Total_Value,Status,ReceiveBy_Name,ReceiveBy_Position,ReceiveBy_Date,ReceiveFrom_Name,ReceiveFrom_Position,ReceiveFrom_Date) 
            VALUES('$prop_return_slip_lguName','$prop_return_slip_purpose','$prop_return_slip_qty','$prop_return_slip_unit','$prop_return_slip_descrp','$prop_return_slip_serialnum','$prop_return_slip_propno','$prop_return_slip_mrno','$prop_return_slip_NameOfEndUser','$prop_return_slip_UnitValue','$prop_return_slip_TotalValue' ,'Unserviceable','$prop_return_slip_receiveBy_Name','$prop_return_slip_receiveBy_Position','$prop_return_slip_receiveBy_Date','$prop_return_slip_receiveFrom_Name','$prop_return_slip_receiveFrom_Position','$prop_return_slip_receiveFrom_Date')");

            //display success message
            echo "<script>alert('Data added successfully');
                                        window.location='returnslip.php';
                                    </script>";
        }
         
}

        
?>