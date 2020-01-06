<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div align="left">
			<div style="border-style: solid;padding: 10px 10px 10px 10px;">
				<p>Kaixo Jokalari, aukeratu jokatuko duzun galderaren gaia eta zure izena!</p>
			<form id="jolastu" name="jolastu" action="JolastuGaldera.php" method="post" enctype="multipart/form-data">
				<?php
				include '../php/DbConfig.php';
				$_SESSION['asmatuak'] = 0;
				$_SESSION['asmatugabeak'] = 0;
				$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
				$query = 'SELECT DISTINCT Gaia FROM questions';
				$ema=@mysqli_query($konexioa,$query);
				if(!$ema){
					echo("Errorea: ezin izan da datu basea atzitu");
					exit();
				}
				?>
				<?php 
				if (isset($_SESSION['posta'])){
					$izena = $_SESSION["deiturak"];
					echo('<input type="text" name="nick" id="nick" value="'.$izena.'" disabled>');
				}else{
					echo('<input type="text" name="nick" id="nick">');
				}?>
				
				<select name="gaia">
					<?php
					foreach ($konexioa->query('SELECT DISTINCT Gaia FROM questions') as $row) { ?>
						<option value='<?php echo($row["Gaia"]);?>'><?php echo($row['Gaia']);?></option>
						<?php
					} ?>
				</select><br>

				
                <button type="submit" id="some" value="some">Bidali</button>
			</form>
		</div>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
	
	
</body>
</html>
