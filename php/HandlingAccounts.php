<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body onload="erakutsiAdminak();">

	<?php include '../php/Menus.php';
        if(!isset($_SESSION['posta'])){
            header("Location: Layout.php");
            exit();
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
	    var geteposta = "<?php echo $_SESSION['posta']; ?>"
	    $("#eposta").val(geteposta);
	</script>
</body>
</html>
