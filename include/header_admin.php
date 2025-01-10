<?php

header('Cache-Control: no-store, no-cache, must-revalidate');
session_start();


if (!isset($active)) {
  $active = '';
}


// if (isset($_SESSION['id'])) {

//     $id =  $_SESSION['id'];
//     $fname = $_SESSION['Firstname'];
//     $lname = $_SESSION['LastName'];
//     $avatar = $_SESSION['Avatar'];
//     $update = $_SESSION['Update'];



    
// } else {
//     header('Location: index.php');
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <!--link css-->
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="../node_modules/bulma/css/bulma.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/black_to_top.css">
    <!--script js-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/620207ecae.js" crossorigin="anonymous"></script>
    <script src="../node_modules/axios/dist/axios.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/logout.js"></script>

 


</head>
<body>


<div id="app">
    
<nav class="navbar is-transparent">
    <div class="navbar-brand">
  
      <a  href="index.php">    
          
        <a class="navbar-item" href="../page/village_map.php?active">
           <span class="is-size-5"> <i class="fa-solid fa-house"></i>&nbsp;&nbsp;ระบบสำรวจข้อมูลสุขภาพชุมชน </span>
        </a>
      </a>
      <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
      <div class="navbar-start">
          
        <div class="navbar-item has-dropdown is-hoverable  is-hidden-desktop">

      

         <div class="navbar-item">
            <figure class="image is-32x32">
                <img src="<?=$avatar?>" class="is-rounded" >
            </figure>
              <span class="is-size-7"><i class="fa-solid fa-user"></i>&nbsp;คุณ&nbsp;<?=$fname?>&nbsp;<?=$lname?></span><br> 
              <span class="is-size-7"><on style=" color: #5cb85c;">●</on>&nbsp;&nbsp;เข้าสู่ระบบครั้งล่าสุด&nbsp;( <?=date('d-m-Y เวลา: H:i:s',strtotime($update));?> ) </span>
        </div>

        
          <a class="navbar-link" href="#">
           รายการ
          </a>

          
          
          <div class="navbar-dropdown">
            <a class="navbar-item" href="village_map.php">
            <i class="fa-solid fa-map-location"></i>
            &nbsp;
            แผนที่ชุมชน
            </a>
            <a class="navbar-item" href="village_detail.php">
            <i class="fa-solid fa-house"></i>
            &nbsp;
            แก้ไขข้อมูลชุมชน
            </a>
            <a class="navbar-item" href="add_newlocation.php">
            <i class="fa-solid fa-location-dot"></i>
            &nbsp;
            เพิ่มพิกัดสถานที่
            </a>
            <a class="navbar-item" href="edit_qestionarie.php">
            <i class="fa-solid fa-file-pen"></i>
            &nbsp;
            แก้ไขคำถามแบบสอบถาม
            </a>
            <a class="navbar-item" href="add_questionarie.php">
            <i class="fa-solid fa-circle-plus"></i>
            &nbsp;
            เพิ่มคำถามแบบสอบถาม
            </a>
            <a class="navbar-item" href="result_village.php">
            <i class="fa-solid fa-chart-pie"></i>
            &nbsp;
            ผลการสำรวจรายชุมชน
            </a>
            <a class="navbar-item" href="result_disease_year.php">
            <i class="fa-solid fa-chart-line"></i>
            &nbsp;
            ผลการสำรวจรายชุมชนรายปี
            </a>
            <a class="navbar-item" href="user_detail_survey.php">
            <i class="fa-solid fa-people-group"></i>
            &nbsp;
            ข้อมูลผู้ใช้งานตอบแบบสอบถาม
            </a>
          </div>
        </div>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="field is-grouped">
            <p class="control">
              <a  class="button is-danger is-outlined is-rounded" onclick='Logout()'>
                <span class="icon">
                <i class="fa-solid fa-right-from-bracket"></i>
                </span>
                &nbsp;&nbsp;ออกจากระบบ
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </nav>
    
    <section class="main-content columns is-fullheight">
      
      <aside class="column is-2 is-narrow-mobile is-fullheight section is-hidden-mobile">
        <p class="menu-label is-hidden-touch"></p>
        <ul class="menu-list">
          <li>
            <div align="center">
            <figure class="image is-128x128">
            <img src="<?=$avatar?>" class="is-rounded"  width="125" height="125">
            </figure>
            <br>
              <span class="is-size-7"><i class="fa-solid fa-user"></i>&nbsp;คุณ&nbsp;<?=$fname?>&nbsp;<?=$lname?></span> 
              <br> <span class="is-size-7"><on style=" color: #5cb85c;">●</on>&nbsp;&nbsp;เข้าสู่ระบบครั้งล่าสุด&nbsp;( <?=date('d-m-Y เวลา: H:i:s',strtotime($update));?> ) </span>
            </div>
          </li>
          <br>
          <li class="is-size-7">
            <a href="#" class="is-active">
              <span class="icon"><i class="fa-solid fa-bars"></i></span>รายการ
            </a>
    
            <ul>
              <li class="is-size-7">
                <a href="village_map.php">
                  <span class="icon is-small"><i class="fa-solid fa-map-location "></i>&nbsp;</span>แผนที่ชุมชน
                </a>
              </li>
              <li class="is-size-7">
              <a href="village_detail.php">
                  <span class="icon is-small"><i class="fa-solid fa-house"></i>&nbsp;</span>แก้ไขข้อมูลชุมชน
                </a>
              </li>
              <li class="is-size-7">
                <a href="add_newlocation.php">
                  <span class="icon is-small"><i class="fa-solid fa-location-dot"></i>&nbsp;</span>เพิ่มพิกัดสถานที่ 
                </a>
              </li>
              <li class="is-size-7">
                <a href="edit_qestionarie.php">
                  <span class="icon is-small"><i class="fa-solid fa-file-pen"></i>&nbsp;</span>แก้ไขคำถามแบบสอบถาม 
                </a>
              </li>
              <li class="is-size-7">
                <a href="add_questionarie.php">
                  <span class="icon is-small"><i class="fa-solid fa-circle-plus"></i>&nbsp;</span>เพิ่มคำถามแบบสอบถาม 
                </a>
              </li>
              <li class="is-size-7">
                <a href="result_village.php">
                  <span class="icon is-small"><i class="fa-solid fa-chart-pie"></i>&nbsp;</span>ผลการสำรวจรายชุมชน 
                </a>
              </li>
              <li class="is-size-7">
                <a href="result_disease_year.php">
                  <span class="icon is-small"><i class="fa-solid fa-chart-line"></i>&nbsp;</span>ผลการสำรวจรายชุมชนรายปี 
                </a>
              </li>
              <li class="is-size-7">
                <a href="user_detail_survey.php">
                  <span class="icon is-small"><i class="fa-solid fa-people-group"></i>&nbsp;</span>ข้อมูลผู้ใช้งานตอบแบบสอบถาม 
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </aside>


      <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-chevron-up"></i></button>
