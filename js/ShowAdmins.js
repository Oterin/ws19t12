function erakutsiAdminak(){
	const http = new XMLHttpRequest();
    const url = '../php/ShowAdmins.php';

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("adminTaulaBistaratu").innerHTML = this.responseText;

        }

    }
    http.open("GET", url);
    http.send();
}