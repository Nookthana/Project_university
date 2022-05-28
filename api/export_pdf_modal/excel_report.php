<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Report.xls");

require '../config/conn.php';
require './data_set.php';

$A = 1;
$B = 2;
$C = 3;
$D = 4;


?>


<!-- title ex cell -->
<p><?='รหัสอ้างอิง '.$_SESSION['data'][0]['id_person']?></p>
<p><?='ชื่อ '.$_SESSION['data'][0]['name_person']?></p>
<p><?='เพศ '.$_SESSION['data'][0]['sex']?></p>
<p><?='อายุ '.$_SESSION['data'][0]['span_of_age']?></p>
<p><?='โรคประจำตัว '.$_SESSION['data'][0]['name_disease']?></p>
<p><?='การศึกษา '.$_SESSION['data'][0]['education']?></p>
<p><?='สถานภาพ '.$_SESSION['data'][0]['status']?></p>
<p><?='อาชีพ '.$_SESSION['data'][0]['career']?></p>
<p><?='วันที่ทำแบบสอบถาม '.$_SESSION['data'][0]['created']?></p>
<p><?='สถานภาพ '.$_SESSION['data'][0]['status']?></p>
<!-- end title ex cell -->

<!-- start table excel -->

<table  border="1" >
    <thead>
    <tr>     
                    <th>ข้อ</th>
                    <th>รายการ</th>
                    <th>ไม่ปฏิบัติเลย</th>
                    <th>ปฏิบัติเป็นบางครั้ง</th>
                    <th>ปฏิบัติบ่อยครั้ง</th>
                    <th>ปฏิบัติเป็นประจำ</th>
        </tr>
    </thead>
    <tbody>
   
        <?php
            for ($i = 0; $i <$row; $i++) {       
        ?>     
         <tr>
                <th><?=$no[$i]?></th>
                <th><?=$question[$i]?></th>
                <th><?=$_SESSION['question'][0][$A]?></th>
                <th><?=$_SESSION['question'][0][$B]?></th>
                <th><?=$_SESSION['question'][0][$C]?></th>
                <th><?=$_SESSION['question'][0][$D]?></th>
            
        </tr>
        <?php } ?>
      
    </tbody>
</table>

<!-- end table excel -->