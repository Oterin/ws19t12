<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<?php	
		if(isset($_GET["eposta"])){
	?>
			<script>erakutsiLogeatuta();</script>
	<?php
		}
	?>
	<section class="main" id="s1">
		<div align="left">
            <!--action="</?php echo('AddQuestionWithImage.php?eposta='.$_GET['eposta']) ?>"*/  -->
			<form id="galderenF" name="galderenF">
				Eposta(*): <input type="text" id="eposta" name="eposta" size="80"></input><br>
				Galderaren testua(*): <input type="text" id="galdera" name="galdera" size="80"></input><br>
				Erantzun zuzena(*): <input type="text" id="zuzena" name="zuzena" size="80"></input><br>
				Erantzun okerra1(*): <input type="text" id="okerra1" name="okerra1" size="80"></input><br>
				Erantzun okerra2(*): <input type="text" id="okerra2" name="okerra2" size="80"></input><br>
				Erantzun okerra3(*): <input type="text" id="okerra3" name="okerra3" size="80"></input><br>
				Galderaren zailtasuna(*): <input type="Radio" id="zail1" name="zailtasuna" value=1> Txikia</input>
				<input type="Radio" id="zail2" name="zailtasuna" value=2> Ertaina </input>
				<input type="Radio" id="zail3" name="zailtasuna" value=3> Handia</input><br>
				Gaia(*): <input type="text" id="gaia" name="gaia" size="80"></input><br>
				Irudia:<br><input type="file" id="irudia" name="irudia" accept="image/png,image/jpg,image/jpeg" onchange="erakutsi(this)"></input><br>
				<input type="button" id="submit" value=" Bidali "></input>
				<input type="reset" id="ezabatu" value=" Ezabatu " onclick="kenduirudia()"></input><br>
				<input type="button" id="gIkusi" value=" Galderak Bistaratu" onclick="XMLaEskatu()"></input>
            </form>
            <div id="gBistaraketa">
                
            </div>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
	<script src="../js/jquery-3.4.1.min.js"></script>
	
	<script type="text/javascript" src="../js/ShowImageInForm.js"></script>
	
    <script type="text/javascript" src="../js/ShowQuestionsAjax.js"></script>
    <script type="text/javascript" src="../js/AddQuestionAjax.js"></script>

    <script>
	    var geteposta = "<?php echo $_GET['eposta']; ?>"
	    $("#eposta").val(geteposta);
	</script>
</body>
</html>
