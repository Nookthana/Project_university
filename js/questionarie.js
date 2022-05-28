axios
  .post("../api/question/all_question.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const question = res.data.data;

      question.forEach((e) => {
        const q = `
                <tr>
                <td>${e.id_question}</td>      
                <td>${e.question}</td>
                <td><button class="button is-warning is-rounded update-modal" onclick="EditQuestion(${e.id_question});">แก้ไข</button></td>
                <td><button  class="button is-danger is-rounded" onclick="DeleteQuestion(${e.id_question});">ลบ</button></td>
                <tr>  
                        `;

        $("#result_question").append(q);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//function edit
function EditQuestion(id) {
  const data = {
    id: id,
  };

  axios
    .post("../api/question/edit_question.php", data)
    .then((res) => {
      if (res.data.status == 200) {
        const Data = res.data.data;
        // console.log(Data[0]);

        // modal js edit question

        $(".update-modal").show(function () {
          $("#update-modal").addClass("is-active");
          $("#update-text").val($("#target-text").text());
          $("#id_question").val(Data[0].id_question);
          $("#question").val(Data[0].question);
 
        });

        $(".update-modal-close").click(function (e) {
          e.preventDefault();
          $("#update-modal").removeClass("is-active");
        });

        $("#save").click(function (e) {
          e.preventDefault();
          $("#update-modal").removeClass("is-active");
          $("#target-text").text($("#update-text").val());
        });
      }
    })
    .catch((err) => {
      console.error(err);
    });
}

    

//function delete
function DeleteQuestion(id) {
  
    const data = {
        id: id
      }

    
      Swal.fire({
        title: 'คุณต้องการลบข้อมูลหรือไม่?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'บันทึก',
        cancelButtonText: "ยกเลิก",
        confirmButtonColor: '#00d1b2',
        cancelButtonColor:  '#f14668'
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
    
    
          // axios post save data
          axios.post('../api/village/delete_village.php',data)
          .then(res => {
            if (res.data.status == 200) {
              Swal.fire({
                icon: 'success',
                text: 'ลบข้อมูลเรียบร้อย',
                timer: 2000,
                showConfirmButton:false
              }).then(function() {
    
             
                 window.location.reload()
    
                })
            }
          })
          .catch(err => {
            console.error(err); 
          })
        }
      })
    
}



function SaveDataQuestion(){

    const data = {

        id: $('#id_question').val(),
        question: $('#question').val(),
 
  
    }

    
   Swal.fire({
      title: 'คุณต้องการอัพเดทข้อมูลหรือไม่?',
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'บันทึก',
      cancelButtonText: "ยกเลิก",
      confirmButtonColor: '#00d1b2',
      cancelButtonColor:  '#f14668'
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
  
  
        // axios post save data
        axios.post('../api/question/update_question.php',data)
        .then(res => {
          if (res.data.status == 200) {
            Swal.fire({
              icon: 'success',
              text: 'บันทึกข้อมูลเรียบร้อย',
              timer: 2000,
              showConfirmButton:false
            }).then(function() {
  
           
              window.location.reload()
  
              })
          }
        })
        .catch(err => {
          console.error(err); 
        })
      }
    })

}