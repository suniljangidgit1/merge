<?php

// The below example shows how to list objects from an S3 Bucket in Wasabi using php

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// require the amazon sdk from your composer vendor dir
require 'vendor/autoload.php';


// $client = S3Client::factory(array(
// 	'endpoint' => 'https://s3.us-west-1.wasabisys.com',
// 	'profile' => 'wasabi',
// 	'region' => 'us-west-1',
// 	'version' => 'latest',
// 	'use_path_style_endpoint' => true,
// 	'credentials' => [
// 		'key'    => "MB8AA2RHQG1UKUS6F8JY",
// 		'secret' => "ndI0UaQzvNJmMq8OtOm7llZNWbrDGXikwpzikFwE",
// 	]
// ));

$client = S3Client::factory(array(
	'endpoint' => 'https://s3.us-west-1.wasabisys.com',
	'profile' => 'wasabi',
	'region' => 'us-west-1',
	'version' => 'latest',
	'use_path_style_endpoint' => true,
	'credentials' => [
		'key'    => "GI3UTP02EJ725OAN0YFG",
		'secret' => "CKNVXvmLog113PJwrRU04oyISYmIPznDEwfz4k57",
	]
));