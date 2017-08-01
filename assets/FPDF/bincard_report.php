<?php
require('fpdf.php');
include('db.php');
$res = mysql_query("SELECT * From bincard_record");

class PDF extends FPDF{
	function Header(){
		$this->Image('logo.png',15,10,30);
        $this->SetFont('Times','',20);
        $this->Cell(0,10,'BIN CARD RECORD',0,1,'C');
		$this->SetFont('Times','',8);
		$this->Cell(0,10,'Republic of the Philippines',0,1,'C');
		$this->Cell(0,0,'Province of Cavite',0,1,'C');
		$this->SetFont('Times','B',8);
		$this->Cell(0,10,'GENERAL SERVICES OFFICE',0,1,'C');
		$this->SetFont('Times','',8);
		$this->Cell(0,0,'Trece Martires City',0,0,'C');
		$this->Ln(20);
		$this->SetFont('Times','B',9);
    	$this->Cell(30,8,'Date Encoded',1,0,'C');
    	$this->Cell(50,8,'Supplier',1,0,'C');
    	$this->Cell(25,8,'P.O. NO./C.N. No.',1,0,'C');
    	$this->Cell(100,8,'Description',1,0,'C');
    	$this->Cell(25,8,'Quantity',1,0,'C');
    	$this->Cell(25,8,'Issued',1,0,'C');
    	$this->Cell(35,8,'Balance',1,0,'C');
    	$this->Cell(30,8,'Bin Date',1,1,'C');
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
$sql = "SELECT *";
$sql.=" FROM bincard_record";
$res = mysql_query($sql);
$pdf->SetFont('Times','',9);

while ($row = mysql_fetch_array($res)) 
	{

		$pdf->Cell(30,8,$row['DateAdded'],1,0,'C');
    	$pdf->Cell(50,8,$row['Supplier'],1,0,'C');
    	$pdf->Cell(25,8,$row['PoNo'],1,0,'C');
    	$pdf->Cell(100,8,$row['Descrp'],1,0);
    	$pdf->Cell(25,8,$row['Qty'],1,0,'C');
    	$pdf->Cell(25,8,$row['Issued'],1,0,'C');
    	$pdf->Cell(35,8,$row['Balance'],1,0,'C');
    	$pdf->Cell(30,8,$row['bin_Date'],1,1,'C');
	}
$pdf->SetFont('Arial','B',9);
$pdf->Output();
?>