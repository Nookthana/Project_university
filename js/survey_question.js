let sum = 0;
let questionCheck = 0;

//axios fetch gender
axios
  .post("../api/question/count_question.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Data = res.data.data;
      questionCheck = Data[0].id_question;
    }
  })
  .catch((err) => {
    console.error(err);
  });

//axios fetch gender
axios
  .post("../api/gender/gender.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Data = res.data.data;

      Data.forEach((e) => {
        const gender = `  
                        <option value="${e.id}">${e.sex}</option>
                       `;
        sum += 1;
        $("#gender").append(gender);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//axios fetch age
axios
  .post("../api/age/age.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Data = res.data.data;

      Data.forEach((e) => {
        const age = `
                                <p>
                                 <input type="radio" id="q1_${e.id}" name="age" value="${e.id}">
                                 <label for="q1_${e.id}">${e.span_of_age}</label>
                                </p>
                              `;

        $("#tag_age").append(age);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//axios fetch disease
axios
  .post("../api/disease/disease.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Data = res.data.data;

      Data.forEach((e) => {
        const disease = `  
                        <option value="${e.id}">${e.name_disease}</option>
                       `;

        $("#disease").append(disease);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//axios fetch education
axios
  .post("../api/education/education.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Data = res.data.data;

      Data.forEach((e) => {
        const education = `
                                <p>
                                 <input type="radio" id="q2_${e.id}" name="education" value="${e.id}">
                                 <label for="q2_${e.id}">${e.education}</label>
                                </p>
                              `;

        $("#tag_education").append(education);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//axios fetch status
axios
  .post("../api/status/status.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Data = res.data.data;

      Data.forEach((e) => {
        const status = `<p>
                       <input type="radio" id="q3_${e.id}" name="status" value="${e.id}">
                       <label for="q3_${e.id}">${e.status}</label>
                      </p>
                     `;

        $("#tag_status").append(status);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//axios fetch career
axios
  .post("../api/career/career.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Data = res.data.data;

      Data.forEach((e) => {
        const career = `<p>
                         <input type="radio" id="q4_${e.id}" name="career" value="${e.id}">
                         <label for="q4_${e.id}">${e.career}</label>
                        </p>
                       `;

        $("#tag_career").append(career);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//axios fetch address
axios
  .post("../api/address/address.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Data = res.data.data;

      Data.forEach((e) => {
        const address = ` 
                        <option value="${e.id}">${e.village}</option>
                       `;

        $("#address").append(address);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//axios fetch address
axios
  .post("../api/question/all_question.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Data = res.data.data;
      let i = 1;
      Data.forEach((e) => {
        const question = ` 
                        <tr>
                        <td>${e.id_question}</td>
                        <td>${e.question}</td>
                        <td align='center'><div><input name='question${i}' id='qA_${i}' type='radio' value="4" /><label for='qA_${i}' checked></label></div></td>
                        <td align='center'><div><input name='question${i}' id='qB_${i}' type='radio' value="3" /><label for='qB_${i}'></label></div></td>
                        <td align='center'><div><input name='question${i}' id='qC_${i}' type='radio' value="2" /><label for='qC_${i}'></label></div></td>
                        <td align='center'><div><input name='question${i}' id='qD_${i}' type='radio' value="1" /><label for='qD_${i}'></label></div></td>
                        </tr>
                     `;
        i++;
        $("#questionGroup2").append(question);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//function validate
function ValidateGroup1() {
  let Group1 = false;

  if ($("#name_person").val().length <= 0) {
    Swal.fire({
      icon: "warning",
      text: "กรุณาระบุชื่อ-สกุล",
      timer: 2000,
      showConfirmButton: false,
    });
  } else if (!$("#gender").val()) {
    Swal.fire({
      icon: "warning",
      text: "กรุณาเลือกเพศ",
      timer: 2000,
      showConfirmButton: false,
    });
  } else if (!$("input:radio[name=age]").is(":checked")) {
    Swal.fire({
      icon: "warning",
      text: "กรุณาระบุอายุ",
      timer: 2000,
      showConfirmButton: false,
    });
  } else if (!$("#disease").val()) {
    Swal.fire({
      icon: "warning",
      text: "กรุณาเลือกโรคประจำตัว",
      timer: 2000,
      showConfirmButton: false,
    });
  } else if (!$("input:radio[name=education]").is(":checked")) {
    Swal.fire({
      icon: "warning",
      text: "กรุณาระบุการศึกษา",
      timer: 2000,
      showConfirmButton: false,
    });
  } else if (!$("input:radio[name=status]").is(":checked")) {
    Swal.fire({
      icon: "warning",
      text: "กรุณาระบุสถานภาพ",
      timer: 2000,
      showConfirmButton: false,
    });
  } else if (!$("input:radio[name=career]").is(":checked")) {
    Swal.fire({
      icon: "warning",
      text: "กรุณาระบุอาชีพ",
      timer: 2000,
      showConfirmButton: false,
    });
  } else if (!$("#address").val()) {
    Swal.fire({
      icon: "warning",
      text: "กรุณาเลือที่อยู่",
      timer: 2000,
      showConfirmButton: false,
    });
  } else {
    Group1 = true;
  }

  DisPlayGroup2(Group1);
}

//display formGroup2
function DisPlayGroup2(Group1) {
  const Form1 = document.getElementById("FormGroup1");
  const Form2 = document.getElementById("FormGroup2");
  const Btn = document.getElementById("Btn_submit");

  if (Group1 == true) {
    Form1.style.display = "none";
    Form2.style.display = "block";

    Btn.style.display = "block";
  }
}

//function Set data
function SendData() {
  for (let i = 1; i < questionCheck.length; i++) {
    if (
      typeof $("input[name='question" + i + "']:checked").val() === "undefined"
    ) {
      Swal.fire({
        icon: "warning",
        text: "โปรดระบุคำตอบให้ครบทั้งหมด",
        timer: 2000,
        showConfirmButton: false,
      });
    } else {
      //value use Jquery Referent in vale inside form
      let UserName = $("#name_person").val();
      let Gender = $("#gender").val();
      let Age = $("input[name='age']:checked").val();
      let Disease = $("#disease").val();
      let Education = $("input[name='education']:checked").val();
      let Status = $("input[name='status']:checked").val();
      let Career = $("input[name='career']:checked").val();
      let Address = $("#address").val();
      // Data from from 2
      let FormGroup2 = $("#FormGroup2").serialize();
       
      // data all form 1 group
      let DataForm1 = {
        UserName: UserName,
        Gender:  parseInt(Gender),
        Age: parseInt(Age),
        Disease: parseInt(Disease),
        Education: parseInt(Education),
        Status: parseInt(Status),
        Career: parseInt(Career),
        Address: parseInt(Address),
      };

      InsertData(DataForm1, FormGroup2);
    }
  }
}

function InsertData(DataForm1, FormGroup2) {
  axios
    .post("../api/questionarie_answer/insert_tb_person.php", DataForm1)
    .then((res) => {
      if (res.data.status == 200) {
        axios
          .post("../api/questionarie_answer/insert_tb_answer.php", FormGroup2)
          .then((res) => {
            if (res.data.status == 200) {
              Swal.fire({
                position: "center",
                icon: "success",
                title: "บันทึกข้อมูลสำเร็จ",
                showConfirmButton: false,
                timer: 2000,
              }).then(function () {
                window.location.href = "../page/index.php";
              });
            }
          })
          .catch((err) => {
            console.error(err);
          });
      }
    })
    .catch((err) => {
      console.error(err);
    });
}
