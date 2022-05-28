
let pageX  = 1;



function SetPagePdf(page){

    pageX = page;


}

function ReportPDF(){


    let id_year = parseInt($("#year").val());
    let id_loc = parseInt($("#village").children(":selected").attr("id"));


    const Data = {
        id_loc: id_loc,
        id_year: id_year,
        page: pageX

    };

axios.post('../api/report_pdf/data_village.php',Data)
.then(res => {
    if (res.data.status == 200) {

        window.open("../api/report_pdf/report_village.php", "_blank");

        
    }
})
.catch(err => {
    console.error(err); 
})
}