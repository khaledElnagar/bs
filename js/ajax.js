function startAjax(){
    var xhttp;
    try
    {
        xmlhttp = window.XMLHttpRequest?new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    } catch (e)
    {

    }
    return xmlhttp;
}

function sendAjax(url){

    xmlhttp.open('GET', url,true);
    xmlhttp.send();

}

function setState(country){
    var xhttp = startAjax();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('stateContainer').innerHTML = xhttp.responseText;
        }
    };
    sendAjax("/getState/"+country);


}
