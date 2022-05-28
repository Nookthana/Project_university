<?php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
      <!--link css-->
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="../node_modules/bulma/css/bulma.css?version=1">
    <link rel="stylesheet" href="../css/map.css">
    <link rel="stylesheet" href="../css/legend.css">
    <link rel="stylesheet" href="../css/cock.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/process.css">
    <!--script js-->
    <script src="../node_modules/axios/dist/axios.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="https://kit.fontawesome.com/620207ecae.js" crossorigin="anonymous"></script>
    <!--script chart js-->
    <script src="../node_modules/chart.js/dist/chart.js"></script>
    <script src="../node_modules/chart.js/dist/chart.min.js"></script>

</head>

<body> 

<!--start modal-->
    <div>
    <div id="update-modal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title" align="center" id="title_village">&nbsp;&nbsp;<i class="fa-solid fa-house"></i></p>
          <button class="delete update-modal-close" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
          <form>
          <section class="modal-card-body">
              <!--contend  modal -->
          <div class="content">
            <br>
              <!--history title -->
            <h6><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;ประวัติพื้นที่</h6>
            <p id="history_village" class="is-size-6"></p>
             <!--address village -->
            <h6><i class="fa-solid fa-map-location"></i>&nbsp;&nbsp;ที่อยู่</h6>
            <p id="address" class="is-size-6"></p>
            <!--lat lnt village -->
            <h6><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;พิกัดพื้นที่ (ละติจูด, ลองติจูด) </h6>
            <p id="lat_lng" class="is-size-6"></p>       
            <!--survey chart -->
            <div align="center">
            <h6 ><i class="fa-solid fa-chart-pie"></i>&nbsp;&nbsp;สถิติผลการสำรวจข้อมูลพฤติกรรมการบริโภคของชุมชน</h6>
            <!-- select year result-->
            <div class="control has-icons-center">
                    <div class="select is-small is-rounded">
                      <select id="modal_year" onchange="GetDataYear()">

                      </select>
                    </div>        
                  </div>
                  </div>
              <br><br>
            <!--start chart js data-->
                  <!--chart js gender & old-->
                  <div class="columns is-desktop" align="center" >
                    <div class="column">
                      <div class="chart-container" style="position: relative; height:180px; width:180px" id="Gender"><canvas id="piechart_gender" ></canvas></div>
                    </div>
                    <div class="column">
                      <div class="chart-container" style="position: relative; height:250px; width:250px"  id="Old"><canvas id="piechart_old" ></canvas></div>
                    </div>
                 </div>
                  <!--chart js disease & education-->
                 <div class="columns is-desktop" align="center">
                    <div class="column">
                      <div class="chart-container" style="position: relative; height:260px; width:260px" id="disease"><canvas id="piechart_disease" ></canvas></div>
                    </div>
                    <div class="column">
                      <div class="chart-container" style="position: relative; height:250px; width:250px" id="education"><canvas id="piechart_education" ></canvas></div>
                    </div>
                 </div>
                 <!--chart js status & career-->
                 <div class="columns is-desktop" align="center">
                    <div class="column">
                      <div class="chart-container" style="position: relative; height:200px; width:200px" id="status"><canvas id="piechart_status" ></canvas></div>
                    </div>
                    <div class="column">
                    <div class="chart-container" style="position: relative; height:260px; width:260px" id="career"><canvas id="piechart_career" ></canvas></div>
                    </div>
                 </div>

            <!--end chart js data-->
          </div>
              <!--end select-->
        </section>
          </form>
        </section>
        <footer class="modal-card-foot">
          <button class="button update-modal-close is-danger is-rounded"  align="center">ปิด</button>
        </footer>
      </div>
    </div>
    <!--end modal-->

    <!--The div element for the map -->
    <div id="map"></div>
    <!--Legend -->
    <div id="legend" ></div>
    <!--Date_time-->
    <div id="date_time"   class="tag is-link is-normal is-rounded"></div>
</body>
</html>
<!-- kml script -->
<script src="../js/geoxml3.js"></script>
<!-- googlemaps -->
<script src="../js/googmap.js"></script>
<!-- date_time -->
<script type="text/javascript" src="../js/date_time.js"></script>
<!-- on load date time -->
<script type="text/javascript">window.onload = date_time('date_time');</script>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVt0tnNAxqLDpQG3lfhB4fq3A3KW3puZA&callback=initMap&v=weekly"
  async
></script>
