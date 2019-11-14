var myVar;
var erabiltzaile;

function denbora(userName) {
    erabiltzaile = userName;
    myVar = setInterval(nireGalderak, 10000);
}



function nireGalderak(userName){
    if (erabiltzaile == null){
        erabiltzaile = userName;
    }
	const http = new XMLHttpRequest();
    var erabiltzailea = erabiltzaile;
    const url = '../php/userQuestions.php?eposta=' +erabiltzaile;

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("nireGalderak").innerHTML = this.responseText;

        }

    }
    http.open("GET", url);
    http.send();
}