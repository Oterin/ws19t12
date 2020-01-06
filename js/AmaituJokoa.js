function amaitu(){
	const http = new XMLHttpRequest();
    const url = '../php/JolastuAmaitu.php';

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            window.location.replace("../php/Layout.php")

        }

    }
    http.open("GET", url);
    http.send();
}