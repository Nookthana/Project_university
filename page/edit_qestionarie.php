<?php
    include ('../include/header_admin.php');
 
   
?>
    
    <div class="container column is-15">
    <div class="section">


     
        <div class="card-content"><div class="content">
            

        <p align="center" class="is-size-5"><i class="fa-solid fa-file-pen"></i>&nbsp;แก้ไขคำถามแบบสอบถาม</p>
        <!--start table-->
            <table class="table is-responsive">
               <thead>
                   <tr>
                       <th>ลำดับ</th>
                       <th>รายการ</th>
                       <th>แก้ไข</th>
                       <th>ลบ</th>

                   </tr>
               </thead>
               <tbody id="result_question">

               </tbody>
            </table>
            <!--end table-->

            <!--start modal-->
            <div id="update-modal" class="modal">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                        <header class="modal-card-head" align="center">
                            <p class="modal-card-title" id="title"></p>
                            <button class="delete update-modal-close" aria-label="close"></button>
                        </header>
                        <section class="modal-card-body">
                            <form>
                                <div class="field">                          
                                    <div class="columns">
                                        <div class="column is-1">
                                        <label class="label" for="id_question"> ลำดับ </label>
                                        <input type="text" name="id_question" id="id_question" class="input" readonly>
                                        </div>
                                        <div class="column">
                                        <label class="label" for="question">คำถาม</label>
                                        <input type="text" name="question" id="question" class="input" />
                                        </div>
                                    </div>
                                <!--end input-->
                            </form>
                        </section>
                        <footer class="modal-card-foot">
                            <button id="save" class="button is-primary is-rounded" onclick="SaveDataQuestion();">บันทึก</button>
                            <button class="button is-danger is-rounded update-modal-close">ปิด</button>
                        </footer>
                    </div>
                </div>

                <!--end modal-->





        </div>
      </div>
      <br/>
      
    
  
</section>

    
  </div>

<!-- all question -->
<script src="../js/questionarie.js"></script>
<!-- back to top -->
<script src="../js/back_to_top.js"></script>
