<?php
require('mysql_table.php');
include('db.php');


$ID =$_REQUEST['accID'];
$res = mysql_query("SELECT * FROM emp_pgc_record WHERE accID = $ID");
$query = mysql_fetch_array($res);
$fullName = $query['fullName'];
$office = $query['office'];
$designation = $query['designation'];

class PDF extends PDF_MySQL_Table
{
function Header()
		{

		$ID =$_REQUEST['accID'];
		$res = mysql_query("SELECT * FROM emp_pgc_record WHERE accID = $ID");
		$query = mysql_fetch_array($res);
		$fullName = $query['fullName'];
		$office = $query['office'];
		$designation = $query['designation'];
		global $title;
		// Calculate width of title and position
	    $w = $this->GetStringWidth($title)+6;
	    $this->SetX((210-$w)/2);
		//$this->Image('logo.png',50,6,20);

		$this->SetFont('Times','B',15);
    	$this->SetLineWidth(1);


		$this->Cell(30);
		$this->Cell($w,10,$title,0,0,'r');
		$this->Ln(20);
		$this->SetFont('Arial','',9);
		$this->Cell(13);
		$this->Cell(180,10,'NAME: '.$fullName,0,0);
		$this->Cell(40,10,'DESIGNATION: '.$designation,0,1);
		$this->Cell(13);
		$this->Cell(180,10,'OFFICE: '.$office,0,0);
		$this->Cell(40,10,'NOTE: ',0,1);
		parent::Header();
}

	function Mybody(){

		$pdf->SetFont('Times','I',15);
	}

function footer(){
	// Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Times Font
    $this->SetFont('Times','',12);
    // Page number
    $this->Cell(0,10,$this->PageNo(),0,0,'R');
	}
}

//Connect to database
include('db.php');

$pdf=new PDF();
//$pdf->AddPage('L');	// L means landscape
//First table: put all columns automatically
//$res = "SELECT * FROM emp_accounts_record";
//$pdf->Table($res);
$res = mysql_query("SELECT * FROM emp_accountability_card WHERE Emp_ID = $ID");
$query = mysql_fetch_array($res);
		
$title = 'ACCOUNTABILITY CARD';
$pdf->AddPage('L','Legal');	// L means landscape
//Second table: specify columns
$pdf->AddCol('ParNo',20,'ParNo','');
$pdf->AddCol('Qty',15,'Quantity','C');
$pdf->AddCol('Unit',10,'Unit');
$pdf->AddCol('Descrp',80,'Description','');
$pdf->AddCol('SN',40,'Serial Number','');
$pdf->AddCol('PropNo',17,'Property #','');
$pdf->AddCol('Amount',18,'Amount','');
$pdf->AddCol('TransferTo',50,'Transfer To','');

$pdf->AddCol('Remarks',55,'Remarks','');
$prop=array(//'HeaderColor'=>array(255,150,100),
			//'color1'=>array(210,245,255),
			//'color2'=>array(255,255,210),
			'padding'=>2);


$pdf->Table('select ParNo,Qty,Unit,Descrp,SN,PropNo,Amount,TransferTo,Remarks,DateTurnOver from emp_accountability_card WHERE Emp_ID = '.$ID.' order by DateAdded  ',$prop);
$pdf->Output();
?>
