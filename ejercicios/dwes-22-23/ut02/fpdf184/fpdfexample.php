<?php
    
ob_end_clean();
require('fpdf.php');
  
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage();
  
// Set the font for the text
$pdf->SetFont('Arial', 'B', 18);
  
// Prints a cell with given text 
$pdf->Cell(60,20,'Carta de recomendacion');
$pdf-> Ln(20);
$pdf->Cell(10,20,"Nombre:               " . $_GET['Nombre']); 
$pdf-> Ln(10);
$pdf->Cell(10,20,"Apellidos:            " . $_GET['Apellidos']);
$pdf-> Ln(10);
$pdf->Cell(10,20,"Empresa:             " . $_GET['Empresa']);
$pdf-> Ln(10);
$pdf->Cell(10,20,"Representante:    " .$_GET['Representante']);
$pdf-> Ln(10);
$pdf->Cell(10,20,"Fecha:                  " . $_GET['Fecha']);

// return the generated output
$pdf->Output();
  
?>