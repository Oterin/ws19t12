<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	//nusoap_client motadun objektua sortzen dugu. http://www.mydomain.com/server.php
	//erabiliko den SOAP zerbitzua non dagoen zehazten url horrek
    //     $path="http://localhost/pWS19t12_2/ws19t12/php/VerifyPassWS.php?wsdl";

    //$path=realpath('VerifyPassWS.php').'?wsdl';

	//echo realpath('VerifyPassWS.php').'?wsdl';
$path="http://localhost/pWS19t12_2/php/VerifyPassWS.php?wsdl";
    $soapclient = new nusoap_client($path,true);
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu,
	// eta itzultzen diguna inprimatzen dugu
	$pasahitza = $_GET["pass"];
	$response = $soapclient->call('baliozkotu',array( 'x'=>$pasahitza));
	if( $response == "BALIOZKOA"){
		echo '<p id ="pasahitzEgokia" style="color:green;">Pasahitza baliozkoa da</p>';
	}else{
		echo '<p id ="pasahitzEgokia" style="color:red;">Pasahitza ez da baliozkoa</p>';
	}
?>