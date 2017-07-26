<?php
require('fpdf.php');
include('db.php');

$res = mysql_query("SELECT * From emp_accounts_record");

class PDF extends FPDF{
    function Header(){
        //$this->Image('logo.png',10,6,20);

        
    }
    function Chapter(){

    }
    function Mybody(){

    }
    function Layout(){

    }
    function footer(){
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','',8);
        // Page number
        $this->Cell(0,10,$this->PageNo(),0,0,'R');
    }
}
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','Legal');
$res2 = mysql_query("SELECT * FROM emp_pgc_record");
      while (  $query = mysql_fetch_array($res2))
      {
        $fullName = $query['fullName'];
        $office = $query['office'];
        $designation = $query['designation'];
        $note = $query['note'];
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(135);

        $pdf->SetFont('Arial','B',9);
        $pdf->Ln(20);

        $pdf->Cell(200,10,'NAME: '.$fullName,1,0);
        $pdf->Cell(0,10,'OFFICE: '.$office,1,1);

        if (!empty($note)){

        $pdf->Cell(200,10,'DESIGNATION: '.$designation,1,0);
        $pdf->Cell(0,10,'NOTE: '.$note,1,1);
        }
        else
        {

        $pdf->Cell(0,10,'DESIGNATION: '.$designation,1,1);
        }
        $empID = $query['accID'];
        $pdf->Cell(20,10,'PR # ',1,0);
        $pdf->Cell(20,10,'QTY/UNIT',1,0);
        $pdf->Cell(80,10,'DESCRPTION ',1,0);
        $pdf->Cell(50,10,'SERIAL NUMBER ',1,0);
        $pdf->Cell(20,10,'PROP.#',1,0);
        $pdf->Cell(30,10,'AMOUNT',1,0,'C');
        $pdf->Cell(40,10,'TRANSFER TO',1,0);
        $pdf->Cell(30,10,'DATE TURNOVER',1,0);
        $pdf->Cell(0,10,'REMARKS ',1,1);


$res = mysql_query("SELECT * FROM emp_accountability_card WHERE Emp_ID = $empID");
$rows = mysql_num_rows($res);
$pdf->SetFont('Arial','',7);
$prop=array(//'HeaderColor'=>array(255,150,100),
            //'color1'=>array(210,245,255),
            //'color2'=>array(255,255,210),
            'padding'=>2);
while($test = mysql_fetch_array($res))
{
    if ("SET ".$test['ItemSetID'] == $test['itemCode'])//SET
    {   
        
        $pdf->Cell(20,10,$test['ParNo'],1,0,'C');
        $pdf->Cell(20,10,$test['Qty'].' '.$test['Unit'],1,0);
        $pdf->Cell(80,10,$test['Descrp'],1,0);
        $pdf->Cell(50,10,$test['SN'],1,0);
        $pdf->Cell(20,10,$test['PropNo'],1,0);
        if ($test['Amount'] == '0') {
        $pdf->Cell(30,10,'',1,0,'C');
        }
        else {
        $pdf->Cell(30,10,$test['Amount'],1,0,'C');
        }       
        $pdf->Cell(40,10,$test['TransferTo'],1,0);

        if ($test['DateTurnOver'] == '0000-00-00') {
        $pdf->Cell(30,10,'',1,0);
        }
        else {
        $pdf->Cell(30,10,$test['DateTurnOver'],1,0);
        }   
        $pdf->Cell(0,10,$test['Remarks'],1,1);
        $partID = 'PART '.$test['ItemSetID'];
        $res1 = mysql_query("SELECT * FROM emp_accountability_card");
        $rows1 = mysql_num_rows($res1);
        while($test1 = mysql_fetch_array($res1))
        {
            if ($partID == $test1['itemCode'])
            {
            $pdf->Cell(20,10,'',1,0,'C');
            $pdf->Cell(20,10,$test1['Qty'].' '.$test['Unit'],1,0);
            $pdf->Cell(80,10,$test1['Descrp'],1,0);
            $pdf->Cell(50,10,$test1['SN'],1,0);
            $pdf->Cell(20,10,$test1['PropNo'],1,0);
            if ($test1['Amount'] == '0') {
            $pdf->Cell(30,10,'',1,0,'C');
            }
            else {
            $pdf->Cell(30,10,$test1['Amount'],1,0,'C');
            }   
            $pdf->Cell(40,10,$test1['TransferTo'],1,0);
            if ($test1['DateTurnOver'] == '0000-00-00') {
            $pdf->Cell(30,10,'',1,0);
            }
            else {
            $pdf->Cell(30,10,$test1['DateTurnOver'],1,0);
            }   
            $pdf->Cell(0,10,$test1['Remarks'],1,1);
            }
        }

        
    }
}
}


//temporary not yet finish :( this is just a sample print
$pdf->Output();
?>