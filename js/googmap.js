
let  data_location = [];
let  people = [];
let  calculate_percent = [];
let  summary = 0;
let  classSet = [];
let  year_modal = [];
let  data_id = 0;
let  y = 2563;
let  count = false;
let  callFunc = false;
  


// axios fet year
axios.post('../api/year/year.php', { withCredentials: true })
.then(res => {
  if (res.data.status == 200) {
    const y = res.data.data;

    y.forEach(e => {

         if (e.id_year == 2563) {

             const year = `<option selected="selected">${e.id_year}</option>`;
             $('#modal_year').append(year);

         }else{

            const year = `<option>${e.id_year}</option>`;
            $('#modal_year').append(year);

         }
    


      
      
    });
    
  }
})
.catch(err => {
  console.error(err); 
})

// funcion set data from year
function GetDataYear(y) {

  if (y == 2563 && count == false) {

    let data = {
      year: y,
      id_loc: data_id
  
    };
        count = false;

        FetDataYear(data);

  }else{

    let year = document.getElementById("modal_year").value;
    let data = {
      year: year,
      id_loc: data_id
  
    };


      FetDataYear(data);

  }

}

// func fet data year real
function FetDataYear(data) {
  
  axios.post('../api/result_of_modal/result_of_village.php',data)
  .then(res => {
    if (res.data.status == 200) {


          const Data = res.data.data;
          //console.log(Data[0]);
          
     
          // Gender jqury remove and add
          $('#piechart_gender').remove();
          $('#Gender').append('<canvas id="piechart_gender" ></canvas>');

          //Old jqury remove and add
          $('#piechart_old').remove();
          $('#Old').append('<canvas id="piechart_old" ></canvas>');

          //Old jqury remove and add
          $('#piechart_disease').remove();
          $('#disease').append('<canvas id="piechart_disease" ></canvas>');

          
          //Education jqury remove and add
          $('#piechart_education').remove();
          $('#education').append('<canvas id="piechart_education" ></canvas>');

            //Status jqury remove and add
          $('#piechart_status').remove();
          $('#status').append('<canvas id="piechart_status" ></canvas>');
 
             
            //Career jqury remove and add
          $('#piechart_career').remove();
          $('#career').append('<canvas id="piechart_career" ></canvas>');
 
 

 

        // start gender chart
        var data = {
            labels: [
                "ชาย",
                "หญิง",
                
            ],
            datasets: [
                {
                    data: [Data[0].gender1,Data[0].gender2],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB"
                    ],
                                hoverBorderColor: [
                                          "#eee","#eee"														
                                ]
                }]
        };
      
        var piectx = document.getElementById("piechart_gender").getContext("2d");

        Chart.defaults.font.family = "K2D";
        Chart.defaults.font.size = 10;
    

        var pieChart_gender = new Chart(piectx,{
            type: 'pie',
            data: data,
                options: { 
                  showAllTooltips: true,
                        animation: {
                    animateRotate: true,
                            animateScale: true
                        }, 
                     elements: {
                          arc: {
                            borderColor: "#fff"
                          }
                        } ,plugins: {
                          legend: {
                            position: "left",
                            align: "middle",
                            labels: {
                              padding: -20,
                          }
                        }
                      }      
            }
        });
        pieChart_gender.update();
        // end gender chart


             
        // start Old chart
        var data = {
          labels: [
           ' อายุ ต่ำกว่า 20 ปี',
            'อายุระหว่าง 21 - 30 ปี',
           ' อายุระหว่าง 31 - 40 ปี',
           ' อายุระหว่าง 41 - 50 ปี',
           ' อายุระหว่าง 51 - 59 ปี',
            'อายุ 60 ปีขึ้นไป'
          ],
          datasets: [
              {
                data: [Data[0].age1,Data[0].age2,Data[0].age3,Data[0].age4,Data[0].age5,Data[0].age6],

                  backgroundColor: [
                      "#ff0000",
                      "#ff4000",
                      "#ff8000",
                      "#ffbf00",
                      "#ffff00",
                      "#bfff00",
                  ],
                              hoverBorderColor: [
                                        "#eee","#eee"														
                              ]
              }]
      };
    
      var pieold = document.getElementById("piechart_old").getContext("2d");

      Chart.defaults.font.family = "K2D";
      Chart.defaults.font.size = 10;
    

      var pieChart_old = new Chart(pieold,{
          type: 'pie',
          data: data,
              options: { 
                showAllTooltips: true,
                      animation: {
                  animateRotate: true,
                          animateScale: true
                      }, 
                   elements: {
                        arc: {
                          borderColor: "#fff"
                        }
                      }  ,plugins: {
                        legend: {
                          position: "left",
                          align: "middle",
                   
                          labels: {
                            padding: -30,
                        }
        
                      } 
                                   
          }
              }
      });
      pieChart_old.update();
      // end Old chart

             
        // start Disease chart
        var data = {
          labels: [
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

                  data: [Data[0].d1,Data[0].d2,Data[0].d3,Data[0].d4,Data[0].d5,Data[0].d6,
                         Data[0].d7,Data[0].d8,Data[0].d9,Data[0].d10,Data[0].d11,Data[0].d12,
                         Data[0].d13,Data[0].d14,Data[0].d15,Data[0].d16,Data[0].d17],

                  backgroundColor: [
                      "#ff0000",
                      "#ff4000",
                      "#ff8000",
                      "#ffbf00",
                      "#ffff00",
                      "#bfff00",
                      "#00ff40",
                      "#00ffbf",
                      "#00ffff",
                      "#00bfff",
                      "#0080ff",
                      "#0040ff",
                      "#0000ff",
                      "#4000ff",
                      "#8000ff",
                      "#bf00ff",
                      "#ff00ff",
                  ],
                              hoverBorderColor: [
                                        "#eee","#eee"														
                              ]
              }]
      };
    
      var piedisease = document.getElementById("piechart_disease").getContext("2d");

      Chart.defaults.font.family = "K2D";
      Chart.defaults.font.size = 10;
    

      var pieChart_disease= new Chart(piedisease,{
          type: 'pie',
          data: data,
              options: { 
                showAllTooltips: true,
                      animation: {
                  animateRotate: true,
                          animateScale: true
                      }, 
                   elements: {
                        arc: {
                          borderColor: "#fff"
                        }
                      }  ,plugins: {
                        legend: {
                          position: "left",
                          align: "middle",
                   
                          labels: {
                            padding: -25,
                        }
        
                      } 
                                   
          }
              }
      });
      pieChart_disease.update();
      // end Disease chart


              // start Education chart
              var data = {
                labels: [
                  'ต่ำกว่าประถมศึกษา',
                  'ประถมศึกษา',
                  'มัธยมศึกษาตอนต้น/หรือเทียบเท่า',
                  'มัธยมศึกษาตอนปลาย/หรือเทียบเท่า',
                  'อนุปริญญา/ ปวส. หรือเทียบเท่า',
                  'ปริญญาตรี',
                  'ปริญญาโท',
                  'ปริญญาเอก',
                  'สูงกว่าปริญญาเอก',
                  'อื่นๆ',

                ],
                datasets: [
                    {
      
                        data: [Data[0].e1,Data[0].e2,Data[0].e3,Data[0].e4,Data[0].e5,Data[0].e6,
                               Data[0].e7,Data[0].e8,Data[0].e9,Data[0].e10],
      
                        backgroundColor: [
                      
                            "#ff8000",
                            "#ffbf00",
                            "#ffff00",
                            "#bfff00",
                            "#00ff40",
                            "#00ffbf",
                            "#00ffff",
                            "#00bfff",
                            "#0080ff",
                            "#0040ff",
                                                               
                        ],
                                    hoverBorderColor: [
                                              "#eee","#eee"														
                                    ]
                    }]
            };
          
            var pieeducation = document.getElementById("piechart_education").getContext("2d");
      
            Chart.defaults.font.family = "K2D";
            Chart.defaults.font.size = 10;
          
      
            var pieChart_education= new Chart(pieeducation,{
                type: 'pie',
                data: data,
                    options: { 
                      showAllTooltips: true,
                            animation: {
                        animateRotate: true,
                                animateScale: true
                            }, 
                         elements: {
                              arc: {
                                borderColor: "#fff"
                              }
                            }  ,plugins: {
                              legend: {
                                position: "left",
                                align: "middle",
                         
                                labels: {
                                  padding: -25,
                              }
              
                            } 
                                         
                }
                    }
            });
            pieChart_education.update();
            // end Education chart


            
              // start Status chart
              var data = {
                labels: [
                  'โสด',
                  'สมรส',
                  'หย่าร้าง',

                ],
                datasets: [
                    {
      
                        data: [Data[0].s1,Data[0].s2,Data[0].s3],
      
                        backgroundColor: [
                      
                        
                            "#bfff00",
                            "#00ff40",
                            "#00ffbf",
                       
                                                               
                        ],
                                    hoverBorderColor: [
                                              "#eee","#eee"														
                                    ]
                    }]
            };
          
            var piestatus = document.getElementById("piechart_status").getContext("2d");
      
            Chart.defaults.font.family = "K2D";
            Chart.defaults.font.size = 10;
          
      
            var pieChart_status= new Chart(piestatus,{
                type: 'pie',
                data: data,
                    options: { 
                      showAllTooltips: true,
                            animation: {
                        animateRotate: true,
                                animateScale: true
                            }, 
                         elements: {
                              arc: {
                                borderColor: "#fff"
                              }
                            }  ,plugins: {
                              legend: {
                                position: "left",
                                align: "middle",
                         
                                labels: {
                                  padding: -25,
                              }
              
                            } 
                                         
                }
                    }
            });
            pieChart_status.update();
            // end Status chart
      

                          // start career chart
                          var data = {
                            labels: [
                              'ข้าราชการ',
                              'พนักงานรัฐวิสาหกิจ',
                              'พนักงานบริษัท',
                              'ธุรกิจส่วนตัว',
                              'ค้าขาย',
                              'รับจ้าง/ลูกจ้าง',
                              'นิสิต/นักศึกษา',
                              'เกษตรกรรม/ปศุสัตว์/ประมง',
                              'เกษียณ/ว่างงาน',
                              'อื่นๆ',
            
                            ],
                            datasets: [
                                {
                  
                                    data: [Data[0].e1,Data[0].e2,Data[0].e3,Data[0].e4,Data[0].e5,Data[0].e6,
                                           Data[0].e7,Data[0].e8,Data[0].e9,Data[0].e10],
                  
                                    backgroundColor: [
                                  
                                        "#ff8000",
                                        "#ffbf00",
                                        "#ffff00",
                                        "#bfff00",
                                        "#00ff40",
                                        "#00ffbf",
                                        "#00ffff",
                                        "#00bfff",
                                        "#0080ff",
                                        "#0040ff",
                                                                           
                                    ],
                                                hoverBorderColor: [
                                                          "#eee","#eee"														
                                                ]
                                }]
                        };
                      
                        var piecareer = document.getElementById("piechart_career").getContext("2d");
                  
                        Chart.defaults.font.family = "K2D";
                        Chart.defaults.font.size = 10;
                      
                  
                        var pieChart_career= new Chart(piecareer,{
                            type: 'pie',
                            data: data,
                                options: { 
                                  showAllTooltips: true,
                                        animation: {
                                    animateRotate: true,
                                            animateScale: true
                                        }, 
                                     elements: {
                                          arc: {
                                            borderColor: "#fff"
                                          }
                                        }  ,plugins: {
                                          legend: {
                                            position: "left",
                                            align: "middle",
                                     
                                            labels: {
                                              padding: -25,
                                          }
                          
                                        } 
                                                     
                            }
                                }
                        });
                        pieChart_career.update();
                        // end career chart

      

        
    }
  })
  .catch(err => {
    console.error(err); 
  })


}

