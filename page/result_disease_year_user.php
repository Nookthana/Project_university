<?php
    include ('../include/header.php');
 
   
?>
    <link rel="stylesheet" type="text/css" href="../css/datatable.css" />

    <div class="container column is-15">
    <div class="section">

  
    <p  align="center" class="is-size-5"><i class="fa-solid fa-chart-pie"></i>&nbsp;กราฟสำรวจสุขภาพชุมชนทั้งหมดจำแนกรายปี</p><br>
    <div class="columns is-mobile" align="center">
                    <!--chart pdf & excel -->
                        <div class="column">
                            <button class="button is-small is-rounded is-danger" onclick="ReportYearPDF();"><i class="fa-solid fa-file-pdf"></i>&nbsp;PDF</button>
                        </div>
                        <div class="column">
                            <button class="button is-small is-rounded is-primary" onclick="ReportYearExCell();"><i class="fa-solid fa-file-csv"></i>&nbsp;CSV</button>
                        </div>
                  </div>
                    <br>
                    <!--chart area of year-->
                    <div class="columns is-desktop" align="center">
                        <div class="column">
                            <div class="chart-container" style="position: relative; height:250px; width:250px" id="Year1"><canvas id="PieYear1" ></canvas></div>
                        </div>
                        <div class="column">
                           <div class="chart-container" style="position: relative; height:250px; width:250px" id="Year2"><canvas id="PieYear2" ></canvas></div>
                        </div>
                        <div class="column">
                           <div class="chart-container" style="position: relative; height:250px; width:250px" id="Year3"><canvas id="PieYear3" ></canvas></div>
                        </div>
                    </div>
                    <br>
                    <!--table area -->

                    <div class="columns is-mobile" align="center">
                        <div class="column">
                            <button class="button is-median is-rounded is-info" id="Btn_previous" onclick="Previous();" ><i class="fa-solid fa-circle-chevron-left"></i></button>
                        </div>
                        <div class="column">
                            <button class="button is-median is-rounded is-info" id="Btn_next" onclick="Next();"><i class="fa-solid fa-circle-chevron-right"></i></button>
                        </div>
                  </div>

                  <br>
     

                    <table id="example" class="table is-striped responsive nowrap" style="width:100%"></table>


    </div> 
    </div>
<!-- back to top -->
<script src="../js/back_to_top.js"></script>
<!-- result year-->
<script src="../js/result_year.js"></script>
<!-- data table -->

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