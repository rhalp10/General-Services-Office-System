<?php    
include('db.php');
if(isset($_POST['Submit'])) 
{    

    $ID = $_REQUEST['ID'];
    $binitem_issued_date = $_POST['binitem_issued_date'];
    $binitem_issued_recpnt = $_POST['binitem_issued_recpnt'];
    $binitem_issued_qty = $_POST['binitem_issued_qty'];
        
    if (empty($binitem_issued_date) || empty($binitem_issued_recpnt) || empty($binitem_issued_qty) ) {
            if($binitem_issued_date == '0000-00-00') 
            {
                echo "<script>alert('Pick a Date!');
                                            window.location='bincard.php';
                                        </script>";
            }
            
            if(empty($binitem_issued_recpnt)) 
            {
                echo "<script>alert('Supplier !');
                                            window.location='bincard.php';
                                        </script>";
            }
            if(empty($binitem_issued_qty)) 
            {
                echo "<script>alert('Quantity is empty!');
                                            window.location='bincard.php';
                                        </script>";
            }
        }
        else
        {
            $sql ="INSERT INTO bincard_issued_record (bin_ID, recpnt, issued_date, qty)";
            $sql.="VALUES ('$ID','$binitem_issued_recpnt','$binitem_issued_date','$binitem_issued_qty')";
            $result = mysqli_query($con,$sql);
            $sql1 = "SELECT * FROM";
            $sql1.=" bincard_issued_record";
            $result1 = mysqli_query($con,$sql1);
            while ($row= mysqli_fetch_array($result1))
            {
                $addID = $row['ID'];
            }
            $sql2 = "UPDATE  bincard_issued_record";
            $sql2.=" SET ItemSetID = 'SP-$addID',itemCode = 'SET SP-$addID' WHERE ID = '$addID'";
            $result2 = mysqli_query($con,$sql2);
            //display success message
            echo "<script>alert('Data added successfully');
                                            window.location='bincard_view.php?ID=$ID';
                                        </script>";
        }
         

    }
        

?>