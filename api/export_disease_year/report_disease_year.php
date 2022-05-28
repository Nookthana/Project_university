<?php

require '../config/conn.php';
require './data_result_disease.php';
require ('../../pdf/sector.php');


$pdf = new PDF_Sector();



// add page
$pdf->AddPage();
//add datetime to print
$pdf->AddFont('test', '', 'THSarabunNew Bold.php');
//set font size
$pdf->SetFont('test', '', 10);
//set X & Y center
$pdf->SetY(1);
$pdf->SetX(175);
// set text
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', $datetime));

//set X & Y center
$pdf->SetY(15);

//set img
$pdf->Image('../../img/PBRU.png', 90, 10, 25, 25);

//set X & Y center
$pdf->SetY(45);
$pdf->SetX(55);
//set font size
$pdf->SetFont('test', '', 16);
// set text
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', $title));
//add datetime to print
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 10);
//set X & Y center
$pdf->SetY(65);
$pdf->SetX(12);
// set text table
$pdf->Cell(15, 10, iconv('UTF-8', 'TIS-620', 'ลำดับ'), 1, 0, 'C');
$pdf->Cell(45, 10, iconv('UTF-8', 'TIS-620', 'ชื่อโรค'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ปี '.$year_title1.' (คน)'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ร้อยล่ะ(%)'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ปี '.$year_title2.' (คน)'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ร้อยล่ะ(%)'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ปี '.$year_title3.' (คน)'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ร้อยล่ะ(%)'), 1, 0, 'C');

//set X & Y center
$pdf->SetY(75);
$pdf->SetX(12);
//set granY
$PosY = 75;
//set granX
$PosX = 12;

for ($i=0; $i < $Row ; $i++) { 

    //set X & Y center
    $pdf->SetY($PosY);
    $pdf->SetX($PosX);

    // set text table
    $pdf->Cell(15, 10, iconv('UTF-8', 'TIS-620', $no[$i]), 1, 0, 'C');
    $pdf->Cell(45, 10, iconv('UTF-8', 'TIS-620', $name_disease[$i]), 1, 0, 'C');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', $year1[$i]), 1, 0, 'C');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', number_format($AverageYear1[$i],2)." %"), 1, 0, 'C');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620',  $year2[$i]), 1, 0, 'C');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', number_format($AverageYear2[$i],2)." %"), 1, 0, 'C');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620',  $year3[$i]), 1, 0, 'C');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', number_format($AverageYear3[$i],2)." %"), 1, 0, 'C');
    // new line 
    $PosY+=10;

}



//out put
$pdf->Output();



?>