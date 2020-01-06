$(document).ready(function(){
    $('#mezuBotoia').click(function(){
        $.post('../php/PasahitzaBerrezarriKodea.php',{
            posta       :$('#mezuEmail').val(),
            
        },function(data,status){
            console.log("Data: " + data + "\nStatus: " + status);

        });
        return false;

    });
                 
             
});