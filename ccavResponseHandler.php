<?php
	include('Crypto.php');
	error_reporting(0);
	$workingKey = '3FB2716D93033D3BAD2B3E9FF36A4E65';		//Working Key should be provided here.
	$encResponse = $_POST["encResp"];						//This is the response sent by the CCAvenue Server
	$rcvdString = decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status = "";
	$decryptValues = explode('&', $rcvdString);
	$dataSize = sizeof($decryptValues);
	
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information = explode('=', $decryptValues[$i]);
		$arrResponse[$information[0]] = $information[1];
		if($i == 3)	
			$order_status = $information[1];
	}

	if($order_status === "Success")
	{
		include('success.php');
	}
	else 
	{
		include('failure.php');
	}
?>
