
// axios post api village
axios.post('../api/village/village.php',{ withCredentials: true })
.then(res => {
    if (res.data.status == 200) {
            const Data = res.data.data;

            Data.forEach( e =>{
                const v = `
                          <tr>
                            <td>${e.id}</td>
                            <td>${e.village}</td>
                            <td><button class="button is-warning is-rounded update-modal" onclick="Edit(${e.id});">แก้ไข</button></td>
                            <td><button  class="button is-danger is-rounded" onclick="Delete(${e.id});">ลบ</button></td>
                          <tr>  
                        `;

                        $('#result_village').append(v);

            });
    }
})
.catch(err => {
    console.error(err); 
})



//function edit
function Edit(id){

    const data = {
                    id: id
                    };

        axios.post('../api/village/all_village.php',data)
        .then(res => {
            if (res.data.status == 200) {
                const Data = res.data.data;
               // console.log(Data[0]);

                // modal js edit village


                $(".update-modal").show(function () { 
             
                    $("#update-modal").addClass("is-active");
                    $("#update-text").val($("#target-text").text());
                    $('#Lat').val(Data[0].latitude);
                    $('#Lng').val(Data[0].longitude);
                    $('#title').text(Data[0].village);
                    $('#id_village').text(Data[0].id);
                    $('#village').val(Data[0].village);
                    $('#history').val(Data[0].detail);
                    $('#address').val(Data[0].address);
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
        .catch(err => {
            console.error(err); 
        })
}


// function delete
function Delete(){


}



// Initialize and add the map
function initMap() {
    const Phetchaburi  = { lat: 13.069721, lng: 99.975762};
    mapOptions = {
      zoom: 8,
      center: Phetchaburi,
      mapTypeId: 'satellite'
    }
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
  
    var infowindow = new google.maps.InfoWindow();
    const iconimg = '../img/marker.png';
  
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

          // The marker, positioned at phetburi
        const marker = new google.maps.Marker({
          position: Phetchaburi,
          map: map,
          icon: iconimg
        });

        // This placeMaker to func
        map.addListener('click', function(e) {
          placeMarkerAndPanTo(e.latLng,map);
         
         //console.log(e.latLng,map);

         showDisplay(e.latLng); 
  
       });
  
        

    var icons = {
      university: {
          name: 'หมุดปักตำแหน่งบนแผนที่',
          icon: '../img/marker.png',
          color: '&nbsp;&nbsp;&nbsp;&nbsp;<span class="tag is-link is-rounded">'
        },
      };

    var legend = document.getElementById('legend');


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


        // placeMarker
    function placeMarkerAndPanTo(latLng, map) {

      if (!marker || !marker.setPosition ) {


        var image = '../picture/markerblue.gif'
        
       
           
        marker = new google.maps.Marker({
        position: latLng,
          map: map,
          icon: image
                });


           

  }else {
 
  

        marker.setPosition(latLng);

     // console.log(latLng);
  }
                              
  }


}

// show input Lat Lng
function showDisplay(latLng){
  const lat = latLng.lat();
  const lng = latLng.lng();

  $('#Lat').val(lat);
  $('#Lng').val(lng);

  //console.log(lat,lng);
}
  


function SaveData(){

  const data = {
      id: $('#id_village').text(),
      latitude: $('#Lat').val(),
      longitude: $('#Lng').val(),
      village: $('#village').val(),
      detail: $('#history').val(),
      address: $('#address').val()

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
      axios.post('../api/village/update_village.php',data)
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




//func Delete

function Delete(id){


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


let id_village = 0;
  //axios get id last record

    axios.post('../api/village/last_record.php',{ withCredentials: true })
    .then(res => {
      if (res.data.status == 200) {
        Data = res.data.data;
        id_village = parseInt(Data[0].id);
        id_village += 1 ;
        $('#id_village').text(id_village);
        
        
      }
    })
    .catch(err => {
      console.error(err); 
    })


function InsertData() {
    
  if ($('#Lat').val().length <=0 && $('#Lng').val().length <=0) {

    Swal.fire({
      icon: 'warning',
      text: 'กรุณาปักหมุด',
      timer: 2000,
      showConfirmButton:false

    })

  }else if($('#village').val().length <=0){

    Swal.fire({
      icon: 'warning',
      text: 'กรุณากรอกชื่อชุมชน',
      timer: 2000,
      showConfirmButton:false

    })

  }else if($('#history').val().length <=0){

    Swal.fire({
      icon: 'warning',
      text: 'กรุณากรอกประวัติพื้นที่',
      timer: 2000,
      showConfirmButton:false

    })

  }else if($('#address').val().length <=0){

    Swal.fire({
      icon: 'warning',
      text: 'กรุณากรอกที่อยู่',
      timer: 2000,
      showConfirmButton:false

    })

  }else{

    const data = {

      latitude: $('#Lat').val(),
      longitude: $('#Lng').val(),
      village: $('#village').val(),
      detail: $('#history').val(),
      address: $('#address').val()

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


      // axios post create data
      axios.post('../api/village/create_village.php',data)
      .then(res => {
        if (res.data.status == 200) {
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
