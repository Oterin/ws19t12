<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<?php include '../php/DbConfig.php' ?>
	<section class="main" id="s1">
		<div>
			<?php
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<p>Errorea: ezin izan da konexioa ezarri</p>");
			
			$query = 'SELECT Posta FROM logindatuak';
			$kon=@mysqli_query($konexioa,$query);
			if(!$kon){
				echo("<p>Errorea: ezin izan da datu basea atzitu</p>");
				exit();
			}
			else{
				foreach ($konexioa->query('SELECT Posta FROM logindatuak') as $row){
					if (!(strcmp($row['Posta'],$_POST["eposta"]))){
						echo("<p>Korreoa jadanik erregistratuta dago</p>");
						$_SESSION["posta"]=$_POST[eposta];
                        $_SESSION["deiturak"] = $_POST[deiturak];
                        $_SESSION['admin']=false;
						exit();
					}		
				}
			}
			
			$pass = $_POST["pasahitza1"];
			$passHash = password_hash($pass, PASSWORD_BCRYPT);
			
			$sql = "INSERT INTO logindatuak (Posta, Mota, Deiturak, Pasahitza, Argazkia) VALUES
				  ('$_POST[eposta]' , '$_POST[mota]', '$_POST[deiturak]', '".$passHash."' , '$_POST[irudia]')";

			$ema=@mysqli_query($konexioa,$sql);
			
			if(!$ema){
				echo("<p>Errorea: ezin izan da erregistroa bete</p>");
				echo("<p><a href='SignUp.php' id='erreg' >Saiatu berriro</a></p>");
			}
			else{
				echo("<p>Erregistratu zara</p>");
                mysqli_close($konexioa);
                $_SESSION["posta"]=$_POST[eposta];
                $_SESSION["deiturak"] = $_POST[deiturak];
                $_SESSION['admin']=false;
                
                exit();
                
			}
			
			
			?>
    </div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>
</html>