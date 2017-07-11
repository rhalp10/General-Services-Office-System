<?php
require('fpdf.php');
include('db.php');

$office =$_REQUEST['office'];
	
	sql ='select * ';
	sql.='From emp_accounts_record WHERE office= '$office';
	$res = mysql_query($sql);
	$query = mysql_fetch_array($res);

class PDF extends FPDF{
	function Header(){
		//$this->Image('logo.png',10,6,20);

		$office =$_REQUEST['office'];
		$res = mysql_query("SELECT * FROM emp_pgc_record");
		$query = mysql_fetch_array($res);
		$fullName = $query['fullName'];
		$office = $query['office'];
		$designation = $query['designation'];
		$note = $query['note'];
		$this->SetFont('Times','B',10);
		$this->Cell(135);
		$this->Cell(30,10,'ACCOUNTABILITY CARD OF $office'',0,0,'C');

		$this->SetFont('Arial','B',9);
		$this->Ln(20);

		$this->Cell(200,10,'NAME: '.$fullName,1,0);
		$this->Cell(0,10,'OFFICE: '.$office,1,1);

		if (!empty($note)){

		$this->Cell(200,10,'DESIGNATION: '.$designation,1,0);
		$this->Cell(0,10,'NOTE: '.$note,1,1);
		}
		else
		{

		$this->Cell(0,10,'DESIGNATION: '.$designation,1,1);
		}

		$this->Cell(20,10,'PR # ',1,0);
		$this->Cell(20,10,'QTY/UNIT',1,0);
		$this->Cell(80,10,'DESCRPTION ',1,0);
		$this->Cell(50,10,'SERIAL NUMBER ',1,0);
		$this->Cell(20,10,'PROP.#',1,0);
		$this->Cell(30,10,'AMOUNT',1,0,'C');
		$this->Cell(40,10,'TRANSFER TO',1,0);
		$this->Cell(30,10,'DATE TURNOVER',1,0);
		$this->Cell(0,10,'REMARKS ',1,1);


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
$res = mysql_query("SELECT * FROM emp_accountability_card WHERE Emp_ID = $ID");

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

        if ($test['DateTurnOver'] == '0000-00-00'  && $test['TransferTo'] == 'null' || $test['TransferTo'] == ' ' )
        {
                                                        
			$pdf->Cell(20,10,$test['ParNo'],1,0,'C');
			if ($test['Qty'] == 0) 
			{
			$pdf->Cell(20,10,' ',1,0,'C');
			}
			else 
			{
			$pdf->Cell(20,10,$test['Qty'].' '.$test['Unit'],1,0,'C');
			}
			$pdf->Cell(80,10,$test['Descrp'],1,0);
			$pdf->Cell(50,10,$test['SN'],1,0,'C');
			$pdf->Cell(20,10,$test['PropNo'],1,0,'C');
			if ($test['Amount'] == 0) 
			{
			$pdf->Cell(30,10,' ',1,0,'C');
			}
			else 
			{
			$pdf->Cell(30,10,$test['Amount'],1,0,'C');
			}
			if ($test['TransferTo'] == 'null') 
			{
			$pdf->Cell(40,10,' ',1,0);
			}
			else 
			{
			$pdf->Cell(40,10,$test['TransferTo'],1,0);
			}
			
			if ($test['DateTurnOver'] == '0000-00-00') 
			{
			$pdf->Cell(30,10,' ',1,0);
			}
			else 
			{
			$pdf->Cell(30,10,$test['DateTurnOver'],1,0,'C');
			}
			
			$pdf->Cell(0,10,$test['Remarks'],1,1);
			//Query for all parts of sets
            $itemSet = "PART ".$test['ItemSetID'];
            $result1 = mysql_query("SELECT * FROM emp_accountability_card WHERE itemCode = '$itemSet'");
            while($test1 = mysql_fetch_array($result1))//PARTS OF SET 
              { //IF STATEMENT OF DATETURN OVER AND TRANSFER TO
              	if ($test1['DateTurnOver'] == '0000-00-00'  && $test1['TransferTo'] == 'null' || $test1['TransferTo'] == ' ' )
                {
                	$pdf->Cell(20,10,'',1,0,'C');
					if ($test['Qty'] == 0) 
					{
					$pdf->Cell(20,10,' ',1,0,'C');
					}
					else 
					{
					$pdf->Cell(20,10,'',1,0,'C');
					}
					$pdf->Cell(80,10,$test1['Descrp'],1,0);
					$pdf->Cell(50,10,$test1['SN'],1,0,'C');
					$pdf->Cell(20,10,$test1['PropNo'],1,0,'C');
					if ($test1['Amount'] == 0) 
					{
					$pdf->Cell(30,10,' ',1,0,'C');
					}
					else 
					{
					$pdf->Cell(30,10,$test1['Amount'],1,0,'C');
					}
					if ($test1['TransferTo'] == 'null') 
					{
					$pdf->Cell(40,10,' ',1,0);
					}
					else 
					{
					$pdf->Cell(40,10,$test1['TransferTo'],1,0);
					}
					
					if ($test1['DateTurnOver'] == '0000-00-00') 
					{
					$pdf->Cell(30,10,' ',1,0);
					}
					else 
					{
					$pdf->Cell(30,10,$test1['DateTurnOver'],1,0,'C');
					}
					
					$pdf->Cell(0,10,$test1['Remarks'],1,1);
                }
              }
		}
		else
		{
			//nothing to print
		}
	}
}
//temporary not yet finish :( this is just a sample print
$pdf->Output();
?>