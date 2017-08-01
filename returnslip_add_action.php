<?php
include('db.php');
if(isset($_POST['Submit'])) 
{    

    $prop_return_slip_lguName = $_POST['prop_return_slip_lguName'];
    $prop_return_slip_purpose = $_POST['prop_return_slip_purpose'];
    $prop_return_slip_qty = $_POST['prop_return_slip_qty'];
    $prop_return_slip_unit = $_POST['prop_return_slip_unit'];
    $prop_return_slip_descrp = $_POST['prop_return_slip_descrp'];
    $prop_return_slip_serialnum = $_POST['prop_return_slip_serialnum'];
    $prop_return_slip_propno = $_POST['prop_return_slip_propno'];
    $prop_return_slip_par = $_POST['prop_return_slip_par'];
    $prop_return_slip_NameOfEndUser = $_POST['prop_return_slip_NameOfEndUser'];
    $prop_return_slip_UnitValue = $_POST['prop_return_slip_UnitValue'];
    $prop_return_slip_TotalValue = $_POST['prop_return_slip_TotalValue'];
    $prop_return_slip_receiveBy_Name = $_POST['prop_return_slip_receiveBy_Name'];
    $prop_return_slip_receiveBy_Position = $_POST['prop_return_slip_receiveBy_Position'];
    $prop_return_slip_receiveBy_Date = $_POST['prop_return_slip_receiveBy_Date'];
    $prop_return_slip_receiveFrom_Name = $_POST['prop_return_slip_receiveFrom_Name'];
    $prop_return_slip_receiveFrom_Position = $_POST['prop_return_slip_receiveFrom_Position'];
    $prop_return_slip_receiveFrom_Date = $_POST['prop_return_slip_receiveFrom_Date'];
    $prop_return_slip_status = $_POST['prop_return_slip_status'];


    $sql = "INSERT INTO property_return_slip_record (ID, LGU_Name, PurposeID, Qty, Unit, Descrp, Serial_Num, Prop_Number, ParNo, Name_of_Enduser, Unit_Value, Total_Value, Status, ReceiveBy_Name, ReceiveBy_Position, ReceiveBy_Date, ReceiveFrom_Name, ReceiveFrom_Position, ReceiveFrom_Date, DateAdded)";

    $sql.=" VALUES (NULL, '$prop_return_slip_lguName ', '$prop_return_slip_purpose', '$prop_return_slip_qty', '$prop_return_slip_unit', '$prop_return_slip_descrp', '$prop_return_slip_serialnum', '$prop_return_slip_propno', '$prop_return_slip_par', '$prop_return_slip_NameOfEndUser', '$prop_return_slip_UnitValue', '$prop_return_slip_TotalValue', '$prop_return_slip_status', '$prop_return_slip_receiveBy_Name', '$prop_return_slip_receiveBy_Position', '$prop_return_slip_receiveBy_Date', '$prop_return_slip_receiveBy_Date', '$prop_return_slip_receiveFrom_Position', '$prop_return_slip_receiveFrom_Date', CURRENT_TIMESTAMP)";
    $result = mysql_query($sql);
   //display success message
   echo "<script>alert('Data added successfully');
                              window.location='returnslip.php';
                                   </script>";
       
         
}

?>