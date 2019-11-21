function konprobatuPasahitza(){
	
	var pasahitza = document.getElementById("pasahitza1").value;
    console.log(pasahitza);
	const http = new XMLHttpRequest();
    const url = '../php/ClientVerifyPass.php?pass='+pasahitza;

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("passErantzuna").innerHTML = this.responseText;

        }

    }
    http.open("GET", url);
    http.send();
}

function konprobatuEmail(){
    var email = document.getElementById("eposta").value;
	const http = new XMLHttpRequest();
    const url = '../php/ClientVerifyEnrollment.php?eposta='+email;

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("postaErantzuna").innerHTML = this.responseText;

        }

    }
    http.open("GET", url);
    http.send();
}



