function ajax(){
    const http = new XMLHttpRequest();
    const url = '../php/ShowXmlQuestions.php';

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("gBistaraketa").innerHTML = this.responseText;

        }

    }
    http.open("GET", url);
    http.send();
}
document.getElementById("gIkusi").addEventListener("click", function(){
    ajax();
});