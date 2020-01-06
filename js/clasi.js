function ajax(){
    const http = new XMLHttpRequest();
    var gaia = document.getElementById('election').value;
    const url = '../php/ShowClasi.php?gaia='+gaia;

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("clasiDiv").innerHTML = this.responseText;

        }

    }
    http.open("GET", url);
    http.send();
}
document.getElementById("election").addEventListener("change", function(){
    ajax();
});