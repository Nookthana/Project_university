  
  <!--link css-->
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="../node_modules/bulma/css/bulma.css">
  <link rel="stylesheet" href="../css/font.css">
  <link rel="stylesheet" href="../css/textlogin.css">
  <!--script js-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://kit.fontawesome.com/620207ecae.js" crossorigin="anonymous"></script>
  <script src="../node_modules/axios/dist/axios.min.js"></script>
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../js/login.js"></script>

<section class="hero is-primary is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
      <div class="column is-5-tablet is-4-desktop is-5-mobile">
          <form action="#" id="LoginForm" onsubmit="return false;">
            <div class="text1" align="center">
                <img class="my-img" src="../img/PBRU-Logo.png"><label class=" label text1 is-size-5 has-text-white">&nbsp;&nbsp;ระบบสำรวจข้อมูลสุขภาพชุมชน </label>
            </div>
            <br><br>
            <div class="field">
              <label for="" class="label is-size-6 has-text-white">ชื่อผู้ใช้</label>
              <div class="control has-icons-left">
                <input type="text" id="userName" name="userName" placeholder="ชื่อผู้ใช้" class="input" >
                <span class="icon is-small is-left">
                <i class="fa-solid fa-user"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <label for="" class="label is-size-6 has-text-white">รหัสผ่าน</label>
              <div class="control has-icons-left">
                <input type="password" id="passWord" name="passWord" placeholder="รหัสผ่าน" class="input" >
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
            </div>
            </form>
            <br>
            <div class="field">
              <div class="columns is-mobile">
                <div class="column" align="right">
                    <button class="button is-success is-rounded" form="LoginForm" onclick="Login();" style="justify-content: center;">
                        เข้าสู่ระบบ
                    </button>
                </div>
            
                <div class="column" align="left">
                    <a href="../index.php"><button class ="button is-danger is-rounded">ย้อนกลับ</button></a>
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>