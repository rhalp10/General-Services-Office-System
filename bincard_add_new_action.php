<?php
    $connection = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("gso_data", $connection);
if(isset($_POST['Submit'])) 
{    


    $bincard_record_date = $_POST['bincard_record_date'];
    $bincard_record_supplier = $_POST['bincard_record_supplier'];
    $bincard_record_description = $_POST['bincard_record_description'];
    $bincard_record_qty = $_POST['bincard_record_qty'];
    $bincard_record_invntType = $_POST['bin_invent_type'];
        if(empty($bincard_record_date)) 
        {
            echo "<script>alert('Pick a Date////!');
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
        if (empty($bincard_record_invntType)) {
            echo "<script>alert('Choose Inventory Type!');
                                        window.location='bincard.php';
                                    </script>";
        }
        else
        {
            $result = mysql_query("INSERT INTO bincard_record (bin_Date,Supplier,Descrp,Qty,InventCode) VALUES ('$bincard_record_date','$bincard_record_supplier','$bincard_record_description','$bincard_record_qty','$bincard_record_invntType')");
            
            //display success message
            echo "<script>alert('Data added successfully');
                                            window.location='bincard.php';
                                        </script>";
        }
         

    }
        

?>