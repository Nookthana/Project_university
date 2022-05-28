
let pageEX  = 1;



function SetPageEx(page){

    pageEX = page;


}
// func excel
function ReportExCell(){

 
    let id_year = parseInt($("#year").val());
    let id_loc = parseInt($("#village").children(":selected").attr("id"));


    const Data = {
        id_loc: id_loc,
        id_year: id_year,
        page: pageX

    };

    axios.post('../api/report_excel/data_village.php',Data)
    .then(res => {
        if (res.data.status == 200) {
    
            window.open("../api/report_excel/report_village.php", "_blank");
    
            
        }
    })
    .catch(err => {
        console.error(err); 
    })
    }