<?php
require '../config/conn.php';
session_start();



$row = count($_SESSION['question']);
//datetime
$datetime = "พิมพ์วันที่ ".date('d-m-Y');
//Row question
$no = array();
//array question
$question  = array();
//loop question in array
$title = 'รายละเอียดการตอบแบบสอบถามชองผู้ใช้งาน';

$j = 1;
$n = 0;
for ($i=0; $i < $row; $i++) { 

    array_push($question, $_SESSION['question'][$i][$j]);
    array_push($no, $_SESSION['question'][$i][$n]);
  

}
$t = 1;
for ($k=0; $k <$row; $k++) { 
    array_shift($_SESSION['question'][$k]);
    array_shift($_SESSION['question'][$t]);


}



?>