function getCookie(c_name){
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1){
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1){
        c_value = null;
    }else{
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1){
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}
 
// function setCookie(c_name,value,exdays){
//     var exdate=new Date();
//     exdate.setDate(exdate.getDate() + exdays);
//     var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString()); + "path=/";
//     document.cookie=c_name + "=" + c_value;
// }

function setCookie(c_name,value,exdays)
{
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays===null)
                                 ? "" : "; expires="+exdate.toUTCString())
                                + "; path=/";
    document.cookie=c_name + "=" + c_value;
}

function AceptoCookies(){
    setCookie('cookieaccepted','yes',365);
    document.getElementById("barraaceptacion").style.display="none";
    document.getElementById("cambio-a-no").style.display="block";
    document.getElementById("cambio-a-yes").style.display="none";
    location.reload(true);
}
function NoAceptoCookies(){
    setCookie('cookieaccepted','no',365);
    document.getElementById("barraaceptacion").style.display="none";
    document.getElementById("cambio-a-yes").style.display="block";
    document.getElementById("cambio-a-no").style.display="none";
}
function CambioAAceptoCookies(){
    setCookie('cookieaccepted','yes',365);
    document.getElementById("barraaceptacion").style.display="none";
    document.getElementById("cambio-a-no").style.display="block";
    document.getElementById("cambio-a-yes").style.display="none";
    location.reload(true);
}
function CambioANoAceptoCookies(){
    setCookie('cookieaccepted','no',365);
    document.getElementById("barraaceptacion").style.display="none";
    document.getElementById("cambio-a-yes").style.display="block";
    document.getElementById("cambio-a-no").style.display="none";
    location.reload(true);
}

window.onload = function(){
    if ( getCookie('cookieaccepted') == "yes" ) {
        document.getElementById("cambio-a-no").style.display="block";
        
    } else if ( getCookie('cookieaccepted') == "no" ) {
        document.getElementById("cambio-a-yes").style.display="block";
        
    } else {
        document.getElementById("barraaceptacion").style.display="block";
    }
}