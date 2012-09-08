<?php

include_once('config_techathon.php');
	echo "
<html>
	<head>
    	<meta name=\"txtweb-appkey\" content=\"$TXTWEB_APP_KEY\">
    </head>
    <body>
	";

	//extracting the parameter "txtweb-message" from the http request sent by txtWeb
	if(isset($_GET['txtweb-message']) && $_GET['txtweb-message'] != "") {
		$response = $_GET['txtweb-message']."\n";
		$f = fopen("responses.txt","a");
		fwrite($f, $response);
		fclose($f);
		$message = "Your response has been recorded. Thank you for participating in STAB quiz";
	} else {
		$message = "Well I should have got some answers with your mobile number : Try again answer1 answer2 ... answern mobile number. Check your hostel noticeboard for latest quiz. Brought to you by STAB-IITB.";
	}

	echo $message;
	echo "
	</body>
</html>
	";

?>
