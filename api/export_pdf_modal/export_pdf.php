<?php
require '../config/conn.php';
require './data_set.php';


require ('../../pdf/sector.php');


$pdf = new PDF_Sector();




//print_r($_SESSION['data']);

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
$pdf->SetY(5);
$pdf->SetX(75);
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 15);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', $title));
//add datetime to print
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set X & Y center
$pdf->SetY(10);
$pdf->SetX(10);
//set font size
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620//TRANSLIT//IGNORE',  'รหัสอ้างอิง '.$_SESSION['data'][0]['id_person']));
//set X & Y center
$pdf->SetY(15);
$pdf->SetX(10);
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10,iconv( 'UTF-8','TIS-620//TRANSLIT//IGNORE' ,'ชื่อ '.$_SESSION['data'][0]['name_person']));
//set X & Y center
$pdf->SetY(20);
$pdf->SetX(10);
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10,iconv( 'UTF-8','TIS-620//TRANSLIT//IGNORE' ,'เพศ '.$_SESSION['data'][0]['sex']));
//set X & Y center
$pdf->SetY(25);
$pdf->SetX(10);
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10,iconv( 'UTF-8','TIS-620//TRANSLIT//IGNORE' ,'อายุ '.$_SESSION['data'][0]['span_of_age']));
//set X & Y center
$pdf->SetY(30);
$pdf->SetX(10);
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10,iconv( 'UTF-8','TIS-620//TRANSLIT//IGNORE' ,'โรคประจำตัว '.$_SESSION['data'][0]['name_disease']));
//set X & Y center
$pdf->SetY(35);
$pdf->SetX(10);
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10,iconv( 'UTF-8','TIS-620//TRANSLIT//IGNORE' ,'การศึกษา '.$_SESSION['data'][0]['education']));
//set X & Y center
$pdf->SetY(40);
$pdf->SetX(10);
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10,iconv( 'UTF-8','TIS-620//TRANSLIT//IGNORE' ,'สถานภาพ '.$_SESSION['data'][0]['status']));
//set X & Y center
$pdf->SetY(45);
$pdf->SetX(10);
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10,iconv( 'UTF-8','TIS-620//TRANSLIT//IGNORE' ,'อาชีพ '.$_SESSION['data'][0]['career']));
//set X & Y center
$pdf->SetY(50);
$pdf->SetX(10);
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10,iconv( 'UTF-8','TIS-620//TRANSLIT//IGNORE' ,'วันที่ทำแบบสอบถาม '.$_SESSION['data'][0]['created']));
//set X & Y center
$pdf->SetY(55);
$pdf->SetX(10);
$pdf->SetFont('test', '', 10);
$pdf->Cell(0, 10,iconv( 'UTF-8','TIS-620//TRANSLIT//IGNORE' ,'วันที่ทำแบบสอบถาม '.$_SESSION['data'][0]['village']));
//set X & Y center
$pdf->SetY(70);
$pdf->SetX(15);
// set text table
$pdf->Cell(15, 10, iconv('UTF-8', 'TIS-620', 'ข้อ'), 1, 0, 'C');
$pdf->Cell(95, 10, iconv('UTF-8', 'TIS-620', 'รายการ'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ไม่ปฏิบัติเลย'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นบางครั้ง'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ปฏิบัติบ่อยครั้ง'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นประจำ'), 1, 0, 'C');

//set X & Y center
$pdf->SetY(25);
$pdf->SetX(12);
//set granY
$PosY = 80;
//set granX
$PosX = 15;

$A = 1;
$B = 2;
$C = 3;
$D = 4;

$column = ($row);
for ($i=0; $i < $column  ; $i++) { 

    $pdf->SetY($PosY);
    $pdf->SetX($PosX);
    // set text table
    $pdf->Cell(15, 10, iconv('UTF-8', 'TIS-620', $no[$i]), 1, 0, 'C');
    $pdf->Cell(95, 10, iconv('UTF-8', 'TIS-620', $question[$i]), 1, 0, 'L');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', $_SESSION['question'][0][$A]), 1, 0, 'C');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', $_SESSION['question'][0][$B]), 1, 0, 'C');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', $_SESSION['question'][0][$C]), 1, 0, 'C');
    $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', $_SESSION['question'][0][$D]), 1, 0, 'C');

        if ($i == 18) {

           // add page
            $pdf->AddPage();
            //set X & Y center
            $PosY = 10;
            $PosX = 15;

            $pdf->SetY($PosY);
            $pdf->SetX($PosX);

            $pdf->Cell(15, 10, iconv('UTF-8', 'TIS-620', 'ข้อ'), 1, 0, 'C');
            $pdf->Cell(95, 10, iconv('UTF-8', 'TIS-620', 'รายการ'), 1, 0, 'C');
            $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ไม่ปฏิบัติเลย'), 1, 0, 'C');
            $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นบางครั้ง'), 1, 0, 'C');
            $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ปฏิบัติบ่อยครั้ง'), 1, 0, 'C');
            $pdf->Cell(20, 10, iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นประจำ'), 1, 0, 'C');



   

        
           
        }
            $PosY+=10;


         

     
    
}


//print_r($column);

$pdf->Output();


?>

