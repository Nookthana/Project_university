<?php
session_start();

$title = 'กราฟสำรวจสุขภาพชุมชนทั้งหมดจำแนกโรคประจำตัวและรายปี';
$Row = count($_SESSION['data']);
$no = array();
$name_disease = array();
$year1 = array();
$year2 = array();
$year3 = array();
$datetime = "พิมพ์วันที่ :".date("d-m-Y");
$year_title1 = $_SESSION['year1'];
$year_title2 = $_SESSION['year2'];
$year_title3 = $_SESSION['year3'];


for ($i=0; $i < $Row  ; $i++) { 

    array_push($no,$_SESSION['data'][$i]['disease']);
    array_push($name_disease,$_SESSION['data'][$i]['name_disease']);
    array_push($year1,$_SESSION['data'][$i]['year1']);
    array_push($year2,$_SESSION['data'][$i]['year2']);
    array_push($year3,$_SESSION['data'][$i]['year3']);

}


$color_index1 = array(

    '0',  
    '0',  
    '0',  
    '0',  
    '0',  
    '0',  
    '0',  
    '0',  
    '0',  
    '64', 
    '128',
    '191',
    '255',
    '255',
    '255',
    '255',

);

$color_index2 = array(

    '255', 
    '255', 
    '255', 
    '255', 
    '255', 
    '191', 
    '128', 
    '64 ', 
    '0',   
    '0',   
    '0',   
    '0',   
    '0',   
    '0',   
    '0',   
    '0',   
    
);

$color_index3 = array(
        
    
        '0', 
        '64',
        '128',
        '191',
        '255',
        '255',
        '255',
        '255',
        '255',
        '255',
        '255',
        '255',
        '255',
        '191',
        '128',
        '64',

    
);

$Sum1 = CalculateSummary($year1,$Row);
$Sum2 = CalculateSummary($year2,$Row);
$Sum3 = CalculateSummary($year3,$Row);


function CalculateSummary($year,$Row){

    $Sum = 0;

    for ($i=0; $i < $Row ; $i++) { 

        $Sum += $year[$i];
   
    }

    return $Sum;


}



$AverageYear1 = CalculateAverage($year1,$Row,$Sum1);
$AverageYear2 = CalculateAverage($year2,$Row,$Sum2);
$AverageYear3 = CalculateAverage($year3,$Row,$Sum3);

function CalculateAverage($year,$Row,$Sum){

        $Average = array();

        for ($i=0; $i < $Row ; $i++) { 
           array_push($Average,floatval(($year[$i] * 100) / $Sum)); 
        }


      
       return $Average;

}

        

?>