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
				<input type="text" name="gaia" value="<?php echo($_SESSION['gaiaJolastu']);?>"><br>
				<?php 
				$erantzuna = $_POST['galdera'];

				if ($erantzuna == 1) {
					$_SESSION['asmatuak'] = $_SESSION['asmatuak'] + 1;
				}else{
					$_SESSION['asmatugabeak'] = $_SESSION['asmatugabeak'] + 1;
				}?>
				Asmatuak: <?php echo($_SESSION['asmatuak']);?> <br>
				Asmatugabeak: <?php echo($_SESSION['asmatugabeak']);?> <br>
				<h3>Zer egin nahi duzu</h3>
				
                <button type="button" onclick="amaitu()">Amaitu Jokoa</button>
                <button type="button" onclick="besteBat()">Jarraitu Jokatzen</button>
		</div>
		</div>
	</section>
	<script type="text/javascript">
		function besteBat(){
			window.location.replace("../php/JolastuGaldera.php");
		}
		function amaitu(){
			window.location.replace("../php/JolastuGorde.php");
		}
	</script>
	<?php include '../html/Footer.html' ?>
	
	
</body>
</html>
