<?php    
include('db.php');
if(isset($_POST['Submit'])) 
{    


    $bincard_record_date = $_POST['bincard_record_date'];
    $bincard_record_supplier = $_POST['bincard_record_supplier'];
    $bincard_record_description = $_POST['bincard_record_description'];
    $bincard_record_qty = $_POST['bincard_record_qty'];
    $bincard_record_pono = $_POST['bincard_record_pono'];
    if (empty($bincard_record_date) || empty($bincard_record_supplier) || empty($bincard_record_description) || empty($bincard_record_qty)) {
            if($bincard_record_date == '0000-00-00') 
            {
                echo "<script>alert('Pick a Date!');
                                            window.location='bincard.php';
                                        </script>";
            }
            
            if(empty($bincard_record_supplier)) 
            {
                echo "<script>alert('Supplier !');
                                            window.location='bincard.php';
                                        </script>";
            }
            
            if(empty($bincard_record_description)) 
            {
                echo "<script>alert('Description is empty!');
                                            window.location='bincard.php';
                                        </script>";
            }
            if(empty($bincard_record_qty)) 
            {
                echo "<script>alert('Quantity is empty!');
                                            window.location='bincard.php';
                                        </script>";
            }
        }
        else
        {
            $sql ="INSERT INTO bincard_record (bin_Date, Supplier, Descrp, Qty,PoNo)";
            $sql.="VALUES ('$bincard_record_date','$bincard_record_supplier','$bincard_record_description','$bincard_record_qty','$bincard_record_pono')";
            $result = mysqli_query($con,$sql);
            
            //display success message
            echo "<script>alert('Data added successfully');
                                            window.location='bincard.php';
                                        </script>";
        }
         

    }
        

?>