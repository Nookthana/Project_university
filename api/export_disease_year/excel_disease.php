<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Report.xls");

require '../config/conn.php';
require './data_result_disease.php';




?>


<!-- start table excel -->

<table  border="1" >
    <thead>
    <tr>     
                    <th>ลำดับ</th>
                    <th>ชื่อโรค</th>
                    <th>ปี&nbsp;<?=$year_title1?>&nbsp;(คน)</th>
                    <th>ร้อยล่ะ(%)</th>
                    <th>ปี&nbsp;<?=$year_title2?>&nbsp;(คน)</th>
                    <th>ร้อยล่ะ(%)</th>
                    <th>ปี&nbsp;<?=$year_title3?>&nbsp;(คน)</th>
        </tr>
    </thead>
    <tbody>
   
        <?php
            for ($i = 0; $i <$Row; $i++) {       
        ?>     
         <tr>
                <th><?=$no[$i]?></th>
                <th><?=$name_disease[$i]?></th>
                <th><?=$year1[$i]?></th>
                <th><?=number_format($AverageYear1[$i],2).'%'?></th>
                <th><?=$year2[$i]?></th>
                <th><?=number_format($AverageYear2[$i],2).'%'?></th>
                <th><?=$year3[$i]?></th>
                <th><?=number_format($AverageYear3[$i],2).'%'?></th>
        </tr>
        <?php } ?>
      
    </tbody>
</table>

<!-- end table excel -->