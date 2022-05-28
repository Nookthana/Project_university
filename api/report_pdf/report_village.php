<?php
require '../config/conn.php';
require('../../pdf/sector.php');
require './result_data.php';





$pdf = new PDF_Sector();



$location = "รายงานสถิติสำรวจรายชุมชน  ปีการสำรวจ " . $_SESSION['year'] . "";
$village = "ชุมชน " . $_SESSION['data'][0]['vil'] . "";
$lnt_Lng = "พิกัด ( " . $_SESSION['data'][0]['lat'] . "," . $_SESSION['data'][0]['lng'] . " )";
$province = "จังหวัด " . $_SESSION['data'][0]['lo'] . "";
$detail = "รายละเอียดพื้นที่ " . $_SESSION['data'][0]['detail'] . "";

$time_print  = "พิมพ์วันที่ : ".date("d-m-Y")."";

// row table count table and graph for loop
$row_gender = count($gender_title);
$row_old = count($old_title);
$row_disease = count($disease_title);
$row_education = count($education_title);
$row_status = count($status_title);
$row_career = count($career_title);

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
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', $time_print ));

$pdf->AddFont('test', '', 'THSarabunNew Bold.php');
//set font size
$pdf->SetFont('test', '', 18);
//set X & Y center
$pdf->SetY(40);
$pdf->SetX(60);
// set text
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', $location));

//set X & Y center
$pdf->SetY(15);

//set img
$pdf->Image('../../img/PBRU.png', 90, 10, 25, 25);

//set X & Y center
$pdf->SetY(55);
$pdf->SetX(12);
//set font
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 12);
// set text
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', $village));
//set X & Y center
$pdf->SetY(60);
$pdf->SetX(12);
// set text
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', $province));
//set X & Y center
$pdf->SetY(65);
$pdf->SetX(12);
// set text
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', $lnt_Lng));
//set X & Y center
$pdf->SetY(75);
$pdf->SetX(12);
// set text
//$pdf->MultiCell(0,5,iconv('UTF-8', 'TIS-620',$detail));

//set X & Y center
$pdf->SetY(85);
$pdf->SetX(12);
// set text table
$pdf->Cell(65, 10, iconv('UTF-8', 'TIS-620', 'รายการ'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'ไม่ปฏิบัติเลย(คน)'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นบางครั้ง(คน)'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'ปฏิบัติบ่อยครั้ง(คน)'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นประจำ(คน)'), 1, 0, 'C');


//set X & Y center
$pdf->SetY(95);
$pdf->SetX(12);
// set text table
$pdf->Cell(65, 10, iconv('UTF-8', 'TIS-620', $_SESSION['data'][0]['question']), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $_SESSION['data'][0]['A']), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $_SESSION['data'][0]['B']), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $_SESSION['data'][0]['C']), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $_SESSION['data'][0]['D']), 1, 0, 'C');


$pdf->SetY(125);
$pdf->SetX(70);
// set text table
$pdf->Cell(65, 10, iconv('UTF-8', 'TIS-620', 'กราฟแสดงสถิติพฤติกรรมการบริโภค'), 0, 0, 'C');

//pie_chart data abc
$data = array(


    iconv('UTF-8', 'TIS-620', 'ไม่ปฏิบัติเลย') => [
        'color' => [255, 0, 0],
        'value' => $_SESSION['data'][0]['A']
    ],

    iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นบางครั้ง') => [
        'color' => [255, 255, 0],
        'value' => $_SESSION['data'][0]['B']
    ],

    iconv('UTF-8', 'TIS-620', 'ปฏิบัติบ่อยครั้ง') => [
        'color' => [50, 0, 255],
        'value' => $_SESSION['data'][0]['C']
    ],

    iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นประจำ') => [
        'color' => [255, 0, 255],
        'value' => $_SESSION['data'][0]['D']
    ],

);

//pie and legend properties
$pieX = 45;
$pieY = 160;
$r = 20; //radius
$legendX = 70;
$legendY = 146;

//get total data summary
$dataSum = 0;
foreach ($data as $item) {
    $dataSum += $item['value'];
}

//get scale unit for each degree
$degUnit = 360 / $dataSum;

//variable to store current angle
$currentAngle = 0;
//store current legend Y position
$currentLegendY = $legendY;

$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

