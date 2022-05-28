// year all in array of sql
let DataYear = [];
// array year
let DataYearArray = [];
// array year for check
let arrayY = [];
//first in dex array for check default
let firstArray = 0;
//last in dex array for check default
let lastArray = 0;
//Index for chk
let FirstIndex = 0;
let LastIndex = 0;
//array check value pagination
let ArrayYear = [];
//value for year to Search
let dataYear = { year1: 0, year2: 0, year3: 0 };

//axios fetch  all year of SQl
axios
  .post("../api/result_year/all_year.php", { withCredentials: true })
  .then((res) => {
    //true
    if (res.data.status == 200) {
      const Data_year_all = res.data.data;
      //push data to array
      DataYear.push(Data_year_all);
      //loop data to new array year
      for (let i = 0; i < DataYear[0].length; i++) {
        DataYearArray.push(Object.values(DataYear[0][i]));
      }
      //length array for chk push
      rowCountArray = DataYearArray.length;
      //loop add value to array
      for (let index of DataYearArray) {
        arrayY.push(parseInt(index[0]));
      }
      //length array for check
      length = arrayY.length;
      //assign value first in dex array
      firstArray = parseInt(arrayY[0]);
      //assign value last in dex array
      lastArray = parseInt(arrayY[arrayY.length - 1]);
      // push year data
      DataYearArray.push(DataYear);
      //for calculate pagination
      FirstIndex = arrayY.length;
      LastIndex = 1;
      //call function to set default data
      SetDefaultButtonPagination();
    }
  })
  .catch((err) => {
    console.error(err);
  });

// func SetData
function SetData(dataYear) {
  //axios fetch data to table
  axios
    .post("../api/result_year/table_data_year.php", dataYear)
    .then((res) => {
      if (res.data.status == 200) {
        const disease = res.data.data;

        //summary of year value
        let summaryYear1 = 0;
        let summaryYear2 = 0;
        let summaryYear3 = 0;
        //Average of year value
        let averRageYear1 = [];
        let averRageYear2 = [];
        let averRageYear3 = [];
        // for calculate Average of year value
        let Array_value_year1 = [];
        let Array_value_year2 = [];
        let Array_value_year3 = [];

        let Row = 0;

        let dataSet = [];
        // Summary of all year
        for (let i = 0; i < disease.length; i++) {
          Row += 1;
          summaryYear1 += parseInt(disease[i].year1);
          summaryYear2 += parseInt(disease[i].year2);
          summaryYear3 += parseInt(disease[i].year3);

          Array_value_year1.push(parseInt(disease[i].year1));
          Array_value_year2.push(parseInt(disease[i].year2));
          Array_value_year3.push(parseInt(disease[i].year3));
        }

        // Average of all year
        for (let j = 0; j < disease.length; j++) {
          averRageYear1.push(
            parseFloat((Array_value_year1[j] * 100) % summaryYear1).toFixed(2) +
              " %"
          );
          averRageYear2.push(
            parseFloat((Array_value_year2[j] * 100) % summaryYear2).toFixed(2) +
              " %"
          );
          averRageYear3.push(
            parseFloat((Array_value_year3[j] * 100) % summaryYear3).toFixed(2) +
              " %"
          );
        }

        //loop data set
        for (let k = 0; k < disease.length; k++) {
          dataSet.push([
            disease[k].disease,
            disease[k].name_disease,
            disease[k].year1,
            averRageYear1[k],
            disease[k].year2,
            averRageYear2[k],
            disease[k].year3,
            averRageYear3[k],
          ]);
        }

        // display dataTable

        $("#example").DataTable({
          data: dataSet,
          iDisplayLength: Row,
          destroy: true,
          lengthChange: false,
          columnDefs: [{ className: "dt-center", targets: "_all" }],
          columns: [
            { title: "ลำดับ" },
            { title: "ชื่อโรค" },
            { title: "ปี " + dataYear.year1 + " (คน)" },
            { title: "ร้อยล่ะ(%)" },
            { title: "ปี " + dataYear.year2 + " (คน)" },
            { title: "ร้อยล่ะ(%)" },
            { title: "ปี " + dataYear.year3 + " (คน)" },
            { title: "ร้อยล่ะ(%)" },
          ],
        });

        //call func create chart
        SetChart(dataYear);

      }
    })
    .catch((err) => {
      console.error(err);
    });
}
//Referent id btn next
const BtnNext = document.getElementById("Btn_next");
const BtnPrevious = document.getElementById("Btn_previous");

