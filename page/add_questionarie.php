<?php
    include ('../include/header_admin.php');
 
   
?>
    
    <div class="container column is-15">
    <div class="section">


     
        <div class="card-content"><div class="content">
            
        <p align="center" class="is-size-5"><i class="fa-solid fa-circle-plus"></i>&nbsp;เพิ่มคำถามแบบสอบถาม</p>
        <form id='add_question' onsubmit="return false">
                    <table class="table is-responsive">
                        <thead>
                            <tr>
                                <th colspan="1">ลำดับ</th>
                                <th>คำถาม</th>
                                <th>ลบ</th>

                            </tr>
                        </thead>
                        <tbody id="question_add">

                        </tbody>
                    </table>
                    <br><br>
                    <div class="columns" align="center">
                        <div class="column is-2" >
                            <button type='button'  class="button is-primary is-info is-rounded" name='add' id='add' onclick="addRow();"> เพิ่มคำถาม</button>
                        </div>
                        <div class="column is-2" style="display: none" id= "SubmitButton">
                            <button type="submit"  class="button is-primary is-primary is-rounded" form="add_question" onclick="SaveData();"> บันทึกข้อมูล</button>
                        </div>
                    </div>

        </div>
      </div>
      <br/>
      
    
  


    
  </div>

<!-- add question -->
<script src="../js/add_question.js"></script>
<!-- back to top -->
<script src="../js/back_to_top.js"></script>

