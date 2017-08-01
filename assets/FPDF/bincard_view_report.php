<?php
require('fpdf.php');
include('db.php');
$ID = $_REQUEST['ID'];
              
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
    	$this->Cell(80,8,'',1,0,'C');
    	$this->Cell(125,8,'BIN CARD',1,0,'C');
    	$this->Cell(0,8,'P.O. NO./C.N. No.:',1,1,'C');
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
              $sql.=" FROM bincard_issued_record WHERE bin_ID = $ID";
              $query = mysql_query($sql);
              $sql1 = "SELECT *";
              $sql1.=" FROM bincard_record WHERE ID = $ID";
              $query1 = mysql_query($sql1);
              $row1=mysql_fetch_array($query1);
              $balance = $row1['Qty'];
              $totalQty = $row1['Qty'];
              $balanceUpdate =  $row1['Qty'];
              $Count = mysql_num_rows($query);
              $issuedCount = 0;
              $issuedUpdate = 0;
$pdf->SetFont('Times','',9);


    	$pdf->Cell(285,8,$row1['Descrp'],1,0);
     	$pdf->Cell(0,-8,$row1['PoNo'],0,1);
      	$pdf->Cell(0,16,'',1,1);
    	$pdf->SetFont('Times','B',9);
    	$pdf->Cell(30,8,'Date Encoded',1,0,'C');
    	$pdf->Cell(50,8,'Supplier',1,0,'C');
    	$pdf->Cell(85,8,'Description',1,0,'C');
    	$pdf->Cell(60,8,'Recipient',1,0,'C');
    	$pdf->Cell(35,8,'Issued',1,0,'C');
    	$pdf->Cell(35,8,'Balance',1,0,'C');
    	$pdf->Cell(0,8,'Issued Date',1,1,'C');
		$pdf->SetFont('Times','',8);

        while( $row=mysql_fetch_array($query)) 
			{
                $issuedCount = $issuedCount+1; 
                $balance = $balance - $row["qty"];
                $issued_ID = $row['ID'];

				$pdf->Cell(30,8,$row['DateAdded'],1,0,'C');
		    	$pdf->Cell(50,8,$row1['Supplier'],1,0,'C');
		    	$pdf->Cell(85,8,$row1['Descrp'],1,0);
		    	$pdf->Cell(60,8,$row['recpnt'],1,0);
		    	$pdf->Cell(35,8,$row['qty'],1,0,'C');
		    	$pdf->Cell(35,8,$balance,1,0,'C');
		    	$pdf->Cell(0,8,$row['issued_date'],1,1,'C');

		}
	
$pdf->SetFont('Arial','B',9);
$pdf->Output();
?>