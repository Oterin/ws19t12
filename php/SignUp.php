<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div align="left">
			<form id="erregistro" name="erregistro" action="AddSignUp.php" method="post" enctype="multipart/form-data">
				Eposta(*): <input type="text" id="eposta" name="eposta" size="80"  ></input> <div id="postaErantzuna"></div><br>
				Erabiltzaile mota(*): <input type="Radio" name="mota" id="ikasle" value=1> Ikasle</input>
				<input type="Radio" name="mota" id="irakasle" value=2> Irakasle </input><br>
				Deiturak(*): <input type="text" id="deiturak" name="deiturak" size="80" pattern="[a-zA-Z]{2,}( [a-zA-Z]{2,}){1,}"></input></br>
				Pasahitza(*): <input type="password" id="pasahitza1" name="pasahitza1" size="80"></input><div id="passErantzuna"></div><br>
				Berriro pasahitza(*): <input type="password" id="pasahitza2" name="pasahitza2" size="80"></input><br>
				Irudia:<br><input type="file" id="irudia" name="irudia" accept="image/png,image/jpg,image/jpeg" onchange="erakutsi(this)"></input><br>
				<!--<input type="button" id="submit" value=" Bidali "></input>-->
                <button type="submit" id="some" value="some">Bidali</button>
				<input type="reset" id="ezabatu" value=" Ezabatu " onclick="kenduirudia()"></input><br>
			</form>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
	<!--<script src="../js/jquery-3.4.1.min.js"></script>-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/SignUpConditions.js"></script>
	<script type="text/javascript" src="../js/AddUser.js"></script>
	<script type="text/javascript">
		document.getElementById('eposta').addEventListener('input', konprobatuEmail, false);
	</script>
	<script type="text/javascript">
		document.getElementById('pasahitza1').addEventListener('input', konprobatuPasahitza, false);
	</script>
	<script>
		function erakutsi(input) {
			if (input.files[0]) {
				var irakurle = new FileReader();
				kenduirudia();
				irakurle.onload = function (e) {
					var img = $("<img id='irudiberria'>");
					img.attr("src", e.target.result);
					img.attr("height", "50px");
					img.appendTo("#erregistro");  
				}
				irakurle.readAsDataURL(input.files[0]);
			}        
		}
			
		function kenduirudia(){
			$("#irudiberria").remove();
		}
	</script>
	
</body>
</html>
