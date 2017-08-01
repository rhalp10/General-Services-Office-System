<?php
require('fpdf.php');
include('db.php');
$icsID = $_REQUEST['icsID'];
$res = mysql_query("SELECT * From invent_custodian_slip WHERE ID = '$icsID' ");
$row = mysql_fetch_array($res);
class PDF extends FPDF{
	function Header(){
		$this->Image('logo.png',10,16,25);
		$this->SetFont('Times','',8);
		$this->Cell(80);
		$this->Cell(30,10,'Republic of the Philippines',0,1,'C');
		$this->Cell(80);
		$this->Cell(30,0,'Province of Cavite',0,1,'C');
		$this->SetFont('Times','B',8);
		$this->Cell(80);
		$this->Cell(30,10,'GENERAL SERVICES OFFICE',0,1,'C');
		$this->SetFont('Times','',8);
		$this->Cell(80);
		$this->Cell(30,0,'Trece Martires City',0,0,'C');
		$this->Ln(20);

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
	    $this->SetFont('Times','',8);
	    // Page number
	    //$this->Cell(0,10,$this->PageNo(),0,0,'R');
	    $this->Cell(0,-30,'For Use of Property Unit',0,0);
	}
}
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','B',20);
$pdf->Cell(0,20,'',1,0,'C');
$pdf->Cell(-185,10,'INVENTORY CUSTODIAN SLIP',0,0,'C');
$pdf->SetFont('Times','',8);
$pdf->Cell(0,20,'',0,1,'C');
$pdf->Cell(150);
$pdf->Cell(10,-10,'ICS No.:',0,1);   
$pdf->SetFont('Times','U',8);
$pdf->Cell(165);
$pdf->Cell(10,10,$row['ICS'],0,1,'C'); 
$pdf->SetFont('Times','B',8);
$pdf->Cell(25,10,'Quantity/Unit',1,0,'C');
$pdf->Cell(100,10,'Description',1,0,'C');
$pdf->Cell(30,10,'Inventory Item No',1,0,'C');
$pdf->Cell(35,10,'Estimated Useful Life',1,1,'C');
$pdf->SetFont('Times','',8);
$sql ="SELECT * FROM";
$sql.=" invent_custodian_slip WHERE ID = '$icsID'";
$res1 = mysql_query($sql);
$colCount = 0;
while ($data = mysql_fetch_array($res1)) 
{
	$colCount = $colCount +1;
	$icsID = $data['ID'];
	$pdf->Cell(25,5,$data['Qty'].' '.$data['Unit'],1,0,'C');

	$pdf->Cell(100,5,$data['Descrp'],1,0);

	$pdf->Cell(30,5,$data['Invent_Item_No'],1,0,'C');
	$pdf->Cell(35,5,$data['Ez_Useful_Life'],1,1,'C');
	$res2 = mysql_query("SELECT * FROM invent_custodian_slip_descrp where icsID = '$icsID' ");
    while ($row = mysql_fetch_array($res2))
    {
    	$pdf->Cell(25,5,'',1,0);
		$pdf->Cell(100,5,$row['Descrp'],1,0);
		$pdf->Cell(30,5,$row['Invent_Item_No'],1,0);
		$pdf->Cell(35,5,'',1,1);
    }
		
}
	 					$result1 = mysql_query("SELECT * FROM organizationchart WHERE ID = '2'");
                        $test1 = mysql_fetch_array($result1);
                        $rFname = $test1['Name'];
                        $rFposition = $test1['Position'];
for($colCount;$colCount<24;$colCount++)
	{	
	$pdf->Cell(25,5,'',1,0);
	$pdf->Cell(100,5,'',1,0);
	$pdf->Cell(30,5,'',1,0);
	$pdf->Cell(35,5,'',1,1);
	}
	$sql3 ="SELECT * FROM";
$sql3.=" invent_custodian_slip WHERE ID = '$icsID'";
$res3 = mysql_query($sql3);
$row = mysql_fetch_array($res3);
$pdf->Cell(100,15,'',1,0);
$pdf->Cell(0,15,'',1,1);
$pdf->Cell(100,-25,'Receive by:',0,0);
$pdf->Cell(0,-25,'Receive from:',0,0);
$pdf->Cell(0,0,'',0,1);
$pdf->Cell(100,15,'',1,0);
$pdf->Cell(0,15,'',1,1);
$pdf->Cell(100,-25,'Signature Over Printed Name',0,0,'C');
$pdf->Cell(0,-25,'Signature Over Printed Name',0,0,'C');
$pdf->Cell(0,0,'',0,1);
//cell for names value

$pdf->SetFont('Times','B',8);
$pdf->Cell(100,-35,$row['ReceivedBy_Name'],0,0,'C');
$pdf->Cell(0,-35,$rFname,0,0,'C');
$pdf->Cell(0,0,'',0,1);
$pdf->SetFont('Times','',8);
//names value end
$pdf->Cell(100,15,'',1,0);
$pdf->Cell(0,15,'',1,1);
$pdf->Cell(100,-25,'Position/Office',0,0,'C');
$pdf->Cell(0,-25,'Position/office',0,0,'C');
$pdf->Cell(0,0,'',0,1);
//cell for position value
$pdf->SetFont('Times','B',8);
$pdf->Cell(100,-35,$row['ReceivedBy_Position'],0,0,'C');
$pdf->Cell(0,-35,$rFposition,0,0,'C');
$pdf->Cell(0,0,'',0,1);
$pdf->SetFont('Times','',8);
//position value end
$pdf->Cell(100,10,'',1,0);
$pdf->Cell(0,10,'',1,1);
$pdf->Cell(100,-15,'Date',0,0,'C');
$pdf->Cell(0,-15,'Date',0,0,'C');
$pdf->Cell(0,0,'',0,1);
//cell for date value
$pdf->SetFont('Times','B',8);
$pdf->Cell(100,-25,$row['ReceiveBy_Date'],0,0,'C');
$pdf->Cell(0,-25,$row['ReceiveBy_Date'],0,1,'C');
$pdf->Cell(0,0,'',0,1);
$pdf->SetFont('Times','',8);
//date value end
$pdf->Output();
?>