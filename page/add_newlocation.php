<?php
    include ('../include/header_admin.php');
 
   
?>
    <!--link css-->
    <link rel="stylesheet" href="../css/map.css">
    <link rel="stylesheet" href="../css/legend.css">

    <div class="container column is-15">
    <div class="section">


     
        <div class="card-content"><div class="content">
            
        <p align="center" class="is-size-5"><i class="fa-solid fa-location-dot"></i>&nbsp;เพิ่มพิกัดสถานที่</p>

        <!-- content maker-->

      
                                <div class="field">
                                    <!--google map in modal-->
                                    <div id="map"></div>
                                    <!--Legend -->
                                    <div id="legend"></div>
                                    <br>
                                    <form id="AddNewLocation" onsubmit="return false">
                                    <div class="columns">
                                        <div class="column">
                                        <label class="label" for="Lat"> ค่าพิกัดละติจูด </label>
                                        <input type="text" name="Lat" id="Lat" class="input" readonly>
                                        </div>
                                        <div class="column">
                                        <label class="label" for="Lng">ค่าพิกัดลองจิจูด</label>
                                        <input type="text" name="Lng" id="Lng" class="input" readonly>
                                        </div>
                                    </div>

                                    <div class="field">
                                    <div class="field is-grouped is-grouped-multiline">
                                        <div class="control">
                                          <div class="tags has-addons">
                                            <span class="tag is-primary">ลำดับ</span>
                                            <span class="tag is-info" id="id_village"></span>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label" for="Lng">ชื่อชุมชน</label>
                                        <input class="input" type="text" name="village" id="village">
                                    </div>
                                    <div class="field">
                                        <label class="label" for="history">ประวัติพื้นที่</label>
                                        <textarea name="history" id="history" class="textarea"></textarea>
                                    </div>
                                    <div class="field">
                                        <label class="label" for="address">ที่อยู่</label>
                                        <input type="text" id="address" name="address" class="input" >
                                    </div>
                                </div>
                                <!--end input-->
                            </form>
                            <br><br>
                            <button id="save" class="button is-primary is-rounded" onclick="InsertData();">บันทึก</button>
                  
       



        </div>
      </div>
      <br/>
      
    
  


    
  </div>


<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVt0tnNAxqLDpQG3lfhB4fq3A3KW3puZA&callback=initMap&v=weekly" async></script>
<!--script-->
<script src="../js/village.js"></script>
<!-- kml script -->
<script src="../js/geoxml3.js"></script>
<!-- back to top -->
<script src="../js/back_to_top.js"></script>
