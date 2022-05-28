function Login(){

if ($('#userName').val().length <= 0) {

    Swal.fire({
        icon: 'warning',
        text: 'กรุณาระบุชื่อผู้ใช้งาน',
        timer: 2000,
        showConfirmButton:false
      })

}else if ($('#passWord').val().length <= 0){

    Swal.fire({
        icon: 'warning',
        text: 'กรุณาระบุรหัสผ่าน',
        timer: 2000,
        showConfirmButton:false

      })
}else{

    const data = {

        userName: $('#userName').val(),
        passWord: $('#passWord').val()
    }
    axios.post('../api/login/login.php',data)
    .then(res => {

       if (res.data.status == 200) {
    
        Swal.fire({ 
            position: 'center',
            icon: 'success',
            title: 'เข้าสู่ระบบสำเร็จ',
            showConfirmButton: false,
            timer: 2000
            }).then(function() {

              document.getElementById("LoginForm").reset();
              window.location.href = "../page/village_map.php";

              })

}
       

    })
    .catch(err => {
        
    Swal.fire({
        icon: 'warning',
        text: 'ชื่อผู้ใช้หรือรหัสผ่านผิด',
        timer: 2000,
        showConfirmButton:false

      })
      console.log(err);
    })
}

   
}