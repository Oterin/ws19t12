<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
    

	<section class="main" id="s1">
    <div>

		<h2>Quiz: galderen jokoa</h2><br>
		<h3>Emaitzak</h3>
		Gaia: <?php 
		$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
		$query = 'SELECT DISTINCT Gaia FROM questions';
		$ema=@mysqli_query($konexioa,$query);
		if(!$ema){
			echo("Errorea: ezin izan da datu basea atzitu");
			exit();
		}
		?>
		<select id="election" name="gaia">
			<?php
			foreach ($konexioa->query('SELECT DISTINCT Gaia FROM questions') as $row) { ?>
				<option value='<?php echo($row["Gaia"]);?>'><?php echo($row['Gaia']);?></option>
				<?php
			} ?>
		</select><br>
		<div style="padding: 10px 10px 10px 10px;" align="center" id="clasiDiv">
			
		</div>
      
    </div>
	</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/clasi.js"></script>
	<?php include '../html/Footer.html' ?>
  
	<script src="../js/jquery-3.4.1.min.js"></script>

</body>
</html>

