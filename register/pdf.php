<?php
if (!empty($_POST['button'])) {
    
    $name=$_POST['full_name'];
    $contact=$_POST['phone_number'];
    $location=$_POST['location'];
    require("fpdf/fpdf.php");
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial" ,"",16);
    $pdf->Cell(0,10,"details",1,1,'C');
    $pdf->Cell(20,10,"name",1,0);
    $pdf->Cell(20,10,"contact",1,0);
    $pdf->Cell(20,10,"location",1,0);
    $pdf->output();

}
?>
