<?php

	$json = file_get_contents('php://input');

	$req = json_decode($json);
	// print_r($req);

	$bdy = $req->sendSMSReq->msgBdy;
	$sender = $bdy->src;
	$numbers = $bdy->mbNb;
	$message = $bdy->txt;




	// Authorisation details.
	$username = "harithsa@inspiredmemories.in";
	$hash = "0267b5a17f7544db17de3831f8e1f16f550df6877cbaacb292583b1127a709b7";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	// $sender = "TXTLCL"; // This is who the message appears to be from.
	// $numbers = "919742653096"; // A single number or a comma-seperated list of numbers
	// $message = "This is a test message from the PHP API script.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch); 
?>
