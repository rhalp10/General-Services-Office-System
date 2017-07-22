<?php
require('fpdf.php');
include('db.php');
$res = mysql_query("SELECT * From emp_accounts_record");

class PDF extends FPDF{
	function Header(){
		$this->Image('logo.png',15,10,30);
        $this->SetFont('Times','',20);
        $this->Cell(0,10,'INVENTORY CUSTODIAN SLIP',0,1,'C');
		$this->SetFont('Times','',8);
		$this->Cell(0,10,'Republic of the Philippines',0,1,'C');
		$this->Cell(0,0,'Province of Cavite',0,1,'C');
		$this->SetFont('Times','B',8);
		$this->Cell(0,10,'GENERAL SERVICES OFFICE',0,1,'C');
		$this->SetFont('Times','',8);
		$this->Cell(0,0,'Trece Martires City',0,0,'C');
		$this->Ln(20);
		$this->SetFont('Times','B',8);
    	$this->Cell(20,8,'Date Encoded',1,0,'C');
    	$this->Cell(15,8,'Qty/Unit',1,0,'C');
    	$this->Cell(70,8,'Description',1,0,'C');
    	$this->Cell(10,8,'ICS',1,0,'C');
    	$this->Cell(25,8,'Invent. Item No.',1,0,'C');
    	$this->Cell(25,8,'Estimate Useful Life',1,0,'C');
    	$this->Cell(30,8,'ReceivedBy Name',1,0,'C');
    	$this->Cell(30,8,'ReceivedBy Position',1,0,'C');
    	$this->Cell(25,8,'ReceivedBy Date',1,0,'C');	
    	$this->Cell(30,8,'ReceivedFrom Name',1,0,'C');
    	$this->Cell(30,8,'ReceivedFrom Position',1,0,'C');
    	$this->Cell(25,8,'ReceivedFrom Date',1,1,'C');	
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
$sql.=" FROM invent_custodian_slip";
$res = mysql_query($sql);
$pdf->SetFont('Times','',6);

while ($row = mysql_fetch_array($res)) 
	{

		$pdf->Cell(20,8,$row['DateAdded'],1,0,'C');
    	$pdf->Cell(15,8,$row['Qty']." ".$row['Unit'] ,1,0,'C');
    	$pdf->Cell(70,8,$row['Descrp'],1,0);
    	$pdf->Cell(10,8,$row['ICS'],1,0,'C');
    	$pdf->Cell(25,8,$row['Invent_Item_No'],1,0,'C');
    	$pdf->Cell(25,8,$row['Ez_Useful_Life'],1,0,'C');
    	$pdf->Cell(30,8,$row['ReceivedBy_Name'],1,0,'C');
    	$pdf->Cell(30,8,$row['ReceivedBy_Position'],1,0,'C');
    	$pdf->Cell(25,8,$row['ReceiveBy_Date'],1,0,'C');	
    	$pdf->Cell(30,8,$row['ReceivedFrom_Name'],1,0,'C');
    	$pdf->Cell(30,8,$row['ReceivedFrom_Position'],1,0,'C');
    	$pdf->Cell(25,8,$row['ReceiveFrom_Date'],1,1,'C');	
    	$res2 = mysql_query("SELECT * FROM invent_custodian_slip_descrp where icsID = '".$row['ID']. "' ");
	    while ($row1 = mysql_fetch_array($res2))
	    {
	    	$pdf->Cell(20,8,'',1,0,'C');
    	$pdf->Cell(15,8,'',1,0,'C');
    	$pdf->Cell(70,8,$row1['Descrp'],1,0);
    	$pdf->Cell(10,8,'',1,0,'C');
    	$pdf->Cell(25,8,$row1['Invent_Item_No'],1,0,'C');
    	$pdf->Cell(25,8,'',1,0,'C');
    	$pdf->Cell(30,8,'',1,0,'C');
    	$pdf->Cell(30,8,'',1,0,'C');
    	$pdf->Cell(25,8,'',1,0,'C');	
    	$pdf->Cell(30,8,'',1,0,'C');
    	$pdf->Cell(30,8,'',1,0,'C');
    	$pdf->Cell(25,8,''	,1,1,'C');	
	    }
	}
$pdf->SetFont('Arial','B',9);
$pdf->Output();
?>