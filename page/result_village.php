<?php
include('../include/header_admin.php');


?>


<link rel="stylesheet" type="text/css" href="../css/datatable.css" />

<link rel="stylesheet" type="text/css" href="../css/loadmore.css" />


<div class="container column is-15">
    <div class="section">

 



            <div class="card-content" align="center">
                <p class="is-size-5"><i class="fa-solid fa-chart-pie"></i>&nbsp;ผลการสำรวจรายชุมชน</p><br>
                <div class="content">



                    <div class="columns is-centered">
                        <div class="column is-2">
                            <label class="label is-size-6">ชุมชน</label>
                            <div class="select is-small">
                                <select id="village">

                                </select>
                            </div>
                        </div>
                        <div class="column is-2">
                            <label class="label is-size-6">ปีการสำรวจ</label>
                            <div class="select is-small">
                                <select id="year">

                                </select>
                            </div>
                        </div>
                        <div class="column is-2">
                            <label class="label">&nbsp;</label>
                            <button class="button is-info is-small is-rounded" onclick="Search();"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;ค้นหา</button>
                        </div>
                    </div>

                    <br>

                    <div class="columns is-mobile">
                        <div class="column">
                            <button class="button is-small is-rounded is-danger" onclick="ReportPDF();"><i class="fa-solid fa-file-pdf"></i>&nbsp;PDF</button>
                        </div>
                        <div class="column">
                            <button class="button is-small is-rounded is-primary" onclick="ReportExCell();"><i class="fa-solid fa-file-csv"></i>&nbsp;CSV</button>
                        </div>
                  </div>

                    
   
                    <table id="example" class="table is-striped responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>รายการ</th>
                                <th>ไม่ปฏิบัติเลย(คน)</th>
                                <th>ปฏิบัติเป็นบางครั้ง(คน)</th>
                                <th>ปฏิบัติบ่อยครั้ง(คน)</th>
                                <th>ปฏิบัติเป็นประจำ(คน)</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
   
                </div>
            </div>
        </div>
        <br />
        <br/>
    <div class="list">
    <div class="list-element">
             <!--start chart js data-->
                  <!--chart js gender & old-->
                  <div class="columns is-desktop" align="center" >
                    <div class="column">
                      <div class="chart-container" style="position: relative; height:180px; width:200px" id="PieQ"><canvas id="piechart_q" ></canvas></div>
                    </div>
                    <div class="column">
                      <div class="chart-container" style="position: relative; height:250px; width:350px"  id="BarQ"><canvas id="barchart_q" ></canvas></div>
                    </div>
                 </div>
                 </div>
   
            <div class="list-element">
                 <div class="columns is-desktop" align="center" >
                    <div class="column">
                <!--start table-->
                <table class="table is-responsive" id="Table_gender">
                       <thead>
                           <tr>
                               <th>เพศ</th>
                               <th>จำนวน(คน)</th>

                           </tr>
                       </thead>
                       <tbody id="gender">

                       </tbody>
                    </table>
                    <!--end table-->
                    </div>  
                    <!--start pie gender -->
                    <div class="column">
                        <div class="chart-container" style="position: relative; height:180px; width:180px" id="PieGender"><canvas id="piechart_gender" ></canvas></div>
                    </div>
                 </div>
            </div>   
  
            <div class="list-element">
                 <div class="columns is-desktop" align="center" >
                    <div class="column">
                <!--start table-->
                <table class="table is-responsive content"  id="Table_old">
                       <thead>
                           <tr>
                               <th>อายุ</th>
                               <th>จำนวน(คน)</th>

                           </tr>
                       </thead>
                       <tbody id="age">

                       </tbody>
                    </table>
                    <!--end table-->
                    </div>  
                    <!--start pie gender -->
                    <div class="column">
                        <div class="chart-container" style="position: relative; height:180px; width:220px" id="PieAge"><canvas id="piechart_age" ></canvas></div>
                    </div>
                 </div>
            </div>

            <div class="list-element">
                 <div class="columns is-desktop" align="center" >
                    <div class="column">
                <!--start table-->
                <table class="table is-responsive" id="Table_disease">
                       <thead>
                           <tr>
                               <th>โรคประจำตัว</th>
                               <th>จำนวน(คน)</th>                               
                           </tr>
                       </thead>
                       <tbody id="disease">

                       </tbody>
                    </table>
                    <!--end table-->
                    </div>  
                    <!--start pie disease -->
                    <div class="column">
                        <br><br><br><br><br><br><br><br>
                        <div class="chart-container" style="position: relative; height:180px; width:260px" id="PieDisease"><canvas id="piechart_disease" ></canvas></div>
                    </div>
                 </div>
         </div>       


         <div class="list-element">
                 <div class="columns is-desktop" align="center" >
                    <div class="column">
                <!--start table-->
                <table class="table is-responsive" id="Table_education">
                       <thead>
                           <tr>
                               <th>การศึกษา</th>
                               <th>จำนวน(คน)</th>                               
                           </tr>
                       </thead>
                       <tbody id="education">

                       </tbody>
                    </table>
                    <!--end table-->
                    </div>  
                    <!--start pie educations -->
                    <div class="column">
                        <br><br><br><br>
                        <div class="chart-container" style="position: relative; height:180px; width:260px" id="PieEducation"><canvas id="piechart_education" ></canvas></div>
                    </div>
                 </div>
         </div>       


         
         <div class="list-element">
                 <div class="columns is-desktop" align="center" >
                    <div class="column">
                <!--start table-->
                <table class="table is-responsive" id="Table_status">
                       <thead>
                           <tr>
                               <th>สถานภาพ</th>
                               <th>จำนวน(คน)</th>                               
                           </tr>
                       </thead>
                       <tbody id="status">

                       </tbody>
                    </table>
                    <!--end table-->
                    </div>  
                    <!--start pie staus -->
                    <div class="column">
                    
                        <div class="chart-container" style="position: relative; height:180px; width:180px" id="PieStatus"><canvas id="piechart_status" ></canvas></div>
                    </div>
                 </div>
         </div>       



                 
         <div class="list-element">
                 <div class="columns is-desktop" align="center" >
                    <div class="column">
                <!--start table-->
                <table class="table is-responsive" id="Table_career">
                       <thead>
                           <tr>
                               <th>อาชีพ</th>
                               <th>จำนวน(คน)</th>                               
                           </tr>
                       </thead>
                       <tbody id="career">

                       </tbody>
                    </table>
                    <!--end table-->
                    </div>  
                    <!--start pie career -->
                    <div class="column">
                    <br><br><br><br>                   
                        <div class="chart-container" style="position: relative; height:180px; width:240px" id="PieCareer"><canvas id="piechart_career" ></canvas></div>
                    </div>
                 </div>
         </div>       



    </div>



                 <!-- load more --> 
                 <button id="loadmore">แสดงเพิ่มเติม&nbsp;<i class="fa-solid fa-chevron-down"></i></button>
      


    </div>

    <!-- all village name -->
    <script src="../js/result_village.js"></script>   
    <!-- all load more -->
    <script src="../js/loadmore.js"></script>
    <!-- export pdf -->
    <script src="../js/report_pdf.js"></script>
    <!-- export excell -->
    <script src="../js/report_excel.js"></script>
    <!-- data table -->

    <!--datable link-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bulma.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bulma.min.css">
    <!--datable response-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bulma.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bulma.min.js"></script>
    <!--script chart js-->
    <script src="../node_modules/chart.js/dist/chart.js"></script>
    <script src="../node_modules/chart.js/dist/chart.min.js"></script>
    <!-- back to top -->
    <script src="../js/back_to_top.js"></script>

 
 