// function previous
function Previous() {
  //last index array
  lastArray = parseInt(arrayY[arrayY.length - 1]);
  // pop value in array arrayY
  arrayY.pop();
  // push to new array
  ArrayYear.push(lastArray);

  //set Data for Search
  dataYear = {
    year1: parseInt(arrayY[arrayY.length - 3]),
    year2: parseInt(arrayY[arrayY.length - 2]),
    year3: parseInt(arrayY[arrayY.length - 1]),
  };

  // check for display button none pagination
  if (arrayY.length == 3) {
    //true
    BtnPrevious.disabled = true;
    BtnNext.disabled = false;
  } else {
    //false
    BtnPrevious.disabled = false;
  }

  // set data to function SetData
  SetData(dataYear);
}

//function next
function Next() {
  //last index array
  lastArray = parseInt(ArrayYear[ArrayYear.length - 1]);
  //pop index array
  ArrayYear.pop();
  //push to array arrayY for next
  arrayY.push(lastArray);
  //data year
  dataYear = {
    year1: parseInt(arrayY[arrayY.length - 3]),
    year2: parseInt(arrayY[arrayY.length - 2]),
    year3: parseInt(arrayY[arrayY.length - 1]),
  };

  // check for display button none pagination
  if (arrayY.length == length) {
    //true
    BtnNext.disabled = true;
    BtnPrevious.disabled = false;
  } else {
    //false
    BtnNext.disabled = false;
  }

  // set data to function SetData
  SetData(dataYear);
}

//function set default button pagination
function SetDefaultButtonPagination() {
  //last index array
  lastArray = parseInt(arrayY[arrayY.length - 1]);
  //data year
  dataYear = {
    year1: parseInt(arrayY[arrayY.length - 3]),
    year2: parseInt(arrayY[arrayY.length - 2]),
    year3: parseInt(arrayY[arrayY.length - 1]),
  };

  //check for display button block
  if (arrayY.length == length) {
    //true
    BtnNext.disabled = true;
  } else {
    //false
    BtnNext.disabled = false;
  }
  //call function SetData
  SetData(dataYear);
}

