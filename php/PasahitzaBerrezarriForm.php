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
				<form id="mezuBidali" name="mezuBidali" action="PasahitzaBerrezarriEmaitza.php" method="post" enctype="multipart/form-data">
					<h3>Pasahitza Berrezarri</h3>
					Email<input type="text" name="berrezarpenEmail" id="berrezarpenEmail" size="80" required="true" value="<?php echo($_GET['email']);?>"><br>
					Pasahitza Berria <input type="text" name="berrezarpenPasahitza" id="berrezarpenPasahitza" size="80" required="true"><br>
					Pasahitza Errepikatu <input type="text" name="berrezarpenPasahitza2" id="berrezarpenPasahitza2" size="80" required="true"><br>
					Berrezarpen Kodea <input type="text" name="berrezarpenKodea" id="berrezarpenKodea" size="80" required="true"><br>
					<input type="submit" name="berrezarriBotoia" id="berrezarriBotoia" value="Pasahitza Berrezarri">
				</form>
			</div>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
	<!--<script src="../js/jquery-3.4.1.min.js"></script>-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/berrezarri.js"></script>
	
</body>
</html>