//simplify the code by drawing both pie and legend in one loop
foreach ($data as $index => $item) {
    //draw the pie
    //slice size
    $deg = $degUnit * $item['value'];
    //set color
    $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);
    //draw the slice
    $pdf->Sector($pieX, $pieY, $r, $currentAngle, $currentAngle + $deg);
    //add slice angle to currentAngle var
    $currentAngle += $deg;

    //draw the legend	
    $pdf->Rect($legendX, $currentLegendY, 5, 5, 'DF');
    $pdf->SetXY($legendX + 6, $currentLegendY);
    $pdf->Cell(50, 5, $index, 0, 0);
    $currentLegendY += 5;
}



//bar chart properties ABCD
//position
$chartX = 95;
$chartY = 135;

//dimension
$chartWidth = 100;
$chartHeight = 65;

//padding
$chartTopPadding = 10;
$chartLeftPadding = 20;
$chartBottomPadding = 20;
$chartRightPadding = 5;

//chart box
$chartBoxX = $chartX + $chartLeftPadding;
$chartBoxY = $chartY + $chartTopPadding;
$chartBoxWidth = $chartWidth - $chartLeftPadding - $chartRightPadding;
$chartBoxHeight = $chartHeight - $chartBottomPadding - $chartTopPadding;

//bar width
$barWidth = 15;

//chart data
$data = array(


    iconv('UTF-8', 'TIS-620', 'ไม่ปฏิบัติเลย') => [
        'color' => [255, 0, 0],
        'value' => $_SESSION['data'][0]['A']
    ],

    iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นบางครั้ง') => [
        'color' => [255, 255, 0],
        'value' => $_SESSION['data'][0]['B']
    ],

    iconv('UTF-8', 'TIS-620', 'ปฏิบัติบ่อยครั้ง') => [
        'color' => [50, 0, 255],
        'value' => $_SESSION['data'][0]['C']
    ],

    iconv('UTF-8', 'TIS-620', 'ปฏิบัติเป็นประจำ') => [
        'color' => [255, 0, 255],
        'value' => $_SESSION['data'][0]['D']
    ],
);

//$dataMax
$dataMax = 0;
foreach ($data as $item) {
    if ($item['value'] > $dataMax) $dataMax = $item['value'];
}

//data step
$dataStep = 50;

//set font, line width and color
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size


//$pdf->SetLineWidth(0);
//$pdf->SetDrawColor(0);

//chart boundary line
//$pdf->Rect($chartX,$chartY,$chartWidth,$chartHeight);

//vertical axis line
$pdf->Line(
    $chartBoxX,
    $chartBoxY,
    $chartBoxX,
    ($chartBoxY + $chartBoxHeight)
);
//horizontal axis line
$pdf->Line(
    $chartBoxX - 1,
    ($chartBoxY + $chartBoxHeight),
    $chartBoxX + ($chartBoxWidth),
    ($chartBoxY + $chartBoxHeight)
);

///vertical axis
//calculate chart's y axis scale unit
$yAxisUnits = $chartBoxHeight / $dataMax;

//draw the vertical (y) axis labels
for ($i = 0; $i <= $dataMax; $i += $dataStep) {
    //y position
    $yAxisPos = $chartBoxY + ($yAxisUnits * $i);
    //draw y axis line
    $pdf->Line(
        $chartBoxX - 2,
        $yAxisPos,
        $chartBoxX,
        $yAxisPos
    );
    //set cell position for y axis labels
    $pdf->SetXY($chartBoxX - $chartLeftPadding, $yAxisPos - 2);
    //$pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i , 1);---------------
    $pdf->Cell($chartLeftPadding - 4, 5, $dataMax - $i, 0, 0, 'R');
}

///horizontal axis
//set cells position
$pdf->SetXY($chartBoxX, $chartBoxY + $chartBoxHeight);

//cell's width
$xLabelWidth = $chartBoxWidth / count($data);

//$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');-------------
//loop horizontal axis and draw the bar
$barXPos = 0;
foreach ($data as $itemName => $item) {
    //print the label
    //$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');--------------
    $pdf->Cell($xLabelWidth, 5, $itemName, 0, 0, 'C');

    ///drawing the bar
    //bar color
    $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);
    //bar height
    $barHeight = $yAxisUnits * $item['value'];
    //bar x position
    $barX = ($xLabelWidth / 2) + ($xLabelWidth * $barXPos);
    $barX = $barX - ($barWidth / 2);
    $barX = $barX + $chartBoxX;
    //bar y position
    $barY = $chartBoxHeight - $barHeight;
    $barY = $barY + $chartBoxY;
    //draw the bar
    $pdf->Rect($barX, $barY, $barWidth, $barHeight, 'DF');
    //increase x position (next series)
    $barXPos++;
}

