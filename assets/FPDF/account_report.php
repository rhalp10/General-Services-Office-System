<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	
		global $title;
		// Calculate width of title and position
	    $w = $this->GetStringWidth($title)+6;
	    $this->SetX((210-$w)/2);
		$this->Image('logo.png',50,6,20);
		$this->SetFont('Times','B',15);
    	$this->SetLineWidth(1);
		$this->Cell($w,10,$title,0,0,'r');
		$this->Ln(20);
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

$title = 'MASTER LIST OF ACCOUNT REGISTERED';
$pdf->AddPage('L','Legal');	// L means landscape
//Second table: specify columns
$pdf->AddCol('fullName',60,'Fullname','');
$pdf->AddCol('username',40,'Username');
$pdf->AddCol('md5(password)',60,'Password');
$pdf->AddCol('Age',10,'Age','');
$pdf->AddCol('Gender',20,'Gender','');
$pdf->AddCol('Address',100,'Address','');
$pdf->AddCol('Email',55,'Email','');
$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table('select fullName,username,md5(password),Age,Gender,Address,Email from emp_accounts_record order by fullName ',$prop);
$pdf->Output();
?>
