<?php
require('fpdf.php');
include('db.php');

class PDF extends FPDF{
	function Header(){
		$this->Ln(20);
		$this->SetFont('Times','B',8);
    	$this->Cell(20,8,'Date Encoded',1,0,'C');
        $this->Cell(20,8,'PAR NO',1,0,'C');
    	$this->Cell(15,8,'QTY/UNIT',1,0,'C');
    	$this->Cell(70,8,'DESCRIPTION',1,0,'C');
    	$this->Cell(50,4,'AMOUNT',1,0,'C');
    	$this->Cell(25,8,'PROP. NO',1,0,'C');
    	$this->Cell(40,8,'ACOUNTABLE PERSON',1,0,'C');
    	$this->Cell(40,8,'DESIGNATION/OFFICE',1,0,'C');
    	$this->Cell(25,8,'DATE RELEASE',1,0,'C');	
    	$this->Cell(0,8,'SUPPLIER',1,1,'C');

        $this->Cell(125,-8,'',0,0,'C');
        $this->Cell(25,-4,'UNIT COST',1,0,'C');
        $this->Cell(25,-4,'TOTAL',1,1,'C');
        $this->Cell(0,4,'',0,1,'C');
		$this->SetFont('Times','',8);

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
include('db.php');
$sql ="SELECT * ";
$sql.="FROM  invent_222_1_07_07_010_furniture_fixtures";
$res = mysql_query($sql);
$pdf->SetFont('Times','',6);

while ($row = mysql_fetch_array($res)) 
	{

    	$pdf->Cell(20,8,$row['DateAdded'],1,0,'C');
        $pdf->Cell(20,8,$row['ParNo'],1,0,'C');
        $pdf->Cell(15,8,$row['Qty'].' '.$row['Unit'],1,0,'C');
        $pdf->Cell(70,8,$row['Descrp'],1,0,'C');
        $pdf->Cell(25,8,$row['UnitCost'],1,0,'C');
        $pdf->Cell(25,8,$row['TotalCost'],1,0,'C');
        $pdf->Cell(25,8,$row['PropNo'],1,0,'C');
        $pdf->Cell(40,8,$row['AccPerson'],1,0,'C');
        $pdf->Cell(40,8,$row['Designation_office'],1,0,'C');
        $pdf->Cell(25,8,$row['dateRelease'],1,0,'C');   
        $pdf->Cell(0,8,$row['Supplier'],1,1,'C');
	}
$pdf->SetFont('Arial','B',9);
$pdf->Output();
?>