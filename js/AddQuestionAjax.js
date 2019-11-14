$(document).ready(function(){
    var erabiltzaile=$("#erabiltzaile").text();
    $('#submit').on('click',function(event){
        //event.preventDefault();
        var formData={
            'eposta'        :$('#eposta').val(),
            'galdera'       :$('#galdera').val(),
            'zuzena'        :$('#zuzena').val(),
            'okerra1'        :$('#okerra1').val(),
            'okerra2'        :$('#okerra2').val(),
            'okerra3'        :$('#okerra3').val(),
            'zailtasuna'    :$('#zailtasuna').val(),
            'gaia'          :$('#gaia').val(),
            'irudia'        :$('#irudia').val(),
            
        };
        console.log(formData);
    
        $.ajax({
            cache       :false,
            type        : 'post',
            url         : '../php/AddQuestionWithImage.php?eposta='+erabiltzaile,
            data        : formData,
            dataType    : 'json',
            success     : function(data){
                alert("success! "+data);
                console.log($('#galderenF').serialize());
            }
            
        });
        
//        $('#galderenF').submit();
    
        //event.preventDefault();
   
        $('#galderenF').post

    });
                 
                 
             
});


/*
function datuakBidali(){
    
*/