//function SetDataChart
function SetChart(dataYear) {






  axios.post("../api/result_year/table_data_year.php",dataYear)
  .then(res => {
    if (res.data.status == 200) {

      const Disease = res.data.data;
      let title = [];
      let Year1 = [];
      let Year2 = [];
      let Year3 = [];
 

      for (let i = 0; i < Disease.length; i++) {

        title.push(Disease[i].name_disease);
        Year1.push(Disease[i].year1);
        Year2.push(Disease[i].year2);
        Year3.push(Disease[i].year3);

        
      }


     
  // Year1  remove and add
  $("#PieYear1").remove();
  $("#Year1").append('<canvas id="PieYear1" ></canvas>');

  //Year2 remove and add
  $("#PieYear2").remove();
  $("#Year2").append('<canvas id="PieYear2" ></canvas>');

  //Year3  remove and add
  $("#PieYear3").remove();
  $("#Year3").append('<canvas id="PieYear3" ></canvas>');

  // Start chart Year1
  var data = {
    labels: title,
    datasets: [
      {
        data: Year1,
        backgroundColor: [
          'rgb(0, 255, 0)',
          'rgb(0, 255, 64)',
          'rgb(0, 255, 128)',
          'rgb(0, 255, 191)',
          'rgb(0, 255, 255)',
          'rgb(0, 191, 255)',
          'rgb(0, 128, 255)',
          'rgb(0, 64, 255)',
          'rgb(0, 0, 255)',
          'rgb(64, 0, 255)',
          'rgb(128, 0, 255)',
          'rgb(191, 0, 255)',
          'rgb(255, 0, 255)',
          'rgb(255, 0, 191)',
          'rgb(255, 0, 128)',
          'rgb(255, 0, 64)',
        ],
        hoverBorderColor: ["#eee", "#eee"],
      },
    ],
  };

  var piectx = document.getElementById("PieYear1").getContext("2d");

  Chart.defaults.font.family = "K2D";
  Chart.defaults.font.size = 8;

  var Year_1 = new Chart(piectx, {
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
          position: "left",
          align: "middle",
          labels: {
            padding: 1,
          },
        },
      },
    },
  });

  Year_1.update();
  // end chart Year1


  // Start chart Year2
  var data = {
    labels: title,
    datasets: [
      {
        data: Year2,
        backgroundColor: [
          'rgb(0, 255, 0)',
          'rgb(0, 255, 64)',
          'rgb(0, 255, 128)',
          'rgb(0, 255, 191)',
          'rgb(0, 255, 255)',
          'rgb(0, 191, 255)',
          'rgb(0, 128, 255)',
          'rgb(0, 64, 255)',
          'rgb(0, 0, 255)',
          'rgb(64, 0, 255)',
          'rgb(128, 0, 255)',
          'rgb(191, 0, 255)',
          'rgb(255, 0, 255)',
          'rgb(255, 0, 191)',
          'rgb(255, 0, 128)',
          'rgb(255, 0, 64)',
        ],
        hoverBorderColor: ["#eee", "#eee"],
      },
    ],
  };

  var piectx2 = document.getElementById("PieYear2").getContext("2d");

  Chart.defaults.font.family = "K2D";
  Chart.defaults.font.size = 8;

  var Year_2 = new Chart(piectx2, {
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
          position: "left",
          align: "middle",
          labels: {
            padding: 1,
          },
        },
      },
    },
  });

  Year_2.update();
  // end chart Year2
      

    // Start chart Year3
    var data = {
      labels: title,
      datasets: [
        {
          data: Year3,
          backgroundColor: [
            'rgb(0, 255, 0)',
            'rgb(0, 255, 64)',
            'rgb(0, 255, 128)',
            'rgb(0, 255, 191)',
            'rgb(0, 255, 255)',
            'rgb(0, 191, 255)',
            'rgb(0, 128, 255)',
            'rgb(0, 64, 255)',
            'rgb(0, 0, 255)',
            'rgb(64, 0, 255)',
            'rgb(128, 0, 255)',
            'rgb(191, 0, 255)',
            'rgb(255, 0, 255)',
            'rgb(255, 0, 191)',
            'rgb(255, 0, 128)',
            'rgb(255, 0, 64)',
          ],
          hoverBorderColor: ["#eee", "#eee"],
        },
      ],
    };
  
    var piectx2 = document.getElementById("PieYear3").getContext("2d");
  
    Chart.defaults.font.family = "K2D";
    Chart.defaults.font.size = 10;
  
    var Year_3 = new Chart(piectx2, {
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
            position: "left",
            align: "middle",
            labels: {
              padding: 1,
            },
          },
        },
      },
    });
  
    Year_3.update();
    // end chart Year3
        
    }
  })
  .catch(err => {
    console.error(err); 
  })
  
}

function ReportYearPDF(){





  axios.post('../api/export_disease_year/disease_of_year.php',dataYear)
  .then(res => {
        if (res.data.status == 200) {

          window.open("../api/export_disease_year/report_disease_year.php", "_blank");
          
        }
  })
  .catch(err => {
    console.error(err); 
  })
}

function ReportYearExCell(){

  

  axios.post('../api/export_disease_year/disease_of_year.php',dataYear)
  .then(res => {
    if (res.data.status == 200) {

      window.open("../api/export_disease_year/excel_disease.php", "_blank");
      
    }
  })
  .catch(err => {
    console.error(err); 
  })

}

