 <?php
require('fpdf.php');
include('db.php');
$res = mysql_query("SELECT * From property_accountability_receipt_record");

class PDF extends FPDF{
	function Header(){
        $this->SetFont('Times','U',20);
        $this->Cell(0,10,'PROPERTY ACCOUNTABILITY RECEIPT',1,1,'C');
		$this->SetFont('Times','U',16);
        $this->Cell(0,20,'',1,1,'C');
		$this->Cell(0,-30,'PROVINCE OF CAVITE',0,1,'C');
		$this->SetFont('Times','B',16);
		$this->Cell(0,45,'LGU',0,1,'C');
		$this->SetFont('Times','',8);
        $this->Cell(0,-35,'No.'.'________',0,1,'R');//generated No. ?

        $this->Cell(0,20,'',0,1,'C');
		$this->SetFont('Times','B',8);
    	$this->Cell(15,8,'Qty/Unit',1,0,'C');
    	$this->Cell(125,8,'Description',1,0,'C');
    	$this->Cell(0,8,'Prop No.',1,1,'C');  
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
$pdf->AddPage('P','');
include('db.php');
$ID = $_REQUEST['ID'];
$sql = "SELECT *";
$sql.=" FROM property_accountability_receipt_record WHERE ID = $ID";
$res = mysql_query($sql);
$pdf->SetFont('Times','',6);

while ($row = mysql_fetch_array($res)) 
	{

    	$pdf->Cell(15,5,$row['Qty']." ".$row['Unit'] ,1,0,'C');
    	$pdf->Cell(125,5,$row['Descrp'],1,0);
    	$pdf->Cell(0,5,$row['PropNo'],1,1,'C');

    	/*
    	
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
	    */
	}
    for ($i=0; $i < 25; $i++) { 
        
        $pdf->Cell(15,5,'',1,0,'C');
        $pdf->Cell(125,5,'',1,0);
        $pdf->Cell(0,5,'',1,1,'C');
    }
$sql1 = "SELECT *";
$sql1.=" FROM property_accountability_receipt_record WHERE ID = $ID";
$res1 = mysql_query($sql1);
$row1 = mysql_fetch_array($res1);
                        $result1 = mysql_query("SELECT * FROM organizationchart WHERE ID = '2'");
                        $test1 = mysql_fetch_array($result1);
                        $rFname = $test1['Name'];
                        $rFposition = $test1['Position']; 
                        $result1 = mysql_query("SELECT * FROM organizationchart WHERE ID = '1'");
                        $test1 = mysql_fetch_array($result1);
                        $paname = $test1['Name'];
                        $paposition = $test1['Position'];
    $pdf->Cell(0,35,'',1,1,'C');
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50,-65,'Approved for Issuance:',0,1,'C');
    $pdf->Cell(0,70,'',1,1,'C');

    $pdf->SetFont('Times','B',12);
    $pdf->Cell(0,-25,$paname,0,1,'C');//Name Connected to employeelist(GSO Employeelist Tree Admin to Simple Employee)
    $pdf->Cell(0,35,$paposition,0,1,'C');
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(100,-15,'Received from:',0,0,'L');
    $pdf->Cell(0,-15,'Received by:',0,1,'L');
    $pdf->SetFont('Times','U',10);
    $pdf->Cell(100,30,$rFname,0,0,'C');
    $pdf->Cell(0,30,$row1['ReceivedBy_Name'],0,1,'C');
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(100,-25,'Name',0,0,'C');
    $pdf->Cell(0,-25,'Name',0,1,'C');
    $pdf->SetFont('Times','U',10);
    $pdf->Cell(100,40,$rFposition,1,0,'C');
    $pdf->Cell(0,40,$row1['ReceivedBy_Position'],1,1,'C');
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(100,-35,'Position',0,0,'C');
    $pdf->Cell(0,-35,'Position',0,1,'C');
    $pdf->SetFont('Times','U',10);
    $pdf->Cell(100,50,$row1['ReceivedBy_Date'],0,0,'C');
    $pdf->Cell(0,50,$row1['ReceivedBy_Date'],0,1,'C');
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(100,-44,'Date',0,0,'C');
    $pdf->Cell(0,-44,'Date',0,1,'C');
    $pdf->Cell(0,44,'',0,1,'C');
    $pdf->Cell(0,-60,'',0,1,'C');



$pdf->Output();
?>