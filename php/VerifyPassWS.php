<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	//soap_server motako objektua sortzen dugu
	$ns="VerifyPassWS.php?wsdl";
	$server = new soap_server;
	$server->configureWSDL('baliozkotu',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;

	//inplementatu nahi dugun funtzioa erregistratzen dugu
	//funtzio bat baino gehiago erregistra liteke …
	$server->register('baliozkotu',array('x'=>'xsd:String'),array('z'=>'xsd:String'),$ns);
	//funtzioa inplementatzen da
	 function baliozkotu($x){
		$fitxategi = fopen('../txt/toppasswords.txt','r');
		while (!feof($fitxategi)){
			$lerroa = fgets($fitxategi);
			if (strpos($lerroa, $x) !== false){
				return "BALIOGABEA";
			}
		}
		return "BALIOZKOA";
	}
	//nusoap klaseko service metodoari dei egiten diogu, behin parametroak
	// prestatuta daudela
	if (!isset( $HTTP_RAW_POST_DATA )) {
	$HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
	}
	$server->service($HTTP_RAW_POST_DATA);
?>