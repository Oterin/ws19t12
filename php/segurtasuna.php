<?php	
    session_start();
    if(isset($_SESSION['posta'])){
        ?>
    <script src="../js/jquery-3.4.1.min.js"></script>
        <script>
            function erakutsiLogeatuta(){
                var geteposta = "<?php echo $_SESSION['posta'] ?>";
                var getDeitura = "<?php echo $_SESSION['deiturak'] ?>"
                var getAdmin = "<?php echo $_SESSION["admin"] ?>";
                console.log("sessionPOSTA: "+geteposta);
                console.log("sessionPOSTA: "+getDeitura);
                $("#erregspan").remove();
                $("#logspan").remove();
                $("#anonimospan").remove();
                $("#hasieraspan").remove();
                $("#kredituakspan").remove();

                var logout = $("<span id='logoutspan' class='right'><a href='irten.php' id='logout'>Logout</a>&nbsp</span>");
                logout.appendTo("#h1"); 
                var layout = $("<span id='hasieraspan'><a href='Layout.php?eposta="+geteposta+"' id='hasiera'>Hasiera</a></span>");
                layout.appendTo("#n1"); 
                /*var gArgazki = $("<br><span id='galderakArgazkispan'><a href='QuestionFormWithImage.php?eposta="+geteposta+"' id='galderakArgazki'>Galderak gehitu</a></span>");
                gArgazki.appendTo("#n1");*/
                var gIkusi = $("<br><span id='galderakIkusispan'><a href='ShowQuestionsWithImage.php?eposta="+geteposta+"' id='galderakIkusi'>Galderak ikusi</a></span>");
                gIkusi.appendTo("#n1");


                /*var gIkusiXML = $("<br><span id='galderakIkusiXMLspan'><a href='ShowXMLQuestions.php?eposta="+geteposta+"' id='galderakXMLIkusi'>Ikusi XML galderak</a></span>");
                gIkusiXML.appendTo("#n1");*/

                var gKudeatu = $("<br><span id='galderakIkusiXMLspan'><a href='HandlingQuizesAjax.php?eposta="+geteposta+"' id='galderakKudeatu'>Galderak kudeatu</a></span>");
                gKudeatu.appendTo("#n1");

                var gJolastu = $("<br><span id=jolastuspan'><a href='Jolastera.php?eposta="+geteposta+"' id='jolastera'>Jolastera</a></span>");
                gJolastu.appendTo("#n1");

                /*var gUserInfo = $("<br><span id='UserInfoFormularioaspan'><a href='GetUserInfo.php?eposta="+geteposta+"' id='getUserInfo'>User Info Formularioa</a></span>");
                gUserInfo.appendTo("#n1");*/


                var credits = $("<span id='kredituakspan'><a href='Credits.php?eposta="+geteposta+"' id='kredituak'>Kredituak</a></span>");
                credits.appendTo("#n1"); 

                var erabiltzaile = $("<span id='erabiltzaile' class='right'>"+geteposta+"&nbsp</span>");
                erabiltzaile.appendTo("#logoutspan");

                
                if(getAdmin){
                    console.log("sessionAdmin: true");
                     var eKudeatu = $("<br><span id='kontuakKudeatuspan'><a href='HandlingAccounts.php' id='kontuakKudeatu'>Kontuak Kudeatu</a></span>");
                     eKudeatu.appendTo("#n1");
                    
                    
                }
                
                
                
                <?php
                    $konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
                    $query = 'SELECT Posta, Argazkia FROM logindatuak';
                    $ema=@mysqli_query($konexioa,$query);
                    if(!$ema){
                        echo("Errorea: ezin izan da datu basea atzitu");
                        exit();
                    }
                    else{
                        foreach ($konexioa->query('SELECT Posta, Argazkia FROM logindatuak') as $row){
                            if (!(strcmp($row['Posta'],$_SESSION['posta']))){
                                ?>
                                var irudi = $("<span id='irudi' class='right'><img src='<?php echo($row['Argazkia']) ?>' height='40px'></img></span>");
                                irudi.appendTo("#erabiltzaile");
                                <?php
                                break;
                            }
                        }
                    }
                    mysqli_close($konexioa);
                ?>

                return true;
            }

          </script>


        <script>erakutsiLogeatuta();</script>
	   <?php
    }
    
?>
