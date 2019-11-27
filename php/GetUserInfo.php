<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
    <div>
		<h2>Quiz: galderen jokoa</h2>
        <br>
        Ikaslearen EHUko eposta
        <input type="text" name='eposta' id="eposta">
        <br>
        Telefono Zenbakia
        <input type="text" name='tlf' id="tlf">
        <br>
        Ikaslearen Izena
        <input type="text" name='izena' id="izena">
        <br>
        Ikaslearen abizenak
        <input type="text" name='abizenak' id="abizenak">
        <br>
        <button type="button" onclick="osatuEremuak(document.getElementById('eposta').value)">Osatu</button>
    </div>
	</section>
	
	<?php include '../html/Footer.html' ?>
  
	<script src="../js/jquery-3.4.1.min.js"></script>
    
    <!-- 2. Autazkoa egiteko beharrezkoa den .js-a -->
    <script src="../js/GetUserInfo.js"></script>
</body>
</html>
