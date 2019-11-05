<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<?php include '../php/DbConfig.php' ?>
	<?php	
		if(isset($_GET["eposta"])){
	?>
			<script>erakutsiLogeatuta();</script>
	<?php
		}
	?>
	<section class="main" id="s1">
		<h2>Galderak</h2><br/>
		<?php
		$xslDoc = new DOMDocument();
		$xslDoc->load("../xml/Questions.xsl");
		$xmlDoc = new DOMDocument();
		$xmlDoc->load("../xml/Questions.xml");
		$proc = new XSLTProcessor();
		$proc->importStylesheet($xslDoc);
		echo $proc->transformToXML($xmlDoc);
		?>
	</section>
	<?php include '../html/Footer.html' ?>
	<script src="../js/jquery-3.4.1.min.js"></script>  
	<script type="text/javascript" src="../js/ValidateFieldsQuestion.js"></script>
</body>
</html>