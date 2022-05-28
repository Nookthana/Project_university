<?php
    include ('../include/header_admin.php');
 
   
?>
    
    <div class="container column is-15">
    <div class="section">


     
        <div class="card-content">
            

        <p align="center" class="is-size-5"><i class="fa-solid fa-people-group"></i>&nbsp;ข้อมูลผู้ใช้งานตอบแบบสอบถาม</p><br>

      
        <div class="columns is-centered">
                        <div class="column is-2">
                            <label class="label is-size-6">ชุมชน</label>
                            <div class="select is-small">
                                <select id="village_detail_survey">

                                </select>
                            </div>
                        </div>
                        <div class="column is-2">
                            <label class="label is-size-6">ปีการสำรวจ</label>
                            <div class="select is-small">
                                <select id="year_detail_survey">

                                </select>
                            </div>
                        </div>
                        <div class="column is-2">
                            <label class="label">&nbsp;</label>
                            <button class="button is-info is-small is-rounded" onclick="Search_Detail();"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;ค้นหา</button>
                        </div>
                    </div>

                    <br>

                    <!--Data table-->
                    <table id="example" class="table is-striped responsive nowrap" style="width:100%"></table>


                 
                    <!--start bulma modal-->
                    <div id="update-modal" class="modal">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                      <header class="modal-card-head">
                        <p class="modal-card-title is-size-5" id="title_modal"align="center">รายละเอียดการตอบแบบสอบถามชองผู้ใช้งาน</p>
                        <button class="delete update-modal-close" aria-label="close"></button>
                      </header>
                      <section class="modal-card-body">
                      <div class="columns is-mobile" align="center">
                        <div class="column">
                          <p class="is-size-6" id="title_modal"align="center">ข้อมูลผู้ใช้งาน</p>
                        </div>
                    </div><br>
                    <div class="columns is-desktop" align="center">
                        <div class="column">
                            <div class="chart-container" style="position: relative; height:200px; width:200px" id="Pie_User"><canvas id="UserPie" ></canvas></div>
                        </div>
                    </div>
                    <br>
                    <p class="modal-card-title is-size-6" id="title_modal"align="center">ผู้ใช้งานประเมินแบบพฤติกรรมการบริโภค</p>
                    <br>
                    <table id="userData" class="table is-striped responsive nowrap" style="width:100%"></table>

                      </section>
                      <footer class="modal-card-foot">

                      <div class="columns is-mobile">
                        <div class="column">
                          <button id="pdf" class="button is-danger is-rounded" onclick="ExportPDF_User()"><i class="fa-solid fa-file-pdf"></i>&nbsp;PDF</button>
                        </div>
                        <div class="column">
                          <button id="csv" class="button is-primary is-rounded"  onclick="ExportCSV_User()"><i class="fa-solid fa-file-csv"></i>&nbsp;CSV</button>
                        </div>
                        <div class="column">
                          <button class="button is-danger is is-rounded update-modal-close">ปิด</button>
                        </div>
                     </div>
                      </footer>
                    </div>
                    <!--end bulma modal-->

        </div>
      </div>
      <br/>
      
    
  
</section>

    
  </div>

<!-- all question -->
<script src="../js/user_detail_survey.js"></script>
<!-- back to top -->
<script src="../js/back_to_top.js"></script>

<!--datable link-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bulma.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bulma.min.css">
<!--datable response-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/datableYear.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bulma.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bulma.min.js"></script>
<!--script chart js-->
<script src="../node_modules/chart.js/dist/chart.js"></script>
<script src="../node_modules/chart.js/dist/chart.min.js"></script>