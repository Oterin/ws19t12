<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body onload="erakutsiAdminak();">

	<?php include '../php/Menus.php' ?>
	<?php	
		if(isset($_GET["eposta"])){
	?>
			<script>erakutsiLogeatuta();</script>
	<?php
		}
	?>
	<section class="main" id="s1">
			<div id="adminTaulaBistaratu">
				
			</div>
	</section>
	<?php include '../html/Footer.html' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
	<!--<script src="../js/jquery-3.4.1.min.js"></script>-->
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquerymin.js"></script>-->
	
	<script type="text/javascript" src="../js/ShowAdmins.js"></script>
	<script type="text/javascript" src="../js/UserKudeatu.js"></script>
    <script>
	    var geteposta = "<?php echo $_GET['eposta']; ?>"
	    $("#eposta").val(geteposta);
	</script>
</body>
</html>
