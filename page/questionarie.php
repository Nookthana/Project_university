<?php
include('../include/header.php');


?>
<link rel="stylesheet" type="text/css" href="../css/radio.css" />
<link rel="stylesheet" type="text/css" href="../css/table.css" />

<div class="container column is-15">
    <div class="section">

        <!--title-->
        <p align="center" class="is-size-5"><i class="fa-solid fa-square-poll-horizontal"></i>&nbsp;แบบสอบถามสำรวจพฤติกรรมการบริโภค</p><br>
        <!--name-->
        <!-- form Group1-->
        <form id="FormGroup1" onsubmit="return false;" style="display: block">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">ชื่อ-สกุล</label>
                </div>
                <div class="field-body">
                    <div class="field">

                        <input class="input" type="text" id="name_person" name="name_person" placeholder="โปรดระบุชื่อและนามสกุล">

                    </div>
                </div>
            </div>
            <!--gender-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">เพศ</label>
                </div>
                <div class="field-body">
                    <div class="field">

                        <div class="select is-link">
                            <select id="gender">
                                <option selected disabled value="">กรุณาเลือกเพศ</option>

                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <!--gender-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">อายุ</label>
                </div>
                <div class="field-body">
                    <div class="field" id="tag_age">


                    </div>

                </div>
            </div>


            <!--disease-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">โรคประจำตัว</label>
                </div>
                <div class="field-body">
                    <div class="field">

                        <div class="select is-link">
                            <select id="disease">
                                <option selected disabled value="">กรุณาเลือกโรคประจำตัว</option>

                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <!--education-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">การศึกษา</label>
                </div>
                <div class="field-body">
                    <div class="field" id="tag_education">


                    </div>

                </div>
            </div>


            <!--status-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">สถานภาพ</label>
                </div>
                <div class="field-body">
                    <div class="field" id="tag_status">


                    </div>

                </div>
            </div>



            <!--career-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">อาชีพ</label>
                </div>
                <div class="field-body">
                    <div class="field" id="tag_career">


                    </div>

                </div>
            </div>



            <!--address-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">ที่อยู่</label>
                </div>
                <div class="field-body">
                    <div class="field">

                        <div class="select is-link">
                            <select id="address">
                                <option selected disabled value="">ที่อยู่</option>

                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="field is-horizontal">
                <div class="field-label is-normal">

                </div>
                <div class="field-body">
                    <div class="field">
                        <button class="button is-primary is-rounded" onclick="ValidateGroup1();">ถัดไป</button>

                    </div>
                </div>
            </div>


        </form>
        <!--end form  Group1 -->


        <form id="FormGroup2" onsubmit="return false;" style="display: none">

            <table class="table is-responsive" align="center">
                <thead>
                    <tr>
                        <th>ข้อ</th>
                        <th>รายการ</th>
                        <th>ไม่ปฏิบัติเลย</th>
                        <th>ปฏิบัติเป็นบางครั้ง</th>
                        <th>ปฏิบัติบ่อยครั้ง</th>
                        <th>ปฏิบัติเป็นประจำ</th>
                    </tr>
                </thead>
                <tbody id="questionGroup2">

                </tbody>
            </table>




        </form>

        <br>

        <div class="field-body" style="display: none" id="Btn_submit" align="center">


            <div class="columns is-mobile">
                <div class="column">
                    <a href="./questionarie.php"><button class="button is-warning is-rounded">ย้อนกลับ</button></a>
                </div>
                <div class="column">
                <button class="button is-primary is-rounded" onclick="SendData();">บันทึก</button>
                </div>
            </div>

        </div>
    </div>

















</div>
</div>
<!-- back to top -->
<script src="../js/back_to_top.js"></script>
<!-- result year-->
<script src="../js/survey_question.js"></script>