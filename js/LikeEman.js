function like(){
	const http = new XMLHttpRequest();
	var galdera = document.getElementById("galderaJolastu").value;
	document.getElementById("likeBotoia").style.visibility = "hidden";
    document.getElementById("dislikeBotoia").style.visibility = "hidden";
    const url = '../php/LikeEman.php?galdera='+galdera;

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

        }

    }
    http.open("GET", url);
    http.send();
}

function dislike(){
	const http = new XMLHttpRequest();
    var galdera = document.getElementById("galderaJolastu").value;
    document.getElementById("likeBotoia").style.visibility = "hidden";
    document.getElementById("dislikeBotoia").style.visibility = "hidden";
    const url = '../php/DislikeEman.php?galdera='+galdera;

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

        }

    }
    http.open("GET", url);
    http.send();
}