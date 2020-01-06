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
				if (!isset($_SESSION['nick'])){
					if(isset($_SESSION['deiturak'])){
						$_SESSION['nick'] = $_SESSION['deiturak'];
					}else{
						$_SESSION['nick'] = $_POST['nick'];
					}
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
					<input type="text" name="gaia" value="<?php echo($gaia);?>" disabled><br>
					Galdera<input size="80" type="text" name="galderaJolastu" id="galderaJolastu" value="<?php echo($row['Galdera']);?>" disabled><br>
					Aukeratu bat:<br><?php

					$array = [0 => false, 1 => false, 2 => false, 3 => false];

					while (!$array[0] || !$array[1] || !$array[2] || !$array[3]) {
						$random = rand(1,4);
						switch ($random) {
							case 1:
								if (!$array[0]) {?>
									<input type="radio" name="galdera" value="1" required><?php echo($row['ErantzunZuzena']);?><br>
								<?php 
								$array[0] = true;
								}
								break;
							case 2:
								if (!$array[1]) {?>
									<input type="radio" name="galdera" value="0"><?php echo($row['OkerraBat']);?><br>
								<?php 
								$array[1] = true;
								}
								break;
							case 3:
								if (!$array[2]) {?>
									<input type="radio" name="galdera" value="0"><?php echo($row['OkerraBi']);?><br>
								<?php 
								$array[2] = true;
								}
								break;
							case 4:
								if (!$array[3]) {?>
									<input type="radio" name="galdera" value="0"><?php echo($row['OkerraHiru']);?><br>
								<?php 
								$array[3] = true;
								}
								break;
						}
					}
					?>
					<?php echo '<img src="'.$row['Argazkia'].'" width="100">'?><br>
					
					
					
					<button type="button" id="likeBotoia" onclick="like()" value="Like">Like</button>
					<button type="button" id="dislikeBotoia" onclick="dislike()" value="Dislike">Dislike</button><br>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/LikeEman.js"></script>
	
	
</body>
</html>
