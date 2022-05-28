//value for count row
let row = 0;
//for assign value id user string type
let user_id_print = "";
//dataset for export_pdf_modal
let dataExport = [];

//axios year to option select
axios
  .post("../api/year/year.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const Year = res.data.data;

      Year.forEach((e) => {
        const y = `
                    <option >${e.id_year}</option>
                    `;

        $("#year_detail_survey").append(y);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

//axios fetch village to option select
axios
  .post("../api/village/village.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const village_user = res.data.data;

      village_user.forEach((e) => {
        const v = `
                    <option value="${e.id}">${e.village}</option>
                    `;

        $("#village_detail_survey").append(v);
      });

      SetDefaultPage();
    }
  })
  .catch((err) => {
    console.error(err);
  });

//set default first open page data user detail
function SetDefaultPage() {
  const village = $("#village_detail_survey").val();
  const year = $("#year_detail_survey").val();

  const Data = {
    village: village,
    year: year,
  };

  axios
    .post("../api/user_detail_survey/user_detail.php", Data)
    .then((res) => {
      if (res.data.status == 200) {
        const Data = res.data.data;

        // DataSet for data Table value array
        let dataSet = [];

        //loop data set
        for (let i = 0; i < Data.length; i++) {
          row += 1;
          dataSet.push([
            row,
            Data[i].id_person,
            Data[i].name_person,
            Data[i].sex,
            Data[i].span_of_age,
            Data[i].name_disease,
            Data[i].education,
            Data[i].status,
            Data[i].career,
            Data[i].created,
            `<button class="button is-small is-rounded is-info update-modal"  id="${Data[i].id_person}" onclick="UserDetail(this.id)">ข้อมูล</button>`,
          ]);
        }
        //console.log(dataSet);
        //call function for SetDataTable
        SetDataTable(dataSet);
      }
    })
    .catch((err) => {
      console.error(err);
    });
}

//SetData Table user detail
function SetDataTable(dataSet) {
  //console.log(dataSet);

  $("#example").DataTable({
    data: dataSet,
    iDisplayLength: row,
    destroy: true,
    lengthChange: false,
    columnDefs: [{ className: "dt-center", targets: "_all" }],
    columns: [
      { title: "ลำดับ" },
      { title: "รหัสอ้างอิง" },
      { title: "ชื่อ-นามสกุล" },
      { title: "เพศ" },
      { title: "ช่วงอายุ" },
      { title: "โรคประจำตัว" },
      { title: "การศึกษา" },
      { title: "สถานภาพ" },
      { title: "อาชีพ" },
      { title: "วันที่ทำแบบสอบถาม" },
      { title: "รายละเอียด" },
    ],
  });
}

//function Search detail user survey
function Search_Detail() {
  const village = $("#village_detail_survey").val();

  const year = $("#year_detail_survey").val();

  const Data = {
    village: village,
    year: year,
  };

  axios
    .post("../api/user_detail_survey/user_detail.php", Data)
    .then((res) => {
      if (res.data.status == 200) {
        const Data = res.data.data;

        // DataSet for data Table value array
        let dataSet = [];

        row = 0;
        //loop data set
        for (let i = 0; i < Data.length; i++) {
          row += 1;
          dataSet.push([
            row,
            Data[i].id_person,
            Data[i].name_person,
            Data[i].sex,
            Data[i].span_of_age,
            Data[i].name_disease,
            Data[i].education,
            Data[i].status,
            Data[i].career,
            Data[i].created,
            `<button class="button is-small is-rounded is-info update-modal" 
               id="${Data[i].id_person}" 
               onclick="UserDetail(this.id)">ข้อมูล</button>
              `,
          ]);
        }

        //call function for SetDataTable
        SetDataTable(dataSet);
      }
    })
    .catch((err) => {
      console.error(err);
    });
}

//function fetch user detail
function UserDetail(user_id) {
  user_id_print = user_id;

  const Data = {
    id_person: user_id,
  };

  axios
    .post("../api/user_detail_survey/answer_user.php", Data)
    .then((res) => {
      if (res.data.status == 200) {
        const Data = res.data.data;

        //call fun set data table
        SetDataTableModal(Data);
        //call function SetDataChart
        SetDataChart(Data);
      }
    })
    .catch((err) => {
      console.error(err);
    });
}

function SetDataChart(Data) {
  //pie user jqury remove and add
  $("#UserPie").remove();
  $("#Pie_User").append('<canvas id="UserPie" ></canvas>');

  //modal js
  $(".update-modal").click(function () {
    $("#update-modal").addClass("is-active");
    $("#update-text").val($(this).attr("id"));
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

  //call function for answer
  SummaryA = CalculateSummary(Data, Data[0].A);
  SummaryB = CalculateSummary(Data, Data[0].B);
  SummaryC = CalculateSummary(Data, Data[0].C);
  SummaryD = CalculateSummary(Data, Data[0].D);

  // start user chart
  var data = {
    labels: [
      "ไม่ปฏิบัติเลย(คน)",
      "ปฏิบัติเป็นบางครั้ง(คน)",
      "	ปฏิบัติบ่อยครั้ง(คน)",
      "ปฏิบัติเป็นประจำ(คน)",
    ],
    datasets: [
      {
        data: [SummaryA, SummaryB, SummaryC, SummaryD],
        backgroundColor: [
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
        ],
        hoverBorderColor: ["#eee", "#eee"],
      },
    ],
  };

  var piectx = document.getElementById("UserPie").getContext("2d");

  Chart.defaults.font.family = "K2D";
  Chart.defaults.font.size = 10;

  var UserChart = new Chart(piectx, {
    type: "pie",
    data: data,
    options: {
      showAllTooltips: true,
      animation: {
        animateRotate: true,
        animateScale: true,
      },
      elements: {
        arc: {
          borderColor: "#fff",
        },
      },
      plugins: {
        legend: {
          position: "top",
          align: "middle",
          labels: {
            padding: -1,
          },
        },
      },
    },
  });
  UserChart.update();
  // end user chart
}

//function calculate
function CalculateSummary(Data, DataSum) {
  let Sum = 0;
  //loop calculate summary
  for (let i = 0; i < Data.length; i++) {
    if (DataSum == 1) {
      Sum += 1;
    } else {
      Sum += 0;
    }
  }

  return Sum;
}

//func set data table in modal
function SetDataTableModal(Data) {
  let row = 0;
  // table in modal
  let dataSet2 = [];
  //remove old value
  dataExport.splice(0, dataExport.length);

  //loop for array in Datable
  for (let i = 0; i < Data.length; i++) {
    row += 1;
    dataSet2.push([
      row,
      Data[i].question,
      Data[i].A,
      Data[i].B,
      Data[i].C,
      Data[i].D,
    ]);

    //array obj for export
    dataExport.push([
      row,
      Data[i].question,
      Data[i].A,
      Data[i].B,
      Data[i].C,
      Data[i].D,
    ]);
  }

  $("#userData").DataTable({
    data: dataSet2,
    iDisplayLength: row,
    destroy: true,
    lengthChange: false,
    columnDefs: [{ className: "dt-center", targets: "_all" }],
    columns: [
      { title: "ข้อ" },
      { title: "รายการ" },
      { title: "ปฏิบัติเป็นประจำ" },
      { title: "ปฏิบัติบ่อยครั้ง" },
      { title: "ปฏิบัติเป็นบางครั้ง" },
      { title: "ไม่ปฏิบัติเลย" },
    ],
  });
}

function ExportPDF_User() {
  const Data = {
    id_person: user_id_print,
    question: dataExport,
  };

  axios
    .post("../api/export_pdf_modal/detail_user.php", Data)
    .then((res) => {
      if (res.data.status == 200) {
        window.open("../api/export_pdf_modal/export_pdf.php", "_blank");
      }
    })
    .catch((err) => {
      console.error(err);
    });
}

function ExportCSV_User() {
  const Data = {
    id_person: user_id_print,
    question: dataExport,
  };

  axios
    .post("../api/export_pdf_modal/detail_user.php", Data)
    .then((res) => {
      if (res.data.status == 200) {
        window.open("../api/export_pdf_modal/excel_report.php", "_blank");
      }
    })
    .catch((err) => {
      console.error(err);
    });
}
