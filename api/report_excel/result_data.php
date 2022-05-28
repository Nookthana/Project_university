<?php
require '../config/conn.php';
session_start();


// start abcd
$abcd_result = array(
    $_SESSION['data'][0]['question'],
    $_SESSION['data'][0]['A'],
    $_SESSION['data'][0]['B'],
    $_SESSION['data'][0]['C'],
    $_SESSION['data'][0]['D'],
);


$abcd_title = array(

    'รายการ',	
    'ไม่ปฏิบัติเลย(คน)',	
    'ปฏิบัติเป็นบางครั้ง(คน)',	
    'ปฏิบัติบ่อยครั้ง(คน)',	
    'ปฏิบัติเป็นประจำ(คน)',

   
);


// start gender

$gender_result = array(



    $_SESSION['data'][0]['gender1'],
    $_SESSION['data'][0]['gender2'],




);    


$gender_title = array(

    'ชาย',	
    'หญิง',

   
);



// end gender

// start old data
$old_result = array(



    $_SESSION['data'][0]['age1'],
    $_SESSION['data'][0]['age2'],
    $_SESSION['data'][0]['age3'],
    $_SESSION['data'][0]['age4'],
    $_SESSION['data'][0]['age5'],
    $_SESSION['data'][0]['age6'],



);    


$old_title = array(

    'อายุ ต่ำกว่า 20 ปี ',	
    'อายุระหว่าง 21 - 30 ป',
    'อายุระหว่าง 31 - 40 ป',
    'อายุระหว่าง 41 - 50 ปี',
    'อายุระหว่าง 51 - 59 ป',
    'อายุ 60 ปีขึ้นไป',	
   
);


// end old data


// start disease data 
$disease_result = array(

    $_SESSION['data'][0]['d1'],
    $_SESSION['data'][0]['d2'],
    $_SESSION['data'][0]['d3'],
    $_SESSION['data'][0]['d4'],
    $_SESSION['data'][0]['d5'],
    $_SESSION['data'][0]['d6'],
    $_SESSION['data'][0]['d7'],
    $_SESSION['data'][0]['d8'],
    $_SESSION['data'][0]['d9'],
    $_SESSION['data'][0]['d10'],
    $_SESSION['data'][0]['d11'],
    $_SESSION['data'][0]['d12'],
    $_SESSION['data'][0]['d13'],
    $_SESSION['data'][0]['d14'],
    $_SESSION['data'][0]['d15'],
    $_SESSION['data'][0]['d16'],
    $_SESSION['data'][0]['d17'],


);    


$disease_title = array(

    'ไม่มีโรคประจำตัว',	
    'ความดันโลหิตต่ำ',
    'ความดันโลหิตสูง',
    'พิการ',
    'มะเร็งมดลูก',
    'เนื้องอก',	
    'โรคกระเพาะ',
    'โรคปอด',	
    'โรคหอบ',	
    'โรคหัวใจ',	
    'โรคเบาหวาน',
    'โรคกรดไหลย้อน',
    'ต่อมทอมซิลอักเสบ',	
    'ไตวายเรื้อรัง',	
    'หวัดภูมิแพ้',
    'หลอดเลือดหัวใจตีบตัน',
    'อื่น',
    

);

// end disease data



// start education data 
$education_result = array(

    $_SESSION['data'][0]['e1'],
    $_SESSION['data'][0]['e2'],
    $_SESSION['data'][0]['e3'],
    $_SESSION['data'][0]['e4'],
    $_SESSION['data'][0]['e5'],
    $_SESSION['data'][0]['e6'],
    $_SESSION['data'][0]['e7'],
    $_SESSION['data'][0]['e8'],
    $_SESSION['data'][0]['e9'],



);    


$education_title = array(

    'ต่ำกว่าประถมศึกษา',	
    'ประถมศึกษา',
    'มัธยมศึกษาตอนต้น/หรือเทียบเท่า',
    'มัธยมศึกษาตอนปลาย/หรือเทียบเท่า',
    'อนุปริญญา/ ปวส. หรือเทียบเท่า',
    'ปริญญาตรี',	
    'ปริญญาโท',
    'ปริญญาเอก',	
    'สูงกว่าปริญญาเอก',	

    

);

// end education data



// start status data
$status_result = array(



    $_SESSION['data'][0]['s1'],
    $_SESSION['data'][0]['s2'],
    $_SESSION['data'][0]['s3'],




);    


$status_title = array(

    'โสด',	
    'สมรส',
    'หม่าย',

   
);

// end status data




// start career data 
$career_result = array(

    $_SESSION['data'][0]['c1'],
    $_SESSION['data'][0]['c2'],
    $_SESSION['data'][0]['c3'],
    $_SESSION['data'][0]['c4'],
    $_SESSION['data'][0]['c5'],
    $_SESSION['data'][0]['c6'],
    $_SESSION['data'][0]['c7'],
    $_SESSION['data'][0]['c8'],
    $_SESSION['data'][0]['c9'],



);    


$career_title = array(

    'ข้าราชการ',	
    'พนักงานรัฐวิสาหกิจ',
    'พนักงานบริษัท',
    'ธุรกิจส่วนตัว',
    'ค้าขาย',
    'รับจ้าง/ลูกจ้าง',	
    'นิสิต/นักศึกษา',
    'เกษตรกรรม/ปศุสัตว์/ประมง',	
    'เกษียณ/ว่างงาน',	

    

);


// end career data

?>


