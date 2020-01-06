$(document).ready(function(){
    $('#submit').click(function(){
        var erabiltzaile=$("#erabiltzaile").text();
        $.post('../php/AddQuestionWithImage.php',{
            eposta       :$('#eposta').val(),
            galdera       :$('#galdera').val(),
            zuzena        :$('#zuzena').val(),
            okerra1        :$('#okerra1').val(),
            okerra2        :$('#okerra2').val(),
            okerra3        :$('#okerra3').val(),
            zailtasuna    :$('#zailtasuna').val(),
            gaia          :$('#gaia').val(),
            irudia        :$('#irudia').val(),
            
        },function(data,status){
            //alert("Data: " + data + "\nStatus: " + status);
            console.log("Data: " + data + "\nStatus: " + status);
            ajax();
            //nireGalderak($('#eposta').val());

        });



    
        /*$.ajax({
            type        : 'POST',
            url         : '../php/prueba.php?eposta='+erabiltzaile,
            data        : formData,
            dataType    : 'text',
            success     : function(r){
               if (r==1){
                    alert("Datos introducidos!");
               }else{
                    alert("Fallo en el servidor");
               }
            }
            });*/
                     

        return false;
        
//        $('#galderenF').submit();
    
        //event.preventDefault();

    });
                 
             
});


/*
function datuakBidali(){
    
*/