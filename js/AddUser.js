$(document).ready(function(){
    $('#submit').click(function(){
        var erabiltzaile=$("#erabiltzaile").text();
        var postaEgoki = $("#postaEgokia").text();
        var pasahitzEgoki = $("#pasahitzEgokia").text();
        if (postaEgoki == "Ez dago WS ikasgaian matrikulatuta" || pasahitzEgoki == "Pasahitza ez da baliozkoa"){
        	alert("Ezin dira datu horiek sartu");
        }else{
            /*$.ajax({
                type:   'post',
                url:    '../php/AddSignUp.php?eposta='+erabiltzaile,
                beforeSend:function(){console.log("kargatzen");},
                success:function(){console.log("eureka");
                                   return true;
                                  },
                error:function(){console.log("upsi");return false;},
                
            });*/
            
            $.post('../php/AddSignUp.php?eposta='+erabiltzaile,{
            eposta       		:$('#eposta').val(),
            mota      			:$('#mota').val(),
            deiturak       		:$('#deiturak').val(),
            pasahitza1        	:$('#pasahitza1').val(),
            pasahitza2        	:$('#pasahitza2').val(),
            irudia       		:$('#irudia').val(),
            
	        },function(data,status){
	            console.log("\nStatus: " + status);                           

	        });
           
	       
        }
    });
                 
             
});
/*




$(document).ready(function(){
    $('#submit').click(function(){
        var erabiltzaile=$("#erabiltzaile").text();
        var postaEgoki = $("#postaEgokia").text();
        var pasahitzEgoki = $("#pasahitzEgokia").text();
        if (postaEgoki == "Ez dago WS ikasgaian matrikulatuta" || pasahitzEgoki == "Pasahitza ez da baliozkoa"){
        	alert("Ezin dira datu horiek sartu");
        }else{
        	$.post('../php/AddSignUp.php?eposta='+erabiltzaile,{
            eposta       		:$('#eposta').val(),
            mota      			:$('#mota').val(),
            deiturak       		:$('#deiturak').val(),
            pasahitza1        	:$('#pasahitza1').val(),
            pasahitza2        	:$('#pasahitza2').val(),
            irudia       		:$('#irudia').val(),
            
	        },function(data,status){
	            console.log("\nStatus: " + status);                           

	        });
	        alert("Erabiltzailea zuzen erregistratu da");
        }
       
        return false;
    });
                 
             
});
*/