// axios fet location

function AxiosCall(){

axios.post('../api/googlemap/detail_location.php', { withCredentials: true })
.then(res => {
  if (res.data.status == 200) {

    const ArrayLocation = res.data.data;
   for (let i = 0; i < ArrayLocation.length; i++) {
     
    data_location.push({
      id: ArrayLocation[i].id,
      address: ArrayLocation[i].address,
      village: ArrayLocation[i].village,
      lat: ArrayLocation[i].latitude,
      lng: ArrayLocation[i].longitude,
      detail: ArrayLocation[i].detail
    });

     //console.log(data_location[i].lat,data_location[i].lng);
      // console.log(data_location[i].village);
   }// end for

  }// end if
})
.catch(err => {
  console.error(err); 
})



// axios fet count  people



axios.post('../api/village_count/count_people.php', { withCredentials: true })
.then(res => {
  if (res.data.status == 200) {
   const p = res.data.data;
       for (let i = 0; i < p.length; i++) {

        people.push({
  
          person: p[i].person

        });

        //console.log(people[i].person);
       }// end for
       Calculate(people);
       } // end if

})
.catch(err => {
  console.error(err); 
})

}

function Calculate(people) {

    for (let i = 0; i < people.length; i++) {
      //console.log(people[i].person);

    summary += parseInt(people[i].person);

      
      
    }

    for (let j = 0; j < people.length; j++) {
    
      calculate_percent.push((100 * people[j].person) / summary);

     // console.log(calculate_percent[j].toFixed(2));

    }
 
   //call func
  SetClass(calculate_percent);
}


