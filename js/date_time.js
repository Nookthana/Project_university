function date_time(id)
{
    var a = 'เวลา';
        date = new Date;
        year = date.getFullYear();
        year=year+543;
        month = date.getMonth();
        months = new Array('มกราคม',  'กุมภาพันธ์',  'มีนาคม',    
        'เมษายน',  'พฤษภาคม',  'มิถุนายน',    
        'กรกฎาคม',  'สิงหาคม',  'กันยายน',    
        'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        d = date.getDate();
        day = date.getDay();
        days = new Array('วันอาทิตย์ ที่', 'วันจันทร์ ที่', 'วันอังคาร ที่', 'วันพุธ ที่', 'วันพฤหัสบดี ที่', 'วันศุกร์ ที่', 'วันเสาร์ ที่');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = '<i class="fa-solid fa-clock"></i>&nbsp;'+''+days[day]+'  '+d+' '+months[month]+'  '+year+' '+a+' '+h+':'+m+':'+s;
       
        document.getElementById(id).innerHTML = result;
     
        setTimeout('date_time("'+id+'");','1000');
       
        return true;
}

