<?php
//GET CONSTANTS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/lead_api/facebook/constants.php');

$data['appId'] 		= 	APPID;
echo json_encode($data);return;

?>