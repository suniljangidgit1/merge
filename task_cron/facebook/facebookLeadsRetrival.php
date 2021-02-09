<?php

if(!defined('STDIN'))  define('STDIN',  fopen('php://stdin',  'rb'));
if(!defined('STDOUT')) define('STDOUT', fopen('php://stdout', 'wb'));
if(!defined('STDERR')) define('STDERR', fopen('php://stderr', 'wb'));

//require __DIR__ . '\vendor\autoload.php';
require '/var/www/html/crm.fincrm.net/crm/task_cron/vendor/autoload.php';

use FacebookAds\Object\Lead;
use FacebookAds\Api;	
use FacebookAds\Logger\CurlLogger;

$filePath      = '/var/www/html/crm.fincrm.net/crm/data/config.php';
//$filePath      	= 	$_SERVER['DOCUMENT_ROOT'].'/data/config.php';
include($filePath);

//GET CONSTANTS
$cPath = '/var/www/html/crm.fincrm.net/crm/client/res/templates/lead_api/facebook/constants.php';
// $cPath = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/lead_api/facebook/constants.php';
include($cPath);

// CREATE COMMON DATABASE CONNECTIONS
$commonDbConn 	= 	mysqli_connect($servername, $username, $password, $dbname);

// CHECK CONNECTION
if (!$commonDbConn) {
  die("Common Database Connection failed: " . mysqli_connect_error());
}

$commonDbSql = "SELECT hr.host_name,hr.db_name,hr.password, hr.user_name, fw.leadgen_id, fw.page_id, fw.form_id FROM facebook_ads_users fu INNER JOIN facebook_ads_webhook fw ON fu.form_id = fw.form_id INNER JOIN host_record hr ON fu.domain_name = hr.domain_url";

$commonDbResult 	= 	mysqli_query($commonDbConn,$commonDbSql);
$commonDbNumRows 	=	mysqli_num_rows($commonDbResult);

if($commonDbNumRows>0){

	while($commonDbRows = mysqli_fetch_assoc($commonDbResult)) {

		$hostName 			= 	$commonDbRows['host_name'];
		$userName 			= 	$commonDbRows['user_name'];
		$password 			= 	$commonDbRows['password'];
		$databaseName 		= 	$commonDbRows['db_name'];
		$leadgenId 			= 	$commonDbRows['leadgen_id'];
		$pageId 			= 	$commonDbRows['page_id'];
		$formId 			= 	$commonDbRows['form_id'];
		$whId 				= 	$commonDbRows['form_id'];

		// CREATE SUB DOMAIN DATABASE CONNECTION
		$conn = mysqli_connect($hostName, $userName, $password, $databaseName);

		// CHECK CONNECTION
		if (!$conn) {
		  die("Sub-domain Database Connection failed: " . mysqli_connect_error());
		}

		$leadSql  = "SELECT fm.fb_leads_structure, fm.crm_leads_structure , up.page_access_token FROM facebook_ads_user_pages up INNER JOIN fb_form_fields_mapping fm ON up.page_id = fm.page_id WHERE fm.page_id = '$pageId' AND fm.form_id = '$formId'";

		$leadResult 	= mysqli_query($conn,$leadSql);
		$leadResultRows = mysqli_num_rows($leadResult);
		if ( $leadResultRows > 0 ) {

		    while( $leadRow = mysqli_fetch_assoc($leadResult) ) {

		        $fb_leads_structure 	= 	explode(',', $leadRow['fb_leads_structure']);
		        $crm_leads_structure 	= 	explode(',', $leadRow['crm_leads_structure']);
		        $page_access_token 		= 	$leadRow['page_access_token'];

		        $app_id 		= APPID;
				$app_secret 	= CLIENTSECRET;

				$api 		= 	Api::init($app_id, $app_secret, $page_access_token);
				$api->setLogger(new CurlLogger());

				$fields 	= 	array();
				$params 	= 	array();
			
				$leads_data = json_encode((new Lead($leadgenId))->getSelf(
				  $fields,
				  $params
				)->exportAllData(), JSON_PRETTY_PRINT);

				$data 		= 	json_decode($leads_data);
				$length 	= 	count($data->field_data);

				for( $i = 0; $i < $length; $i++ ) {
					$fields_array[$data->field_data[$i]->name] = $data->field_data[$i]->values[0];
				}

				foreach( $fb_leads_structure  as  $fb_rows ) {
					$fb_rows 		= isset($fields_array[$fb_rows]) ? $fields_array[$fb_rows]:'';
					$leads_values[] = $fb_rows;
				}

				$fields_name 	= 	implode(",", $crm_leads_structure).','.'source';
				$leads_values 	= 	"'".implode("','", $leads_values)."','facebook.com'";

				$sql 			= 	"INSERT INTO lead($fields_name) VALUES ($leads_values)";
				$result 		= 	mysqli_query($conn, $sql);

				if( $result ) {
					echo "data fatch succeffully";
					$whSql = "DELETE FROM `facebook_ads_webhook` WHERE id = '$whId'";
					mysqli_query($commonDbConn, $whSql);
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		    }
		}
	}
}
?>