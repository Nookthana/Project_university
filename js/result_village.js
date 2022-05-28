// axios get village
axios
  .post("../api/village/village.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const village = res.data.data;

      village.forEach((e) => {
        const v = `<option id="${e.id}">${e.id}&nbsp;${e.village}</option>`;

        $("#village").append(v);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

// axios get year
axios
  .post("../api/year/year.php", { withCredentials: true })
  .then((res) => {
    if (res.data.status == 200) {
      const year = res.data.data;

      year.forEach((e) => {
        const y = `<option >${e.id_year}</option>`;

        $("#year").append(y);
      });
    }
  })
  .catch((err) => {
    console.error(err);
  });

// function search

function Search() {
  let id_year = parseInt($("#year").val());
  let id_loc = parseInt($("#village").children(":selected").attr("id"));
  let page = 1;

  GetDatatable(id_loc, id_year, page);
}

// ready func
$(document).ready(function () {
  let id_year = 2561;
  let id_loc = 1;
  let page = 1;

  GetDatatable(id_loc, id_year, page);
});

// func get data
function GetDatatable(id_loc, id_year, page) {
  $("#example").DataTable({
    ajax:
      "../api/resullt_table_village/data_question.php?id_loc=" +
      id_loc +
      "&year=" +
      id_year +
      "",
    destroy: true,
    columnDefs: [
      {"className": "dt-center", "targets": "_all"}
   ],
    columns: [
      { data: "question" },
      { data: "A" },
      { data: "B" },
      { data: "C" },
      { data: "D" },
    ],
  });

  //call
  CreateDataCharts(id_loc, id_year, page);

  // pagination click
  let table = $("#example").DataTable();
  $("#example").on("page.dt", function () {
    let info = table.page.info();
    let page = info.page + 1;

    CreateDataCharts(id_loc, id_year, page);
    SetPagePdf(page);
  });

  function CreateDataCharts(d_loc, id_year, page) {
    const Data = {
      id_loc: d_loc,
      id_year: id_year,
      page: page,
    };

    axios
      .post("../api/resullt_table_village/data_chart_village.php", Data)
      .then((res) => {
        if (res.data.status == 200) {
          const Data = res.data.data;

          //console.log(Data[0]);


          let d = [];
          d.push(Data[0].A,Data[0].B,Data[0].C,Data[0].D);
            //console.log(d);
         

          // questQ jqury remove and add
          $("#piechart_q").remove();
          $("#PieQ").append('<canvas id="piechart_q" ></canvas>');

          //bar jqury remove and add
          $("#barchart_q").remove();
          $("#BarQ").append('<canvas id="barchart_q" ></canvas>');

          //pie gender jqury remove and add
          $("#piechart_gender").remove();
          $("#PieGender").append('<canvas id="piechart_gender" ></canvas>');

          //pie gender jqury remove and add
          $("#piechart_age").remove();
          $("#PieAge").append('<canvas id="piechart_age" ></canvas>');


          //pie gender jqury remove and add
          $("#piechart_disease").remove();
          $("#PieDisease").append('<canvas id="piechart_disease" ></canvas>');


          
          //pie education jqury remove and add
          $("#piechart_education").remove();
          $("#PieEducation").append('<canvas id="piechart_education" ></canvas>');


           //pie status jqury remove and add
           $("#piechart_status").remove();
           $("#PieStatus").append('<canvas id="piechart_status" ></canvas>');


          //pie career jqury remove and add
          $("#piechart_career").remove();
          $("#PieCareer").append('<canvas id="piechart_career" ></canvas>');
          

          // start gender chart
          var data = {
            labels: ['ไม่ปฏิบัติเลย(คน)',	'ปฏิบัติเป็นบางครั้ง(คน)','	ปฏิบัติบ่อยครั้ง(คน)',	'ปฏิบัติเป็นประจำ(คน)'],
            datasets: [
              {
                data: [Data[0].A,Data[0].B,Data[0].C,Data[0].D],
                backgroundColor: [        
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',],
                hoverBorderColor: ["#eee", "#eee"],
              },
            ],
          };

          var piectx = document
            .getElementById("piechart_q")
            .getContext("2d");

          Chart.defaults.font.family = "K2D";
          Chart.defaults.font.size = 10;

          var pieChart_Q = new Chart(piectx, {
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
                    padding: 1,
                  },
                },
              },
            },
          });
          pieChart_Q.update();
          // end gender chart
        let dataSetQuestion = [];
        dataSetQuestion.push(Data[0].A,Data[0].B,Data[0].C,Data[0].D);
          //start bar chart with
          const ctx = document.getElementById("barchart_q").getContext("2d");
          const barChartQ = new Chart(ctx, {
            type: "bar",
            data: {
              labels: ['ไม่ปฏิบัติเลย(คน)',	'ปฏิบัติเป็นบางครั้ง(คน)','	ปฏิบัติบ่อยครั้ง(คน)',	'ปฏิบัติเป็นประจำ(คน)'],
              datasets: [
                {
                  label: "# of Votes",
                  data: [],
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                  ],
                  borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
        
                  ],
                  borderWidth: 1,
                },
              ],
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true,
                },
              },
            },
          });
          barChartQ.data.datasets[0].data = dataSetQuestion;
          barChartQ.update();
          // end pie Chart

          // start add value in table
          let dataSetGender = [];
          dataSetGender.push(Data[0].gender1, Data[0].gender2);
          let gender = ['ชาย','หญิง'];
          $("#gender").empty();
             for (let i = 0; i < dataSetGender.length; i++) {
                 
                const g = `<tr align="center">
                                <td>${gender[i]}</td>
                                <td>${dataSetGender[i]}</td>
                            </tr>
                            `;
                 $('#gender').append(g);
             }

            /// end table 

            //start gender pie

                 // start gender chart
          var data = {
            labels: ['ชาย','หญิง'],
            datasets: [
              {
                data: [Data[0].gender1,Data[0].gender2],
                backgroundColor: [        
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',],
                hoverBorderColor: ["#eee", "#eee"],
              },
            ],
          };

          var piectx = document
            .getElementById("piechart_gender")
            .getContext("2d");

          Chart.defaults.font.family = "K2D";
          Chart.defaults.font.size = 10;

          var pieChart_Gender = new Chart(piectx, {
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
                    padding: 1,
                  },
                },
              },
            },
          });
          pieChart_Gender.update();
          // end gender chart



          // start add value in table
          let dataSetAge = [];
          dataSetAge.push(Data[0].age1, Data[0].age2,Data[0].age3, Data[0].age4,Data[0].age5);
          let age = [
           'อายุ ต่ำกว่า 20 ปี',	
           'อายุระหว่าง 21 - 30 ปี	',
           'อายุระหว่าง 31 - 40 ปี	',
           'อายุระหว่าง 41 - 50 ปี	',
           'อายุระหว่าง 51 - 59 ปี	',
           'อายุ 60 ปีขึ้นไป',
          ];
          //clear table
          $("#age").empty();

             for (let i = 0; i < dataSetAge.length; i++) {
                 
                const g = `<tr align="center">
                                <td>${age[i]}</td>
                                <td>${dataSetAge[i]}</td>
                            </tr>
                            `;
                 $('#age').append(g);
             }

            /// end table 

            //start age pie

              // start disease chart
          var data = {
            labels: [
                'อายุ ต่ำกว่า 20 ปี',
                'อายุระหว่าง 21 - 30 ปี',
                'อายุระหว่าง 31 - 40 ปี',
                'อายุระหว่าง 41 - 50 ปี',
                'อายุระหว่าง 51 - 59 ปี'

            ],
            datasets: [
              {
                data: [ Data[0].age1, Data[0].age2,Data[0].age3, Data[0].age4,Data[0].age5
                    ],
                backgroundColor: [        
                    
                    '#ff4000',
                    '#ff8000',
                    '#ffbf00',
                    '#ffff00',
                    '#bfff00',

                    
                    ],
                hoverBorderColor: ["#eee", "#eee"],
              },
            ],
          };

          var piectx = document
            .getElementById("piechart_age")
            .getContext("2d");

          Chart.defaults.font.family = "K2D";
          Chart.defaults.font.size = 10;

          var pieChart_Age = new Chart(piectx, {
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
                    padding: 1,
                  },
                },
              },
            },
          });
          pieChart_Age.update();
          // end disease chart

        // start disease chart
          var data = {
            labels: [
               
                'โรคประจำตัว',	
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
                'อื้นๆ',

            ],
            datasets: [
              {
                data: [  Data[0].d1, Data[0].d2,Data[0].d3, Data[0].d4,Data[0].d5
                        ,Data[0].d6, Data[0].d7,Data[0].d8, Data[0].d9,Data[0].d10
                        ,Data[0].d11, Data[0].d12,Data[0].d13, Data[0].d14,Data[0].d15
                        ,Data[0].d16, Data[0].d17
                    ],
                backgroundColor: [        
                    
                    '#ff4000',
                    '#ff8000',
                    '#ffbf00',
                    '#ffff00',
                    '#bfff00',
                    '#80ff00',
                    '#40ff00',
                    '#00ff00',
                    '#00ff40',
                    '#00ff80',
                    '#00ffbf',
                    '#00ffff',
                    '#00bfff',
                    '#0080ff',
                     '#800080',
 	                 '#73008c',
 	                ' #660099',
                    
                    ],
                hoverBorderColor: ["#eee", "#eee"],
              },
            ],
          };

          var piectx = document
            .getElementById("piechart_disease")
            .getContext("2d");

          Chart.defaults.font.family = "K2D";
          Chart.defaults.font.size = 10;

          var pieChart_Disease = new Chart(piectx, {
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
                    padding: 1,
                  },
                },
              },
            },
          });
          pieChart_Disease.update();
          // end disease chart

                // start add value in table
                let dataDisease = [];

                dataDisease.push(   Data[0].d1, Data[0].d2,Data[0].d3, Data[0].d4,Data[0].d5
                                   ,Data[0].d6, Data[0].d7,Data[0].d8, Data[0].d9,Data[0].d10
                                   ,Data[0].d11, Data[0].d12,Data[0].d13, Data[0].d14,Data[0].d15
                                   ,Data[0].d16, Data[0].d17 
                                );

                let disease = [
                           
                    'โรคประจำตัว',	
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
                    'อื้นๆ',
                ];
                //clear table
                $("#disease").empty();
      
                   for (let i = 1; i < dataDisease.length; i++) {

                   
                       
                      const g = `<tr align="center">
                                      <td>${disease[i]}</td>
                                      <td>${dataDisease[i]}</td>
                                  </tr>
                                  `;
                       $('#disease').append(g);
                   }
      
                  /// end table 



                  
        // start education chart
          var data = {
            labels: [
               
                'การศึกษา',	
                'ต่ำกว่าประถมศึกษา'	,
                'ประถมศึกษา',	
                'มัธยมศึกษาตอนต้น/หรือเทียบเท่า',	
                'มัธยมศึกษาตอนปลาย/หรือเทียบเท่า',	
                'อนุปริญญา/ ปวส. หรือเทียบเท่า',	
                'ปริญญาตรี'	,
                'ปริญญาโท',	
                'ปริญญาเอก'	,
                'สูงกว่าปริญญาเอก'	,
                'อื่นๆ'	

            ],
            datasets: [
              {
                data: [  Data[0].e1, Data[0].e2,Data[0].e3, Data[0].e4,Data[0].e5
                        ,Data[0].e6, Data[0].e7,Data[0].e8, Data[0].e9,Data[0].e10
                    ],
                backgroundColor: [        
                    
                    '#ff4000',
                    '#ff8000',
                    '#ffbf00',
                    '#ffff00',
                    '#bfff00',
                    '#80ff00',
                    '#40ff00',
                    '#00ff00',
                    '#00ff40',
                    '#00ff80',
                  
                    
                    ],
                hoverBorderColor: ["#eee", "#eee"],
              },
            ],
          };

          var piectx = document
            .getElementById("piechart_education")
            .getContext("2d");

          Chart.defaults.font.family = "K2D";
          Chart.defaults.font.size = 10;

          var pieChart_Disease = new Chart(piectx, {
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
                    padding: 1,
                  },
                },
              },
            },
          });
          pieChart_Disease.update();
          // end disease chart

                // start add value in table
                let dataEducation = [];

                dataEducation.push(   Data[0].e1, Data[0].e2,Data[0].e3, Data[0].e4,Data[0].e5
                                     ,Data[0].e6, Data[0].e7,Data[0].e8, Data[0].e9,Data[0].e10
                                );

                let education = [
                           
                    'การศึกษา',	
                    'ต่ำกว่าประถมศึกษา'	,
                    'ประถมศึกษา',	
                    'มัธยมศึกษาตอนต้น/หรือเทียบเท่า',	
                    'มัธยมศึกษาตอนปลาย/หรือเทียบเท่า',	
                    'อนุปริญญา/ ปวส. หรือเทียบเท่า',	
                    'ปริญญาตรี'	,
                    'ปริญญาโท',	
                    'ปริญญาเอก'	,
                    'สูงกว่าปริญญาเอก'	,
                    'อื่นๆ'	
                    
                ];
                //clear table
                $("#education").empty();
      
                   for (let i = 1; i < dataEducation.length; i++) {

                   
                       
                      const g = `<tr align="center">
                                      <td>${education[i]}</td>
                                      <td>${dataEducation[i]}</td>
                                  </tr>
                                  `;
                       $('#education').append(g);
                   }
      
                  /// end table 



                  
                  
        // start education chart
          var data = {
            labels: [
               
                'สถานภาพ',	
                'โสด'	,
                'สมรส',	
                'หย่าร้าง'
                    

            ],
            datasets: [
              {
                data: [  Data[0].s1, Data[0].s2,Data[0].s3 ],
                backgroundColor: [        
                    
                    '#ff4000',
                    '#ff8000',
                    '#ffbf00',
         
                  
                    
                    ],
                hoverBorderColor: ["#eee", "#eee"],
              },
            ],
          };

          var piectx = document
            .getElementById("piechart_status")
            .getContext("2d");

          Chart.defaults.font.family = "K2D";
          Chart.defaults.font.size = 10;

          var pieChart_Status = new Chart(piectx, {
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
                    padding: 1,
                  },
                },
              },
            },
          });
          pieChart_Status.update();
          // end education chart

                // start add value in table
                let dataStatus = [];

                dataStatus.push(Data[0].s1, Data[0].s2,Data[0].s3 );

                let status = [

                	
                    'โสด'	,
                    'สมรส',	
                    'หย่าร้าง',
                        
                    
                ];
                //clear table
                $("#status").empty();
      
                   for (let i = 1; i <dataStatus.length; i++) {

                   
                       
                      const g = `<tr align="center">
                                      <td>${status[i]}</td>
                                      <td>${dataStatus[i]}</td>
                                  </tr>
                                  `;
                       $('#status').append(g);
                   }
      
                  /// end table 



                                   
                  
        // start career chart
          var data = {
            labels: [
               
             
                'อาชีพ'	,
                'ข้าราชการ'	,
                'พนักงานรัฐวิสาหกิจ',	
                'พนักงานบริษัท',	
                'ธุรกิจส่วนตัว'	,
                'ค้าขาย',	
                'รับจ้าง/ลูกจ้าง',	
                'นิสิต/นักศึกษา',	
                'เกษตรกรรม/ปศุสัตว์/ประมง',	
                'เกษียณ/ว่างงาน',	
                'อื่นๆ'	
                    
                    

            ],
            datasets: [
              {
                data: [   Data[0].c1, Data[0].c2,Data[0].c3,Data[0].c4,Data[0].c5
                         ,Data[0].c6, Data[0].c7,Data[0].c8,Data[0].c9,Data[0].c10  ],
                backgroundColor: [        
                    
                    '#ff4000',
                    '#ff8000',
                    '#ffbf00',
                    '#ffff00',
                    '#bfff00',
                    '#80ff00',
                    '#40ff00',
                    '#00ff00',
                    '#00ff40',
         
                  
                    
                    ],
                hoverBorderColor: ["#eee", "#eee"],
              },
            ],
          };

          var piectx = document
            .getElementById("piechart_career")
            .getContext("2d");

          Chart.defaults.font.family = "K2D";
          Chart.defaults.font.size = 10;

          var pieChart_Career = new Chart(piectx, {
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
                    padding: 1,
                  },
                },
              },
            },
          });
          pieChart_Career.update();
          // end career chart

                // start add value in table
                let dataCareer = [];

                dataCareer.push(   Data[0].c1, Data[0].c2,Data[0].c3,Data[0].c4,Data[0].c5
                                  ,Data[0].c6, Data[0].c7,Data[0].c8,Data[0].c9,Data[0].c10 );

                let career = [

                    'อาชีพ'	,
                    'ข้าราชการ'	,
                    'พนักงานรัฐวิสาหกิจ',	
                    'พนักงานบริษัท',	
                    'ธุรกิจส่วนตัว'	,
                    'ค้าขาย',	
                    'รับจ้าง/ลูกจ้าง',	
                    'นิสิต/นักศึกษา',	
                    'เกษตรกรรม/ปศุสัตว์/ประมง',	
                    'เกษียณ/ว่างงาน',	
                    'อื่นๆ'	
                        
                        
                    
                ];
                //clear table
                $("#career").empty();
      
                   for (let i = 1; i < dataCareer.length; i++) {

                   
                       
                      const g = `<tr align="center">
                                      <td>${career[i]}</td>
                                      <td>${dataCareer[i]}</td>
                                  </tr>
                                  `;
                       $('#career').append(g);
                   }
      
                  /// end table 









      

        }
      })
      .catch((err) => {
        console.error(err);
      });
  }
}










	
	

	
	
    

    
    
    
    
    
    