//axis labels
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

$pdf->SetXY($chartX, $chartY);
//$pdf->Cell(100,10,"Amount",0);
$pdf->SetXY(($chartWidth / 2) - 50 + $chartX, $chartY + $chartHeight - ($chartBottomPadding / 2));



// table Gender
//set X & Y center
$pdf->SetY(225);
$pdf->SetX(25);
// set text table
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'เพศ'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'จำนวน(คน)'), 1, 0, 'C');


//set x gender
$genderY = 235;
//loop set table and result gender
for ($i = 0; $i < $row_gender; $i++) {

    $genderX = 25;

    $pdf->SetY($genderY);
    $pdf->SetX($genderX);
    //set gender title gender
    $pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $gender_title[$i]), 1, 0, 'C');
    //set result gender
    $pdf->SetY($genderY);
    //assign ++ set x
    $genderX += 30;
    $pdf->SetX($genderX);
    $pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $gender_result[$i]), 1, 0, 'C');
    $genderY += 10;
}

//set title sum table gender
$pdf->SetY(255);
$pdf->SetX(25);
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'รวม'), 1, 0, 'C');
//sum result gender
$pdf->SetY(255);
$pdf->SetX(55);
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $_SESSION['data'][0]['gender1'] + $_SESSION['data'][0]['gender2']), 1, 0, 'C');



$pdf->SetY(200);
$pdf->SetX(70);
// set text table

//axis labels
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 12);

$pdf->Cell(65, 10, iconv('UTF-8', 'TIS-620', 'กราฟแสดงสถิติจำแนกตาม (เพศ)'), 0, 0, 'C');

// loop data gender for create pie chart
$data = [];
for ($i = 0; $i < $row_gender; $i++) {

    $data[iconv('UTF-8', 'TIS-620', $gender_title[$i])] = array(
        'color' => [$gender_color_index0[$i], $gender_color_index1[$i], $gender_color_index2[$i]],
        'value' => $gender_result[$i]
    );
}

//pie and legend properties
$pieX = 135;
$pieY = 245;
$r = 20; //radius
$legendX = 165;
$legendY = 240;

//get total data summary
$dataSum = 0;
foreach ($data as $item) {
    $dataSum += $item['value'];
}

//get scale unit for each degree
$degUnit = 360 / $dataSum;

//variable to store current angle
$currentAngle = 0;
//store current legend Y position
$currentLegendY = $legendY;

$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

//simplify the code by drawing both pie and legend in one loop
foreach ($data as $index => $item) {
    //draw the pie
    //slice size
    $deg = $degUnit * $item['value'];
    //set color
    $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);
    //draw the slice
    $pdf->Sector($pieX, $pieY, $r, $currentAngle, $currentAngle + $deg);
    //add slice angle to currentAngle var
    $currentAngle += $deg;

    //draw the legend	
    $pdf->Rect($legendX, $currentLegendY, 5, 5, 'DF');
    $pdf->SetXY($legendX + 6, $currentLegendY);
    $pdf->Cell(50, 5, $index, 0, 0);
    $currentLegendY += 5;
}


$pdf->AddPage();


$pdf->SetY(15);
$pdf->SetX(70);
// set text table

//axis labels
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 12);

$pdf->Cell(65, 10, iconv('UTF-8', 'TIS-620', 'กราฟแสดงสถิติจำแนกตาม (อายุ)'), 0, 0, 'C');


$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

// table old
//set X & Y center
$pdf->SetY(35);
$pdf->SetX(25);
// set text table
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'อายุ'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'จำนวน(คน)'), 1, 0, 'C');
// loop table old
$Old_Y = 45;
$old_X = 25;

for ($i = 0; $i < $row_old; $i++) {

    //set X & Y title
    $pdf->SetY($Old_Y);
    $pdf->SetX($old_X);
    // set text title old
    $pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $old_title[$i]), 1, 0, 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $old_result[$i]), 1, 0, 'C');
    $Old_Y += 10;
}
//set X & Y title sum
$pdf->SetY(105);
$pdf->SetX(25);
// set text title sum old
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'รวม'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620',  $_SESSION['data'][0]['age1'] +
    $_SESSION['data'][0]['age2'] +
    $_SESSION['data'][0]['age3'] +
    $_SESSION['data'][0]['age4'] +
    $_SESSION['data'][0]['age5'] +
    $_SESSION['data'][0]['age6']), 1, 0, 'C');




