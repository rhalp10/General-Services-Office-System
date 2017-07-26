<?php 
    $officeID = $_REQUEST['officeID'];

    include("db.php");

    if (isset($_POST['Update']))
    {
        $officeName_edit = $_POST['officeName_edit'];
    $officeCode_edit = $_POST['officeCode_edit'];
    if ( empty($officeName_edit) )
    {
          echo "<script>alert('Office Name is Empty!');
                                        window.location='acccard.php';
                                    </script>";   
    }
    else
    { 
      $sql = "UPDATE  office_dictionary ";
      $sql.="SET  officeName =  '$officeName_edit' ,officeCode = '$officeCode_edit' WHERE ID = '$officeID'";

      $result = mysql_query($sql);
      echo "<script>alert('Update info successfully');
                                        window.location='office.php';
                                    </script>";                              
    }

          
    }
  
?>