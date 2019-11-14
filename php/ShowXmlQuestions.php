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
		<table border="1"> 
	      <tr bgcolor="#9acd32">
	        <th>Egilea</th>
	        <th>Galdera</th>
	        <th>Zuzena</th>
	      </tr>
		<?php
		$xml = simplexml_load_file("../xml/Questions.xml");
		foreach ($xml->assessmentItem as $galdera) {
			echo("<tr>");
			echo("<td>". $galdera["author"] . "</td>");
			echo("<td>". $galdera->itemBody->p . "</td>");
			echo("<td>". $galdera->correctResponse->value . "</td>");
			echo("</tr>");
		}

		/*$xslDoc = new DOMDocument();
		$xslDoc->load("../xml/Questions.xsl");
		$xmlDoc = new DOMDocument();
		$xmlDoc->load("../xml/Questions.xml");
		$proc = new XSLTProcessor();
		$proc->importStylesheet($xslDoc);
		echo $proc->transformToXML($xmlDoc);*/
		?>
		</table>
	</section>
	<?php include '../html/Footer.html' ?>
	<script src="../js/jquery-3.4.1.min.js"></script>  
	<script type="text/javascript" src="../js/ValidateFieldsQuestion.js"></script>
</body>
</html>