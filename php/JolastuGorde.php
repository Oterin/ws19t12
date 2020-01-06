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

				Asmatuak: <?php echo($_SESSION['asmatuak']);?> <br>
				Asmatugabeak: <?php echo($_SESSION['asmatugabeak']);?> <br>
				<button type="button" onclick="amaitu()">Amaitu Jokoa</button>
		</div>
		</div>
	</section>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/AmaituJokoa.js"></script>
	<?php include '../html/Footer.html' ?>
	
	
</body>
</html>
