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
			<form id="jolastu" name="jolastu" action="JolastuBitarte.php" method="post" enctype="multipart/form-data">
				<?php
				include '../php/DbConfig.php';
				if (isset($_SESSION['gaiaJolastu'])){
					$gaia = $_SESSION['gaiaJolastu'];
				}else{
					$gaia = $_POST['gaia'];
					$_SESSION['gaiaJolastu'] = $_POST['gaia'];
				}

				$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
				$sql = "SELECT COUNT(*) AS total FROM questions WHERE Egina = 'EZ' AND Gaia = '". $gaia ."'";
				$ema = @mysqli_query($konexioa, $sql);
				$mf=mysqli_fetch_array($ema);
				if ($mf['total'] == 0) {?>
					<button type="button" onclick="amaitu()">Ez dago galdera gehiagorik</button><?php
				}else{
					foreach ($konexioa->query("SELECT * FROM questions WHERE Egina = 'EZ' AND Gaia = '". $gaia ."'") as $row) {
					break;
					}
					$sql2 = "UPDATE questions SET Egina = 'Bai' WHERE Galdera='" . $row['Galdera'] . "'";
					$ema2 = @mysqli_query($konexioa, $sql2);
					?>
					<input type="text" name="gaia" value="<?php echo($gaia);?>"><br>
					Galdera<input size="80" type="text" name="galderaJolastu" value="<?php echo($row['Galdera']);?>"><br>
					Aukeratu bat:<br>
					<input type="radio" name="galdera" value="1"> <?php echo($row['ErantzunZuzena']);?><br>
					<input type="radio" name="galdera" value="0"><?php echo($row['OkerraBat']);?><br>
					<input type="radio" name="galdera" value="0"><?php echo($row['OkerraBi']);?><br>
					<input type="radio" name="galdera" value="0"><?php echo($row['OkerraHiru']);?><br>
					
	                <button type="submit" id="some" value="some">Erantzun</button><?php
				}
				?>
			</form>
		</div>
		</div>
	</section>
	<script type="text/javascript">
		function amaitu(){
			window.location.replace("../php/JolastuGorde.php");
		}
	</script>
	<?php include '../html/Footer.html' ?>
	
	
</body>
</html>
