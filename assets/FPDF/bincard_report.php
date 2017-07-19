<?php
require('fpdf.php');
include('db.php');

	$date_requested =$_REQUEST['date'];
	$designation_requested = $_REQUEST['designation'];
	$office_requested = $_REQUEST['office'];
	$note_requested = $_REQUEST['note'];
	$sql="SELECT * ";
	if ($date_requested != 'null') 
	{
		$sql.=" FROM  emp_accountability_card  WHERE  DateAdded LIKE  '$date_requested-%' ";
	}
	else if ($designation_requested != 'null') {
		$sql.=" FROM  emp_accountability_card  WHERE  designation LIKE  '$designation_requested' ";
	}

	else if ($office_requested != 'null') {
		$sql.=" FROM  emp_accountability_card  WHERE  office LIKE  '$office_requested' ";
	}

	else if ($note_requested != 'null') {
		$sql.=" FROM  emp_accountability_card  WHERE  note LIKE  '$note_requested' ";
	}
	else
	{
		#invalid request
	}

	$query = mysql_query($sql);
class PDF extends FPDF{
	function Header(){
		//$this->Image('logo.png',10,6,20);

		$res = mysql_query("SELECT * FROM emp_pgc_record");
		$query = mysql_fetch_array($res);
		$fullName = $query['fullName'];
		$office = $query['office'];
		$designation = $query['designation'];
		$note = $query['note'];



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
$pdf->SetFont('Times','B',10);
$pdf->Cell(135);
$pdf->Cell(30,10,'GENERAL REPORT OF ACCOUNTABILITY CARD',0,0,'C');
$pdf->SetFont('Arial','',7);
$prop=array(//'HeaderColor'=>array(255,150,100),
			//'color1'=>array(210,245,255),
			//'color2'=>array(255,255,210),
			'padding'=>2);
$res = mysql_query("SELECT * FROM emp_pgc_record");
		while ($query = mysql_fetch_array($res)){
		$empID = $query['accID'];
		$fullName = $query['fullName'];
		$office = $query['office'];
		$designation = $query['designation'];
		$note = $query['note'];
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

		$pdf->Cell(20,10,'PR # ',1,0);
		$pdf->Cell(20,10,'QTY/UNIT',1,0);
		$pdf->Cell(80,10,'DESCRPTION ',1,0);
		$pdf->Cell(50,10,'SERIAL NUMBER ',1,0);
		$pdf->Cell(20,10,'PROP.#',1,0);
		$pdf->Cell(30,10,'AMOUNT',1,0,'C');
		$pdf->Cell(40,10,'TRANSFER TO',1,0);
		$pdf->Cell(30,10,'DATE TURNOVER',1,0);
		$pdf->Cell(0,10,'REMARKS ',1,1);
		


$res1 = mysql_query("SELECT * FROM emp_accountability_card WHERE Emp_ID = $empID");
while($test = mysql_fetch_array($res1))
{			$pdf->SetFont('Arial','',9);
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
			//dont print
		}
	}

}
}
//temporary not yet finish :( this is just a sample print
$pdf->Output();
?>