//pie_chart data old
$data = array(


    iconv('UTF-8', 'TIS-620', 'อายุ ต่ำกว่า 20 ปี') => [
        'color' => [255, 0, 0],
        'value' => $_SESSION['data'][0]['age1']
    ],

    iconv('UTF-8', 'TIS-620', 'อายุระหว่าง 21 - 30 ปี') => [
        'color' => [255, 0, 64],
        'value' => $_SESSION['data'][0]['age2']
    ],

    iconv('UTF-8', 'TIS-620', 'อายุระหว่าง 31 - 40 ปี') => [
        'color' => [255, 0, 128],
        'value' => $_SESSION['data'][0]['age3']
    ],

    iconv('UTF-8', 'TIS-620', 'อายุระหว่าง 41 - 50 ปี') => [
        'color' => [255, 0, 191],
        'value' => $_SESSION['data'][0]['age4']
    ],


    iconv('UTF-8', 'TIS-620', 'อายุระหว่าง 51 - 59 ปี') => [
        'color' => [255, 0, 255],
        'value' => $_SESSION['data'][0]['age5']
    ],

    iconv('UTF-8', 'TIS-620', 'อายุ 60 ปีขึ้นไป') => [
        'color' => [191, 0, 255],
        'value' => $_SESSION['data'][0]['age6']
    ],




);



//print_r($data);


//pie and legend properties Old
$pieX = 135;
$pieY = 75;
$r = 20; //radius
$legendX = 165;
$legendY = 60;

//get total data summary
$dataSum = 0;
foreach ($data as $item) {
    $dataSum += $item['value'];
}

//get scale unit for each degree
$degUnit = 360 / $dataSum;

//variable to store current angle
$currentAngle = 0;
//store current legend Y position
$currentLegendY = $legendY;

$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

//simplify the code by drawing both pie and legend in one loop
foreach ($data as $index => $item) {
    //draw the pie
    //slice size
    $deg = $degUnit * $item['value'];
    //set color
    $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);
    //draw the slice
    $pdf->Sector($pieX, $pieY, $r, $currentAngle, $currentAngle + $deg);
    //add slice angle to currentAngle var
    $currentAngle += $deg;

    //draw the legend	
    $pdf->Rect($legendX, $currentLegendY, 5, 5, 'DF');
    $pdf->SetXY($legendX + 6, $currentLegendY);
    $pdf->Cell(50, 5, $index, 0, 0);
    $currentLegendY += 5;
}

$pdf->AddPage();
//set X & Y title
$pdf->SetY(25);
$pdf->SetX(70);
//axis labels
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 12);

$pdf->Cell(65, 10, iconv('UTF-8', 'TIS-620', 'กราฟแสดงสถิติจำแนกตาม (โรคประจำตัว)'), 0, 0, 'C');


$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

$YDisease = 45;
// table disease
//set X & Y center
$pdf->SetY(45);
$pdf->SetX(25);
// set text table
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'โรคประจำตัว'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'จำนวน(คน)'), 1, 0, 'C');

$sumDisease = 0;

for ($i = 0; $i < $row_disease; $i++) {

    $YDisease += 10;
    $sumDisease += $disease_result[$i];
    $pdf->SetY($YDisease);
    $pdf->SetX(25);
    // set text table
    $pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $disease_title[$i]), 1, 0, 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $disease_result[$i]), 1, 0, 'C');
}

//set X & Y center
$pdf->SetY(225);
$pdf->SetX(25);
// set text table
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', 'รวม'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620',  $sumDisease), 1, 0, 'C');


//pie_chart data old
$data = [];
for ($i = 0; $i < $row_disease; $i++) {

    $data[iconv('UTF-8', 'TIS-620', $disease_title[$i])] = array(
        'color' => [$disease_color_index0[$i], $disease_color_index1[$i], $disease_color_index2[$i]],
        'value' => $disease_result[$i]
    );
}



//print_r($data);

//pie and legend properties Old
$pieX = 135;
$pieY = 140;
$r = 20; //radius
$legendX = 165;
$legendY = 95;

//get total data summary
$dataSum = 0;
foreach ($data as $item) {
    $dataSum += $item['value'];
}

//get scale unit for each degree
$degUnit = 360 / $dataSum;

//variable to store current angle
$currentAngle = 0;
//store current legend Y position
$currentLegendY = $legendY;

$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

