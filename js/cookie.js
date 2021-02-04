//设置cookie
function setCookie(key, val, day = 0, path = "/") {
    if(day) {
        var date = new Date();
        date.setDate(date.getDate()+day);
        document.cookie = key + "=" + val + ";expires=" + date.toUTCString() + ";path=" + path;
    }else{
        document.cookie = key + "=" + val + ";path=" + path;
    }
}


//拆解cookie
function getCookie(key){
    var cookie = document.cookie;
    if(cookie){
        var dateList = cookie.split("; ");
        for(var i = 0;i<dateList.length;i++){
            var item = dateList[i];
            var attr = item.split("=")[0];
            var val = item.split("=")[1];
            if(key==attr){
                return val;
            }
        }
    }
    return "";
}

function delCookie(key) {
    setCookie(key, "", -1);
}