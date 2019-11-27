<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
    <?php include '../php/Menus.php' ?>
	<?php include '../php/DbConfig.php' ?>
</head>
<body>
	
	<section class="main" id="s1">
		<div align="left">
			<form id="erresgistro" name="erregistro" action="LogIn.php" method="post" enctype="multipart/form-data">
				Eposta(*): <input type="text" id="eposta" name="eposta" size="80"></input><br>
				Pasahitza(*): <input type="password" id="pasahitza" name="pasahitza" size="80"></input><br>
				<input type="submit" id="submit" value=" Bidali"></input>
				<input type="reset" id="ezabatu" value=" Ezabatu " onclick="ezabatumezua()"></input><br>
			</form>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
	<?php	
		
		if(isset($_POST["eposta"])){
			
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<p>Errorea: ezin izan da konexioa ezarri</p>");
			
			$query = 'SELECT Posta, Pasahitza, Egoera FROM logindatuak';
			$kon=@mysqli_query($konexioa,$query);
			if(!$kon){
				echo ("<p>Errorea: ezin izan da datu basea atzitu</p>");
				exit();
			}
			else{
				foreach ($konexioa->query('SELECT Posta, Pasahitza, Egoera FROM logindatuak') as $row){
					if ($row['Posta']==$_POST["eposta"]) {
                        echo '<script>console.log("erabiltzailea aurkitu du '.$row['Posta'].'");</script>';

						if($row['Pasahitza']==$_POST["pasahitza"]){
                            echo '<script>console.log("pasahitza ondo sartu du '.$row['pasahitza'].'");</script>';
							/*$URL = "Layout.php?eposta=".$_POST["eposta"];
							echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
							exit();*/
                            
                            if($row['Egoera']!='aktibo'){
                                ?>
                                <script>
                                    alert("Erabiltzaile hau blokeatuta dago, mesedez kontaktatu administratzailearekin");
                                </script>
                                <?php
                                break;
                            }else{
                                $_SESSION["posta"]=$row['Posta'];
                            
                                echo '<script>console.log("SESSION: '.$_SESSION["posta"].'");</script>';

                                if($row['Posta']=="admin@ehu.es"){
                                    $_SESSION["admin"]=true;
                                    header("Location: HandlingAccounts.php");
                                    exit();
                                }
                                else{
                                    $_SESSION['admin']=false;
                                }
                            }       
                            header("Location: HandlingQuizesAjax.php");
                            exit();
                            /*die();*/
                        
						}
					}else{
                            ?>
                            <script>
                                var gaizki = $("<p id='gaizki'>Datuak ez dira zuzenak</p>");
                                gaizki.appendTo("#s1");
                            </script>
                            <?php
                    }		
				}
				
			}
			
			mysqli_close($konexioa);	
		}
		
	?>
	
	<script>
		function ezabatumezua(){
			$("#gaizki").remove();
		}
	</script>

	<script type="text/javascript" src="../js/ShowImageInForm.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>
