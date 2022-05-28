<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>
<body>
    
<html>

<head>
  <!--link css-->
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="../node_modules/bulma/css/bulma.css">
  <link rel="stylesheet" href="../css/font.css">
  <link rel="stylesheet" href="../css/black_to_top.css">
  <!--script js-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://kit.fontawesome.com/620207ecae.js" crossorigin="anonymous"></script>
  <script src="../node_modules/axios/dist/axios.min.js"></script>
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../js/navbar.js"></script>
</head>

<body>
  <nav class="navbar is-transparent">
    <div class="navbar-brand">
  
      <a  href="index.php">    
            <img src="../img/PBRU.png" width="50" height="50" >
        <a class="navbar-item" href="index.php">
           <span class="is-size-5"> ระบบสำรวจข้อมูลสุขภาพชุมชน </span>
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
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link" href="#">
           รายการ
          </a>
          <div class="navbar-dropdown">
            <a class="navbar-item" href="questionarie.php">
            <i class="fa-solid fa-square-poll-horizontal"></i>
            &nbsp;&nbsp;
              แบบสอบถาม
            </a>
            <a class="navbar-item" href="result_village_user.php">
            <i class="fa-solid fa-chart-bar"></i>
            &nbsp;&nbsp;
              ผลการสำรวจชุมชน
            </a>
            <a class="navbar-item" href="result_disease_year_user.php">
            <i class="fa-solid fa-chart-line"></i>
            &nbsp;&nbsp;
              ผลการสำรวจรายชุมชนรายปี
            </a>
          </div>
        </div>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="field is-grouped">
            <p class="control">
              <a  class="button is-primary is-outlined is-rounded" href="login.php">
                <span class="icon">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </span>
                &nbsp;&nbsp;เข้าสู่ระบบ
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-chevron-up"></i></button>