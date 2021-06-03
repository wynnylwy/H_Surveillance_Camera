<?php require_once 'core.php'; ?>
<?php 

	require_once("db_connect.php");
    $Package = $_SESSION['package'];
    $query = " select * from package where package='".$Package."'";
    $result = mysqli_query($connect,$query);

	if($result->num_rows == 1) {	
		while($row=mysqli_fetch_assoc($result))
		{
			$Package = $row['package'];
			$Live = $row['live'];
			$Record = $row['record'];
			$Snapshot = $row['snapshot'];
			$Status = $row['status'];
			$Price = $row['price'];
			$Qty = $row['qtyCam'];
		}
	}
	else {		
		echo "<script type='text/javascript'>alert('Package does not exists! Please insert correctly.');
		window.location='quotation.php';
		</script>";			
	}
?>
<?Php
require('fpdf/fpdf.php');

$title = 'Quotation';
$pdf = new FPDF(); 
$pdf->AddPage();
$pdf->SetFont('Arial','',15);
// Calculate width of title and position
$w = $pdf->GetStringWidth($title)+6;

$pdf->SetX((100-$w)/2);
$pdf->Cell(40, 10, 'SINTOK MONITORING AND SURVEILLANCE WEBAPP','C');
$pdf->Ln(10);

$pdf->SetX((200-$w)/2);
$pdf->Cell(40,10,'Quotation','C');
$pdf->Ln(20);

$pdf->SetX((80-$w)/2);
$pdf->Cell(130, 10, 'Detail', 1, 0, 'C');
$pdf->Cell($w, 10, 'Price(RM)', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(159,10, 'Service:', 1, 0, 'L');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '1.', 1, 0, 'C');
$pdf->Cell(100, 10, 'Camera:', 1, 0, 'L');
$pdf->Cell($w, 10, $Price, 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, 'Your Package:', 1, 0, 'L');
$pdf->Cell(60, 10, $Package, 1, 0, 'C');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, 'Quantity of cam:', 1, 0, 'L');
$pdf->Cell(60, 10, $Qty, 1, 0, 'C');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, 'Function:', 1, 0, 'L');
$pdf->Cell(40, 10, 'Live Cam:', 1, 0, 'L');
$pdf->Cell(20, 10, $Live, 1, 0, 'C');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, 'Record Video:', 1, 0, 'L');
$pdf->Cell(20, 10, $Record, 1, 0, 'C');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, 'Snapshot Pic:', 1, 0, 'L');
$pdf->Cell(20, 10, $Snapshot, 1, 0, 'C');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(159, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '2.', 1, 0, 'C');
$pdf->Cell(100, 10, 'Video:', 1, 0, 'L');
$pdf->Cell($w, 10, '300.00', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, 'Function:', 1, 0, 'L');
$pdf->Cell(60, 10, 'Upload video', 1, 0, 'L');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, '', 1, 0, 'L');
$pdf->Cell(60, 10, 'View video', 1, 0, 'L');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, '', 1, 0, 'L');
$pdf->Cell(60, 10, 'Delete video', 1, 0, 'L');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, '', 1, 0, 'L');
$pdf->Cell(60, 10, 'Download video', 1, 0, 'L');
$pdf->Cell($w, 10, '', 1, 0, 'C');

$pdf->SetX((80-$w)/2);
$pdf->Cell(159, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(159, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '3.', 1, 0, 'C');
$pdf->Cell(100, 10, 'Accessories:', 1, 0, 'L');
$pdf->Cell($w, 10, '500.00', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, 'Function:', 1, 0, 'L');
$pdf->Cell(60, 10, 'Add accessories', 1, 0, 'L');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, '', 1, 0, 'L');
$pdf->Cell(60, 10, 'Edit accessories', 1, 0, 'L');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, '', 1, 0, 'L');
$pdf->Cell(60, 10, 'Delete accessories', 1, 0, 'L');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(30, 10, '', 1, 0, 'C');
$pdf->Cell(40, 10, '', 1, 0, 'L');
$pdf->Cell(60, 10, 'View accessories', 1, 0, 'L');
$pdf->Cell($w, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(159, 10, '', 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetX((80-$w)/2);
$pdf->Cell(130, 10, 'Total:', 1, 0, 'C');
$pdf->Cell($w, 10, ($Price + 800.00) , 1, 0, 'C');
$pdf->Ln(10);

$pdf->Output();

$pdf->Output('Quotation.pdf','I'); // Send to browser and display
?>