//simplify the code by drawing both pie and legend in one loop
foreach ($data as $index => $item) {
    //draw the pie
    //slice size
    $deg = $degUnit * $item['value'];
    //set color
    $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);
    //draw the slice
    $pdf->Sector($pieX, $pieY, $r, $currentAngle, $currentAngle + $deg);
    //add slice angle to currentAngle var
    $currentAngle += $deg;

    //draw the legend	
    $pdf->Rect($legendX, $currentLegendY, 5, 5, 'DF');
    $pdf->SetXY($legendX + 6, $currentLegendY);
    $pdf->Cell(50, 5, $index, 0, 0);
    $currentLegendY += 5;
}



//start education_title

$pdf->AddPage();
//set X & Y title
$pdf->SetY(25);
$pdf->SetX(70);
//axis labels
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 12);

$pdf->Cell(65, 10, iconv('UTF-8', 'TIS-620', 'กราฟแสดงสถิติจำแนกตาม (การศึกษา)'), 0, 0, 'C');


$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

$YDisease = 45;
// table disease
//set X & Y center
$pdf->SetY(45);
$pdf->SetX(25);
// set text table
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', 'การศึกษา'), 1, 0, 'C');
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', 'จำนวน(คน)'), 1, 0, 'C');

$sumEducation = 0;

$eduX = 55;
$eduY = 25;
for ($i = 0; $i < $row_education; $i++) {

    $pdf->SetY($eduX);
    $pdf->SetX($eduY);
    // set text table
    //sum education

    $sumEducation += $education_result[$i];

    $pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', $education_title[$i]), 1, 0, 'C');
    $pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', $education_result[$i]), 1, 0, 'C');

    $eduX += 10;
}

//set X & Y center
$pdf->SetY(145);
$pdf->SetX(25);
// set text table
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', 'รวม'), 1, 0, 'C');
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', $sumEducation), 1, 0, 'C');



//star grapgh education



//pie_chart data old
$data = [];
for ($i = 0; $i < $row_education; $i++) {

    $data[iconv('UTF-8', 'TIS-620', $education_title[$i])] = array(
        'color' => [$education_color_index0[$i], $education_color_index1[$i], $education_color_index2[$i]],
        'value' => $education_result[$i]
    );
}



//print_r($data);

//pie and legend properties Old
$pieX = 135;
$pieY = 95;
$r = 20; //radius
$legendX = 165;
$legendY = 75;

//get total data summary
$dataSum = 0;
foreach ($data as $item) {
    $dataSum += $item['value'];
}

//get scale unit for each degree
$degUnit = 360 / $dataSum;

//variable to store current angle
$currentAngle = 0;
//store current legend Y position
$currentLegendY = $legendY;

$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

//simplify the code by drawing both pie and legend in one loop
foreach ($data as $index => $item) {
    //draw the pie
    //slice size
    $deg = $degUnit * $item['value'];
    //set color
    $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);
    //draw the slice
    $pdf->Sector($pieX, $pieY, $r, $currentAngle, $currentAngle + $deg);
    //add slice angle to currentAngle var
    $currentAngle += $deg;

    //draw the legend	
    $pdf->Rect($legendX, $currentLegendY, 5, 5, 'DF');
    $pdf->SetXY($legendX + 6, $currentLegendY);
    $pdf->Cell(50, 5, $index, 0, 0);
    $currentLegendY += 5;
}

// end graph education


// start block status
//set font
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 12);
//set title status
$pdf->SetY(175);
$pdf->SetX(70);
// set text table
$pdf->Cell(65, 10, iconv('UTF-8', 'TIS-620', 'กราฟแสดงสถิติจำแนกตาม (สถานภาพ)'), 0, 0, 'C');

// table status
//set X & Y center

//set font
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);
$pdf->SetY(195);
$pdf->SetX(25);
// set text table
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', 'สถานภาพ'), 1, 0, 'C');
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', 'จำนวน(คน)'), 1, 0, 'C');

  $sumStatus = 0;
  $statusX = 25;
  $statusY = 205;
  for ($i=0; $i < $row_status; $i++) { 

    $sumStatus+= $status_result[$i];
    $pdf->SetY($statusY);
    $pdf->SetX($statusX);
    // set text table
    $pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', $status_title[$i]), 1, 0, 'C');
    $pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', $status_result[$i]), 1, 0, 'C');
    $statusY+=10;
  }
  //sum column status
  $pdf->SetY(235);
  $pdf->SetX(25);
  // set text table
  $pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', 'รวม'), 1, 0, 'C');
  $pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', $sumStatus), 1, 0, 'C');



  