function SetClass(calculate_percent) {

  for (let c = 0; c < people.length; c++) {

    if (calculate_percent[c].toFixed(2) > 0 && calculate_percent[c].toFixed(2) <= 25 ) {
      classSet.push('circle-primary');

    }else if(calculate_percent[c].toFixed(2) > 25 && calculate_percent[c].toFixed(2) <= 50){

      classSet.push('circle-warning');

    }else if(calculate_percent[c].toFixed(2) > 50 && calculate_percent[c].toFixed(2) <= 75){
  
      classSet.push('circle-orange');

  }else if(calculate_percent[c].toFixed(2) > 75 && calculate_percent[c].toFixed(2) <= 100){
  
    classSet.push('circle-red');
}

  //console.log(classSet[c]);
}
  
  callFunc = true;
  initMap()

}

//end axios set data for google map


// Initialize and add the map
function initMap() {



  if (callFunc == false) {


    AxiosCall();

  }else{


  const Phetchaburi  = { lat: 13.069721, lng: 99.975762};
  mapOptions = {
    zoom: 8,
    center: Phetchaburi,
    mapTypeId: 'satellite'
  }
  var map = new google.maps.Map(document.getElementById('map'), mapOptions);

  var infowindow = new google.maps.InfoWindow();

//set time zoom
  setTimeout(function () {
            map.setZoom(11);
            map.setCenter(Phetchaburi);
        }, 2000);
//coodinate PhetburiPrachuap
    phetchaburiKML = new geoXML3.parser({
            map: map,
            processStyles: true,
            zoom: false
        });
        phetchaburiKML.parse("../kml/PhetburiPrachuap.kml");
                            

//start loop location
  for (i = 0; i < data_location.length; i++) {
          let icon ='';
    //check icon position
        if (i == 3) {
          icon = '../img/PBRU-Logo.png';

        }else{

           icon = '../img/homepage.png';
        }
          // contend display
          const contentString =         
          `<div class="map-info-window" align="center">       
          <span class="tag is-info is-light is-rounded">&nbsp;<i class="fa-solid fa-house-chimney"></i>&nbsp;`+data_location[i].village+` </span>
                <!-- Example 5% -->
                <div class="flx-item">
                  <svg class="circle-progress" viewBox="0 0 36 36">
                    <path class='`+classSet[i]+`' d="M18 2a16 16 0 010 32 16 16 0 010-32" stroke-dasharray="`+calculate_percent[i].toFixed(2)+`, 100"></path>
                    <text class='circle-text' x="50%" y="50%">`+calculate_percent[i].toFixed(2)+`%</text>
                  </svg>
                </div>
              </div>
            </div>`;
    

 

          //set marker

      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(data_location[i].lat, data_location[i].lng),
        animation: google.maps.Animation.DROP,
        map: map,
        icon: icon,
      });
     
     

      var infowindow = new google.maps.InfoWindow({
        content: contentString,
 
      });
 
      infowindow.open(map, marker);


      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
     
          //assign value location
          data_id = data_location[i].id;
          GetDataYear(data_id);

          //start modal 
            $("#update-modal").addClass("is-active");
            $("#update-text").val($("#target-text").text());
            $("#title_village").text(' ชุมชน '+data_location[i].village);
            $("#history_village").text(data_location[i].detail);
            $("#address").text(data_location[i].address);
            $("#lat_lng").text(data_location[i].lat+' , '+data_location[i].lng);
       
          
          $(".update-modal-close").click(function (e) {
            e.preventDefault();
            $("#update-modal").removeClass("is-active");
          });
          
          //end modal 
        
        }
      })(marker, i));
    
    
  }


 



  var icons = {
    university: {
        name: 'มหาวิทยาลัยราชภัฏเพชรบุรี',
        icon: '../img/PBRU-Logo.png',
        color: '&nbsp;&nbsp;&nbsp;&nbsp;<span class="tag is-link is-rounded">'
      },

      home_level1: {
        name: 'ชุมชนมีความเสี่ยงเป็นโรคระดับน้อย',
        icon: '../img/lv1.png',
        color: '&nbsp;&nbsp;<span class="tag is-primary is-rounded">'
      },
        home_level2: {
          name: 'ชุมชนมีความเสี่ยงเป็นโรคระดับปานกลาง',
          icon: '../img/lv2.png',
          color: '&nbsp;&nbsp;<span class="tag is-warning is-rounded">'
        },
        home_level3: {
          name: 'ชุมชนมีความเสี่ยงเป็นโรคระดับมาก',
          icon: '../img/lv3.png',
          color: '&nbsp;&nbsp;<span class="tag is-orange is-rounded">'
        },
        home_level4: {
          name: 'ชุมชนมีความเสี่ยงเป็นโรคระดับมากที่สุด',
          icon: '../img/lv4.png',
          color: '&nbsp;&nbsp;<span class="tag is-danger is-rounded">'
        },

  };
  var legend = document.getElementById('legend');
  var cock = document.getElementById('date_time');
  
     

      for (var key in icons) {
      var type = icons[key];
      var name = type.name;
      var icon = type.icon;
      var color = type.color;
      var div = document.createElement('div');
      div.innerHTML ='<img src="'+icon+'">'+color+name+'</span>';
      legend.appendChild(div);
    
      }

    map.controls[google.maps.ControlPosition.LEFT_TOP].push(legend);
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(cock);


  }

}





