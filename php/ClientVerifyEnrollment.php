<?php
//nusoap.php klasea gehitzen dugu
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
//nusoap_client motadun objektua sortzen dugu. http://www.mydomain.com/server.php
//erabiliko den SOAP zerbitzua non dagoen zehazten url horrek
$soapclient = new nusoap_client('http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl',true);
//Web-Service-n inplementatu dugun funtzioari dei egiten diogu,
// eta itzultzen diguna inprimatzen dugu
$erabiltzaile = $_GET["eposta"];
$response = $soapclient->call('egiaztatuE',array( 'x'=>$erabiltzaile));
if( $response == "BAI"){
	echo '<p id ="postaEgokia" style="color:green;">WS ikasgaian matrikulatuta dago</p>';
}else{
	echo '<p id ="postaEgokia" style="color:red;">Ez dago WS ikasgaian matrikulatuta</p>';
}
//echo '<h2>Request</h2><pre>'.htmlspecialchars($soapclient->request, ENT_QUOTES).'</pre>';
//echo '<h2>Response</h2><pre>'.htmlspecialchars($soapclient->response,ENT_QUOTES).'</pre>';
//echo '<h2>Debug</h2>';
//echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';
?>