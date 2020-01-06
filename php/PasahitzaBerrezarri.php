<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div align="left">
			<div style="border-style: solid; border-width: 1px; padding: 10px 10px 10px 10px;">
				<form id="mezuBidali" name="mezuBidali" action="PasahitzaBerrezarriKodea.php" method="post" enctype="multipart/form-data">
					<h3>Pasahitza Berrezarri</h3>
					Sartu hemen zure berrezarpen posta <input type="text" name="mezuEmail" id="mezuEmail" size="80"><br>
					<input type="submit" name="mezuBotoia" id="mezuBotoia" value="Eskaera Bidali">
					<input type="button" name="mezuReset" id="mezuReset" value="Garbitu">
				</form>
			</div>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
	<!--<script src="../js/jquery-3.4.1.min.js"></script>-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
</body>
</html>
