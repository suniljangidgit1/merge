<?php

/**
 * 
 */
require('Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Razorpay_connect 
{
	
	function __construct( )
	{
		# code...
	}

	function getPaymentDetails( $payemntId = "" ) {

		// ADD HERE TEST OT LIVE CREDENTIAL
		$api = new Api('rzp_test_1vkDLIhCWUiOun', 'YlLTWTSTmA94VoL7As2HatAC');
		
		$paymentDetails = array();
		$apiResponse	= $api->payment->fetch($payemntId);

		if( !empty($apiResponse) ) {
			foreach ($apiResponse as $key => $value) {
				$paymentDetails[$key] = $value;
			}
		}
		// echo "<br><pre>";print_r( $paymentDetails );die;
		return $paymentDetails;

	}
}

