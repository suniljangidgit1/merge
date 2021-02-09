<?php
// send sms
define('SENDFROM', 'FinCRM');

// OTP SMS key
define('SMSAPIKEY', 'AD0snYOeimnTrBOU');

// Trasactional SMS key
define('SMSTRANSACTIONALAPIKEY', 'nb80zacUDf7jFgri');

//Promotional SMS key
define('SMSPROMOTIONALAPIKEY', 'iF7DDfFmdS4ZaKQV');


/*==========================CUSTOM FUNCTIONS START=================================*/
/*
 * FOR SEND SMS
 * @para   -> $apiKey  		= 	[ string ]
 * @para   -> $senderId  	= 	[ string ]
 * @para   -> $mobileNo  	= 	[ array  ]
 * @para   -> $smsBody  	= 	[ string ]
 * #return -> $responseIds  = 	[ array  ]
*/
if( !function_exists( 'sendSMS' ) ) {

	function sendSMS($apiKey = "", $senderId = "", $numbers = array(), $smsBody = ""){

		$smsBody 		= 	urlencode($smsBody);
		$responseIds    = 	array();

		foreach($numbers as $number) {

			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, "https://msg.mtalkz.com/V2/http-api.php");
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, "apikey=".$apiKey."&senderid=".$senderId."&number=".$number."&message=".$smsBody."&format=json");
			$response = curl_exec($ch);

			//get response id
	        $response   	=    json_decode($response);
	        if($response->status == 'OK'){
	        	$responseIds[]  =    $response->data[0]->id;
	        }
			curl_close($ch);
		}

		return $responseIds;
	}
}
/*==========================CUSTOM FUNCTIONS END=================================*/