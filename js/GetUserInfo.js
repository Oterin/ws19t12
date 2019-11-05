/*
->GetUserInfo formularioko osatu eremuak botoia sakatzean, honek GetUserInfo.js-ri deituko dio
->GetUserInfo.js-k epoztaz baliaturik(parametrotzat funtzioari bidaliz beraz), haren telefonoa Izena eta abizenak erakutsiko (beteko) ditu

*/

function osatuEremuak(pPosta){
    var topatu=false;
    $(document).ready(function(){
        $.get('../xml/Users.xml',function(d){
            var erabiltzaileak = $(d).find('erabiltzailea');
            for (var i = 0; i < erabiltzaileak.length; i++){
                if(erabiltzaileak[i].childNodes[1].childNodes[0].nodeValue== pPosta){
                    topatu=true;
                    var eposta = erabiltzaileak[i].childNodes[1].childNodes[0].nodeValue;
                    var izena = erabiltzaileak[i].childNodes[3].childNodes[0].nodeValue;
                    var abizena1 = erabiltzaileak[i].childNodes[5].childNodes[0].nodeValue;
                    var abizena2 = erabiltzaileak[i].childNodes[7].childNodes[0].nodeValue;
                    var telefonoa = erabiltzaileak[i].childNodes[9].childNodes[0].nodeValue;
                }
            }   
            if(topatu==true){
                $("#eposta").val(eposta);
                $("#izena").val(izena);
                $("#abizenak").val(abizena1);
                $("#abizenak").val($("#abizenak").val()+' '+abizena2);
                $("#tlf").val(telefonoa);
            }else{
                alert('Mesedez sartu ezazu existitzen den postaren bat');
            }
        })
    });
}
