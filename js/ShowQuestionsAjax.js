var diva=$("#gBistaraketa");
var xhro=new XMLHttpRequest();
xhro.onreadystatechange=function(){
    //alert("irakurketaren egoera: "+ xhro.readyState);
    if(xhro.readyState==4){
        var erantzuna=xhro.responseXML;
        var taula=$("#gBistaraketaTabla");
        var assesmentak = erantzuna.getElementsByTagName('assessmentItem');
        var eposta;
        var galdera;
        var eZuzena;
        var row;
        var cell1;
        var cell2;
        var cell3;
        
        for (var i = 0; i < assesmentak.length; i++){

                eposta = assesmentak[i].getAttribute('author');
                //alert('posta: '+eposta);
                   
                galdera = assesmentak[i].getElementsByTagName('p')[0].childNodes[0].nodeValue;

                //alert('galdera: '+galdera);
                   
                eZuzena = assesmentak[i].getElementsByTagName('value')[0].childNodes[0].nodeValue;
                //alert('erantzun zuzena: '+eZuzena);
                taula.append("<tr><td>"+eposta+"</td><td>"+galdera+"</td><td>"+eZuzena+"</td></tr>") //gero taula bete   
            
        }
        //$("#gBistaraketa").show();
    }
};
function XMLaEskatu(){
    diva.find("table").remove();//lenengo taula ustu
    diva.append('<table id="gBistaraketaTabla" border="1"><thead><tr><th width="150px">Egilea</th><th width="200px">Galdera</th><th width="150px">Erantzun zuzena</th></tr></thead><tbody></tbody></table>');
    //alert('xml-a eskatu da');
    
    xhro.open("GET", '../xml/Questions.xml');
    //alert('xml-a ireki da');

    xhro.send(null);
    //alert('Bidali du');
}
/*


$("#pleaseWait").show();
// or
$("#pleaseWait").hide();





-------------------------------------------------------------------------
var xhro=new XMLHttpRequest();
xhro.onreadystatechange=function(){
    //alert("irakurketaren egoera: "+ xhro.readyState);
    if(xhro.readyState==4){//0=Unset, 1=opened, 2=headers_received, 3=loading, 4=done
        //alert(xhro.responseText); //xml dok. string bezala bistaratu
        
        var erantzuna=xhro.responseXML;
        var obj=document.getElementById('gTextua');
        var assesmentak = erantzuna.getElementsByTagName('assessmentItem');
        /*var y = x.childNodes[0];
        alert('nodoaren balioa '+y.nodeValue);
        obj.innerHTML=y.nodeValue;
        var path;
        for (var i = 0; i < assesmentak.length; i++){

                var eposta = assesmentak[i].getAttribute('author');
                alert('posta: '+eposta);
                   
                var galdera = assesmentak[i].getElementsByTagName('p')[0].childNodes[0].nodeValue;

                alert('galdera: '+galdera);
                   
                var eZuzena = assesmentak[i].getElementsByTagName('value')[0].childNodes[0].nodeValue;
                alert('erantzun zuzena: '+eZuzena);
        }   
    }else if(xhro.readyState==3){
        //alert('loading');
    }else if(xhro.readyState==2){
        //alert('headers received');
    }else if(xhro.readyState==1){
        //alert('opened');
    }else{
        //alert('unset');
    }
}
function XMLaEskatu(){
    alert('xml-a eskatu da');
    xhro.open("GET", '../xml/Questions.xml');
    alert('xml-a ireki da');

    xhro.send(null);
    alert('Bidali du');
}















*/