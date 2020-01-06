<div id='page-wrap'>
<header class='main' id='h1'>
	<span id="erregspan" class="right"><a href="SignUp.php" id="erreg" >Erregistratu</a></span>
	<span id="logspan" class="right"><a href="LogIn.php" id="log" >Login</a></span>
	<span id="anonimospan" class="right">Anonimoa<img id="irudi" src="../images/anonimoa.png" height="40px"></img></span>
    <div align="left" id="googleSL">
            <!--social login-->
            <div class="g-signin2" data-onsuccess="onSignIn" data-onfailure="onFailure" data-theme="dark"></div>
            <script>
              function onFailure(error) {
                  console.log(error); 
                  alert("Txarto logeatu zara, mesedez saiatu berriro.");
              }
              function onSignIn(googleUser) {
                // Useful data for your client-side scripts:
                var profile = googleUser.getBasicProfile();
                console.log("ID: " + profile.getId()); // Don't send this directly to your server!
                console.log('Full Name: ' + profile.getName());
                console.log('Given Name: ' + profile.getGivenName());
                console.log('Family Name: ' + profile.getFamilyName());
                console.log("Image URL: " + profile.getImageUrl());
                console.log("Email: " + profile.getEmail());
                
                  
                $.post('../php/AddSocialSignUp.php',{
                    eposta       		:profile.getEmail(),
                    mota      			:'ikasle',
                    deiturak       		:profile.getName(),
                    pasahitza1        	:'',
                    pasahitza2        	:'',
                    irudia       		:profile.getImageUrl(),

                    },function(data,status){
                        console.log("\nStatus: " + status);  
                        // Simulate an HTTP redirect:
                        //window.location.replace("Layout.php");

                 });
                  
                  
                
              }
            </script>
        </div>
</header>
<nav class='main' id='n1' role='navigation'>
	<span id="hasieraspan"><a href='Layout.php' id="hasiera">Hasiera</a></span>
	<span id="jolastera"><a href="Jolastera.php" id="jolastera">Jolastera!</a></span>
	<span id="pasahitzaBerriaSpan"><a href="PasahitzaBerrezarri.php" id="pasahitzaBerria">Pasahitza Berrezarri</a></span>
	<span id="kredituakspan"><a href='Credits.php' id="kredituak">Kredituak</a></span>
</nav>

<?php include '../php/DbConfig.php' ?>
<?php include '../php/segurtasuna.php' ?>
	