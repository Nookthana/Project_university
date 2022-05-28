<?php

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Report.xls");

require '../config/conn.php';
include './result_data.php';



//print_r($_SESSION['data'][0]);
//count for loop title
$row_abcd = count($abcd_title);
$row_gender = count($gender_title);
$row_old = count($old_title);
$row_disease = count($disease_title);
$row_education = count($education_title);
$row_status = count($status_title);
$row_career = count($career_title);
// count for loop result
$count_abcd = count($abcd_result);
$count_gender = count($gender_result);
$count_old = count($old_result);
$count_disease = count($disease_result);
$count_education = count($education_result);
$count_status = count($status_result);
$count_career = count($career_result);



?>

<!--start table abcd -->
<table  border="1" >
    <thead>
    <tr>
        <?php
            for ($i = 0; $i < $row_abcd; $i++) {       
        ?>
      
                <th><?= $abcd_title[$i] ?></th>
       

        <?php } ?>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php
            for ($i = 0; $i <$count_abcd; $i++) {       
        ?>     
                <th><?=$abcd_result[$i]?></th>
        <?php } ?>
        </tr>
    </tbody>
</table>
<!--end table abcd -->
<br>
<!--start table gender -->
<table  border="1" >
    <thead>
       <tr>
        <?php
            for ($i = 0; $i < $row_gender; $i++) {
        ?>
          
                <th><?= $gender_title[$i] ?></th>
         

        <?php } ?>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php
            for ($i = 0; $i < $count_gender; $i++) {
        ?>
          
                <th><?=$gender_result[$i]?></th>
         

        <?php } ?>
        </tr>
    </tbody>
</table>

<!--end table gender -->

<br>
<!--start table age -->
<table  border="1" >
    <thead>
       <tr>
        <?php
            for ($i = 0; $i < $row_old; $i++) {
        ?>
          
                <th><?= $old_title[$i] ?></th>
         

        <?php } ?>
        </tr>
    </thead>
    <tbody>
            <tr>
             <?php
                 for ($i = 0; $i < $count_old; $i++) {
             ?>

                     <th><?=$old_result[$i]?></th>
                

             <?php } ?>
             </tr>
    </tbody>
</table>
<br>
<!--end table age -->

<br>
<!--start table disease -->
<table  border="1" >
    <thead>
       <tr>
        <?php
            for ($i = 0; $i < $row_disease; $i++) {
        ?>
          
                <th><?= $disease_title[$i] ?></th>
         

        <?php } ?>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php
            for ($i = 0; $i <  $count_disease; $i++) {
        ?>
          
          <th><?=$disease_result[$i]?></th>
         

        <?php } ?>
        </tr>
    </tbody>
</table>
<br>
<!--end table disease -->

<br>
<!--start table education -->
<table  border="1" >
    <thead>
       <tr>
        <?php
            for ($i = 0; $i < $row_education; $i++) {
        ?>
          
                <th><?= $education_title[$i] ?></th>
         

        <?php } ?>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php
            for ($i = 0; $i <  $count_education; $i++) {
        ?>
          
          <th><?=$education_result[$i]?></th>
         

        <?php } ?>
        </tr>
    </tbody>
</table>
<br>
<!--end table eduucation -->


<br>
<!--start table status -->
<table  border="1" >
    <thead>
       <tr>
        <?php
            for ($i = 0; $i < $row_status; $i++) {
        ?>
          
                <th><?= $status_title[$i] ?></th>
         

        <?php } ?>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php
            for ($i = 0; $i <  $count_status; $i++) {
        ?>
          
          <th><?=$status_result[$i]?></th>
         

        <?php } ?>
        </tr>
    </tbody>
</table>
<br>
<!--end table status -->

<br>
<!--start table career -->
<table  border="1" >
    <thead>
       <tr>
        <?php
            for ($i = 0; $i < $row_career; $i++) {
        ?>
          
                <th><?= $career_title[$i] ?></th>
         

        <?php } ?>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php
            for ($i = 0; $i <  $count_career; $i++) {
        ?>
          
          <th><?=$career_result[$i]?></th>
         

        <?php } ?>
        </tr>
    </tbody>
</table>
<br>
<!--end table career -->