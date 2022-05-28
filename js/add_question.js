
let Rows = 0;

axios.post('../api/question/count_question.php', { withCredentials: true })
.then(res => {
    if (res.data.status == 200) {
            const id = res.data.data;
                
            Rows = parseInt(id[0].id_question);

            
        

            $(document).ready(function(){

                let i=0;

                $('#add').click(function(){

                    let btn_save = document.getElementById('SubmitButton');

                    if ($("#add_question tbody tr").length >= 0 ) {
                        

                      
                        btn_save.style.display = "block"

                      } else {
                        btn_save.style.display = "none"
                    

                      }

               

  
              

                i++;    
                Rows++;

                if (i<=10){

                $('#question_add').append(`
    
                  <tr id="row${i}">
                         <td>
                            <div class="tags are-large" id="RowsNumber${i}">
                                <span class="tag is-info is-medium">${Rows}</span>
                            </div>
                         </td>
                
                        <td>
                            <input class="input" type="text" id="${Rows}" name="question${i}" placeholder="โปรดใส่ชื่อคำถาม"/>
                        </td>
                
                        <td>
                            <button type="button" name="remove" id="${i}"  class="button is-danger is-rounded btn_remove ">ลบ</button>
                        </td>
                
                    </tr>`);

                }else{

                    Swal.fire({
                        icon: 'warning',
                        text: 'เพิ่มได้ครั้งล่ะ 10 คำถาม !',
                        timer: 2000,
                        showConfirmButton:false
                
                      })

                }

                });
                $(document).on('click', '.btn_remove', function(){

                    let btn_save = document.getElementById('SubmitButton');
                  
                    if (i == 1) {
                        
                        btn_save.style.display = "none"
                       

                      } 

                    //get id referrent class
                    let button_id = $(this).attr("id"); 
                    //remove class
                    $('#row'+button_id+'').remove();
                    //value minus 1
                    i--;
                    Rows--;
                });
            
            });

    }
})
.catch(err => {
    console.error(err); 
})

// func insert question into database
let row_input = 0;
function  SaveData() {

        let check = document.getElementsByTagName('input');
        let check_input = false;

    for(var i=0;i<row_input;i++) {

        if (check[i].value ==='')
        {
            Swal.fire({
                icon: 'warning',
                text: 'กรุณากรอกคำถามให้ครบถ้วน !',
                timer: 2000,
                showConfirmButton:false
        
              })

           return false;

        }else{

            check_input = true;
        }

      }


      if (check_input === true) {

        /* let Data = [];
         let data = $('#add_question').serialize();*/


         var Data = [];
         $('#add_question input').each(function(){
            Data.push({
                id :this.id,
                question: this.value
            });
         });
     

       
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
        

        axios.post('../api/question/insert_question.php',{Data:Data})
        .then(res => {

            if (res.data.status == 200) {

                        console.log(res.data.data);
                       Swal.fire({
                        icon: 'success',
                        text: 'บันทึกข้อมูลสำเร็จ',
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


    }


   function  addRow(){


    let check = document.getElementsByTagName('input');
    row_input = check.length+1;

    
    }















