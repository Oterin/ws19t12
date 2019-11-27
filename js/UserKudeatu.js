function aldatuEgoera(num){
	var posta = document.getElementById(num).innerText;
    console.log(posta);
	const http = new XMLHttpRequest();
    const url = '../php/AldatuEgoera.php?eposta='+posta;
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            alert("Aldatuta");
        }

    }
    http.open("GET", url);
    http.send();
}

function ezabatuUser(num){
    var posta = document.getElementById(num).innerText;
	const http = new XMLHttpRequest();
    const url = '../php/EzabatuUser.php?eposta='+posta;

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            alert("Aldatuta");

        }

    }
    http.open("GET", url);
    http.send();
}