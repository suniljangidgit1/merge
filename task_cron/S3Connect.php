<?php
	require 'vendor/autoload.php';
	$s3 = new Aws\S3\S3Client([
        'region'  => 'ap-south-1',
        'version' => '2006-03-01',
        'credentials' => [
        	'key'    => "AKIAVKMGGRZRUOQQMSEE",
            'secret' => "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",
         ]
    ]);