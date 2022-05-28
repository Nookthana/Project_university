

function Logout() {
   
    axios.post('../api/logout/logout.php')
    .then(res => {
        if (res.data.status == 200) {
           
            Swal.fire({ 
                position: 'center',
                icon: 'success',
                title: 'ออกจากระบบสำเร็จ',
                showConfirmButton: false,
                timer: 2000
                }).then(function() {
    
                  window.location.href = "../index.php";
    
                  })
    
        }
    })
    .catch(err => {
        console.error(err); 
    })
}