//start graph status



//pie_chart data old
$data = [];
for ($i = 0; $i < $row_status; $i++) {

    $data[iconv('UTF-8', 'TIS-620', $status_title[$i])] = array(
        'color' => [$status_color_index0[$i], $status_color_index1[$i], $status_color_index2[$i]],
        'value' => $status_result[$i]
    );
}



//print_r($data);

//pie and legend properties Old
$pieX = 135;
$pieY = 220;
$r = 20; //radius
$legendX = 165;
$legendY = 210;

//get total data summary
$dataSum = 0;
foreach ($data as $item) {
    $dataSum += $item['value'];
}

//get scale unit for each degree
$degUnit = 360 / $dataSum;

//variable to store current angle
$currentAngle = 0;
//store current legend Y position
$currentLegendY = $legendY;

$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

//simplify the code by drawing both pie and legend in one loop
foreach ($data as $index => $item) {
    //draw the pie
    //slice size
    $deg = $degUnit * $item['value'];
    //set color
    $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);
    //draw the slice
    $pdf->Sector($pieX, $pieY, $r, $currentAngle, $currentAngle + $deg);
    //add slice angle to currentAngle var
    $currentAngle += $deg;

    //draw the legend	
    $pdf->Rect($legendX, $currentLegendY, 5, 5, 'DF');
    $pdf->SetXY($legendX + 6, $currentLegendY);
    $pdf->Cell(50, 5, $index, 0, 0);
    $currentLegendY += 5;
}

// end graph status



// career
$pdf->AddPage();
//set X & Y title
$pdf->SetY(25);
$pdf->SetX(70);
//axis labels
$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 12);

$pdf->Cell(65, 10, iconv('UTF-8', 'TIS-620', 'กราฟแสดงสถิติจำแนกตาม (อาชีพ)'), 0, 0, 'C');


$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

// table disease
//set X & Y center
$pdf->SetY(45);
$pdf->SetX(25);
// set text table
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', 'อาชีพ'), 1, 0, 'C');
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', 'จำนวน(คน)'), 1, 0, 'C');

$sumCareer = 0;
$careerY = 55;
$careerX = 25;

for ($i=0; $i < $row_career ; $i++) { 
    $sumCareer+= $career_result[$i];
    $pdf->SetY($careerY);
    $pdf->SetX($careerX );
    // set text table
    $pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', $career_title[$i]), 1, 0, 'C');
    $pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', $career_result[$i]), 1, 0, 'C');
    $careerY+=10;
}
// sum career
$pdf->SetY(145);
$pdf->SetX(25);
// set text table
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620', 'รวม'), 1, 0, 'C');
$pdf->Cell(35, 10, iconv('UTF-8', 'TIS-620',  $sumCareer), 1, 0, 'C');


  
//start graph career



//pie_chart data career
$data = [];
for ($i = 0; $i < $row_career; $i++) {

    $data[iconv('UTF-8', 'TIS-620', $career_title[$i])] = array(
        'color' => [$career_color_index0[$i], $career_color_index1[$i], $career_color_index2[$i]],
        'value' => $career_result[$i]
    );
}





//pie and legend properties Career
$pieX = 135;
$pieY = 95;
$r = 20; //radius
$legendX = 165;
$legendY = 75;

//get total data summary
$dataSum = 0;
foreach ($data as $item) {
    $dataSum += $item['value'];
}

//get scale unit for each degree
$degUnit = 360 / $dataSum;

//variable to store current angle
$currentAngle = 0;
//store current legend Y position
$currentLegendY = $legendY;

$pdf->AddFont('test', '', 'THSarabunNew.php');
//set font size
$pdf->SetFont('test', '', 9);

//simplify the code by drawing both pie and legend in one loop
foreach ($data as $index => $item) {
    //draw the pie
    //slice size
    $deg = $degUnit * $item['value'];
    //set color
    $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);
    //draw the slice
    $pdf->Sector($pieX, $pieY, $r, $currentAngle, $currentAngle + $deg);
    //add slice angle to currentAngle var
    $currentAngle += $deg;

    //draw the legend	
    $pdf->Rect($legendX, $currentLegendY, 5, 5, 'DF');
    $pdf->SetXY($legendX + 6, $currentLegendY);
    $pdf->Cell(50, 5, $index, 0, 0);
    $currentLegendY += 5;
}

// end graph status

$pdf->Output();
