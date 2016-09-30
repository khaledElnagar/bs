/**
 * Created by KAT on 09/08/2016.
 */
function getData(isbn) {

    if (isbn.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "test.php?isbn=" + isbn, true);
        xmlhttp.send();
    }
}
